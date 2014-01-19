<?php
$pagename_template = "article";
require_once WEBROOT.'include/function.php';

$id = intval(var_request("id","0"));
$keyword = htmlspecialchars(urldecode(var_request("keyword","")));

dbconnect();

if (!$TaoConfig[DB_OPEN]){
	exit("本类型栏目需要数据库。<a href='".$rootroad."/install.php'>点击安装〉〉</a>");
}

$cates_list = GetArrArticle_cate();

$article_cate_list = array();
foreach ($cates_list as $val) {
	if ($val['pid'] == 0) {
		$article_cate_list['parent'][$val['id']] = $val;
	} else {
		//$val['nums'] = $article_mod->where("cate_id=".$val['id'])->count();
		$article_cate_list['sub'][$val['pid']][] = $val;
	}
}



$where = " 1=1 ";
if($id!=0) $where .= " and id=".$id;

$query = $TaoConfig['db']->query("SELECT * FROM ".tname('article')."  WHERE $where order by ordid desc,id limit 0,1 " );
$article = array();
if ($value = $TaoConfig['db']->fetch_array($query)) {
	$article = $value;
}

if($article["cate_id"]!="0" && $article["cate_id"]!=""){
	//读取当前类别
	if ($value = $TaoConfig['db']->fetch_array($TaoConfig['db']->query("SELECT * FROM ".tname('article_cate')."  WHERE id=$article[cate_id] order by sort_order desc,id limit 0,1 " ))) {
		$article["cate"] = $value;
	}
}

//转码
if($TaoConfig["default_lang"]=="GBK"){
	array_walk_recursive($article,"utf8_gbk");
}

if($article["cate_id"]=="0")$article["cate_id"]="-1";

//读取下条
$article["next_one"] = GetArrArticle($article["cate_id"],1,1,0,0,"add_time"," and ((ordid=".$article["ordid"]." and add_time>'".$article["add_time"]."') or ordid>".$article["ordid"].")");
//读取上条
$article["prev_one"] = GetArrArticle($article["cate_id"],1,1,0,0,"add_time"," and ((ordid=".$article["ordid"]." and add_time<'".$article["add_time"]."') or ordid<".$article["ordid"].")");




$list_title=$article["seo_title"];
$list_keyword=$article["seo_keys"];
$list_discription=$article["seo_desc"];

if($list_title=="")$list_title = $CustomSeoconfig[$pagename_template."_title"];
if($list_keyword=="")$list_keyword = $CustomSeoconfig[$pagename_template."_keyword"];
if($list_discription=="")$list_discription = $CustomSeoconfig[$pagename_template."_discription"];

if($list_title=="")$list_title = "{标题}_{类别名}_{网站名}";
if($list_keyword=="")$list_keyword = "{标题},{类别名}";
if($list_discription=="")$list_discription = "{标题}：{简介}";

$tihuanarr = array();
$tihuanarr["{标题}"] = $article["title"];
$tihuanarr["{类别名}"] = $article["cate"]["name"];
$tihuanarr["{网站名}"] = $sitetitle;
$tihuanarr["{简介}"] = $article["abst"];
$tihuanarr["{关键词}"] = $article["keyword"];


$page_title = strtr($list_title,$tihuanarr); 
$page_keyword = strtr($list_keyword,$tihuanarr); 
$page_discription = strtr($list_discription,$tihuanarr); 


//加载模板
require_once Tao_template($pagename_template);
showend();

?>

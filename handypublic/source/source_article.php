<?php
$pagename_template = "article";
require_once WEBROOT.'include/function.php';

$id = intval(var_request("id","0"));
$keyword = htmlspecialchars(urldecode(var_request("keyword","")));

dbconnect();

if (!$TaoConfig[DB_OPEN]){
	exit("��������Ŀ��Ҫ���ݿ⡣<a href='".$rootroad."/install.php'>�����װ����</a>");
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
	//��ȡ��ǰ���
	if ($value = $TaoConfig['db']->fetch_array($TaoConfig['db']->query("SELECT * FROM ".tname('article_cate')."  WHERE id=$article[cate_id] order by sort_order desc,id limit 0,1 " ))) {
		$article["cate"] = $value;
	}
}

//ת��
if($TaoConfig["default_lang"]=="GBK"){
	array_walk_recursive($article,"utf8_gbk");
}

if($article["cate_id"]=="0")$article["cate_id"]="-1";

//��ȡ����
$article["next_one"] = GetArrArticle($article["cate_id"],1,1,0,0,"add_time"," and ((ordid=".$article["ordid"]." and add_time>'".$article["add_time"]."') or ordid>".$article["ordid"].")");
//��ȡ����
$article["prev_one"] = GetArrArticle($article["cate_id"],1,1,0,0,"add_time"," and ((ordid=".$article["ordid"]." and add_time<'".$article["add_time"]."') or ordid<".$article["ordid"].")");




$list_title=$article["seo_title"];
$list_keyword=$article["seo_keys"];
$list_discription=$article["seo_desc"];

if($list_title=="")$list_title = $CustomSeoconfig[$pagename_template."_title"];
if($list_keyword=="")$list_keyword = $CustomSeoconfig[$pagename_template."_keyword"];
if($list_discription=="")$list_discription = $CustomSeoconfig[$pagename_template."_discription"];

if($list_title=="")$list_title = "{����}_{�����}_{��վ��}";
if($list_keyword=="")$list_keyword = "{����},{�����}";
if($list_discription=="")$list_discription = "{����}��{���}";

$tihuanarr = array();
$tihuanarr["{����}"] = $article["title"];
$tihuanarr["{�����}"] = $article["cate"]["name"];
$tihuanarr["{��վ��}"] = $sitetitle;
$tihuanarr["{���}"] = $article["abst"];
$tihuanarr["{�ؼ���}"] = $article["keyword"];


$page_title = strtr($list_title,$tihuanarr); 
$page_keyword = strtr($list_keyword,$tihuanarr); 
$page_discription = strtr($list_discription,$tihuanarr); 


//����ģ��
require_once Tao_template($pagename_template);
showend();

?>

<?php
$pagename_template = "help";
require_once WEBROOT.'include/function.php';

$id = intval(var_request("id","0"));
$keyword = htmlspecialchars(urldecode(var_request("keyword","")));

dbconnect();


$cates = GetArrHelps_cate();

$where = " 1=1 ";
if($id!=0) $where .= " and id=".$id;
if($keyword!="") $where .= " and title like '%".Newiconv("GBK","UTF-8",$keyword)."%'";

$query = $TaoConfig['db']->query("SELECT * FROM ".tname('help')."  WHERE $where order by ordid desc,id limit 0,1 " );
$help = array();
if ($value = $TaoConfig['db']->fetch_array($query)) {
	$help = $value;
}


//转码
if($TaoConfig["default_lang"]=="GBK"){
	array_walk_recursive($help,"utf8_gbk");
}

$all_cates = array();
$now_array = array();
$now_cates = array();
foreach($cates as $k=>$v){
	$v["helps"] = GetArrHelps($v["id"]);
	
	if(isset($v["helps"][0])){
		$v["url"]=$v["helps"][0]["url"];
		
		if($v["id"]==$help["cate_id"]){
			$now_array = $v["helps"];
			$now_cates = $v;
		}
		
	}else{
		$v["url"] = "#";
	}
	$all_cates[] = $v;
}


$list_title = $CustomSeoconfig[$pagename_template."_title"];
$list_keyword = $CustomSeoconfig[$pagename_template."_keyword"];
$list_discription = $CustomSeoconfig[$pagename_template."_discription"];

$list_title=$now_cates["seo_title"];
$list_keyword=$now_cates["seo_keys"];
$list_discription=$now_cates["seo_desc"];

if($list_title=="")$list_title = "帮助中心_{标题}_{网站名}";
if($list_keyword=="")$list_keyword = "{网站名}帮助中心";
if($list_discription=="")$list_discription = "您所查看的是{网站名}帮助中心！";

$tihuanarr = array();
$tihuanarr["{标题}"] = $help["title"];
$tihuanarr["{网站名}"] = $sitetitle;


$page_title = strtr($list_title,$tihuanarr); 
$page_keyword = strtr($list_keyword,$tihuanarr); 
$page_discription = strtr($list_discription,$tihuanarr); 


//加载模板
require_once Tao_template("help");
showend();

?>

<?php
$pagename_template = "taoseller"; //这个字段一定要跟页面名称对上。 
require_once WEBROOT.'include/function.php';
$pages = intval(var_request("page","1"));



$param = array();
$param["showtype"] = intval(var_request("showtype",""));
$param["seller_id"] = intval(var_request("userid",""));
$param["userid"] = intval(var_request("userid",""));
$param["relate_type"] = htmlspecialchars(urldecode(var_request("relate_type","4")));
if(empty($param["max_count"])) $param["max_count"] = $pagenumKeys;
$param["page_no"] = $pages;

//直接跳转淘宝
if($openGoToTaobao=="1" && $isindexpage!="ok"){
}



$totalResults = 0;

$taobaokeItem = GetArrByValue(array(),$param,$totalResults);

if(isset($taobaokeItem[0])){
$vpro = $taobaokeItem[0];
$TaoShop = GetTaoShop($taobaokeItem[0]["nick"]);
}


//设置列表样式的连接
$urltype0 = GetDaohangUrl(array(),array_merge($param,array("showtype"=>"2")));
$urltype1 = GetDaohangUrl(array(),array_merge($param,array("showtype"=>"1")));



$list_title = $CustomSeoconfig[$pagename_template."_title"];
$list_keyword = $CustomSeoconfig[$pagename_template."_keyword"];
$list_discription = $CustomSeoconfig[$pagename_template."_discription"];



if($list_title=="")$list_title = "{店铺名}_{网站名}";
if($list_keyword=="")$list_keyword = "{店铺名}";
if($list_discription=="")$list_discription = "您所查看的是{店铺名}的推荐商品，祝您购物愉快！";

$tihuanarr = array();
$tihuanarr["{店铺名}"] = $TaoShop["title"];
$tihuanarr["{网站名}"] = $sitetitle;


$page_title = strtr($list_title,$tihuanarr); 
$page_keyword = strtr($list_keyword,$tihuanarr); 
$page_discription = strtr($list_discription,$tihuanarr); 

if($is_indexs=="ok"){
	$page_title = $indextitle;
	$page_keyword = $sitekey; 
	$page_discription = $sitedesc; 
}

//加载模板
require_once Tao_template($pagename_template);
showend();

?>

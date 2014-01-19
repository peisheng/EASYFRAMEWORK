<?php
$pagename_template = "taoshop";
require_once WEBROOT.'include/function.php';
$pages = intval(var_request("page","1"));

$param = array();
$param["showtype"] = intval(var_request("showtype",""));
$param["start_price"] = intval(var_request("start_price",""));
$param["end_price"] = intval(var_request("end_price",""));
$param["keyword"] = htmlspecialchars(urldecode(var_request("keyword","")));
$param["cid"] = intval(var_request("vcate_id","0"));
$param["vcate_id"] = intval(var_request("vcate_id","0"));
$param["sort_field"] = htmlspecialchars(var_request("sort_field","auction_count"),ENT_QUOTES);
$param["sort_type"] = htmlspecialchars(var_request("sort_type","desc"),ENT_QUOTES);
$param["page_size"] = $parmvalue["page_size"];
if(empty($param["page_size"])) $param["page_size"] = $pagenumKeys;
$param["page_no"] = $pages;

$count = 0;
$taoshopitems = GetTaodianpu($param,$count);

$page = new SubPages($param["page_size"],$count,$pages);
$pagestr = $page->show();

//直接跳转淘宝
if($openGoToTaobao=="1"){
	 $url = getSearch8($q,$catid);
	 header('HTTP/1.1 301 Moved Permanently');//发出301头部 
	 header('Location: '.$url);//跳转到我的新域名地址
	 exit;
	
}

$nowCat = array();
if($param["cid"] != 0)
{
	$TaoapiCat = GetShopCates(array("cids"=>$param["cid"]));

	foreach($TaoapiCat as $val){
		if($val["cid"]==$param["cid"]){
			$nowCat = $val;
		}
	}
}

$result_subcats = "";
$result_subcats_count = 0;

if(isset($TaoapiSubCats["item_cats"]["item_cat"])){
	$result_subcats = $TaoapiSubCats["item_cats"]["item_cat"];
	$result_subcats_count = count($result_subcats);
}

if($totalResults==1){
	$tparr = array();
	$tparr[] = $taobaokeItem;
	$taobaokeItem = $tparr;
}


$list_title = $CustomSeoconfig[$pagename_template."_title"];
$list_keyword = $CustomSeoconfig[$pagename_template."_keyword"];
$list_discription = $CustomSeoconfig[$pagename_template."_discription"];


if($list_title=="")$list_title = "{类别名}{关键词}店铺榜_{网站名}";
if($list_keyword=="")$list_keyword = "{类别名}{关键词}主题店,淘宝{类别名}{关键词}主题店";
if($list_discription=="")$list_discription = "您所查看的是淘宝网{类别名}{关键词}主题店列表,{网站名}提醒您，使用支付宝交易，先收货后付款！";

$tihuanarr = array();
$tihuanarr["{类别名}"] = $cat_name;
$tihuanarr["{关键词}"] = $q;
$tihuanarr["{网站名}"] = $sitetitle;
$tihuanarr["{页码}"] = $page;


$page_title = strtr($shopsearch_title,$tihuanarr); 
$page_keyword = strtr($shopsearch_keyword,$tihuanarr); 
$page_discription = strtr($shopsearch_discription,$tihuanarr); 


//加载模板
require_once Tao_template($pagename_template);
showend();

?>

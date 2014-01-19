<?php
$pagename_template = "paiproduct"; //这个字段一定要跟页面名称对上。 
require_once WEBROOT.'include/function.php';

$param = array();
$param["item_id"] = htmlspecialchars(urldecode(var_request("item_id","")));

//直接跳转淘宝
if($openGoToTaobao=="1" && $isindexpage!="ok"){
}


if($TaoConfig["applicationdata"]["GJconfig"]["listlinktype"]!="localitem"){
	echo("<script language=\"javascript\">location.href='".$rootroad."/gotourl.php?pai_iid=".$param["item_id"]."';</script>");	
	exit;
}


$totalResults = 0;

$taoke = GetPaiProduct($param["item_id"]);

$vpro = $taoke[0];

		$TaoapiCat = GetPaiCatesName(array_merge($param,array("classId"=>$vpro["dwLeafClassId"],"option"=>0)));
		$catename = $TaoapiCat[name];

//$TaoapiCat = GetTaoCates(array_merge(array("cids"=>$vpro["cid"])));


$list_title = $CustomSeoconfig[$pagename_template."_title"];
$list_keyword = $CustomSeoconfig[$pagename_template."_keyword"];
$list_discription = $CustomSeoconfig[$pagename_template."_discription"];

if($list_title=="")$list_title = "{商品名}_{网站名}";
if($list_keyword=="")$list_keyword = "{商品类别名},{商品名}";
if($list_discription=="")$list_discription = "{商品名},希望您能在{网站名},找到最好的宝贝";

$tihuanarr = array();
$tihuanarr["{商品类别名}"] = $TaoapiCat[name];
$tihuanarr["{商品名}"] = $vpro[title];
$tihuanarr["{网站名}"] = $sitetitle;
$tihuanarr["{商品价格}"] = $vpro[price];
$tihuanarr["{掌柜名}"] = $vpro[nick];
$tihuanarr["{所在地}"] =$vpro[location][city];
$tihuanarr["{剩余数量}"] = $vpro[num];
$tihuanarr["{月销量}"] = $volume;
$tihuanarr["{折扣价格}"] = $coupon_price;



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

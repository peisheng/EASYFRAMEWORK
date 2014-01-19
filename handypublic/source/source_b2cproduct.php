<?php
$pagename_template = "b2cproduct";
require_once WEBROOT.'include/function.php';
$param = array();
$param["item_id"] = htmlspecialchars(urldecode(var_request("item_id","")));

//直接跳转淘宝
if($openGoToTaobao=="1" && $isindexpage!="ok"){
		
}


$totalResults = 0;

$vpro = GetB2cProduct($param["item_id"]);

if($TaoConfig["applicationdata"]["GJconfig"]["listlinktype"]!="localitem"){
	echo("<script language=\"javascript\">location.href='".$vpro["click_url"]."';</script>");	
	exit;
}



$fileds="cid,name,count,status,sort_order";
$params = Array('cids' =>$vpro["cid"]);
$TaoapiCat	=$api59miao->listItemCatsParent($params);
$TaoapiCat = $TaoapiCat["itemcats"]["itemcat"];

if(empty($vpro["old_title"])) $vpro["old_title"] = $vpro["title"];

if(!empty($vpro["title"])) {
	$fields = 'keyword';
	$Api59miaoData=$api59miao->ListTokenizer($fields, $vpro["old_title"]);
	
	$keywordArr = $Api59miaoData["keywords"]["keyword"];

	$keywordStr = "";
	$i=0;
	foreach($keywordArr as $arrkey){
		$i++;
		if($i>7) break;
		$keywordStr .= "<a href='".GetDaohangUrl(array("typeid"=>"5","keyword"=>$arrkey))."' > ";
		$keywordStr .=  $arrkey."</a> ";
	}
}


$cash_ondelivery = $vpro['cash_ondelivery']=="True"?"支持货到付款":"不支持货到付款"; //货到付款
$freeshipment = $vpro['freeshipment']=="True"?"邮费全免 包邮":"邮费自付"; //免运费
$installment = $vpro['installment']=="True"?"支持分期付款":"不支持分期付款"; //分期付款
$has_invoice = $vpro['has_invoice']=="True"?"有发票":"无发票(允许联系售后申请发票)	"; //有发票



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
$tihuanarr["{上架时间}"] = $vpro[list_time];;



$page_title = strtr($list_title,$tihuanarr); 
$page_keyword = strtr($list_keyword,$tihuanarr); 
$page_discription = strtr($list_discription,$tihuanarr); 

if($is_indexs=="ok"){
	$page_title = $indextitle;
	$page_keyword = $sitekey; 
	$page_discription = $sitedesc; 
}


//处理下架商品。
$is_xiajia = 0;



//加载模板
require_once Tao_template($pagename_template);
showend();

?>

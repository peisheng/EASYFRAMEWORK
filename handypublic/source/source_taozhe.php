<?php
$pagename_template = "taozhe"; 
require_once WEBROOT.'include/function.php';
$pages = intval(var_request("page","1"));




$param = array();
$param["showtype"] = intval(var_request("showtype",$CustomSetFieldValue["ProlistType"]));
$param["start_price"] = intval(var_request("start_price",""));
$param["end_price"] = intval(var_request("end_price",""));
$param["keyword"] = htmlspecialchars(urldecode(var_request("keyword","")));
if(strlen($param["keyword"])>20){
	
	$param["keyword"] = strip_tags(htmlspecialchars_decode((var_request("keyword",""))));
	$param["keyword"] = str_replace("< span>","",$param["keyword"]);
	
	$param["keyword"] = fenci($param["keyword"]);
}
//$param["cid"] = intval(var_request("vcate_id","0"));
$param["cid"] = 0;
$param["vcate_id"] = intval(var_request("vcate_id","0"));
//$param["cat"] = intval(var_request("vcate_id","0"));
$param["sort"] = htmlspecialchars(var_request("sort","default"),ENT_QUOTES);
$param["page_size"] = $parmvalue["page_size"];
if(empty($param["page_size"])) $param["page_size"] = $pagenumKeys;
$param["page_no"] = $pages;

//$page_size = 52;
$param["start"] = ($pages-1)*52;

//直接跳转淘宝
if($openGoToTaobao=="1" && $isindexpage!="ok"){
}


if($param["cid"] != 0 )
{
	$TaoapiCat = GetTaoCates(array_merge($param,array("cids"=>$param["cid"])));
	
	$TaoapiSubCats = GetTaoCates(array_merge($param,array("parent_cid"=>$param["cid"])));
	if($Show_list_small){
	
	}
}
$totalResults = 0;

$taobaokeItem = GetTaoZheKou($param,$totalResults,$sortarr,$typearr);

$TaoapiSubCats = $typearr;
if(isset($TaoapiSubCats)){

foreach($TaoapiSubCats as $key=>$val){
	$param_var = $param;
	$param_var["vcate_id"]=$val["vcate_id"];
	$TaoapiSubCats[$key]["url"] = GetDaohangUrl(array("urltype"=>$TaoConfig["pagename_template"]),$param_var);
	 
}
}

if($totalResults/$param["page_size"]>10){
	$totalResults = $param["page_size"]*10;
}

$page = new SubPages($param["page_size"],$totalResults,$pages);
$pagestr = $page->show();

//定义价格范围
$arr_price = array();
$arr_price[] = array("start_price"=>"","end_price"=>"","title"=>"全部价格");
$arr_price[] = array("start_price"=>"1","end_price"=>"200","title"=>"1-200元");
$arr_price[] = array("start_price"=>"200","end_price"=>"500","title"=>"200-500元");
$arr_price[] = array("start_price"=>"500","end_price"=>"1000","title"=>"500-1000元");
$arr_price[] = array("start_price"=>"1000","end_price"=>"3000","title"=>"1000-3000元");
$arr_price[] = array("start_price"=>"3000","end_price"=>"10000","title"=>"3000-10000元");


foreach($arr_price as $key=>$sub){
		if(intval($param["start_price"])==intval($sub["start_price"])){
			$arr_price[$key]["class"] = "on";
		}
		$tparam = $param;
		$tparam["start_price"] = $sub["start_price"];
		$tparam["end_price"] = $sub["end_price"];
		
		
		$arr_price[$key]["url"] = GetDaohangUrl(array(),$tparam);
}



//设置列表样式的连接
$urltype0 = GetDaohangUrl(array(),array_merge($param,array("showtype"=>"2")));
$urltype1 = GetDaohangUrl(array(),array_merge($param,array("showtype"=>"1")));

//定义排序范围
$arr_sort = array();

if(isset($sortarr)){
foreach($sortarr as $key=>$val){
	$arr_sort[] = array("sort"=>$key,"title"=>$val);
}
}

foreach($arr_sort as $key=>$sub){
	
		if($param["sort"]==$sub["sort"]){
			$arr_sort[$key]["class"] = "on";
		}
		$tparam = $param;
		$tparam["sort"] = $sub["sort"];
		$arr_sort[$key]["url"] = GetDaohangUrl(array(),$tparam);
}



$list_title = $CustomSeoconfig[$pagename_template."_title"];
$list_keyword = $CustomSeoconfig[$pagename_template."_keyword"];
$list_discription = $CustomSeoconfig[$pagename_template."_discription"];


if($list_title=="")$list_title = "{类别名}{关键词}_{网站名}";
if($list_keyword=="")$list_keyword = "{类别名}{关键词},淘宝{类别名}{关键词}";
if($list_discription=="")$list_discription = "您所查看的是{类别名}{关键词},{网站名}提醒您，使用支付宝交易，先收货后付款！";

$tihuanarr = array();
$tihuanarr["{类别名}"] = $TaoapiCat[0][name];
$tihuanarr["{关键词}"] = $param[keyword];
$tihuanarr["{网站名}"] = $sitetitle;
$tihuanarr["{页码}"] = $pages;


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

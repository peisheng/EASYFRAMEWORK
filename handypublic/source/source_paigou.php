<?php
$pagename_template = "paigou"; //这个字段一定要跟页面名称对上。 
require_once WEBROOT.'include/function.php';
$pages = intval(var_request("page","1"));



$param = array();
$param["showtype"] = intval(var_request("showtype",$CustomSetFieldValue["ProlistType"]));
$param["start_price"] = intval(var_request("start_price",""));
$param["end_price"] = intval(var_request("end_price",""));

$param["crMin"] = intval(var_request("crMin",""));
$param["crMax"] = intval(var_request("crMax",""));
$param["cvMin"] = intval(var_request("cvMin",""));
$param["cvMax"] = intval(var_request("cvMax",""));


$param["keyword"] = htmlspecialchars(urldecode(var_request("keyword","")));

if(strlen($param["keyword"])>20){
	$param["keyword"] = strip_tags(htmlspecialchars_decode((var_request("keyword",""))));
	$param["keyword"] = str_replace("< span>","",$param["keyword"]);
	$param["keyword"] = fenci($param["keyword"]);
	
}


$param["vcate_id"] = intval(var_request("vcate_id","0"));

//拍拍用的参数键值转换

$param["sort"] = htmlspecialchars(var_request("sort","88"),ENT_QUOTES);
$param["pageSize"] = $parmvalue["page_size"];
if(empty($param["pageSize"])) $param["pageSize"] = $pagenumKeys;

$param["pageIndex"] = ($pages*$param["pageSize"])+1;


//直接跳转淘宝
if($openGoToTaobao=="1" && $isindexpage!="ok"){
}

function GetClassName($classid){
		$param = array();
		$TaoapiSubCats_0 = GetPaiCates(array_merge($param,array("navigationId"=>0)));
		foreach($TaoapiSubCats_0 as $val){
			if($val["navigationId"]==$classid){
				return $val[navigationName];	
			}
		}

		foreach($TaoapiSubCats_0 as $val){
			if($val["isClass"]==0){
				$TaoapiSubCats_1 = GetPaiCates(array_merge($param,array("navigationId"=>$val["navigationId"])));
				foreach($TaoapiSubCats_1 as $val2){
					if($val2["navigationId"]==$classid){
						return $val2[navigationName];	
					}
				}
			}
		}
}

if($param["vcate_id"] != 0 )
{
	//$TaoapiCat = GetPaiCates(array_merge($param,array("navigationId"=>$param["vcate_id"])));
	$TaoapiSubCats = GetPaiCates(array_merge($param,array("navigationId"=>$param["vcate_id"])));
	
	
	if(count($TaoapiSubCats)==0){
		$TaoapiSubCatsNow = GetPaiCatesName(array_merge($param,array("classId"=>$param["vcate_id"],"option"=>0)));
		$catename = $TaoapiSubCatsNow[name];
		
	}else{
		$catename = GetClassName($param["vcate_id"]);
	}
	
	if($Show_list_small){
	
	}
}



$totalResults = 0;
$taobaokeItem = GetArrByValue(array(),$param,$totalResults);



$page = new SubPages($param["pageSize"],$totalResults,$pages);
$pagestr = $page->show();
//定义价格范围
$arr_price = array();
$arr_price[] = array("start_price"=>"","end_price"=>"","title"=>"全部价格");
$arr_price[] = array("start_price"=>"1","end_price"=>"20000","title"=>"1-200元");
$arr_price[] = array("start_price"=>"20000","end_price"=>"50000","title"=>"200-500元");
$arr_price[] = array("start_price"=>"50000","end_price"=>"100000","title"=>"500-1000元");
$arr_price[] = array("start_price"=>"100000","end_price"=>"300000","title"=>"1000-3000元");
$arr_price[] = array("start_price"=>"300000","end_price"=>"1000000","title"=>"3000-10000元");
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
$arr_sort[] = array("sort"=>"88","title"=>"默认");
$arr_sort[] = array("sort"=>"89","title"=>"销量");
$arr_sort[] = array("sort"=>"8","title"=>"信用高");
$arr_sort[] = array("sort"=>"7","title"=>"价格高");
$arr_sort[] = array("sort"=>"6","title"=>"价格低");
$arr_sort[] = array("sort"=>"4","title"=>"时间最近");
$arr_sort[] = array("sort"=>"5","title"=>"时间最久");
$arr_sort[] = array("sort"=>"11","title"=>"浏览量");
$arr_sort[] = array("sort"=>"21","title"=>"收藏量");
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
$tihuanarr["{类别名}"] = $catename;
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

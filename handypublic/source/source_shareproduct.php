<?php
$pagename_template = "shareproduct";
require_once WEBROOT.'include/function.php';

$param=array();
$page_size = 20;
$param["item_id"] = intval(var_request("id","0"));
$param["id"] = intval(var_request("id","0"));

$likes = intval(var_request("likes","0"));
dbconnect();

if (!$TaoConfig[DB_OPEN]){
	exit("本类型栏目需要数据库。<a href='".$rootroad."/install.php'>点击安装〉〉</a>");
}

if($likes=="1"){
	fetch_Noarray("update ".tname('items')." set likes=likes+1 where id=".$param["id"]);
}

$procontent = fetch_Onearray("select ".tname('items').".*,name,pid from ".tname('items')." inner join ".tname('items_cate')." on ".tname('items').".cid = ".tname('items_cate').".id where ".tname('items').".id=".$param["item_id"]);

$param["vcate_id"] = $procontent["cid"];
$param["cid"] = $procontent["cid"];
$param["user_id"] = $procontent["uid"];

$procontent["url"] = (($procontent["url"]));

$procontent["click_url_base64"] = GetClickUrl($procontent["url"],$procontent["item_key"]);


		$procontent["pai_url"] = "#";
		if(substr($procontent["item_key"],0,7)=="taobao_") {
			$procontent["tao_iid"]=str_replace("taobao_","",$procontent["item_key"]);
		}
		if(substr($procontent["item_key"],0,7)=="paipai_") {
			$procontent["pai_url"] = GetClickUrl($procontent["url"],"share_".$valuepro["commId"]);
		}
		if(substr($procontent["item_key"],0,7)=="handel_") {
			$procontent["pai_url"] = GetClickUrl($procontent["url"],"share_".$valuepro["commId"]);
		}
		
		
		if($TaoConfig["applicationdata"]["GJconfig"]["listlinktype"]!="localitem"){
			$procontent["url"] = GetClickUrl($procontent["url"],"share_".$valuepro["commId"]);
			$procontent["pai_url"] = $value["url"];
			$procontent["target"] = "_blank";
			$procontent["rel"] = " rel='nofollow'";
		}else{
			$procontent["url"] = GetDaohangUrl($value);
		}
		

		


$cate_all = GetArrShareTypes();


$cate_list = GetArrShareTypesSearch($param["vcate_id"]);

if($param["vcate_id"]!=0){
	$cate_now = 0;
	foreach($cate_all as $val){
		if($val[id]==$param["vcate_id"]){
			$cate_now = $val;
		}
	}
	if($cate_now==0){
		$param["vcate_id"] = 0;	
	}
}

	
if(count($cate_list)==0){
	if($param["vcate_id"]==0){
		$cate_list = GetArrShareTypesSearch(0);
	}else{
		$cate_list = GetArrShareTypesSearch($cate_now["pid"]);
	}
}else{
	$cate_now = $cate_list[0];
}

foreach($cate_list as $key=>$sub){
		if(intval($param["pid"])==intval($sub["pid"])){
			$arr_price[$key]["class"] = "on";
		}
		$tparam = $param;
		$tparam["vcate_id"] = $sub["id"];
		$tparam["keyword"] = "";
		$cate_list[$key]["url"] = GetDaohangUrl(array("urltype"=>"shareall"),$tparam);
}

//转码
if($TaoConfig["default_lang"]=="GBK"){
	array_walk_recursive($procontent,"utf8_gbk");
}


$tparam = $param;$tparam["sort"]="add_time";
$url_new = GetDaohangUrl(array(),$tparam);
$tparam["sort"]="likes";
$url_likes = GetDaohangUrl(array(),$tparam);

$count = 0;
$share_list4 = GetArrSharePro($param["cid"],"",4,1,0,-1,"add_time",$count);

$count = 0;
$share_list = GetArrSharePro(0,"",12,1,0,$param["user_id"],"add_time",$count);

$list_title = $CustomSeoconfig[$pagename_template."_title"];
$list_keyword = $CustomSeoconfig[$pagename_template."_keyword"];
$list_discription = $CustomSeoconfig[$pagename_template."_discription"];


if($list_title=="")$list_title = "{商品名}_{网站名}";
if($list_keyword=="")$list_keyword = "{商品名}";
if($list_discription=="")$list_discription = "您所查看的是{商品名},{网站名}提醒您，使用支付宝交易，先收货后付款！";

$tihuanarr = array();
$tihuanarr["{商品名}"] = $procontent[title];
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


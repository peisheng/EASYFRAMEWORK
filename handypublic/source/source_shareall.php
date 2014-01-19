<?php
$pagename_template = "shareall";
require_once WEBROOT.'include/function.php';

$param=array();
$page_size = 20;
$param["vcate_id"] = intval(var_request("vcate_id","0"));
$param["user_id"] = intval(var_request("user_id","-1"));
$param["keyword"] = htmlspecialchars(urldecode(var_request("keyword","")));
$param["sort"] = htmlspecialchars(urldecode(var_request("sort","likes")));
$pages = intval(var_request("page","1"));
if(empty($param["page_size"])) $param["page_size"] = $pagenumKeys;

dbconnect();
if (!$TaoConfig[DB_OPEN]){
	exit("��������Ŀ��Ҫ���ݿ⡣<a href='".$rootroad."/install.php'>�����װ����</a>");
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
	if(!isset($cate_now))$cate_now = $cate_list[0];
}

foreach($cate_list as $key=>$sub){
		if(intval($param["pid"])==intval($sub["pid"])){
			$arr_price[$key]["class"] = "on";
		}
		$tparam = $param;
		$tparam["vcate_id"] = $sub["id"];
		$tparam["keyword"] = "";
		$cate_list[$key]["url"] = GetDaohangUrl(array(),$tparam);
}

$TaoapiSubCats = $cate_list;

$tparam = $param;$tparam["sort"]="add_time";
$url_new = GetDaohangUrl(array(),$tparam);
$tparam["sort"]="likes";
$url_likes = GetDaohangUrl(array(),$tparam);

//�������з�����Ʒ��
$share_list = GetArrSharePro($param["vcate_id"],$param["keyword"],$param["page_size"],$pages,-1,$param["user_id"],$param["sort"],$count);
$taobaokeItem = $share_list;


$page = new SubPages($param["page_size"],$count["count"],$pages);
$pagestr = $page->show();

$totalResults = $count[count];

$list_title = $CustomSeoconfig[$pagename_template."_title"];
$list_keyword = $CustomSeoconfig[$pagename_template."_keyword"];
$list_discription = $CustomSeoconfig[$pagename_template."_discription"];


if($list_title=="")$list_title = "���ѷ��������Ʒ��{�����}{�ؼ���}_{��վ��}";
if($list_keyword=="")$list_keyword = "{�����}{�ؼ���},�Ա�{�����}{�ؼ���}";
if($list_discription=="")$list_discription = "�����鿴����{�����}{�ؼ���},{��վ��}��������ʹ��֧�������ף����ջ��󸶿";

$tihuanarr = array();
$tihuanarr["{�����}"] = $cate_now[name];
$tihuanarr["{�ؼ���}"] = $param[keyword];
$tihuanarr["{��վ��}"] = $sitetitle;
$tihuanarr["{ҳ��}"] = $pages;
$catename = $cate_now[name];

$page_title = strtr($list_title,$tihuanarr); 
$page_keyword = strtr($list_keyword,$tihuanarr); 
$page_discription = strtr($list_discription,$tihuanarr); 


if($cate_now["seo_title"]!="") $page_title = $cate_now["seo_title"];
if($cate_now["seo_keys"]!="") $page_keyword = $cate_now["seo_keys"];
if($cate_now["seo_desc"]!="") $page_discription = $cate_now["seo_desc"];


if($is_indexs=="ok"){
	$page_title = $indextitle;
	$page_keyword = $sitekey; 
	$page_discription = $sitedesc; 
}

//����ģ��
require_once Tao_template($pagename_template);
showend();


?>


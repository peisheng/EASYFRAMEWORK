<?php
$pagename_template = "b2cgou"; //����ֶ�һ��Ҫ��ҳ�����ƶ��ϡ� 
require_once WEBROOT.'include/function.php';
$pages = intval(var_request("page","1"));


$param = array();
$param["showtype"] = intval(var_request("showtype",$CustomSetFieldValue["ProlistType"]));
$param["mall_id"] = intval(var_request("mall_id",""));
$param["keyword"] = htmlspecialchars(urldecode(var_request("keyword","")));


if(strlen($param["keyword"])>20){
	$param["keyword"] = fenci($param["keyword"]);
}


$param["vcate_id"] = htmlspecialchars(urldecode(var_request("vcate_id","")));
$param["sort"] = htmlspecialchars(var_request("sort","modified_desc"),ENT_QUOTES);
$param["page_size"] = $parmvalue["page_size"];
if(empty($param["page_size"])) $param["page_size"] = $pagenumKeys;
$param["page"] = $pages;

//ֱ����ת�Ա�
if($openGoToTaobao=="1" && $isindexpage!="ok"){
}


$count = array();

$taobaokeB2c = GetArrByValue(array(),$param,$count);

if(!empty($param["vcate_id"])){
	$fileds="cid,name,count,status,sort_order";
	$params = Array('cids' =>$param["vcate_id"]);
	$TaoapiCat	=$api59miao->listItemCatsParent($params);
	$TaoapiCat = $TaoapiCat["itemcats"]["itemcat"];
$catename=$TaoapiCat[name];
	
}else{
	$TaoapiCat = array();
}


$totalResults = $count["count"];

$page = new SubPages($param["page_size"],$count["count"],$pages);

$pagestr = $page->show();

//�����б�
$seller = $count["seller"];

if(count($seller)>0){
foreach($seller as $key=>$sub){
		if(intval($param["start_price"])==intval($sub["start_price"])){
			$arr_price[$key]["class"] = "on";
		}
		$tparam = $param;
		$tparam["vcate_id"] = "";
		$tparam["mall_id"] = $sub["seller_id"];
		$seller[$key]["name"] = $sub["seller_name"];
		$seller[$key]["title"] = $sub["seller_name"];
		$seller[$key]["url"] = GetDaohangUrl(array(),$tparam);
}
}
//����б�
$category = $count["category"];
if(count($category)>0){
foreach($category as $key=>$sub){
		if(intval($param["vcate_id"])==intval($sub["category_id"])){
			$arr_price[$key]["class"] = "on";
		}
		$tparam = $param;
		$tparam["vcate_id"] = $sub["category_id"];
		$tparam["keyword"] = "";
		$category[$key]["name"] = $sub["category_name"];
		$category[$key]["url"] = GetDaohangUrl(array(),$tparam);
}
}
$TaoapiSubCats = $category;

$taobaokeItem = $taobaokeB2c;

//�����б���ʽ������
$urltype0 = GetDaohangUrl(array(),array_merge($param,array("showtype"=>"2")));
$urltype1 = GetDaohangUrl(array(),array_merge($param,array("showtype"=>"1")));

//��������Χ
$arr_sort = array();
$arr_sort[] = array("sort"=>"price_desc","title"=>"�۸�Ӹߵ���");
$arr_sort[] = array("sort"=>"price_asc","title"=>"�۸�ӵ͵���");
$arr_sort[] = array("sort"=>"modified_desc","title"=>"ʱ��Ӹߵ���");
$arr_sort[] = array("sort"=>"modified_asc","title"=>"ʱ��ӵ͵���");
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

if($list_title=="")$list_title = "{�����}{�ؼ���}_{��վ��}";
if($list_keyword=="")$list_keyword = "{�����}{�ؼ���},�Ա�{�����}{�ؼ���}";
if($list_discription=="")$list_discription = "�����鿴����{�����}{�ؼ���},{��վ��}��������ʹ��֧�������ף����ջ��󸶿";

$tihuanarr = array();
$tihuanarr["{�����}"] = $TaoapiCat[name];
$tihuanarr["{�ؼ���}"] = $param[keyword];
$tihuanarr["{��վ��}"] = $sitetitle;
$tihuanarr["{ҳ��}"] = $pages;


$page_title = strtr($list_title,$tihuanarr); 
$page_keyword = strtr($list_keyword,$tihuanarr); 
$page_discription = strtr($list_discription,$tihuanarr); 

if($is_indexs=="ok"){
	$page_title = $indextitle;
	$page_keyword = $sitekey; 
	$page_discription = $sitedesc; 
}

//����ģ��
require_once Tao_template($pagename_template);
showend();

?>

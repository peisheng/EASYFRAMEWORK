<?php
$pagename_template = "paigou"; //����ֶ�һ��Ҫ��ҳ�����ƶ��ϡ� 
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

//�����õĲ�����ֵת��

$param["sort"] = htmlspecialchars(var_request("sort","88"),ENT_QUOTES);
$param["pageSize"] = $parmvalue["page_size"];
if(empty($param["pageSize"])) $param["pageSize"] = $pagenumKeys;

$param["pageIndex"] = ($pages*$param["pageSize"])+1;


//ֱ����ת�Ա�
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
//����۸�Χ
$arr_price = array();
$arr_price[] = array("start_price"=>"","end_price"=>"","title"=>"ȫ���۸�");
$arr_price[] = array("start_price"=>"1","end_price"=>"20000","title"=>"1-200Ԫ");
$arr_price[] = array("start_price"=>"20000","end_price"=>"50000","title"=>"200-500Ԫ");
$arr_price[] = array("start_price"=>"50000","end_price"=>"100000","title"=>"500-1000Ԫ");
$arr_price[] = array("start_price"=>"100000","end_price"=>"300000","title"=>"1000-3000Ԫ");
$arr_price[] = array("start_price"=>"300000","end_price"=>"1000000","title"=>"3000-10000Ԫ");
foreach($arr_price as $key=>$sub){
		if(intval($param["start_price"])==intval($sub["start_price"])){
			$arr_price[$key]["class"] = "on";
		}
		$tparam = $param;
		$tparam["start_price"] = $sub["start_price"];
		$tparam["end_price"] = $sub["end_price"];
		
		
		$arr_price[$key]["url"] = GetDaohangUrl(array(),$tparam);
}
//�����б���ʽ������
$urltype0 = GetDaohangUrl(array(),array_merge($param,array("showtype"=>"2")));
$urltype1 = GetDaohangUrl(array(),array_merge($param,array("showtype"=>"1")));

//��������Χ
$arr_sort = array();
$arr_sort[] = array("sort"=>"88","title"=>"Ĭ��");
$arr_sort[] = array("sort"=>"89","title"=>"����");
$arr_sort[] = array("sort"=>"8","title"=>"���ø�");
$arr_sort[] = array("sort"=>"7","title"=>"�۸��");
$arr_sort[] = array("sort"=>"6","title"=>"�۸��");
$arr_sort[] = array("sort"=>"4","title"=>"ʱ�����");
$arr_sort[] = array("sort"=>"5","title"=>"ʱ�����");
$arr_sort[] = array("sort"=>"11","title"=>"�����");
$arr_sort[] = array("sort"=>"21","title"=>"�ղ���");
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
$tihuanarr["{�����}"] = $catename;
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

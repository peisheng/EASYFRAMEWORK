<?php
$pagename_template = "paiproduct"; //����ֶ�һ��Ҫ��ҳ�����ƶ��ϡ� 
require_once WEBROOT.'include/function.php';

$param = array();
$param["item_id"] = htmlspecialchars(urldecode(var_request("item_id","")));

//ֱ����ת�Ա�
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

if($list_title=="")$list_title = "{��Ʒ��}_{��վ��}";
if($list_keyword=="")$list_keyword = "{��Ʒ�����},{��Ʒ��}";
if($list_discription=="")$list_discription = "{��Ʒ��},ϣ��������{��վ��},�ҵ���õı���";

$tihuanarr = array();
$tihuanarr["{��Ʒ�����}"] = $TaoapiCat[name];
$tihuanarr["{��Ʒ��}"] = $vpro[title];
$tihuanarr["{��վ��}"] = $sitetitle;
$tihuanarr["{��Ʒ�۸�}"] = $vpro[price];
$tihuanarr["{�ƹ���}"] = $vpro[nick];
$tihuanarr["{���ڵ�}"] =$vpro[location][city];
$tihuanarr["{ʣ������}"] = $vpro[num];
$tihuanarr["{������}"] = $volume;
$tihuanarr["{�ۿۼ۸�}"] = $coupon_price;



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

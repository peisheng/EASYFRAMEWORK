<?php
$pagename_template = "b2cproduct";
require_once WEBROOT.'include/function.php';
$param = array();
$param["item_id"] = htmlspecialchars(urldecode(var_request("item_id","")));

//ֱ����ת�Ա�
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


$cash_ondelivery = $vpro['cash_ondelivery']=="True"?"֧�ֻ�������":"��֧�ֻ�������"; //��������
$freeshipment = $vpro['freeshipment']=="True"?"�ʷ�ȫ�� ����":"�ʷ��Ը�"; //���˷�
$installment = $vpro['installment']=="True"?"֧�ַ��ڸ���":"��֧�ַ��ڸ���"; //���ڸ���
$has_invoice = $vpro['has_invoice']=="True"?"�з�Ʊ":"�޷�Ʊ(������ϵ�ۺ����뷢Ʊ)	"; //�з�Ʊ



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
$tihuanarr["{�ϼ�ʱ��}"] = $vpro[list_time];;



$page_title = strtr($list_title,$tihuanarr); 
$page_keyword = strtr($list_keyword,$tihuanarr); 
$page_discription = strtr($list_discription,$tihuanarr); 

if($is_indexs=="ok"){
	$page_title = $indextitle;
	$page_keyword = $sitekey; 
	$page_discription = $sitedesc; 
}


//�����¼���Ʒ��
$is_xiajia = 0;



//����ģ��
require_once Tao_template($pagename_template);
showend();

?>

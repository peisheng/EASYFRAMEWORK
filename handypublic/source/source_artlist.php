<?php
$pagename_template = "artlist";
require_once WEBROOT.'include/function.php';


$page_size = 20;
$vcate_id = intval(var_request("vcate_id","0"));
$keyword = htmlspecialchars(urldecode(var_request("keyword","")));
$pages = intval(var_request("page","1"));

dbconnect();


$cates_list = GetArrArticle_cate();
$cates_now = array();
$article_cate_list = array();
foreach ($cates_list as $val) {
	if ($val['pid'] == 0) {
		$article_cate_list['parent'][$val['id']] = $val;
	} else {
		//$val['nums'] = $article_mod->where("cate_id=".$val['id'])->count();
		$article_cate_list['sub'][$val['pid']][] = $val;
		
		if(intval($val['pid'])==$vcate_id){
				$vcate_id .=",".$val['id'];
		}
		
	}
	
	if($vcate_id==intval($val["id"])){
		$cates_now = $val;
	}
	
}


//$keyword = newIconv("GBK","UTF-8",$keyword);


$wherepam = "";
if($keyword!="") $wherepam = " and title like '%".$keyword."%'";


$count = 0;


$article_list= GetArrArticle($vcate_id,$page_size,$pages,0,0,"add_time",$wherepam,$count);

$sub_pages=10;
$page = new SubPages($page_size,$count,$pages,$sub_pages);
$pagestr = $page->show();


$list_title=$cates_now["seo_title"];
$list_keyword=$cates_now["seo_keys"];
$list_discription=$cates_now["seo_desc"];

if($list_title=="")$list_title = $CustomSeoconfig[$pagename_template."_title"];
if($list_keyword=="")$list_keyword = $CustomSeoconfig[$pagename_template."_keyword"];
if($list_discription=="")$list_discription = $CustomSeoconfig[$pagename_template."_discription"];

if($list_title=="")$list_title = "�����б�_{�����}_{��վ��}";
if($list_keyword=="")$list_keyword = "�����б�,{�����}";
if($list_discription=="")$list_discription = "���鿴����{��վ��}��{�����}�������¡�";

$tihuanarr = array();
$tihuanarr["{�����}"] = $cates_now["name"];
$tihuanarr["{�ؼ���}"] = $keyword;
$tihuanarr["{��վ��}"] = $sitetitle;
$tihuanarr["{ҳ��}"] = $pages;


$page_title = strtr($list_title,$tihuanarr); 
$page_keyword = strtr($list_keyword,$tihuanarr); 
$page_discription = strtr($list_discription,$tihuanarr); 





//����ģ��
require_once Tao_template($pagename_template);
showend();

?>

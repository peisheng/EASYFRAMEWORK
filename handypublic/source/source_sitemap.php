<?php
require_once WEBROOT.'include/function.php';
$pagename_template = "sitemap";

$no = intval(isset($_GET["no"])?$_GET["no"]:"0");

$pages = application("",WEBROOT."data/singerpagedate.php");

if(!isset($pages["singerpagelist"][$no])){
	$no = 0;
}
ini_set('max_execution_time',0);
ob_start();
ob_implicit_flush(1);

$singerpage =$pages["singerpagelist"][$no];
$linklist = $pages["page".$no];

$shop_title = "网站地图_{网站名}";
$shop_keyword = "网站地图,淘宝网店铺";
$shop_discription = "";

$tihuanarr = array();
$tihuanarr["{店铺名}"] = $title;
$tihuanarr["{网站名}"] = $sitetitle;


$page_title = strtr($shop_title,$tihuanarr); 
$page_keyword = strtr($shop_keyword,$tihuanarr); 
$page_discription = strtr($shop_discription,$tihuanarr); 
	

$sitemap_arr = array();

//主导航
foreach($TaoConfig["CustomVariable"]["CustomDaohang"] as $key=>$value){
		$DaohangArr = GetArrDaohang($key);
		
		$sitemap_daohang = array();
		$sitemap_daohang["name"]=$value["title"];
		$sitemap_daohang["url"]="/";
		$sitemap_daohang["subcats"]=array();
		if(is_array($DaohangArr)){
			for($i=0;$i<count($DaohangArr);$i++){
				$onesubcats = array();
				$onesubcats["name"] = $DaohangArr[$i]["typename"];
				$onesubcats["url"] = $DaohangArr[$i]["url"];
				$sitemap_daohang["subcats"][] = $onesubcats;
				
				
				if(is_array($DaohangArr[$i]["SubDaohangArr"])){
					
					foreach($DaohangArr[$i]["SubDaohangArr"] as $key2=>$val2){
						$onesubcats = array();
						$onesubcats["name"] = $val2["typename"];
						$onesubcats["url"] = $val2["url"];
						$sitemap_daohang["subcats"][] = $onesubcats;
					}						
					
				}				
			}
		}		
		$sitemap_arr[] = $sitemap_daohang;
}


$indexs = $TaoConfig["indexdata"]["index"];
foreach($indexs as $indexkey=>$indexvalue){
	
	$indexvalue["typeVarName"] = GetDaohangIdToVarName($indexvalue["typeid"]);
	$indexvalue["url"] = GetDaohangUrl($indexvalue);
	
	if($indexvalue[typeid]==12){
		
		$AllTypesArr = GetArrByValue($indexvalue);
		foreach($AllTypesArr as  $k => $v){

			$sitemap_daohang = array();
			$sitemap_daohang["name"]=$v[typename];
			$sitemap_daohang["url"]=$v[url];
			$sitemap_daohang["subcats"]=array();

			foreach( $v[SubDaohangArr] as $k2 => $val2){
				$onesubcats = array();
				$onesubcats["name"] = $val2["typename"];
				$onesubcats["url"] = $val2["url"];
				$sitemap_daohang["subcats"][] = $onesubcats;
				
				foreach($val2[SubDaohangArr] as $k3 => $v3){
					
					$onesubcats2 = array();
					$onesubcats2["name"] = $v3["typename"];
					$onesubcats2["url"] = $v3["url"];
					$sitemap_daohang["subcats"][] = $onesubcats2;
					
				}
				
			}
			
			$sitemap_arr[] = $sitemap_daohang;
		}
	}else{
		$tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);
			if(isset($tuijianleibie) && count($tuijianleibie)>0){
				$sitemap_daohang = array();
				$sitemap_daohang["name"]=$indexvalue[typename];
				$sitemap_daohang["url"]=$indexvalue[url];
				$sitemap_daohang["subcats"]=array();
				foreach($tuijianleibie as $k => $v){
					
					$onesubcats = array();
					$onesubcats["name"] = $v["typename"];
					$onesubcats["url"] = $v["url"];
					$sitemap_daohang["subcats"][] = $onesubcats;
					
						
				}
				$sitemap_arr[] = $sitemap_daohang;
			}
	}
}



		$TagsArr = GetArrTags(20);
		$sitemap_daohang = array();
		$sitemap_daohang["name"]="热门TAG";
		$sitemap_daohang["url"]="shareall.php";
		$sitemap_daohang["subcats"]=array();
		foreach($TagsArr as $key=>$val){
			$onesubcats = array();
			$onesubcats["name"] = $val["keyword"];
			$onesubcats["url"] 	= $val["url"];
			$sitemap_daohang["subcats"][] = $onesubcats;
		}
		$sitemap_arr[] = $sitemap_daohang;


	
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
	
}

foreach($article_cate_list['parent'] as $key=>$v){
		$sitemap_daohang = array();
		$sitemap_daohang["name"]=$v["name"];
		$sitemap_daohang["url"]=$v["url"];
		$sitemap_daohang["subcats"]=array();
		
		foreach($article_cate_list['sub'][$key] as $k2=>$v2){
			$onesubcats = array();
			$onesubcats["name"] = $v2["name"];
			$onesubcats["url"] 	= $v2["url"];
			$sitemap_daohang["subcats"][] = $onesubcats;
		}
	$sitemap_arr[] = $sitemap_daohang;
}



$cate_list = fetch_Allarray("select * from ".tname('items_cate')." where pid=0");
	//转码
	if($TaoConfig["default_lang"]=="GBK"){
		array_walk_recursive($cate_list,"utf8_gbk");
	}
$value = array();
$value["typeid"] = 4;
foreach($cate_list as $key=>$sub){
		$param=array();
		$tparam = $param;
		$tparam["vcate_id"] = $sub["id"];
		
		$sitemap_daohang = array();
		$sitemap_daohang["name"]=$sub["name"];
		$sitemap_daohang["url"]=GetDaohangUrl($value,$tparam);
		$sitemap_daohang["subcats"]=array();

		$cate_list_sub = fetch_Allarray("select * from ".tname('items_cate')." where pid=".$sub["id"]);
	//转码
	if($TaoConfig["default_lang"]=="GBK"){
		array_walk_recursive($cate_list_sub,"utf8_gbk");
	}
		
		foreach($cate_list_sub as $k2=>$v2){
			$param=array();
			$tparam = $param;
			$tparam["vcate_id"] = $v2["id"];

			$onesubcats = array();
			$onesubcats["name"] = $v2["name"];
			$onesubcats["url"] 	= GetDaohangUrl($value,$tparam);
			
			
			$sitemap_daohang["subcats"][] = $onesubcats;
		}
		
		
	$sitemap_arr[] = $sitemap_daohang;
		
}
$pagename_template = "sitemap";



function tURLencode($sStr) 
{
	$sStr = str_replace("+","%2B",$sStr);
	$sStr = str_replace("\"","%22",$sStr);
	$sStr = str_replace("\'","%27",$sStr);
	$sStr = str_replace("\/'","%2F",$sStr);
	$sStr = str_replace("&","&amp;",$sStr);
	return($sStr);
	
}

	//生成sitemap.xml
	
	$sitemap_xmlstr = '<?xml version="1.0" encoding="UTF-8"?>'."\r\n";
	$sitemap_xmlstr .=  "<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>"."\r\n";
	
	foreach($sitemap_arr as $big){
		foreach($big["subcats"] as $small){	
		
		if(strpos("--".$small["url"],"http:")<1)	$small["url"] = $sitetitleurl.$small["url"];
		
		$sitemap_xmlstr .=  "   <url>"."\r\n";
		$sitemap_xmlstr .=  "      <loc>".tURLencode($small["url"])."</loc>"."\r\n";
		$sitemap_xmlstr .=  "      <lastmod>". date("Y-m-d")."</lastmod>"."\r\n";
		$sitemap_xmlstr .=  "      <changefreq>daily</changefreq>"."\r\n";
		$sitemap_xmlstr .=  "   </url>"."\r\n";
		}
	}
	$sitemap_xmlstr .=  "</urlset>";
	
	
if(!file_exists(WEBROOT."sitemap.xml") || $_GET["xml"]!="")
{
	file_put_contents(WEBROOT."sitemap.xml",$sitemap_xmlstr);
}else{
	$str = 	file_get_contents(WEBROOT."sitemap.xml");
	
	if($str != $sitemap_xmlstr){
		
		
		file_put_contents(WEBROOT."sitemap.xml",$sitemap_xmlstr);
	}
}


//加载模板
require_once Tao_template($pagename_template);

showend();




?>
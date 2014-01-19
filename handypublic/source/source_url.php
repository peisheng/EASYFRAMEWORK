<?php
require_once WEBROOT.'include/function.php';

$u = $_GET["u"];

if(empty($u)){
require_once WEBROOT.'source/source_index.php';
}

if(is_array($config_shorturl)){
	foreach($config_shorturl as $arrurl){
		if($arrurl["site"]=="$u"){
			$now_url = $arrurl["url"];
			
			break;
		}
	}
}



$folderstr = str_replace($sitetitleurl,"",$rootroad);

$now_url = substr($now_url,strlen($folderstr));


if($weijingtai=="1"){
	/*
	$wjtpagelist
	$wjtpageproduct
	$wjtpageshop
	$wjtpageshopsearch
	$wjtpagehz
	*/
	if(strpos("-".$now_url,$wjtpageb2clist)==2){
		$now_url = substr($now_url,strlen($wjtpageb2clist)+1);
		$now_url = substr($now_url,0,strlen($now_url)-strlen($wjtpagehz));
		$_SERVER["SCRIPT_NAME"]="/b2clist.php";
		mod_rewrite_rule($now_url);
		require_once WEBROOT.'source/source_b2clist.php';
		exit;	
	}
	if(strpos("-".$now_url,$wjtpageb2cproduct)==2){
		$now_url = substr($now_url,strlen($wjtpageb2cproduct)+1);
		$now_url = substr($now_url,0,strlen($now_url)-strlen($wjtpagehz));
		$_SERVER["SCRIPT_NAME"]="/b2cproduct.php";
		mod_rewrite_rule($now_url);
		require_once WEBROOT.'source/source_b2cproduct.php';
		exit;	
	}
	
	if(strpos("-".$now_url,$wjtpagelist)==2){
		$now_url = substr($now_url,strlen($wjtpagelist)+1);
		$now_url = substr($now_url,0,strlen($now_url)-strlen($wjtpagehz));
		$_SERVER["SCRIPT_NAME"]="/list.php";
		mod_rewrite_rule($now_url);
		require_once WEBROOT.'source/source_list.php';
		exit;	
	}
	if(strpos("-".$now_url,$wjtpageproduct)==2){
		$now_url = substr($now_url,strlen($wjtpageproduct)+1);
		$now_url = substr($now_url,0,strlen($now_url)-strlen($wjtpagehz));
		$_SERVER["SCRIPT_NAME"]="/product.php";
		mod_rewrite_rule($now_url);
		require_once WEBROOT.'source/source_product.php';
		exit;	
	}
	
	
	if(strpos("-".$now_url,$wjtpageshop)==2){
		$now_url = substr($now_url,strlen($wjtpageshop)+1);
		$now_url = substr($now_url,0,strlen($now_url)-strlen($wjtpagehz));
		
		$_SERVER["SCRIPT_NAME"]="/shop.php";
		mod_rewrite_rule($now_url);
		require_once WEBROOT.'source/source_shop.php';
		exit;	
	}
	if(strpos("-".$now_url,$wjtpageshopsearch)==2){
		$now_url = substr($now_url,strlen($wjtpageshopsearch)+1);
		$now_url = substr($now_url,0,strlen($now_url)-strlen($wjtpagehz));
		$_SERVER["SCRIPT_NAME"]="/shopsearch.php";
		mod_rewrite_rule($now_url);
		require_once WEBROOT.'source/source_shopsearch.php';
		exit;	
		
	}
	if(strpos("-".$now_url,$wjtpagerecommenddiscount)==2){
		$now_url = substr($now_url,strlen($wjtpagerecommenddiscount)+1);
		$now_url = substr($now_url,0,strlen($now_url)-strlen($wjtpagehz));
		$_SERVER["SCRIPT_NAME"]="/recommenddiscount.php";
		mod_rewrite_rule($now_url);
		require_once WEBROOT.'source/source_recommenddiscount.php';
		exit;	
	}
	if(strpos("-".$now_url,$wjtpagerecommendtype)==2){
		$now_url = substr($now_url,strlen($wjtpagerecommendtype)+1);
		$now_url = substr($now_url,0,strlen($now_url)-strlen($wjtpagehz));
		$_SERVER["SCRIPT_NAME"]="/recommendtype.php";
		mod_rewrite_rule($now_url);
		require_once WEBROOT.'source/source_recommendtype.php';
		exit;	
	}
	
	
}else{

	$arr_url=parse_url($now_url);
	$ctxturl = basename($arr_url["path"]);
	
	$query = $arr_url["query"];

	$arrquery = explode("&amp;",$query);

	foreach($arrquery as $arrarg){
		$getarr = explode("=",$arrarg);
		$_GET[$getarr[0]] = $getarr[1];		
	}
	
	switch($ctxturl){
		case "b2clist.php":
			require_once WEBROOT.'source/source_b2clist.php';
		break;
		case "b2cproduct.php":
			require_once WEBROOT.'source/source_b2cproduct.php';
		break;
		case "list.php":
			require_once WEBROOT.'source/source_list.php';
		break;
		case "product.php":
			require_once WEBROOT.'source/source_product.php';
		break;
		case "shop.php":
			require_once WEBROOT.'source/source_shop.php';
		break;
		case "shopsearch.php":
			require_once WEBROOT.'source/source_shopsearch.php';
		break;
		case "recommenddiscount.php":
			require_once WEBROOT.'source/source_recommenddiscount.php';
		break;
		case "recommendtype.php":
			require_once WEBROOT.'source/source_recommendtype.php';
		break;
		default:
		
		
	}
	

}


?>
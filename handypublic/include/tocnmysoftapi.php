<?PHP


//╣Всц
function cnmysoft_taoapi_search($keyword,$cat,$page=0,$sort="default",$sp="",$ep=""){
	
	global $taobao_username,$taobao_usermd5,$setCacheTime;
	
	$method = "cnmysoft_taoapi_search";
	
	
	$url = APISERVERURL."?method=".$method."&username=".$taobao_username."&usermd5=".$taobao_usermd5;
	$url .= "&keyword=".$keyword."&cat=".$cat."&page=".$page."&sort=".$sort."&sp=".$sp."&ep=".$ep;
	$url .= "&t=".time()."&md5=".md5($taobao_username.$taobao_usermd5.$keyword.$cat.$page.$sort.$sp.$ep);
	
	$Cache = new Taoapi_Cache();
	$Cache->setCacheTime($setCacheTime);
	$Cache->setMethod($method);
	$cacheid = md5($keyword."|".$cat."|".$page."|".$sort."|".$sp."|".$ep);
	
	$date = unserialize($Cache->getCacheData($cacheid));
	
	if($date==""){

		
		$Taoapi_Util = new Taoapi_Util();
		$Taoapi_Util->fetch($url);
		$result = $Taoapi_Util->results;

		$date = json_decode($result,true);
		
		
		array_walk_recursive($date,"utf8_gbk");
		
		if($date["code"]!="0"){
			print_r($date);
		}
		
		$Cache->saveCacheData($cacheid, serialize($date));
		
		
	}
	
		
	return $date;
}
?>
<?php
function url_base64_decode($code)
{
	if($code=="")
		return "";
    $code=str_replace("!",'+',$code);//把所用"+"替换成"!"
    $code=str_replace(",",'/',$code);//把所用"/"替换成"*"
    $str=base64_decode($code);
    return $str;
}
$url=url_base64_decode($_GET["url"]);
if(empty($_GET["url"])){
	if(isset($_SERVER["REQUEST_URI"])){
		$nav=$_SERVER["REQUEST_URI"];
	}else{
		if(isset($_SERVER["PATH_INFO"])){
			$nav = $_SERVER["PATH_INFO"];
		}
		if(isset($_SERVER["ORIG_PATH_INFO"])){
			$nav = $_SERVER["ORIG_PATH_INFO"];
		}
	}
	if(!isset($nav)){
		return;
	}
	if(strpos("---".$nav,"?")){
		return;
	}
	if(strpos("---".$nav,".jpg")==0){
		return;
	}

	
	$arr = explode("pic.php/",($nav));
	if(Count($arr)>1){
		$nav = $arr[1];
	}
	
	$arr = explode(".jpg",($nav));
	if(Count($arr)>1){
		$nav = $arr[0];
	}
	

	
	
$url=url_base64_decode($nav);
}


header("Content-type: image/jpeg");



echo file_get_contents($url);
?>
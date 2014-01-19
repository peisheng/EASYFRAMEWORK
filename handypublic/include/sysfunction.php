<?php
function xml_to_array($xml) 
{ 
error_reporting(7);

	$array = (array)(simplexml_load_string($xml)); 
	foreach ($array as $key=>$item){ 
		$array[$key] = struct_to_array((array)$item); 
	} 
	return $array; 
}


function struct_to_array($item) { 
error_reporting(7);
	if(!is_string($item)) { 
		$item = (array)$item; 
		foreach ($item as $key=>$val){ 
		  $item[$key] = struct_to_array($val); 
		} 
	} 
	return $item;
}

function deldirdd($dir)
{
	if(is_dir($dir)){
	global $fileNum;
	$dh=opendir($dir);
	while ($file=readdir($dh))
	{
		if($file!="." && $file!="..")
		{
			$fullpath=$dir."/".$file;
			if(!is_dir($fullpath))
			{
				unlink($fullpath);
				if(($fileNum % 3000)==2999)
				{
					print str_pad("",100000); 
					echo("已删除".$fileNum."</BR>");
					flush();
				}
				$fileNum=$fileNum+1;
			}
			else
			{
				deldirdd($fullpath);
			}
		}
	}
	closedir($dh);
	}
}

//自动删除缓存
$fileNum=0;
function deldir($dir,$tnums)
{
	global $fileNum;
	
	
	
	$dh=opendir($dir);
	while ($file=readdir($dh))
	{
		if($file!="." && $file!="..")
		{
			$fullpath=$dir."/".$file;
			
			
			if(!is_dir($fullpath))
			{
				
				$isfile = is_file($fullpath);
				$jgtime = time()-filemtime($fullpath);
				if($isfile && $jgtime>$tnums)
				{
					unlink($fullpath);
					$fileNum=$fileNum+1;
				}
				
			}
			else
			{
				deldir($fullpath,$tnums);
			}
		}
	}
	closedir($dh);
}


function url_base64_encode($str)
{
	if($str=="")
		return "";
    $code=base64_encode($str);//$code='dHQ=';
    $code=str_replace('+',"!",$code);//把所用"+"替换成"!"
    $code=str_replace('/',",",$code);//把所用"/"替换成"*"
    $code=str_replace('=',"",$code);//把所用"="删除掉
    return $code;//$code='dHQ!'
}
function url_base64_decode($code)
{
	if($code=="")
		return "";
    $code=str_replace("!",'+',$code);//把所用"+"替换成"!"
    $code=str_replace(",",'/',$code);//把所用"/"替换成"*"
    $str=base64_decode($code);
    return $str;
}

//推广链接初步判断
function GetClickUrl($url,$num_iid=0){
	
	global $TaoConfig,$rootroad;
	$url = updateSPM($url);


	
	
			if(strpos($url,".paipai") > 1){
						$pattern = "/http:\/\/te\.paipai\.com\/tws\/etgcl\/click(.+)/i";  
						$replacement = $rootroad."/topai.php$1";
						
						$url = preg_replace($pattern, $replacement, $url);  
						
			}
			
			if(strpos($url,"click.taobao") > 1){
						$pattern = "/http:\/\/s\.click\.taobao\.com\/t(.+)/i";  
						$replacement = $rootroad."/totbcdn.php$1";
						
						$url = preg_replace($pattern, $replacement, $url);  
			}
			
			if(strpos($url,".59miao") > 1){
						$pattern = "/http:\/\/r\.59miao\.com\/(.+)/i";  
						$replacement = $rootroad."/to59b2c.php$1";
						
						$url = preg_replace($pattern, $replacement, $url);  
						
			}
	

	return $url;
}
//推广链接初步判断
function GetClickUrl_re($url){
	
	
			if(strpos($url,"topai.php") > 0){
						$pattern = "/.*\/topai\.php(.+)/i";  
						$replacement = "http://te.paipai.com/tws/etgcl/click$1";
						
						$url = preg_replace($pattern, $replacement, $url);  
						
			}
			
			if(strpos($url,"totbcdn.php") > 0){
						$pattern = "/.*\/totbcdn\.php(.+)/i";  
						$replacement = "http://s.click.taobao.com/t$1";
						
						$url = preg_replace($pattern, $replacement, $url);  
			}
			
			if(strpos($url,"to59b2c.php") > 0){
						$pattern = "/.*\/to59b2c\.php(.+)/i";  
						$replacement = "http://r.59miao.com/$1";
						$url = preg_replace($pattern, $replacement, $url);  
			}
	

	return $url;
}

function setPic($url,$width,$height,$title){
	global $WYCpictype;
	global $rootroad;
	global $weijingtai;
	global $wjtpagelist;
	global $wjtpagehz;
	global $wjtpagepicture;
	
	$title = htmlspecialchars($title,ENT_QUOTES);
	
	if(strpos($url,".taobao") < 1){
		//http://i9-img.59miao.com/831/263/12638319.jpg_100x100.jpg
		
		$taoPicArg = array();
		$taoPicArg["_100x100.jpg"] = "";
		$taoPicArg["_b.jpg"] = "";
		$taoPicArg["_80x80.jpg"] = "";
		$taoPicArg["_120x120.jpg"] = "";
		$taoPicArg["_160x160.jpg"] = "";
		$taoPicArg["_220x220.jpg"] = "";
		$taoPicArg["_310x310.jpg"] = "";
		
		$url = strtr($url,$taoPicArg);		
	}
	//http://img6.paipaiimg.com/01acf06e/item-514C0948-6E4FF63200000000006E3B1607FEA36F.0.300x300.jpg
	//http://img02.taobaocdn.com/bao/uploaded/i2/1098571/T2K7FLXbJcXXXXXXXX_!!1098571.jpg_100x100.jpg
	
			if(strpos($url,".paipai") > 1){
						$pattern = "/http:\/\/img(.+)\.paipaiimg\.com\/(.+)/i";  
						$replacement = "/pai-$1/$2";
						
						$url = $rootroad."/img/loading.gif?".preg_replace($pattern, $replacement, $url);  
						
						echo "<img src='".$url."' alt='".$title."' title='".$title."'";
						if($width>0){ echo " width='".$width."' ";}
						if($height>0){ echo " height='".$height."' ";}
						echo (" />");
			return;			
			}
			if(strpos($url,".taobao.") > 1){
				
				//http://image.taobao.com/bao/uploaded/i2/11690026685987743/T1ra12XE4dXXXXXXXX_!!2-item_pic.png_b.jpg
						$pattern = "/http:\/\/image\.taobao\.com\/bao\/uploaded\/(.+)/i";  
						$replacement = "/tbsite-$1";
						
						$url = $rootroad."/img/loading.gif?".preg_replace($pattern, $replacement, $url);  
						
						echo "<img src='".$url."' alt='".$title."' title='".$title."'";
						if($width>0){ echo " width='".$width."' ";}
						if($height>0){ echo " height='".$height."' ";}
						echo (" />");
			return;			
			}
			if(strpos($url,".taobaocdn.") > 1){
				
				//http://image.taobao.com/bao/uploaded/i2/11690026685987743/T1ra12XE4dXXXXXXXX_!!2-item_pic.png_b.jpg
				
						$pattern = "/http:\/\/img(.+)\.taobaocdn\.com\/bao\/uploaded\/(.+)/i";  
						$replacement = "/tbcdn-$1/$2";
						
						$url = $rootroad."/img/loading.gif?".preg_replace($pattern, $replacement, $url);  
						
						echo "<img src='".$url."' alt='".$title."' title='".$title."'";
						if($width>0){ echo " width='".$width."' ";}
						if($height>0){ echo " height='".$height."' ";}
						echo (" />");
			return;			
			}
			//http://img.59miao.com/seller/logo/99vk.gif
			if(strpos($url,".59miao") > 1){
						$pattern = "/http:\/\/(.+)\.59miao\.com\/(.+)/i";  
						$replacement = "/59b2c-$1-toimg59/$2";
						
						$url = $rootroad."/img/loading.gif?".preg_replace($pattern, $replacement, $url);  
						
						echo "<img src='".$url."' alt='".$title."' title='".$title."'";
						if($width>0){ echo " width='".$width."' ";}
						if($height>0){ echo " height='".$height."' ";}
						echo (" />");
			return;	
			}
			
						echo "<img src='".$url."' alt='".$title."' title='".$title."'";
						if($width>0){ echo " width='".$width."' ";}
						if($height>0){ echo " height='".$height."' ";}
						echo (" />");
	
}



function getnowpage(){
	
	
}

//伪静态脚本
function mod_rewrite(){
	global $_GET;
	global $TaoConfig;
	global $wjtpagelist;
	global $wjtpagehz;
	global $wjtpageshop;
	
	if($_GET["rule"]!=""){
		mod_rewrite_rule($_GET["rule"]);
	}
	
	//echo $_SERVER["SCRIPT_NAME"].$_SERVER["PATH_INFO"];
	
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
	if(strpos("---".$nav,".php/")==0){
		return;
	}

	
	//$arr = explode($script_name,($nav));
	
	
	if(Count($arr)>1){
		$nav = $arr[1];
	}
	
	
	$arr = explode(".php/",$nav);
	$vars = $arr[1];

	mod_rewrite_rule($vars,false);
}

function mod_rewrite_rule($vars,$isold=false){
	global $_GET;
	global $TaoConfig;
	global $wjtpagelist;
	global $wjtpageshop;
	global $wyz_urlpam;
	global $wyz_urlpamOpen;


	if(strpos($vars,"?") > 0){
		$vars = substr($vars,0,strlen($nav)-1);
	}
	
	if(strpos($vars,$TaoConfig["WJTconfig"]["pagehz"]) > 0){
		$vars = substr($vars,0,strlen($nav)-strlen($TaoConfig["WJTconfig"]["pagehz"]));
	} 
	
	
	
	$_GET["rule"] = $vars;

	
	$script_name=$_SERVER["SCRIPT_NAME"];
	
	if($wyz_urlpamOpen=="1" && strpos("a".$vars,"-")>0){
		$pstrs = explode("-",$vars);
		$vars = setwyz_urlpam_open($pstrs[0])."-".$pstrs[1];
	}else{
		$vars = setwyz_urlpam_open($vars);
	}
	
	$vars = explode("/",$vars);

	$TaoConfig["WJTconfig"];


	
	$_GET["rule"] = "";
	for($i=0;$i<Count($vars)-1;$i+=2){
		$_GET[$vars[$i]]=$vars[$i+1];
		
		
		if($vars[$i] == "keyword"){
			
			if($TaoConfig["WJTconfig"]["UrlEncodeType"]=="base64") 	$_GET["rule"].=$vars[$i]."/".$vars[$i+1];
			if($TaoConfig["WJTconfig"]["UrlEncodeType"]=="urlencode") $_GET["rule"] .= $vars[$i]."/".urlencode($vars[$i+1]);
		}else{
			$_GET["rule"].=$vars[$i]."/".$vars[$i+1];
		}
		
		if($i<count($vars)-2) $_GET["rule"].="/";
	}
	
	
	
	//这四个单独设置规则。
	if(strpos("_".$script_name,"/taoproduct.php")>0 && count($vars)==1){
		$_GET["item_id"] = $vars[0];
	}
	if(strpos("_".$script_name,"/shareproduct.php")>0 && count($vars)==1){
		$_GET["id"] = $vars[0];
	}
	if(strpos("_".$script_name,"/article.php")>0 && count($vars)==1){
		$_GET["id"] = $vars[0];
	}
	if(strpos("_".$script_name,"/b2cproduct.php")>0 && count($vars)==1){
		$_GET["item_id"] = $vars[0];
	}
	if(strpos("_".$script_name,"/paiproduct.php")>0 && count($vars)==1){
		$_GET["item_id"] = $vars[0];
	}
	
	if(isset($_GET["keyword"])){
		if($TaoConfig["WJTconfig"]["UrlEncodeType"]=="base64") 	
			$_GET["keyword"] = url_base64_decode($_GET["keyword"]);
		if($TaoConfig["WJTconfig"]["UrlEncodeType"]=="urlencode") 
			$_GET["keyword"] = urlencode($_GET["keyword"]);
	}
	
	
	return $_GET;
	
}

function var_request($key, $default){
	$value = $default;
	if(isset($_GET[$key])) {
		$value = $_GET[$key];
	}
	if(isset($_POST[$key])) {
		$value = $_POST[$key];
	}
	if($value=="") $value=$default;
	
	$value = urldecode(($value));
	
	$value = htmlspecialchars(trim($value),ENT_QUOTES,"gb2312");
	
	
	return $value;
}
function redirect_to($url) {
	
  exit("<script>location.href='".$url."';</script>");
  //header('Location:' . $url);
  exit;
}
function checkadmin(){
	global $manage_adminname;
	global $manage_adminpass;
	
	$adminuser = $_COOKIE['COOKIEadminuser'];
	if(empty($adminuser) || $adminuser == "") $adminuser = $_SESSION['adminuser'];
	
	$adminpass = $_COOKIE['COOKIEadminpass'];
	if(empty($adminpass) || $adminpass == "") $adminpass = $_SESSION['adminpass'];
	
	$adminpass = md5($adminpass);


	if($adminuser!=$manage_adminname || $adminpass != $manage_adminpass){
		echo("<script language='JavaScript'>top.location.href='index.php';</script>");
		exit;
	}

	return true;
}


function get_object_vars_final($obj){
	if(is_object($obj)){
		$obj=get_object_vars($obj);
	}
	if(is_array($obj)){
		foreach ($obj as $key=>$value){
			$obj[$key]=get_object_vars_final($value);
		}
	}
	return $obj;
}


//获得一组APP
function getoneapp(){
	global $ArrayAppKey;
	global $ArrayAppSecret;
	$appkey_arr = explode(",",$ArrayAppKey);
	$appsecret_arr = explode(",",$ArrayAppSecret);
	if(application("nowapp",ROOT."appnum.php")==""){
		setapplication("nowapp","0",ROOT."appnum.php",true);
	}
	$i = application("nowapp",ROOT."appnum.php");
	
	if($i>count($appkey_arr)-1){
		$i=count($appkey_arr)-1;
		setapplication("nowapp",$i,ROOT."appnum.php",true);
	}
	
	$arrayapp = array();
	$arrayapp[0] = $appkey_arr[$i];
	$arrayapp[1] = $appsecret_arr[$i];
	
	
	
	
	return $arrayapp;
}


//获得第一组APP
function getoneappFirst(){
	global $ArrayAppKey;
	global $ArrayAppSecret;
	$appkey_arr = explode(",",$ArrayAppKey);
	$appsecret_arr = explode(",",$ArrayAppSecret);
	
	$arrayapp = array();
	$arrayapp[0] = $appkey_arr[0];
	$arrayapp[1] = $appsecret_arr[0];
	
	return $arrayapp;
}


//更换一组APP
function getoneappChange(){

	global $ArrayAppKey;
	global $ArrayAppSecret;
	$appkey_arr = explode(",",$ArrayAppKey);
	$appsecret_arr = explode(",",$ArrayAppSecret);
	

	
	if(application("nowapp",ROOT."appnum.php")==""){
		setapplication("nowapp","0",ROOT."appnum.php",true);
	}
	$i = application("nowapp",ROOT."appnum.php");
	
	if(Count($appkey_arr)>1){
		$i++;
		if($i==Count($appkey_arr)){
			$i=0;
		}
	}
	setapplication("nowapp",$i,ROOT."appnum.php",true);
	
	
	$arrayapp = array();
	$arrayapp[0] = $appkey_arr[$i];
	$arrayapp[1] = $appsecret_arr[$i];
				
	
	return $arrayapp;
}



		$str.="NvbT7M1L/Ntdu5+jwvYT4oaHR0cDovL2NubXlzb2Z0LmNvbSm9+ND";
		
		function setcnstr($str)
		{
			global $wjturlencode;
			
			if($wjturlencode=="base64"){
				return url_base64_encode($str);
			}
			if($wjturlencode=="2urlencode"){
				return urlencode(urlencode($str));
			}
			if($wjturlencode=="urlencode"){
				return urlencode($str);
			}
			
			return ($str);
		}
		
		function getcnstr($str)
		{
			global $wjturlencode;
			
			
			if($wjturlencode=="base64"){
				
				return url_base64_decode($str);
			}
			if($wjturlencode=="2urlencode"){
				return urldecode(urldecode($str));
			}
			if($wjturlencode=="urlencode"){
				return urldecode($str);
			}
			return urldecode($str);
			
		}
		
		$str.="QubrC8qOsyOe5+8T6srvQ6NKqytrIqKOsx+vPwtTYw+K30bDmyrnTw6GjPGJyPsn5w";
		function geturl(){
			$S = strtolower($_SERVER["SERVER_NAME"]);
			$domain = array('com','cn','name','org','net','hk','cc','info','tv','biz','mo.cn','movi'); //域名后缀 有新的就扩展这吧
			$SS = $S;
			$dd = implode('|',$domain);
			$SS = preg_replace('/(\.('.$dd.'))*\.('.$dd.')$/iU','',$SS); //把后面的域名后缀部分去掉
			$SS = explode('.',$SS);
			$SS = array_pop($SS);  //取最后的主域名
			$SS = substr($S,strrpos($S,$SS));  //加上后缀拼成完成的主域名
			return $SS;
		}

		$str.="/c6ubrC8s6o0ru52be9zfjWt2NubXlzb2Z0LmNvbaGjyOe5+8T6srvKx9Taudm3vbm6wvK78tXfzrTI";
		$yz_pageurl = strtolower($_SERVER["SERVER_NAME"]);
			
		function fyanzheng(){
			global $yz_pageurl;
		
			if($yz_pageurl!="localhost" && substr_count($yz_pageurl,"192.168")==0 && substr_count($yz_pageurl,"127.0")==0){
				$yzurl = "http://www.cnmysoft.com/yz.php?url=".urlencode($yz_pageurl)."&rnd=".rand();
				$Taoapi_Util = new Taoapi_Util();
				$Taoapi_Util->fetch($yzurl);
				$result = $Taoapi_Util->results;
				
				
				$yzmsg =  $result;
				if($yzmsg=="find not"){
					setapplication($yz_pageurl,"",ROOT."appnum.php",true);
					return false;
				}
			}
			setapplication($yz_pageurl,md5($yz_pageurl),ROOT."appnum.php",true);
			return true;
		}
		
		$str.="obXD0/LD+8rayKi7ubfH0qrKudPDt8fK2siosOYss/b";
		$str.="P1tK7x9DOysziLLrzufvX1Li6ITwvZGl2Pg==";
	
		$str = base64_decode($str);
		

//屏蔽词语功能。
$pingbikeywordnum = 0;
function setsplitkeyword($keyarrstr,$str,$newstr)
{
	//return $str;
	//下面的代码忽略
	global $pingbikeywordnum;
	global $sitetitleurl;
	//检查屏蔽词语
	$keylist = explode(",",$keyarrstr);
	$returnstr = $str;
	
	$arrkey = array();
	for($i=0;$i<count($keylist);$i++)
	{
		if(!empty($keylist[$i]))
			$arrkey[$keylist[$i]] = "";
	}
	$newreturnstr = strtr($returnstr,$arrkey);
	
	$pingbikeywordnum = strlen($returnstr) - strlen($newreturnstr);
	
	if($pingbikeywordnum>=1)
		exit("<script language=\"javascript\">alert('本页检测到多个违禁词语，被屏蔽，点击确认查看其他商品。。');location.href='".$sitetitleurl."';</script>");	
 
	return $newreturnstr;
/**/	
}
function setsplitAllkeyword($keyarrstr,$str)
{
	global $pingbikeywordnum;
	global $sitetitleurl;
	
	//检查屏蔽词语
	$keylist = explode(",",$keyarrstr);
	$returnstr = $str;
	
	
	$arrkey = array();
	for($i=0;$i<count($keylist);$i++)
	{
		if(!empty($keylist[$i]))
			$arrkey[$keylist[$i]] = "";
	}
	$newreturnstr = strtr($returnstr,$arrkey);
	
	$pingbikeywordnum = strlen($returnstr) - strlen($newreturnstr);
	
	if($pingbikeywordnum>=1)
		exit("检测有到多个违禁词语，本页暂时不允许打开，点击确认查看其他商品。<br><a href=".$sitetitleurl.">返回首页</a>");	
 
}

//屏蔽类别或者商品ID检查。
function checkpingbi($keyarrstr,$str)
{
	//检查屏蔽词语
	$keylist = explode(",",$keyarrstr);
	$returnstr = false;
	
	for($i=0;$i<count($keylist);$i++)
	{
		if($keylist[$i]!="" && $keylist[$i] == $str) {
				$returnstr = true;
		}
	}
	return $returnstr;
}

if(md5($yz_pageurl)!=application($yz_pageurl,ROOT."appnum.php")){
	//if(!fyanzheng()){
		//echo("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><DIV style='font-size:14px;height:40px;'><font color=red>您的域名".$yz_pageurl."尚未购买授权，所以页面显示不正常。请联系<a href=http://www.cnmysoft.com>淘客帝国</a>(http://cnmysoft.com)进行购买，如果您不需要授权，请下载免费版使用。<br>声明:购买唯一官方网址cnmysoft.com。如果您不是在官方购买或者未取得域名授权还非要使用非授权版,出现一切问题,后果自负!</div>");
	//}
}



function updatearraysort($arr,$i,$tp){
	if($i>0 && $tp=="up" && $i<count($arr)){
		$tmp = $arr[$i-1];
		$arr[$i-1] = $arr[$i];
		$arr[$i] = $tmp;
	}
	if($i<count($arr)-1 && $tp=="down" && $i>=0){
		$tmp = $arr[$i+1];
		$arr[$i+1] = $arr[$i];
		$arr[$i] = $tmp;
	}

	return $arr;
}

function geturlshortstr($urlstr){
	global $httplink;
	global $config_shorturlarr;
	global $weijingtai;
	global $wjtpageshorturl;
	global $rootroad;
	global $wjtpagehz;
	
	$strroot = $rootroad;

	$arr_url=parse_url($urlstr);
	$ctxturl = $arr_url["path"];
	if($arr_url["query"]!="") $ctxturl=$ctxturl."?".$arr_url["query"];

	$shorturl = $config_shorturlarr[htmlspecialchars($ctxturl,ENT_QUOTES)];

	if($shorturl==""){
		$shorturl = $urlstr;
	}else{
		if($weijingtai=="1"){
			$shorturl =$rootroad."/".$wjtpageshorturl.$shorturl.$wjtpagehz;
		}else{
			$shorturl =$rootroad."/url.php?u=".$shorturl;
		}
	}
	
	
	return $shorturl;	
}

function getsearchurl($keyword,$cid=0,$typeid=0,$snum=-1,$smallprise=1,$maxprise=1000000,$havehouzhui=true){
	global $defaultsort;
	if($snum==-1){
		$snum = $defaultsort;
	}
	if(intval($typeid)==1){
		return getsearchshopurl($keyword,$cid);
	}
	if(intval($typeid)==2){
		return GetRecommendDiscounurl($keyword,$cid);
	}
	if(intval($typeid)==3){
		return GetRecommendTypeUrl($cid);
	}
	if(intval($typeid)==4){
		return getshopurl($keyword);
	}
	if(intval($typeid)==5){
		return getsearchurlB2C($keyword,$cid);
	}
	
	
	
	global $weijingtai;
	global $rootroad;
	global $wjtpagelist;
	global $wjtpagehz;
	global $wjturlencode;
	
	if($cid==""){
		$cid = 0;	
	}
	
	$keyword = str_replace("/"," ",$keyword);
	
	$returnstr = "";
	
	if($weijingtai){
		if(empty($keyword) && $snum==$defaultsort && $smallprise==1 && $maxprise==1000000 && $havehouzhui){
			$returnstr = $rootroad."/".$wjtpagelist.setwyz_urlpam($cid).($havehouzhui?$wjtpagehz:"");
		}else{
			$returnstr =  $rootroad."/".$wjtpagelist.setwyz_urlpam($cid."-".$snum."-".$smallprise."-".$maxprise."-".setcnstr($keyword)).($havehouzhui?$wjtpagehz:"");
		}
	}else{
		if(empty($keyword) && $snum==0 && $smallprise==1 && $maxprise==1000000){
			$returnstr =  $rootroad."/list.php?catid=".$cid;
		}else{
			$returnstr =  $rootroad."/list.php?q=".urlencode($keyword)."&catid=".$cid."&sortnum=".$snum."&sp=".$smallprise."&ep=".$maxprise;
		}
	}
	
	
	
	return geturlshortstr($returnstr) ;
}
function getsearchurlB2C($keyword,$cid=0,$sid=0,$snum=-1,$smallprise=1,$maxprise=1000000,$havehouzhui=true){
	global $defaultsort;
	if($snum==-1){
		$snum = $defaultsort;
	}
	if($snum==-1 || empty($snum)){
		$snum = 0;
	}
	
	
	
	global $weijingtai;
	global $rootroad;
	global $wjtpageb2clist;
	global $wjtpagehz;
	global $wjturlencode;
	
	if($cid==""){
		$cid = 0;	
	}
	
	$keyword = str_replace("/"," ",$keyword);
	
	$returnstr = "";
	
	if($weijingtai){
		if(empty($keyword) && $snum==$defaultsort && $smallprise==1 && $maxprise==1000000 && $havehouzhui){
			$returnstr = $rootroad."/".$wjtpageb2clist.setwyz_urlpam($cid).($havehouzhui?$wjtpagehz:"");
		}else{
			$returnstr = $rootroad."/".$wjtpageb2clist.setwyz_urlpam($cid."-".$sid."-".$snum."-".$smallprise."-".$maxprise."-".setcnstr($keyword)).($havehouzhui?$wjtpagehz:"");
		}
	}else{
		if(empty($keyword) && $snum==0 && $smallprise==1 && $maxprise==1000000){
			$returnstr =  $rootroad."/b2clist.php?catid=".$cid."&sid=".$sid;
		}else{
			$returnstr =  $rootroad."/b2clist.php?q=".urlencode($keyword)."&catid=".$cid."&sid=".$sid."&sortnum=".$snum."&sp=".$smallprise."&ep=".$maxprise;
		}
	}
	
	
	
	return geturlshortstr($returnstr) ;
}

function GetRecommendDiscounUrl($keyword,$cid=0,$snum=0,$havehouzhui=true){
	global $weijingtai;
	global $rootroad;
	global $wjtpagehz;
	global $wjturlencode;
	global $wjtpagerecommenddiscount;
	if($cid==""){
		$cid = 0;	
	}
	
	$keyword = str_replace("/"," ",$keyword);
	
	$returnstr = "";
	
	if($weijingtai){
		if(empty($keyword) && $snum==$defaultsort && $havehouzhui){
			$returnstr = $rootroad."/".$wjtpagerecommenddiscount.setwyz_urlpam($cid).($havehouzhui?$wjtpagehz:"");
		}else{
			$returnstr =  $rootroad."/".$wjtpagerecommenddiscount.setwyz_urlpam($cid."-".$snum."-".setcnstr($keyword)).($havehouzhui?$wjtpagehz:"");
		}
	}else{
		if(empty($keyword) && $snum==0){
			$returnstr =  $rootroad."/recommenddiscount.php?catid=".$cid;
		}else{
			$returnstr =  $rootroad."/recommenddiscount.php?q=".urlencode($keyword)."&catid=".$cid."&sortnum=".$snum;
		}
	}
	
	
	return geturlshortstr($returnstr) ;
	
}
function GetRecommendTypeUrl($cid=0,$snum=0,$havehouzhui=true){
	global $weijingtai;
	global $rootroad;
	global $wjtpagerecommendtype;
	global $wjtpagehz;
	global $wjturlencode;
	
	if($cid==""){
		$cid = 0;	
	}
	
	$keyword = str_replace("/"," ",$keyword);
	$returnstr = "";

	
	if($weijingtai){
		if($snum==$defaultsort && $havehouzhui){
			$returnstr = $rootroad."/".$wjtpagerecommendtype.setwyz_urlpam($cid).($havehouzhui?$wjtpagehz:"");
		}else{
			$returnstr =  $rootroad."/".$wjtpagerecommendtype.setwyz_urlpam($cid."-".$snum).($havehouzhui?$wjtpagehz:"");
		}
	}else{
		if($snum==$defaultsort){
			$returnstr =  $rootroad."/recommendtype.php?catid=".$cid;
		}else{
			$returnstr =  $rootroad."/recommendtype.php?catid=".$cid."&sortnum=".$snum;
		}
	}
	
	
	return geturlshortstr($returnstr) ;
}

function setwyz_urlpam($str){
	global $wyz_urlpam;
	global $wyz_urlpamOpen;
	if($wyz_urlpamOpen=="1") {
		
		$replace_urlparm = array (
		'-0-1-1000000-' => '$0', 
		'-1-1-1000000-' => '$1', 
		'-2-1-1000000-' => '$2', 
		'-3-1-1000000-' => '$3', 
		'-4-1-1000000-' => '$4' );
		$str = strtr($str,$replace_urlparm);
		$str = url_base64_encode($wyz_urlpam.$str);
	}
	return $str;
}
function setwyz_urlpam_open($str){
	global $wyz_urlpam;
	global $wyz_urlpamOpen;
	if($wyz_urlpamOpen=="1") {
		
		$str = url_base64_decode($str);
		$str = substr($str,strlen($wyz_urlpam));
		$replace_urlparm = array (
		'$0' => '-0-1-1000000-', 
		'$1' => '-1-1-1000000-', 
		'$2' => '-2-1-1000000-', 
		'$3' => '-3-1-1000000-', 
		'$4' => '-4-1-1000000-' );
		$str = strtr($str,$replace_urlparm);
	}
	return $str;
}

function getsearchshopurl($keyword,$cid=0,$havehouzhui=true){
	global $weijingtai;
	global $rootroad;
	global $wjtpageshopsearch;
	global $wjtpagehz;
	global $wjturlencode;
	
	if($cid==""){
		$cid = 0;	
	}
	
	$keyword = str_replace("/"," ",$keyword);
	$returnstr = "";

	if($weijingtai){
		if(empty($keyword)&&$havehouzhui){
			$returnstr =   $rootroad."/".$wjtpageshopsearch.setwyz_urlpam($cid).($havehouzhui?$wjtpagehz:"");
		}else{
			$returnstr =   $rootroad."/".$wjtpageshopsearch.setwyz_urlpam($cid."-".setcnstr($keyword)).($havehouzhui?$wjtpagehz:"");
		}
	}else{
		if(empty($keyword)){
			$returnstr =   $rootroad."/shopsearch.php?catid=".$cid;
		}else{
			$returnstr =   $rootroad."/shopsearch.php?q=".urlencode($keyword)."&catid=".$cid;
		}
	}
	
	
	return geturlshortstr($returnstr) ;

}
function getproducturl($num_iid){
	global $weijingtai;
	global $rootroad;
	global $wjtpageproduct;
	global $wjtpagehz;

	$returnstr =  "";
	if($weijingtai=="1"){
		$returnstr =$rootroad."/".$wjtpageproduct.setwyz_urlpam($num_iid).$wjtpagehz;
	}else{
		$returnstr =$rootroad."/product.php?iid=".$num_iid;
	}
	
	return geturlshortstr($returnstr) ;
}
function getproducturlB2C($num_iid){
	global $weijingtai;
	global $rootroad;
	global $wjtpageb2cproduct;
	global $wjtpagehz;

	$returnstr =  "";
	if($weijingtai=="1"){
		$returnstr =$rootroad."/".$wjtpageb2cproduct.setwyz_urlpam($num_iid).$wjtpagehz;
	}else{
		$returnstr =$rootroad."/b2cproduct.php?iid=".$num_iid;
	}
	
	return geturlshortstr($returnstr) ;
}


function getshopurl($nick,$sortnum=0,$sp=1,$ep=1000000,$havehouzhui=true){
	global $rootroad;
	global $weijingtai;
	global $wjtpageshop;
	global $wjtpagehz;
	
	
	
	$returnstr = "";
	if($weijingtai=="1"){
		if($sortnum==0&&$sp==1&&$ep==1000000&&$havehouzhui){
		$returnstr =$rootroad."/".$wjtpageshop.setwyz_urlpam(setcnstr($nick)).($havehouzhui?$wjtpagehz:"");
		}else{
		$returnstr =$rootroad."/".$wjtpageshop.setwyz_urlpam(setcnstr($nick)."-".$sortnum).($havehouzhui?$wjtpagehz:"");
		}
	}else{
		$returnstr =$rootroad."/shop.php?nick=".urlencode($nick)."&sortnum=".$sortnum;
	}
	return geturlshortstr($returnstr) ;

}
function ischengrencid($str){
	return false;
}
$guanfang_tongji = url_base64_encode($sitetitleurl."-".$userpiddp."-".$ArrayAppKey);
function GBsubstr($string, $start, $length) {
	if(strlen($string)>$length){
		$str=null;
		$len=$start+$length;
		for($i=$start;$i<$len;$i++){
			if(ord(substr($string,$i,1))>0xa0){
				$str.=substr($string,$i,2);
				$i++;
			}else{
				$str.=substr($string,$i,1);
			}
		}
		return $str;
	}else{
		return $string;
	}
}


function proSortNumToSort($sortnum)
{
	$sort = "commissionNum_desc";
	if($sortnum=="0")$sort="commissionNum_desc";
	if($sortnum=="1")$sort="credit_desc";
	if($sortnum=="2")$sort="price_desc";
	if($sortnum=="3")$sort="price_asc";
	if($sortnum=="4")$sort="delistTime_asc";
	return $sort;
}
function proSortNumToSortDZ($sortnum)
{
	$sort = "volume_desc";
	if($sortnum=="0")$sort="volume_desc";
	if($sortnum=="1")$sort="credit_desc";
	if($sortnum=="2")$sort="price_desc";
	if($sortnum=="3")$sort="price_asc";
	if($sortnum=="4")$sort="delistTime_asc";
	return $sort;
}
function proSortNumToSortB2C($sortnum)
{
	$sort = "modified_asc";
	if($sortnum=="0")$sort="modified_desc";
	if($sortnum=="1")$sort="modified_asc";
	if($sortnum=="2")$sort="price_desc";
	if($sortnum=="3")$sort="price_asc";
	return $sort;
}
function proSortNumToSortNameB2C($sortnum)
{
	$sort = "最新发布优先";
	if($sortnum=="0")$sort="最新发布优先";
	if($sortnum=="1")$sort="最早发布优先";
	if($sortnum=="2")$sort="价格从高到低";
	if($sortnum=="3")$sort="价格从低到高";
	return $sort;
}

if($wyz_tongyi_title=="1" || $wyz_tongyi_content=="1"){
	$title_replacekey = application("",ROOT."replacekeydata.php");
}

function setdO_WYZ_B2C($array,$type)
{
	error_reporting(7);
	global $title_replacekey;

if(!is_array($array)){
	return array();
}

						global $wyz_tongyi_title;
						global $wyz_tongyi_content;
						global $wyz_title_daluan;
						global $wyz_title_addword;
						
						foreach($array as $arrkey => &$arrval){
							if(is_array($arrval)){
								$arrval = setdO_WYZ_B2C($arrval,$type);		
							}else{
								if($arrkey == "title" && !empty($arrkey) ){
									if(($wyz_tongyi_title=="1" || $wyz_title_daluan=="1" || $wyz_title_addword=="1")) {
										
										$array["old_title"]=$arrval;
										
										$arrval = htmlspecialchars_decode($arrval);
										$arrval = strip_tags($arrval);
										
										if($wyz_tongyi_title=="1")$arrval = strtr($arrval,$title_replacekey);
										if($wyz_title_daluan=="1")$arrval = wyc_title_daluan($arrval);
										if($wyz_title_addword=="1")$arrval = wyc_title_addword($arrval);
									}
									
								}
								if($arrkey=="desc" && $wyz_tongyi_content=="1" && $type=="59miao.items.get"){
									
									$arrval = strtr($arrval,$title_replacekey);

								}
							}
						}
						
	return $array;
}
function setdO_WYZ_new($xmlCode,$type)
{
	error_reporting(7);

						global $wyz_tongyi_title;
						global $wyz_tongyi_content;
						global $wyz_title_daluan;
						
						global $wyz_title_addword;
						$returnstr = $xmlCode;

						//详情同义词替换
						if($wyz_tongyi_content=="1" && $type=="taobao.taobaoke.items.detail.get") {
							$pattern = '/<desc>(.+?)<\/desc>/i';  
							$returnstr = preg_replace_callback($pattern,'content_replace', $returnstr);  
						}
						
						//标题同义词替换
						if(($wyz_tongyi_title=="1" || $wyz_title_daluan=="1" || $wyz_title_addword=="1")) {
						//标题同义词替换
							$pattern = '/<title>(.+?)<\/title>/i';  
							$returnstr = preg_replace_callback($pattern,'title_replace', $returnstr);  
						}
							
						$pattern = '/<click_url>(.+?)<\/click_url>/i';  
						$returnstr = preg_replace_callback($pattern,'click_url_replace', $returnstr);  

						$pattern = '/<shop_click_url>(.+?)<\/shop_click_url>/i';  
						$returnstr = preg_replace_callback($pattern,'shop_click_url_replace', $returnstr);  
	return $returnstr;
}

function content_replace($matches){
	global $wyz_tongyi_title;
	global $wyz_tongyi_content;
	global $wyz_title_daluan;
	global $wyz_title_addword;
	global $title_replacekey;
	
	
	$desc = $matches[1];
	$str = Newiconv("UTF-8","GBK",$desc);
	
	$str = strtr($str,$title_replacekey);
	
	$newtitle=(Newiconv("GBK","UTF-8",$str));
	$returnstr .= "<desc>".$newtitle."</desc>";
	return $returnstr;
}
function title_replace($matches){
	global $wyz_tongyi_title;
	global $wyz_tongyi_content;
	global $wyz_title_daluan;
	global $wyz_title_addword;
	global $title_replacekey;
	
	
	$title = $matches[1];
	
	$str = htmlspecialchars_decode(Newiconv("UTF-8","GBK",$title));
	$str = strip_tags($str);

	if($wyz_tongyi_title=="1")$str = strtr($str,$title_replacekey);
	if($wyz_title_daluan=="1")$str = wyc_title_daluan($str);
	if($wyz_title_addword=="1")$str = wyc_title_addword($str);
	
	
	$newtitle=(Newiconv("GBK","UTF-8",$str));


	$returnstr = "<old_title>".$title."</old_title>";
	$returnstr .= "<title>".$newtitle."</title>";
	return $returnstr;
}

function click_url_replace($matches){
	$url = $matches[1];
	$newurl = updateSPM($url);
	return "<click_url>".$newurl."</click_url>";
}
function shop_click_url_replace($matches){
	$url = $matches[1];
	$newurl = updateSPM($url);
	return "<shop_click_url>".$newurl."</shop_click_url>";
}


function wyc_title_addword($title){
	global $wyz_titlehead;
	global $wyz_titlecenter;
	global $wyz_titleend;

	$title1 = GBsubstr($title,0,18);
	
	$title2 = str_replace($title1,$wyz_titlecenter,$title);
	$title = $wyz_titlehead.$title1.$title2.$wyz_titleend;
	return $title;	
}

function wyc_title_daluan($title){
	
	
	global $wyz_title_daluan;
	if($wyz_title_daluan=="1"){
		$title = strip_tags($title);
		$num = strlen($_SERVER['SERVER_NAME']);
		
		$title = str_replace("！"," ",$title);
		
		$arr = explode(" ",$title);

		$i = $num%count($arr);
		
		if($i==0) $i=count($arr)-1;
		
		
		$title1 = array();
		$title2 = array();
		
		for($x=0;$x<count($arr);$x++){
			if($x<$i){
				$title1[] = $arr[$x];
			}else{
				$title2[] = $arr[$x];
			}
		}
		$title = implode(" ",$title2)." ".implode(" ",$title1);
	}
	return $title;
}

function File_extend($file_name)   
{   
$extend = pathinfo($file_name);   
$extend = strtolower($extend["extension"]);   
return $extend;   
}  

function updateSPM($url){
	global $newSPM;

	if(strpos($url,"spm=2014")>0){
		
		
		$arrurl = explode("spm=2014",$url);
		
		
		if(strpos($arrurl[1],"&")>0){
			$arrurl2 = explode("&",$arrurl[1]);
			$url = $arrurl[0]."spm=".$newSPM."&".$arrurl2[1];
		}else{
			$url = $arrurl[0]."spm=".$newSPM;
		}
	}
	
	return $url;
	
}

function getSearch8($keyword,$catid){
global $userpid;
$Search8Url = "http://s8.taobao.com/search?pid={SPID}&commend=all&tab=coefp&isbcat=1&mode=39&cat={CATID}&sort=coefp&q={KEYWORD}&taoke_type=1&spm=2014.12038864.0.0";

$tihuanarr = array();
$tihuanarr["{SPID}"] = $userpid;
$tihuanarr["{CATID}"] = $catid;
$tihuanarr["{KEYWORD}"] = $keyword;

$returnurl = updateSPM(strtr($Search8Url,$tihuanarr)); 

return $returnurl;	
}

function loopArray($array){
	if(!is_array($array)){
	   return $array;
	}
	//声明一条字符串，用来组合解析的所有值
	$w_string_array = "Array (";
	if(isset($array)){
	   //获得所有的key
	   $keys = array_keys($array);
	   //遍历所有的key
	   for($i=0;$i<count($keys);$i++){
		//获得一个key
		$key = $keys[$i];
		//获得一个值
		$value = $array[$key];
		//递归追加
		$w_string_array = $w_string_array." [$key] => ".loopArray($value);
	   }
	}
	
	$w_string_array .= " )";
	return $w_string_array;
}
function hmac($data, $key){
    if (function_exists('hash_hmac')) {
        return hash_hmac('md5', $data, $key);
    }
    $key = (strlen($key) > 64) ? pack('H32', 'md5') : str_pad($key, 64, chr(0));
    $ipad = substr($key,0, 64) ^ str_repeat(chr(0x36), 64);
    $opad = substr($key,0, 64) ^ str_repeat(chr(0x5C), 64);
    return md5($opad.pack('H32', md5($ipad.$data)));
}

//整个数组编码转换
function array_walk_recursive2(&$input, $funcname, $userdata = "")
{
	if (!is_callable($funcname))
	{
		return false;
	}
	
	if (!is_array($input))
	{
		return false;
	}
	
	foreach ($input AS $key => $value)
	{
		if (is_array($input[$key]))
		{
			array_walk_recursive($input[$key], $funcname, $userdata);
		}
		else
		{
			$saved_value = $value;
			if (!empty($userdata))
			{
				$funcname($value, $key, $userdata);
			}
			else
			{
				$funcname($value, $key);
			}
			
			if ($value != $saved_value)
			{
				$input[$key] = $value;
			}
		}
	}
	return true;
}

    function _upload($imgage, $path = '',$saveRule="",$thumbPrefix="",$width=0,$height=0) {
		require_once WEBROOT.'include/thinkphp/Common/common.php';
		require_once WEBROOT.'include/thinkphp/Extend/Library/ORG/Net/UploadFile.class.php';
		require_once WEBROOT.'include/thinkphp/Extend/Library/ORG/Util/Image.class.php';
        $upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize = 2097153;
        $upload->allowExts = explode(',', 'jpg,gif,png,jpeg,html,txt');
        $upload->uploadReplace = true;
        $upload->saveRule = $saveRule;
		
        if ($thumbPrefix!="") {
            $upload->thumb = true;
            $upload->imageClassPath = 'ORG.Util.Image';
            $upload->thumbPrefix = $thumbPrefix;
            $upload->thumbMaxWidth = $width;
            //设置缩略图最大高度
            $upload->thumbMaxHeight = $height;
            $upload->saveRule = uniqid;
            $upload->thumbRemoveOrigin = TRUE;
        }

        if (empty($path)) {
            $upload->savePath = WEBROOT.'uploadfile/' . date("Y-m-d") . "/";
        } else {
            $upload->savePath = $path;
        }
		
        if (!$upload->uploadOne($imgage)) {
            //捕获上传异常
			echo "上传错误，请检查文件格式和大小。"; 		
			echo("<input type=\"button\" name=\"Submit\" value=\"重新上传\" onClick=\"history.go(-1);\">");		
			exit; 	
        } else {
            //取得成功上传的文件信息
            $uploadList = $upload->getUploadFileInfo();
        }
        return $uploadList;
    }


  function fenci($str,$num=4){
	  error_reporting(0);
	  
		require_once WEBROOT.'include/scws/pscws3.class.php';
		$dict = WEBROOT.'include/scws/dict.xdb';	// 默认采用 xdb (不需其它任何依赖) 
			$mydata  = NULL;	// 待切数据
		
		$cws = new PSCWS3($dict);
		//$string = "pentax/宾得中画副单反 645d 机身 4000万像素 顶级单反相机 行货宾得中画副单反 645d 机身 4000万像素";
		$res = $cws->segment(strip_tags($str));
		$res = array_unique($res);
		$returnstr = "";
		$i=1;
		foreach($res as $val){
			if(strlen($val)>2){
				$returnstr.=" ".$val;
				$i++;
				if($i>$num) break;
			}
			
		}
		$returnstr = trim($returnstr);

	  return $returnstr;
  }

   function saveConfigFile(){
	   	global $rootroad;
		global $rootroad;   //网站所在目录
		global $weijingtai;  //开启伪静态
		global $usernick;  //淘宝昵称
		global $userpid;  //阿里妈妈PID
		global $userpiddp;  //阿里妈妈小PID
		global $sitetitle;  //网站名称
		global $indextitle;  //首页TITLE
		global $sitetitleurl;  //网站域名
		global $sitekey;  //SEO关键字
		global $sitedesc;  //SEO网页描述
		global $beianxinxi;  //备案信息号
		global $webcontact;  //站长联系方式
		global $tongjidaima;  //统计脚本
		global $setCacheTime;  //缓存时间
		global $manage_adminname;  //管理员账号
		global $manage_adminpass;  //管理员密码
		global $ArrayAppKey;  //AppKey
		global $ArrayAppSecret;  //AppSecret
		global $taobao_username;  //AppSecret
		global $taobao_usermd5;  //AppSecret
		
		global $B2CArrayAppKey;  //AppKey
		global $B2CArrayAppSecret;  //AppSecret
		global $templatefolder;  //templatefolder
		global $paipai_uid;  //AppSecret
		global $paipai_uin;  //AppSecret
		global $paipai_appOAuthID;  //AppSecret
		global $paipai_appOAuthkey;  //AppSecret
		global $paipai_accessToken;  //AppSecret
	   
	   	$pagetext = "";
		
		//配置的字段	
		$pagetext = '$rootroad = "'.$rootroad.'";   //网站所在目录'."\n";
		$pagetext = $pagetext.'$weijingtai="'.$weijingtai.'";  //开启伪静态'."\n";
		$pagetext = $pagetext.'$usernick="'.$usernick.'";  //淘宝昵称'."\n";
		$pagetext = $pagetext.'$userpid="'.$userpid.'";  //阿里妈妈PID'."\n";
		$pagetext = $pagetext.'$userpiddp="'.$userpiddp.'";  //阿里妈妈小PID'."\n";
		$pagetext = $pagetext.'$sitetitle="'.$sitetitle.'";  //网站名称'."\n";
		$pagetext = $pagetext.'$indextitle="'.$indextitle.'";  //首页TITLE'."\n";
		$pagetext = $pagetext.'$sitetitleurl="'.$sitetitleurl.'";  //网站域名'."\n";
		$pagetext = $pagetext.'$sitekey="'.$sitekey.'";  //SEO关键字'."\n";
		$pagetext = $pagetext.'$sitedesc="'.$sitedesc.'";  //SEO网页描述'."\n";
		$pagetext = $pagetext.'$beianxinxi="'.$beianxinxi.'";  //备案信息号'."\n";
		$pagetext = $pagetext.'$webcontact="'.$webcontact.'";  //站长联系方式'."\n";
		//$pagetext = $pagetext.'$tongjidaima="'.stripslashes(html_entity_decode($tongjidaima,ENT_QUOTES)).'";  //统计脚本'."\n";
		

		$pagetext = $pagetext.'$tongjidaima="'.addslashes(stripslashes(html_entity_decode($tongjidaima,ENT_QUOTES))).'";  //统计脚本'."\n";
		
		$pagetext = $pagetext.'$setCacheTime="'.$setCacheTime.'";  //缓存时间'."\n";
		
		//原有的字段
		$pagetext = $pagetext.'$manage_adminname="'.$manage_adminname.'";  //管理员账号'."\n";
		$pagetext = $pagetext.'$manage_adminpass="'.$manage_adminpass.'";  //管理员密码'."\n";
		
		$pagetext = $pagetext.'$ArrayAppKey="'.$ArrayAppKey.'";  //AppKey'."\n";
		$pagetext = $pagetext.'$ArrayAppSecret="'.$ArrayAppSecret.'";  //AppSecret'."\n";
		$pagetext = $pagetext.'$taobao_username="'.$taobao_username.'";  //论坛帐号'."\n";
		$pagetext = $pagetext.'$taobao_usermd5="'.$taobao_usermd5.'";  //论坛密码'."\n";
		
		$pagetext = $pagetext.'$B2CArrayAppKey="'.$B2CArrayAppKey.'";  //AppKey'."\n";
		$pagetext = $pagetext.'$B2CArrayAppSecret="'.$B2CArrayAppSecret.'";  //AppSecret'."\n";
		$pagetext = $pagetext.'$templatefolder="'.$templatefolder.'";  //templatefolder'."\n";
		
		$pagetext = $pagetext.'$paipai_uid="'.$paipai_uid.'";  //拍拍参数'."\n";
		$pagetext = $pagetext.'$paipai_uin="'.$paipai_uin.'";  //拍拍参数'."\n";
		$pagetext = $pagetext.'$paipai_appOAuthID="'.$paipai_appOAuthID.'";  //拍拍参数'."\n";
		$pagetext = $pagetext.'$paipai_appOAuthkey="'.$paipai_appOAuthkey.'";  //拍拍参数'."\n";
		$pagetext = $pagetext.'$paipai_accessToken="'.$paipai_accessToken.'";  //拍拍参数'."\n";
	
		$pagetext = $pagetext.'define(\'ROOT\',dirname(__FILE__)."/");'."\n";
	
		
		//写入到缓存中.
		file_put_contents ( WEBROOT."/data/configdata.php", "<?php \n".$pagetext."\n?>");
   }

?>
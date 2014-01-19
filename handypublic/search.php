<?php require_once dirname(__FILE__)."/".'global.php';?>
<?php require_once dirname(__FILE__)."/".'include/function.php';?>
<?php
	if($_GET["searchbuyer"]!=""){
		$qserach = urldecode(var_request("qserach",""));
		$nickstr = $qserach;
		exit("<script language=\"javascript\">location.href='".$rootroad."/gotourl.php?nick=".urlencode($nickstr)."';</script>");	
	}
$qserach = urldecode(var_request("qserach",""));
	
$taokeyword = htmlspecialchars(urldecode(var_request("taokeyword","")));
$paikeyword = htmlspecialchars(urldecode(var_request("paikeyword","")));
$articlekeyword = htmlspecialchars(urldecode(var_request("articlekeyword","")));
$sharekeyword = htmlspecialchars(urldecode(var_request("sharekeyword","")));
$b2ckeyword = htmlspecialchars(urldecode(var_request("b2ckeyword","")));

$qserach = setsplitkeyword($searchkeypb,$qserach,"***");		
$taokeyword = setsplitkeyword($searchkeypb,$taokeyword,"***");		
$articlekeyword = setsplitkeyword($searchkeypb,$articlekeyword,"***");		
$paikeyword = setsplitkeyword($searchkeypb,$paikeyword,"***");		
$sharekeyword = setsplitkeyword($searchkeypb,$sharekeyword,"***");		
$b2ckeyword = setsplitkeyword($searchkeypb,$b2ckeyword,"***");		

//$taokeyword = (urlencode($taokeyword));
//$articlekeyword = (urlencode($articlekeyword));
//$sharekeyword = (urlencode($sharekeyword));
//$b2ckeyword = (urlencode($b2ckeyword));

		
//直接跳转淘宝
if($taokeyword!=""){
	 $url = getSearch8($taokeyword,0);
	 header('HTTP/1.1 301 Moved Permanently');//发出301头部 
	 header('Location: '.$url);//跳转到我的新域名地址
	 exit;
}

if($articlekeyword!=""){
	 $url = GetDaohangUrl(array("urltype"=>"artlist","keyword"=>$articlekeyword));
	 header('HTTP/1.1 301 Moved Permanently');//发出301头部 
	 header('Location: '.$url);//跳转到我的新域名地址
	 exit;
}
if($b2ckeyword!=""){
	 $url = GetDaohangUrl(array("urltype"=>"b2cgou","keyword"=>$b2ckeyword));
	 header('HTTP/1.1 301 Moved Permanently');//发出301头部 
	 header('Location: '.$url);//跳转到我的新域名地址
	 exit;
}
if($sharekeyword!=""){
	 $url = GetDaohangUrl(array("urltype"=>"shareall","keyword"=>$sharekeyword));
	 header('HTTP/1.1 301 Moved Permanently');//发出301头部 
	 header('Location: '.$url);//跳转到我的新域名地址
	 exit;
}
if($paikeyword!=""){
	 $url = GetDaohangUrl(array("urltype"=>"paigou","keyword"=>$paikeyword));
	 header('HTTP/1.1 301 Moved Permanently');//发出301头部 
	 header('Location: '.$url);//跳转到我的新域名地址
	 exit;
}

$url = getSearch8($taokeyword,0);
header('HTTP/1.1 301 Moved Permanently');//发出301头部 
header('Location: '.$url);//跳转到我的新域名地址
exit;

?>

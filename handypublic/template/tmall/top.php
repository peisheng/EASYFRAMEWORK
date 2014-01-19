<?php
require_once 'data/function.php';
$pagetitle="风云榜";
?>
<?PHP
if (!defined('VERSON'))
{
	exit('Access Defined');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<!--{template headerjs}-->

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>淘宝搜索_风云榜</title>
<meta name="keywords" content="淘宝风云榜,<?php echo $sitekey ?>" />
<meta name="description" content="淘宝风云榜,<?php echo $sitedesc ?>" />
<link href="/css/orange.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main">
<?php
include($WEBROOT_TEMP."header.php");
?>

<iframe frameborder="0" marginheight="0" marginwidth="0" border="0" id="alimamaifrm" name="alimamaifrm" scrolling="no" height="3050px" width="100%" src="gotourl.php?url=<?php echo url_base64_encode("http://pindao.huoban.taobao.com/channel/channelfy.htm?pid=".$userpid); ?>"></iframe>

<!--{template footer}-->
</div>
</body>
</html>
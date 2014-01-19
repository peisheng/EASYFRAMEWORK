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
<title><?php echo $page_title ?></title>
<meta name="keywords" content="<?php echo $page_keyword ?>" />
<meta name="description" content="<?php echo $page_discription ?>" />
<link href="css/orange.css" rel="stylesheet" type="text/css" />
<link href="css/orange_list.css" rel="stylesheet" type="text/css" />
<link href="css/orange_shop.css" rel="stylesheet" type="text/css" />
    
</head>
<body>

<!--{template header}-->

<div id="main">

<div class="taodi_tips">
<div class="listweizhi">您的位置:<a href="<?php echo $rootroad;?>/">首页</a> > 淘宝店铺 >$nowCat[name] > $nowCat[keyword]</div>
</div>

<div class="taodi_listshop">
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3">
      <!--{loop $taoshopitems $k $v}-->
    <tr>
      <td width="4%" height="25">&nbsp;</td>
      <td width="67%"><a href="$v[click_url_base64]" target="_blank" rel='nofollow'>{$v[shop_title]}</a></td>
      <td width="29%"><img src="img/orange/level_{$v[seller_credit]}.gif"></td>
    </tr>
      <!--{/loop}-->

  </table></div>


<script language="javascript">seturl_LazyLoad('main');</script>

<?php include($WEBROOT_TEMP."hot.php");?>

<!--{template footer}-->
</div>
</body>
</html>
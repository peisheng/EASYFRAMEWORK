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

<div class="taodi_right_catalogs">
<ul><div class="clear"></div>
            <!--{loop $article_cate_list['parent'] $k $v}-->
     		<li><a href="$v[url]"><strong>$v[name]</strong></a></li>
          <!--{loop $article_cate_list['sub'][$k] $k2 $v2}-->
     		<li><a href="$v2[url]">$v2[name]</a></li>
          <!--{/loop}-->
            <!--{/loop}-->
<div class="clear"></div>
</ul>
</div>


<div class="taodi_listshop">
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3">
      <!--{loop $article_list $k $v}-->
    <tr>
      <td width="2%" height="25" valign="middle"><img src="img/orange/dot.gif" alt="f" /></td>
      <td width="69%" align="left"><a href="$v[url]" target="_blank">{$v[title]}</a> </td>
      <td width="29%">[<!--{eval echo date('Y-m-d',strtotime($v['add_time']))}-->]</td>
    </tr>
      <!--{/loop}-->

  </table></div>
  
    <div style="clear:both"></div>
       <center>
       
       <a data-type="2" data-keyword="<!--{eval echo ($cates_now[keyword]==""?$CustomSetFieldValue[ProListproKeyword]:$cates_now[keyword])}-->" data-tmpl="628x270" data-tmplid="14" data-rd="1" data-style="2" href="#"></a>
       <br /><br /><br /><br />
       </center>


<script language="javascript">seturl_LazyLoad('main');</script>

<?php include($WEBROOT_TEMP."hot.php");?>

<!--{template footer}-->
</div>
</body>
</html>
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


<table width="95%" border="0" align="center" cellpadding="10" cellspacing="10">
                  <tr>
                    <td align="center" class="fenlei01"><strong>$article[title]</strong></td>
    </tr>
                  <tr>
                    <td align="right"><span class="ny3">作者：$article[orig]    发布时间：$article[add_time] </span></td>
            </tr>
                  <tr>
                    <td align="left" class="class-list-01">$article[info]</td>
    </tr>
                  <tr>
                    <td>&nbsp;</td>
            </tr>
                  <tr>
                    <td align="left">上一篇：<a href="$article[prev_one][0][url]">$article[prev_one][0][title]</a><br />
                        下一篇：<a href="$article[next_one][0][url]">$article[next_one][0][title]</a>
    &nbsp;</td>
    </tr>
  </table>
		       <center>
       
       <a data-type="2" data-keyword="($article[keyword]==""?$CustomSetFieldValue[ProArticleproKeyword]:$article[keyword])" data-tmpl="628x270" data-tmplid="14" data-rd="1" data-style="2" href="#"></a>
       <br /><br /><br /><br />
       </center>


<script language="javascript">seturl_LazyLoad('main');</script>

<?php include($WEBROOT_TEMP."hot.php");?>

<!--{template footer}-->
</div>
</body>
</html>
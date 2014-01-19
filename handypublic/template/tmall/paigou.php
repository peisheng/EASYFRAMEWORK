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

     <!--{if $CustomSetFieldValue[ProListSmalltypeKG] == 'open_c'}--> 
     <!--{if $TaoapiSubCats}--> 
<div class="taodi_right_catalogs">
<ul><div class="clear"></div>
          <!--{loop $TaoapiSubCats $k $v}-->
     		<li><a href="$v[url]">$v[name]</a></li>
          <!--{/loop}-->
<div class="clear"></div>
</ul>
</div>
     <!--{/if}-->
     <!--{/if}-->






<div style="clear:both">
<div style="width:950px; text-align:left; float:left; padding:0px; margin:0px;">
<div>


<div class="taodi_tips">
<div class="listweizhi">����λ��:<font color="#FF0000"><!--{if $param[keyword]!="" }-->$param[keyword]<!--{/if}--><!--{if $catename!="" }-->$catename<!--{/if}--></font></div>
<div class="shuliang">������<strong><a href="/catid-<?php echo $catid; ?>-<?php echo ($q) ?>"><?php echo $pagetitle?></a></strong>�����Ʒ<span><?php echo $totalResults ?></span>������֧�������������ף���ȫ�������ǣ�</div>
</div>

      <!--{if $CustomSetFieldValue[ProListSmallSortKG] != close}--> 
     <!--{if $arr_sort}--> 
<div class="taodi_choose">
<ul>
          <!--{loop $arr_sort $k $v}-->
          <!--{eval if($v["class"]=="on"){$css = ' id="this_choose"';}else{$css = "";} }-->
         <li $css><a href="$v[url]">$v[title]</a></li>
          <!--{/loop}-->
</ul>
</div>
     <!--{/if}-->
     <!--{/if}-->


     <!--{if $arr_price}--> 
<div class="condition">
	<ul>
		<li class="tilist"><b>�۸��������У�</b></li>
		<li class='by-price'>
          <!--{loop $arr_price $k $v}-->
     		<a href="$v[url]" >$v[title]</a>
          <!--{/loop}-->
		</li>
	</ul>
</div>
     <!--{/if}-->


<div class="staodi_listbox">
<dl>

<?php if(!is_array($taobaokeItem)){?>
<div style="color:#FF0000; line-height:50px; padding-left:20px;">û�������������Ʒ���뻻һ���ؼ�����������ע�⣬����Ҫ�����ͺţ�ֻ��Ҫ������ơ�</div>
<?php }?>

            <!--{loop $taobaokeItem $k $v}-->
<dt>
<em>
<a href="$v[url]"  $v[rel] target="$v[target]">
          <!--{eval setPic($v["pic_url"]."_310x310.jpg",310,310,strip_tags($v["title"])) }-->
          </a>
</em>
<p class="taodi_title"><a href="$v[url]" $v[rel] target="$v[target]"><?php echo $v["title"] ?></a></p>
<p class="taodi_nick"><b>��{$v[price]}Ԫ</b>��30��������<b><?php echo $v["volume"] ?></b> �� </p>
<p class="taodi_nick">�ƹ�<a href="$v[url]" $v[rel] target="$v[target]"><?php echo $v["nick"] ?></a>
</p>
<p class="taodi_nick">
<a href="$v[url]" $v[rel] target="$v[target]"><img src="<?php echo $templateroot;?>/img/orange/toshop.gif" alt="��ô���Ա�������?���������̼ҵĵ��̣�" align="absmiddle"/></a>

</p>
</dt>
          <!--{/loop}-->
</dl>
</div>

<div id="pages">
<?php
$page = new SubPages($param["pageSize"],$totalResults,$pages,10,2);
echo $page->show();
?>
</div>
</div>
</div>

</div>
<div style="clear:both">
</div>
<?php if($is_indexs == "ok") {?>
<DIV class="block clearfix" style="clear:both; width:940px; margin:0 auto;">
		<?php
	include($WEBROOT_TEMP."news.php");
?>
    </DIV>
<DIV style="clear:both;">
</DIV>	
<?php } ?>
 <script language="javascript">seturl_LazyLoad('main');</script>

<?php include($WEBROOT_TEMP."hot.php");?>

<!--{template footer}-->
</div>
</body>
</html>
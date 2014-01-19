<?PHP
if (!defined('VERSON'))
{
	exit('Access Defined');
}

?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<!--{template headerjs}-->

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo $indextitle ?></title>
<meta name="keywords" content="<?php echo $sitekey ?>" />
<meta name="description" content="<?php echo $sitedesc ?>" />
<meta name="google-site-verification" content="sxHyqi0xBu2ztT-J-zjK8ezmgvVnEP4tHXdoPy9fi0Q" />
<link href="css/orange.css" rel="stylesheet" type="text/css" />
<link href="css/list.css" rel="stylesheet" type="text/css" />
</head>
<body id="list">
<!-- 页面顶部 -->
<!--{template header}-->

  <!--输出首页所有栏目--> 
  <!--{loop $indexs $indexkey $indexvalue}--> 
  
  <!--{if $indexvalue[typeid]==21}-->
  <!-- 整合频道 --> 
   <!--{if !$indexvalue[height]}--><!--{eval $indexvalue[height]=2000;}--><!--{/if}--> 
   <!--{eval $indexvalue[urltxt]=UpdateSystemVerible($indexvalue[urltxt]);}-->
  	<center><div style="width:100%; text-align:center; overflow:hidden; clear:both; margin-top:0px; margin-bottom:0px;"><div style="height:<!--{eval echo($indexvalue[height]+$indexvalue[hidentop]) }-->px; margin-top:-{$indexvalue[hidentop]}px;"><iframe frameborder="0" marginheight="0" marginwidth="0" border="0" id="alimamaifrm" name="alimamaifrm" scrolling="no" height="<!--{eval echo($indexvalue[height]+$indexvalue[hidentop]) }-->px" width="100%" src="$indexvalue[urltxt]" ></iframe></div></div></center>
  <div class="clear"></div>
  <!--{/if}--> 

  <!--{if $indexvalue[typeid]==13}-->
  <!-- 自定义html --> 
  <div class="a_b" id="taozhekou-{$indexkey}" style="text-align:{$indexvalue[sort]};">
  <!--{eval echo strtr(stripslashes(html_entity_decode($indexvalue[contentHtml],ENT_QUOTES)),$TaoConfig["ad_verible"]);}-->
  </div>
  <div class="clear"></div>
  <!--{/if}--> 

  <!--{eval if ( $indexvalue[typeid]==5 || $indexvalue[typeid]==10 || $indexvalue[typeid]==15) { }-->
  <!-- 商品栏目 --> 
    <p class="indexppp">下面是销量最高的【{$indexvalue[typename]}】热卖商品。 <a class=more href="$indexvalue[url]" target="$indexvalue[target]">查看更多&gt;&gt; </A></p>
    <div class="taodi_listbox">
    <dl>
              <!--{eval $taogoulists = GetArrByValue($indexvalue,array("page_size"=>"8"));}--> 
              <!--{loop $taogoulists $k $v}-->
    <dt><em><a href="$v[url]" $v[rel] target="$v[target]" data-itemid="$v[tao_iid]" data-rd="1">
                  <!--{eval setPic($v["pic_url"]."_b.jpg",230,0,strip_tags($v["title"])) }-->
                  </a></em>
    <p class="taodi_title"><a href="$v[url]"  $v[rel] target="$v[target]" data-itemid="$v[tao_iid]" data-rd="1">$v[title]</a></p>
    <p class="taodi_nick">30天销量：<b><?php echo $v["volume"] ?></b>件</p>
    <p class="taodi_nick">抢购价：<b>￥<?php echo $v["price"] ?></b>元</p>
    
    <p class="taodi_nick">
    <a href="$v[url]" $v[rel] target="_blank"><img src="img/orange/toshop.gif" alt="怎么在淘宝上买东西?点击进入该商家的店铺！" align="absmiddle"/></a>
    <a href="$click_url" $v[rel] target="_blank"></a>
    </p>
    </dt>
                <!--{/loop}--> 
    </dl>
    </div>  
<!--{eval } }--> 
  <!--{eval if ($indexvalue[typeid]==2 || $indexvalue[typeid]==3 ||$indexvalue[typeid]==4 || $indexvalue[typeid]==7) { }-->
  <!-- 商品栏目 --> 
    <p class="indexppp">下面是销量最高的【{$indexvalue[typename]}】热卖商品。 <a class=more href="$indexvalue[url]" target="$indexvalue[target]">查看更多&gt;&gt; </A></p>
    <div class="taodi_listbox">
    <dl>
              <!--{eval $taogoulists = GetArrByValue($indexvalue,array("page_size"=>"8"));}--> 
              <!--{loop $taogoulists $k $v}-->
    <dt>                   
    <div style=" width:234px; height:322px; float:left;">
                    <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
                    	$v[title] <br />  ￥ $v[price]
                    </a>
                   </div>

    </dt>
                <!--{/loop}--> 
    </dl>
    </div>  
    <!--{eval } }--> 
 
  <!--{if $indexvalue[typeid]==6}--> 
  <!-- 文章栏目 --> 
    <!--{if $TaoConfig[DB_OPEN] }-->
    <DIV class="block clearfix" style="clear:both; width:940px; margin:0 auto;">
      <!--{eval $NewsTypeList = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}-->
      <!--{loop $NewsTypeList $k $v}--> 
            <div class="news">              
            <div class="news-title"><span>$v[typename]</span><span class="more"><a href="$v[url]" target="$v[target]">更多&raquo;</a></span></div>
            <ul>
                  <!--{eval $NewsArr = GetArrArticle($v[vcate_id],$indexvalue[pronum],1,0,0,"add_time");}--> 
                  <!--{loop $NewsArr $knew $vnew}-->
            <li><a href="$vnew[url]" target="$v[target]">{$vnew[title]}</a><span><!--{eval echo date('m-d',strtotime($vnew['add_time']))}--></span></li>
                  <!--{/loop}--> 
            </ul>
            </div>      
                  <!--{/loop}--> 
    </DIV>
    <DIV style="clear:both;">
    </DIV>	
      <!--{/if}--> 
    <!--{/if}--> 

  
  <!--{/loop}-->
      <script language="javascript">seturl_LazyLoad('list');</script>




<!--顶部结束-->
<DIV class="block clearfix" style="clear:both; width:940px; margin:0 auto;">
		<?php
	include($WEBROOT_TEMP."news.php");
?>
    </DIV>
<DIV style="clear:both;">
</DIV>	

<?php include($WEBROOT_TEMP."hot.php");?>

<!-- 页面底部 -->
<div class="links">
<ul>
<li>友情链接:</li>
<?php  

$arrays = application("linkarray",WEBROOT."data/applicationdate.php");
if(!is_array($arrays)){
	$arrays = array();
}
if(isset($arrays) && Count($arrays)>0){
	for($i=0;$i<Count($arrays);$i++){

?>

<li><a href="<?php echo $arrays[$i][0] ?>" target="_blank" title="<?php echo $arrays[$i][1] ?>"><?php echo $arrays[$i][1] ?></a></li>
<?php
}
}
?>
<div style="clear:both;"></div>
</ul>
</div>

<!--{template footer}-->
</body>
</html>

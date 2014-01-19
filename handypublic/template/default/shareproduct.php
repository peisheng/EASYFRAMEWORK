<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>$page_title</title>
<meta name="keywords" content="$page_keyword" />
<meta name="description" content="$page_discription" />
<link rel="Shortcut Icon" href="$sitetitleurl/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--{template headerjs}-->
<SCRIPT type=text/javascript charset=UTF-8 src="js/jquery.easing.1.3.js"></SCRIPT>
<SCRIPT type=text/javascript charset=UTF-8 src="js/jquery.vgrid.0.1.2-mod.js"></SCRIPT>
</head>
<body>
<center>
<!--{if $likes==1}-->
感谢您的投票！
<script language="javascript">
		//parent.location.reload();
		//setTimeout(close, "1000");
		
		//function close(){
			art.dialog({id: 'add'}).close();
		//}
</script>
<!--{eval exit();}-->
<!--{/if}-->
<!--{template header}-->





<div class="share_arc" id="list">                                                                       
<div class="share01"><ul>

<!--{loop $cate_list $k $v}-->
<li><a href="$v[url]">$v[name]</a></li>
<!--{/loop}-->

</ul>
<div class="clear"></div>
</div>

<div class="arc_share02"><dl><dt><img src="images/tg_ico01.jpg"/></dt>
<dd class="dd01"><ul><li class="li01"><p><b>$procontent[usernick] </b> 分享宝贝 <font>#$procontent[name]#</font> 宝贝 <font>$count[count]</font><input type="image" onclick="var myDialog = art.dialog();jQuery.ajax({url: '{$TaoConfig[rootroad]}/shareproduct.php?id=$procontent[id]&likes=1',success: function (data) {myDialog.content(data); }});" src="images/ico6.png"  width="65" height="27"/></p><span><!--{eval echo date("Y-m-d h:m:s",$procontent["add_time"])}--></span><div class="clear"></div></li>
<li class="li02">
<a href="#tafenxiang">Ta的宝贝</a> <div class="bshare-custom">
<a title="分享到" href="http://www.bShare.cn/" id="bshare-shareto" class="bshare-more">分享到</a>
<a title="分享到QQ空间" class="bshare-qzone">QQ空间</a>
<a title="分享到新浪微博" class="bshare-sinaminiblog">新浪微博</a>
<a title="分享到人人网" class="bshare-renren">人人网</a>
<a title="分享到腾讯微博" class="bshare-qqmb">腾讯微博</a>
<a title="分享到豆瓣" class="bshare-douban">豆瓣</a>
<a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>
<span class="BSHARE_COUNT bshare-share-count">0</span></div>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script></li></ul></dd>
<dd class="dd02"><ul>
    <li class="li01">收到的喜欢    </li>
    <li class="li02">$procontent[likes]</li></ul></dd>
</dl>
<div class="clear"></div>
</div>

<div class="share_arc02">
<div class="share_arc02_l">
<div class="share_arc02_l01">

<dl><dt><font class="titlewidth">$procontent[title] </font>     <b>￥$procontent[price]元</b><span></span><a href="$procontent[pai_url]" data-itemid="$procontent[tao_iid]" data-rd="1" $v[rel] target="_blank"><img src="images/share_ico23.jpg"/></a> <span class="li02">
  
</span></dt>
<dd>

<!--{eval setPic($procontent["bimg"],588,0,strip_tags($procontent["title"])) }-->

</dd>
</dl>

</div>

<div class="clear"></div>
<div class="share_arc02_l02">
  <p><strong><a style="cursor:hand" onclick="var myDialog = art.dialog();jQuery.ajax({url: '{$TaoConfig[rootroad]}/shareproduct.php?id=$procontent[id]&likes=1',success: function (data) {myDialog.content(data); }});">我喜欢</a></strong></p><span>$procontent[likes]</span><img src="images/ico11.png"/></div>

<div class="clear"></div>



<!--{if false}-->
<div class="share_arc02_l03"><dl>
<dt><ul>
<li class="li01"><img src="images/tg_ico01.jpg"/></li>
<li class="li02"><b>OL潮流衣社</b><br />好可爱的动物摆件饰品 </li>
<li class="li03">12月25日  16:24</li>

</ul><div class="clear"></div></dt>
<dd class="dd01"><textarea>亲，登陆后才可以评论哦！   登陆|注册</textarea></dd>
<dd class="dd02"><ul><li class="li01">添加表情</li><li class="li02">发布评论</li></ul></dd>
<div class="clear"></div>
</dl></div>
<!--{/if}-->

</div>

<div class="share_arc02_r"><dl>
<dt>猜你喜欢的其他宝贝</dt>
<dd><ul>
<!--{loop $share_list4 $k $v}-->
<li><a href="$v[url]" target="$v[target]">
          <!--{eval setPic($v["bimg"]."_160x160.jpg",120,120,strip_tags($v["title"])) }-->
          </a></li>
<!--{/loop}-->
</ul></dd>
</dl>
<img src="images/share_ico19.jpg"/>
</div>


<div class="clear"></div>
</div>


<div class="clear"></div>
<SCRIPT type=text/javascript>
//<![CDATA[
if (! window.console) window.console = { log: function(){} }; //avoid error
$(function(){
	$(window).load(function(e){ 
		var vg = $("#grid-wrapper").vgrid({
		easeing: "easeOutQuint",
		time: 400,
		delay: 40,
		selRefGrid: "#grid-wrapper div.x1",
		selFitWidth: ["#container", "#slide-wrapper", "#footer"],
		gridDefWidth: 290 + 15 + 15 + 5,
		forceAnim: 1 });
		
		setTimeout(function(){ 
			// prevent flicker in grid area - see also style.css
			$("#grid-wrapper").css("paddingTop", "0px");
		}, 1000);
	});
	
	
});
//]]>

 

 

</SCRIPT>

<div class="share_arc02_l03" style="display:none">

$procontent[info]
</div>


 <div class="share_tab" style="width:auto;">
 <ul class="ul01" style="padding-left:18px">
<li><a href="#"  class="tabactive" name="tafenxiang">ta分享的宝贝</a></li>

</ul></div>
<DIV id=grid-wrapper>


<!--{loop $share_list $k $v}-->

    <!--{if $v[tao_iid]!=""}--> 
    	<div style=" width:234px; height:322px; float:left; overflow:hidden">      
            <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
            
                    <div class="pic01"></div>
                    <div class="pic02">
                    <DIV class="grid-image" style="height:210px;"><a href="$v[pai_url]" data-rd="1" data-itemid="$v[tao_iid]" $v[rel] target="$v[target]">
                          <!--{eval setPic($v["img"],200,200,strip_tags($v["title"])) }-->
                          </a></DIV>
                    <div><a href="$v[pai_url]" data-itemid="$v[tao_iid]" $v[rel] data-rd="1" target="$v[target]">$v["title"]</a></div>
                    <div class="pic04"><ul><li class="li01">￥$v["price"]<span></span></li></ul></div>
                    <div class="clear"></div>
                    </div>

            </a>
        </div>
    <!--{else}-->
       <div style=" width:234px; height:322px; float:left; overflow:hidden">      
        <div class="pic01"></div>
        <div class="pic02">
        <DIV class="grid-image" style="height:200px;"><a href="$v[pai_url]" data-rd="1" data-itemid="$v[tao_iid]" $v[rel] target="$v[target]">
              <!--{eval setPic($v["img"],200,200,strip_tags($v["title"])) }-->
              </a></DIV>
        <div><a href="$v[pai_url]" data-itemid="$v[tao_iid]" $v[rel] data-rd="1" target="$v[target]">$v["title"]</a></div>
        <div class="pic04"><ul><li class="li01">喜欢<span>$v["likes"]</span></li></ul></div>
        <div class="clear"></div>
        </div>
      </div>
    
    <!--{/if}--> 
<!--{/loop}-->

</DIV>

</div>
  <script language="javascript">seturl_LazyLoad('list');</script>

  <!--{template footer}-->

</center>
</body>
</html>
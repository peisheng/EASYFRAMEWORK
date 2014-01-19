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

</head>
<body>
<center>
<!--{template header}-->



<div id="list">
  <div class="one">
    <div class="one1">
    <div class="one2">热门导航</div>
            <!--{eval $DaohangArr = GetArrDaohang("cidaohang");}--><!--这一行是用来调用主导航的-->
            <!--{loop $DaohangArr $k $v}-->
		    <div class="one3"><a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a></div>
                <!--{loop $v[SubDaohangArr] $key2 $value2}-->
                <div class="one3b"><a href="$value2[url]" target="$value2[target]" style="color:$v[color]">$value2[typename]</a></div>
                <!--{/loop}-->
            
            <!--{/loop}-->
	  </div>
      <div class="one4" style="padding-bottom:5px;">
	  	  <div class="one5" style="margin-bottom:5px;">相关文章</div>
          
		  
          <!--{eval $NewsArr = GetArrArticle(0,10,1,1,0,"add_time");}--> 
          <!--{loop $NewsArr $k $v}-->
          <div class="ny"><a href="$v[url]" target="_blank">&middot;{$v[title]}</a></div>
          <!--{/loop}-->
          
	  </div>
    </div>
  <div id="pingjiacontent" class="two">
	   <div class="two1">
		  
		   <div class="two3" style="width:auto;margin-left:10px">当前位置:首页 > $TaoapiCat[name] > $vpro[title]</div>
	   </div>
	   <div class="sp9_product">
       
       <dl class="shop_cont02"><dt><b>$vpro[title]</b></dt>
       <dd class="dd01"><a href="$vpro[url]" {$vpro[click_url_base64]} target="$vpro[target]">
          <!--{eval setPic($vpro["pic_url"],300,300,strip_tags($vpro["title"])) }-->
          </a></dd>
       <dd class="dd02"><ul>
       <li>一 口 价：<b> $vpro[price]</b> 元    </li>
       <li>卖家：$vpro[seller_name]</li>
        <li>售后服务：无条件退款</li>
        <li>货到付款：$cash_ondelivery;
        <li>是否包邮：$freeshipment;
        <li>分期付款：$installment;
        <li>提供发票：$has_invoice;
        <li>快捷链接: $keywordStr
       <li style="line-height:35px;">
       <a href="{$vpro[click_url_base64]}" rel='nofollow' target="_blank" >
       <img src="images/shop_con05.jpg" hspace="10" align="absmiddle"/></a><a href="{$vpro[shop_click_url_base64]}" rel='nofollow' target="_blank" ><img style=" margin-left:10px;" src="images/shop_con06.jpg" align="absmiddle"/>
       </a>
       </li>
       <li><div class="bshare-custom">
<a title="分享到" href="http://www.bShare.cn/" id="bshare-shareto" class="bshare-more">分享到</a>
<a title="分享到QQ空间" class="bshare-qzone">QQ空间</a>
<a title="分享到新浪微博" class="bshare-sinaminiblog">新浪微博</a>
<a title="分享到人人网" class="bshare-renren">人人网</a>
<a title="分享到腾讯微博" class="bshare-qqmb">腾讯微博</a>
<a title="分享到豆瓣" class="bshare-douban">豆瓣</a>
<a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>
<span class="BSHARE_COUNT bshare-share-count">0</span></div>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script></li>
       </ul></dd>
       </dl>
	     <div class="clear"></div>

        <div id="pingjia_shop" class="shop_pj">
            <div class="ul01" rel='tb-btn'>
                <div rel='btn' class="on"><a href="javascript::">商品介绍</a></div>
            </div>
            <div rel='tb-box' class="tb_content" >
                {$vpro[desc]}
            </div>
            
         </div>
         <div class="clear"></div>
         
         <div class="sp_shop10" id="listpro"><dl>
 <dt><p>精品推荐</p></dt>
 <dd>
 		
      <!--{eval $tuijian = GetArrByValue(array("typeid"=>"5"),array("vcate_id"=>$vpro[cid],"page_size"=>"8","sort"=>""));}--> 
      <!--{loop $tuijian $k $v}-->
     <ul>
         <li><a href="$v[url]" $v[rel]  target="$v[target]">
          <!--{eval setPic($v["pic_url"]."_160x160.jpg",134,134,strip_tags($v["title"])) }-->
          </a></li>
         <li style="height:38px; overflow:hidden;"><a href="$v[url]" $v[rel]  target="$v[target]">$v[title]</a></li>
         <li class="li03"><a href="$v[url]" $v[rel]  target="$v[target]"><img src="images/ico4.png"  width="62" height="27"/></a></li>
         <li class="li04">淘宝价：<span>$v[price]￥</span></li>
         <li class="li05">信誉：：<span><img src="$rootroad/img/level/level_{$v[seller_credit_score]}.gif" align="absmiddle" alt="信誉度"> </span></li>
     </ul>
      <!--{/loop}-->
      
   <script language="javascript">seturl_LazyLoad('list');</script>

 <div class="clear"></div>
 </dd>
 </dl></div>
 
 
           </div>
    </div>
</div>

  <!--{template footer}-->
</center>
</body>
</html>
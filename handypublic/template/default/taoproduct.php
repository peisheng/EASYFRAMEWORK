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
  
  <div class="shop_cont">
  <dl><dt>$TaoShop[title]</dt>
  <dd class="dd01"><a href="#" {$vpro[shop_click_url_base64]} ><!--{eval setPic($TaoShop["pic_path"],80,80,strip_tags($TaoShop["shop_title"])) }--></a></dd>
  <div class="clear"></div>
  <dd class="dd02"><ul>
  <li>掌柜名称：$TaoShop[nick]</li>
  <li>店铺信誉：<img src="$rootroad/img/level/level_{$vpro[seller_credit_score]}.gif" align="absmiddle" alt="信誉度"></li>
  <li>创店时间：$TaoShop[created] </li>
  <li><b>店铺动态评分</b></li>
  <li>宝贝与描述相符：<img src="images/shop_con03.jpg" alt="$TaoShop[item_score]分"  title="$TaoShop[shop_score][item_score]分"/></li>
  <li>卖家的服务态度：<img src="images/shop_con04.jpg" alt="$TaoShop[item_score]分"  title="$TaoShop[shop_score][service_score]分"/></li>
  <li>卖家发货的速度：<img src="images/shop_con07.jpg" alt="$TaoShop[item_score]分"  title="$TaoShop[shop_score][delivery_score]分"/></li>

  <li class="li01"><a href="{$vpro[shop_click_url_base64]}" rel='nofollow' ><img src="images/shop_con08.jpg"/></a></li>
  </ul></dd>
  </dl>
  </div>
  
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
       <dd class="dd01"><a href="{$vpro[click_url_base64]}" rel='nofollow' target="_blank">
          <!--{eval setPic($vpro["pic_url"]."_300x300.jpg",300,300,strip_tags($vpro["title"])) }-->
          </a></dd>
       <dd class="dd02"><ul>
       <li>一 口 价：<b> <!--{eval echo $vpro[coupon_price]==""?"￥".$vpro[price]:"<s>&yen;".$vpro[price]."</s>" }--></b> 元   
       
       <!--{eval echo $vpro[coupon_price]==""?"":" 折扣价：<b>￥".$vpro[coupon_price]."</b>元" }-->
       
        </li>
       <li>卖家：$vpro[nick]</li>
	   <li>30天销量：$vpro[volume]件</li>
       <li>运费承担：<!--{if $vpro[freight_payer]==seller}-->卖家承担运费<!--{else}-->ems:$vpro[ems_fee] 平邮:$vpro[post_fee] 快递:$vpro[express_fee]<!--{/if}--></li>
	   <li>库存数量：$vpro[num] 件</li>
	   <li>上架时间 ：$vpro[list_time]</li>
	   <li>下架时间 ：$vpro[delist_time]</li>
       <li>所在地区：$vpro[location][city]  <!--{if $vpro[location][city]!=$vpro[location][state]}-->$vpro[location][state] <!--{/if}--></li>
       <li>
       提供发票：
       <!--{if $vpro[has_invoice]==true}-->
       <strong>是</strong>
       <!--{else}-->否<!--{/if}--> 
       是否保修：
       <!--{if $vpro[has_warranty]==true}-->
       <strong>是</strong>
       <!--{else}-->否<!--{/if}-->
       会员打折：
       <!--{if $vpro[has_discount]==true}-->
       <strong>是</strong>
       <!--{else}-->否<!--{/if}--></li>
       <li style="line-height:35px;">
       <a href="{$vpro[click_url_base64]}" rel='nofollow' target="_blank" ><img src="images/shop_con05.jpg" hspace="10" align="absmiddle"/></a><a href="{$vpro[shop_click_url_base64]}" rel='nofollow' target="_blank" ><img style=" margin-left:10px;" src="images/shop_con06.jpg" align="absmiddle"/>
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
         
         <div class="sp_shop10"><dl>
 <dt><p>精品推荐</p></dt>
 <dd>
 		
      <!--{eval $tuijian = GetArrByValue(array("typeid"=>"10"),array("num_iid"=>$param[item_id],"relate_type"=>1,"max_count"=>"8","sort"=>"commissionNum_desc"));}--> 
      <!--{loop $tuijian $k $v}-->
     <ul>
         <li><a href="$v[url]" $v[rel]  target="$v[target]">
          <!--{eval setPic($v["pic_url"]."_160x160.jpg",134,134,strip_tags($v["title"])) }-->
          </a></li>
         <li><a href="$v[url]" $v[rel]  target="$v[target]">$v[title]</a></li>
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
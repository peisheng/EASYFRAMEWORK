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
       		
            <!--{loop $article_cate_list['parent'] $k $v}-->
		    <div class="one3"><a href="$v[url]">$v[name]</a></div>
            	<!--{loop $article_cate_list['sub'][$k] $k2 $v2}-->
		    		<div class="one3b"><a href="$v2[url]">$v2[name]</a></div>
                <!--{/loop}-->
            <!--{/loop}-->
            
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
          
		  
          <!--{eval $NewsArr = GetArrArticle($article[cate_id],10,1,1,0,"add_time");}--> 
          <!--{loop $NewsArr $k $v}-->
          <div class="ny"><a href="$v[url]" target="_blank">&middot;{$v[title]}</a></div>
          <!--{/loop}-->
          
	  </div>
      
  </div>
   <div class="two">
	   <div class="two1">
		   <div class="two2">文章列表</div>
		   <div class="two3">当前位置:首页 &gt; 文章列表 &gt; $article[cate][name]</div>
	   </div>
	   
	    <div class="ny1">$article[title] </div>
		<div class="ny2">
			<div class="ny3">作者：$article[orig]    发布时间：$article[add_time]  </div>
			<div class="ny4">  字体：<span style="color:#d10000;">T</span>|<span style=" font-size:15px;">T </span> </div>
		</div>
		
		<div class="ny5">$article[info]</div>         
		<div class="ny6">
		  <div class="ny8">
		    
  <div class="bshare-custom">
<a title="分享到" href="http://www.bShare.cn/" id="bshare-shareto" class="bshare-more">分享到</a>
<a title="分享到QQ空间" class="bshare-qzone">QQ空间</a>
<a title="分享到新浪微博" class="bshare-sinaminiblog">新浪微博</a>
<a title="分享到人人网" class="bshare-renren">人人网</a>
<a title="分享到腾讯微博" class="bshare-qqmb">腾讯微博</a>
<a title="分享到豆瓣" class="bshare-douban">豆瓣</a>
<a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>
<span class="BSHARE_COUNT bshare-share-count">0</span></div>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>            
          </div>
		 </div>		
		<div class="ny9">
        
			 <div class="ny10">上一篇：<a href="$article[prev_one][0][url]">$article[prev_one][0][title]</a></div>
			 <div class="ny10">下一篇：<a href="$article[next_one][0][url]">$article[next_one][0][title]</a></div>
              
		 </div>
	    <div class="ny11">推荐商品</div>
	    <div class="ny12">

        
		       <center>
       
       <a data-type="2" data-keyword="($article[keyword]==""?$CustomSetFieldValue[ProArticleproKeyword]:$article[keyword])" data-tmpl="628x270" data-tmplid="14" data-rd="1" data-style="2" href="#"></a>
       <br /><br /><br /><br />
       </center>

	</div>

        <script language="javascript">seturl_LazyLoad('list');</script>
	  
   </div>
</div>
 
  <!--{template footer}-->

</center>
</body>
</html>
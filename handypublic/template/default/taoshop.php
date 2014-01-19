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
	  <div class="one4">
      
      <!--{eval $dazhelists = GetArrByValue(array("typeid"=>"2","keyword"=>$cates_now[keyword],"page_size"=>"5","sort"=>"volume_desc"));}--> 
      <!--{eval $dazhelists_link = GetDaohangUrl(array("typeid"=>"2","keyword"=>$cates_now[keyword],"page_size"=>"5","sort"=>"volume_desc"));}-->
	  	  <div class="one5">推荐商品<span style="font-size:12px; padding-left:100px; font-family:'宋体';"><a href="$dazhelists_link">更多>></a></span></div>

      <!--{loop $dazhelists $k $v}-->
      <div class="one6">
			  <div class="one7">
			    <a href="$v[url]" $v[rel]  target="$v[target]"><!--{eval setPic($v["pic_url"]."_80x80.jpg",70,70,strip_tags($v["title"])) }--></a>
	  </div>
			  <div class="one8"><span style="color:#ff4400; font-family:'微软雅黑'; font-size:13px;"><a href="$v[url]" $v[rel]  target="$v[target]">$v[title]</a></div>
		  </div>
      <!--{/loop}-->

		  <div class="one9" style="display:none"><img src="images/ico38.jpg"  style="margin-right:3px;"/><img src="images/ico39.jpg" /></div>
	  </div>
  
  </div>
   <div class="two">
	   <div class="two1">
		   <div class="two2">店铺列表</div>
		   <div class="two3">当前位置:首页 > 店铺列表 > $nowCat[name] > $nowCat[keyword]</div>
	   </div>
       
      <!--{loop $taoshopitems $k $v}-->
     <div class="two4">
		   <div class="two5"><a href="$v[click_url_base64]" target="_blank" rel='nofollow'>&middot;{$v[shop_title]}</a>
       </div>
		   <div class="two6"><img src="$rootroad/img/level/level_{$v[seller_credit]}.gif" align="absmiddle" alt="信誉度"></div>
		   
	   </div>
      <!--{/loop}-->
	   
       
       <div class="page">
       		<ul class="page3">
              $pagestr
			</ul>
       </div>
       
   </div>
</div>
  <script language="javascript">seturl_LazyLoad('list');</script>

  <!--{template footer}-->

</center>
</body>
</html>
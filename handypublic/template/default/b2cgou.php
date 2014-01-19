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
      <!--{if $TaoConfig[DB_OPEN] }-->
      
      <div class="one4" style="padding-bottom:5px;">
	  	  <div class="one5" style="margin-bottom:5px;">相关文章</div>
          
		  
          <!--{eval $NewsArr = GetArrArticle(0,$CustomSetFieldValue[ProListArtNum],1,1,0,"add_time");}--> 
          <!--{loop $NewsArr $k $v}-->
          <div class="ny"><a href="$v[url]" target="_blank">&middot;{$v[title]}</a></div>
          <!--{/loop}-->
          
	  </div>
      
<!--{/if}-->      
    <div style="height:10px; width:20px; clear:both"></div>
<!--{ad/B2Cleft}-->
    </div>
  
  
  <div class="two">
	   <div class="two1">
		   <div class="two2">商城热卖商品列表</div>
		   <div class="two3">当前位置:首页 
           <!--{if $param[keyword]!="" }--> > $param[keyword] <!--{/if}-->
           <!--{if $TaoapiCat[name]!="" }-->  > $TaoapiCat[name]<!--{/if}-->
           </div>
	   </div>
	   <div class="sp">
	   
     <!--{if $CustomSetFieldValue[ProListSmalltypeKG] != close}--> 
     <!--{if $category}--> 
	 <div class="sp1">  <span style="font-weight:bold;">商品分类：</span>
          <!--{loop $category $k $v}-->
     		<a href="$v[url]" <!--{if $v[class]}-->class="ac" style="color:#FFF" <!--{/if}-->>$v[category_name]</a>
          <!--{/loop}-->
     </div>
     <!--{/if}-->
     
     <!--{if $seller}--> 
     <div class="sp2"><a href="#" style="font-weight:bold;">商城列表：</a>
         <!--{loop $seller $k $v}-->
     <a href="$v[url]" <!--{if $v[class]}-->class="ac" style="color:#FFF" <!--{/if}-->>$v[seller_name]</a>
          <!--{/loop}-->
     </div>
     <!--{/if}-->
     <!--{/if}-->
     
      <!--{if $CustomSetFieldValue[ProListSmallSortKG] != close}--> 
     <!--{if $arr_sort}--> 
       <div class="sp2">
       <a href="#" style="font-weight:bold;">排序结果：</a>
          <!--{loop $arr_sort $k $v}-->
          <!--{eval if($v["class"]=="on"){$css = 'class="ac" style="color:#FFF"';}else{$css = "";} }-->
         <a href="$v[url]" $css >$v[title]</a>
          <!--{/loop}-->
       
       </div>   
     <!--{/if}-->
     <!--{/if}-->
       
       </div>

	   <div class="sp6">
			<div class="sp7">热门搜索：
            <!--{eval $DaohangArr = GetArrDaohang("keyword");}--><!--这一行是用来调用热门搜索导航的-->
            <!--{loop $DaohangArr $k $v}-->
		    <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a>
            <!--{/loop}-->
            
             </div>	
			<div class="sp8">
            <!--{eval $url1 = GetDaohangUrl(array(),array_merge($param,array("showtype"=>"2")));}-->
            <!--{eval $url2 = GetDaohangUrl(array(),array_merge($param,array("showtype"=>"1")));}-->
            <a href="$url1"><img src="images/ico46.jpg"  style="margin-right:5px;" /></a>
            <a href="$url2"><img src="images/ico47.jpg"  /></a></div>   
	   </div>
	   <!--{if $param[showtype]!="1"}-->
            <!--{loop $taobaokeB2c $k $v}-->
     		
           <div class="sp9">
               <div class="sp10"><dl>
               <dt><a href="$v[url]" $v[rel] target="$v[target]">
          <!--{eval setPic($v["pic_url"]."_100x100.jpg",100,100,strip_tags($v["title"])) }-->
          </a></dt>
               <dd class="dd01"><ul><li class="li01">
               <a href="$v[url]" $v[rel] target="$v[target]">$v[title]</a>
               </li>
               <li class="li02"><img src="$rootroad/img/level/level_0.gif" align="absmiddle" alt="信誉度"></li>
               <li class="li03">卖家:$v[nick]</li>
               </ul></dd>
               <dd class="dd02"><ul>
               <li class="li01"><span>优惠价：￥$v[price]元</span></li>

            <!--{eval $bijiaUrl = GetDaohangUrl(array("keyword"=>$v[title]));}-->
               <li class="li02"><a href="$bijiaUrl"><img src="images/ico51.jpg"/></a><a href="$v[url]" $v[rel] target="$v[target]"><img src="images/gomall.gif"/></a></li>
               </ul></dd>
               </dl><div class="clear"></div></div>
           </div>
          <!--{/loop}-->
       <!--{else}-->
       <div class="sp9">
                   
                   <div class="sp_two">
            <!--{loop $taobaokeB2c $k $v}-->
                   
                   <dl>
                   <dt><a href="$v[url]" target="$v[target]">
          <!--{eval setPic($v["pic_url"]."_160x160.jpg",160,160,strip_tags($v["title"])) }-->
          </a></dt>
                   <dd class="dd01"><a href="$v[url]" $v[rel] target="$v[target]">$v[title]</a></dd>
                   <dd class="dd02">卖家信用：<img src="$rootroad/img/level/level_{$v[seller_credit_score]}.gif" align="absmiddle" alt="信誉度"></dd>
                   <dd class="dd01">卖家昵称:$v[nick]</dd>
                   <dd class="dd01">优惠价：<s>$v[price]</s>元</dd>
                   <dd class="dd03"><a href="$v[url]" $v[rel] target="$v[target]"><img src="images/gomall.gif"/></a></dd>
                   </dl>
              <!--{/loop}-->
                   
                   </div>
                   
                   <div class="clear"></div>
       
               </div>	
       <!--{/if}-->
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
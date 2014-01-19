<!DOCTYPE html>
<html>
<head>
<meta charset="gb2312" />
<!--{template headerjs}-->
<title>$page_title</title>
<meta name="keywords" content="$page_keyword" />
<meta name="description" content="$page_discription" />
<link rel="Shortcut Icon" href="$sitetitleurl/favicon.ico">
<link rel="stylesheet" href="images/style.css" />
<link rel="stylesheet" href="images/er_info.css" />
<!--www.cnmysoft.com -->
</head>
<body>
<!--{template header}-->


<div class="a_b" id="list">
    <div class="info_lf">
    <!--{template left}-->
		
		<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

		
		<div class="balbo">
        
        <!--{ad/paileft}-->

        
	</div>
</div>
	<div class="info_rt">
	    <div class="in_weizi"><strong>您的位置：</strong> <a href="$rootroad/" class="hom">首页</a> 
           <!--{if $param[keyword]!="" }--> > $param[keyword] <!--{/if}-->
           <!--{if $TaoapiCat[name]!="" }-->  > $TaoapiCat[name]<!--{/if}-->
		</div>
		<div class="in_fen">
        
     <!--{if $CustomSetFieldValue[ProListSmalltypeKG] != 'close'}--> 
     <!--{if $TaoapiSubCats}--> 
          <ul>      
                <li><a href="#"><strong>商品分类：</strong></a></li> 
                  <!--{loop $TaoapiSubCats $k $v}-->
                    <li><a href="$v[url]">$v[name]</a></li>
                  <!--{/loop}-->
          </ul>  
     <!--{/if}-->
     <!--{/if}-->
     
      <!--{if $seller}--> 
          <ul> 		
                <li><a href="#"><strong>商城列表：</strong></a></li>
          <!--{loop $seller $k $v}-->
                <li><a href="$v[url]" <!--{if $v[class]}--> class="cs" <!--{/if}--> >$v[seller_name]</a></li>
          <!--{/loop}-->
          </ul> 
     <!--{/if}-->

      <!--{if $CustomSetFieldValue[ProListSmallSortKG] != 'close'}--> 
     
     <!--{if $arr_sort}--> 
          <ul> 		
                <li><a href="#"><strong>排序结果：</strong></a></li>
          <!--{loop $arr_sort $k $v}-->
                <li><a href="$v[url]" <!--{if $v[class]}--> class="cs" <!--{/if}--> >$v[title]</a></li>
          <!--{/loop}-->
          </ul> 
     <!--{/if}-->
     <!--{/if}-->
        
        </div>
		
		<div class="list_tlt">
		    <div class="lfred">在商城里搜索相关商品 $totalResults 件</div>
		</div>
		<ul class="in_li">


            <!--{loop $taobaokeItem $k $v}-->

		    <li>
			    <span class="ig"><a href="$v[url]" rel='nofollow' target="$v[target]">
          <!--{eval setPic($v["pic_url"]."_220x220.jpg",180,180,strip_tags($v["title"])) }-->
          </a></span>
				<span class="ijg"><span>商城价：$v[price]元</span>  </span>
				<span class="it"><a href="$v[url]"  $v[rel] target="$v[target]">$v[title]</a></span>
				<span class="it"><a href="#" class="volumn"><font color="#FF0000">已售:$v[volume]件</font></a><dl>&nbsp;&nbsp;掌柜:</dl><u>$v[nick]</u></span>
				<div class="clear"><img src="images/s.gif" alt="分割线" /></div>
                <span class="ix">卖家信用：<img src="images/level_{$v["seller_credit_score"]}.gif" alt="信誉度"></span>				
				<span class="ian"><a href="$v[click_url_base64]" target="$v[target]"  rel="nofollow" ><img src="images/qgm.gif"/></a></span>
			</li>
              <!--{/loop}-->


		</ul>
        
<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>
        
		<div class="pages" style="clear:both">
            $pagestr
        </div>
        


</div>


 <script language="javascript">seturl_LazyLoad('list');</script>

</div>
        



<!--{template teyue}-->

<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

<!--{template footer}-->

</body>
</html>

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
        
           $cates_now[name]
		</div>
		<div class="in_fen">
        
            <!--{loop $article_cate_list['parent'] $k $v}-->
          <ul>      
                <li><a href="$v[url]"><strong>$v[name]：</strong></a></li> 
            	<!--{loop $article_cate_list['sub'][$k] $k2 $v2}-->
                    <li><a href="$v2[url]">$v2[name]</a></li>
                  <!--{/loop}-->
          </ul>  


            <!--{/loop}-->
        
        
        
        </div>
		
		<ul class="tx_list">
        

      		<!--{loop $article_list $k $v}-->
		    <li>
			   <div><img src="images/r_j_ico.gif" alt="HOT"/> <a href="$v[url]" target="_blank">&middot;{$v[title]}</a><!--{if ($v[is_hot]|| $v[is_best]) }-->
           <img src="images/ico3.png" alt="HOT"  width="25" height="9"/>
           <!--{/if}--></div><span>[<!--{eval echo date('Y-m-d',strtotime($v['add_time']))}-->]</span>
			</li>
            <!--{/loop}-->

        
			
		</ul>
        
<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>
		<div class="pages" style="clear:both">
            $pagestr
        </div>
        
    <div style="clear:both"></div>
       <center>
       
       <a data-type="2" data-keyword="<!--{eval echo ($cates_now[keyword]==""?$CustomSetFieldValue[ProListproKeyword]:$cates_now[keyword])}-->" data-tmpl="628x270" data-tmplid="14" data-rd="1" data-style="2" href="#"></a>
       <br /><br /><br /><br />
       </center>


</div>


 <script language="javascript">seturl_LazyLoad('list');</script>

</div>
        



<!--{template teyue}-->

<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

<!--{template footer}-->

</body>
</html>

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
        
<table width="95%" border="0" align="center" cellpadding="5" cellspacing="5">
                  <tr>
                    <td align="center"><span class="ny1">$article[title] </span></td>
            </tr>
                  <tr>
                    <td align="right"><span class="ny3">作者：$article[orig]    发布时间：$article[add_time] </span></td>
            </tr>
                  <tr>
                    <td align="left"><span class="ny5">$article[info]</span></td>
        </tr>
                  <tr>
                    <td align="left">&nbsp;</td>
        </tr>
                  <tr>
                    <td align="left">上一篇：<a href="$article[prev_one][0][url]">$article[prev_one][0][title]</a><br />
                        下一篇：<a href="$article[next_one][0][url]">$article[next_one][0][title]</a>
    &nbsp;</td>
        </tr>
          </table>
		       <center>
       
       <a data-type="2" data-keyword="($article[keyword]==""?$CustomSetFieldValue[ProArticleproKeyword]:$article[keyword])" data-tmpl="628x270" data-tmplid="14" data-rd="1" data-style="2" href="#"></a>
       <br /><br /><br /><br />
       </center>
	  </ul>
        

        


</div>


 <script language="javascript">seturl_LazyLoad('list');</script>

</div>
        



<!--{template teyue}-->

<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

<!--{template footer}-->

</body>
</html>

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
		
		<div class="clear pd8"><img src="images/s.gif" alt="�ָ���" /></div>

		
		<div class="balbo">
        
        <!--{ad/paileft}-->

        
	</div>
</div>
	<div class="info_rt">
	    <div class="in_weizi"><strong>����λ�ã�</strong> <a href="$rootroad/" class="hom">��ҳ</a> 
        
           <!--{if $param[keyword]!="" }--> > $param[keyword] <!--{/if}-->
           <!--{if $catename!="" }-->  > $catename<!--{/if}-->
		</div>
		<div class="in_fen">
        
     <!--{if $TaoapiSubCats}--> 
          <ul>      
                <li><a href="#"><strong>��Ʒ���ࣺ</strong></a></li> 
                  <!--{loop $TaoapiSubCats $k $v}-->
                    <li><a href="$v[url]">$v[name]</a></li>
                  <!--{/loop}-->
          </ul>  
     <!--{/if}-->
          <ul> 		
                <li><a href="#"><strong>��������</strong></a></li>
          <!--{loop $arr_sort $k $v}-->
                <li><a href="$v[url]" <!--{if $v[class]}--> class="cs" <!--{/if}--> >$v[title]</a></li>
          <!--{/loop}-->
     
         <!--{eval if($param["sort"]=="likes"){
            $likescss = "cs";
         }else{
            $urllikes = "cs";
         }
         }-->

<li><a href="$url_new" class="$urllikes" >���±���</a></li>
<li><a href="$url_likes" class="$likescss" >���ȱ���</a></li>
          </ul> 

        
        </div>
		
		<div class="list_tlt">
		    <div class="lfred">��վ�������������Ʒ $totalResults ��</div>
		</div>
		<ul class="in_li">


            <!--{loop $taobaokeItem $k $v}-->
                   <div style=" width:234px; height:322px; float:left; margin-left:20px;">
                    <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
                    	$v[title] <br />  �� $v[price]
                    </a>
                   </div>
              <!--{/loop}-->
		</ul>


        
<div class="clear pd8"><img src="images/s.gif" alt="�ָ���" /></div>
        
		<div class="pages" style="clear:both">
            $pagestr
        </div>
        


</div>


 <script language="javascript">seturl_LazyLoad('list');</script>

</div>
        



<!--{template teyue}-->

<div class="clear pd8"><img src="images/s.gif" alt="�ָ���" /></div>

<!--{template footer}-->

</body>
</html>

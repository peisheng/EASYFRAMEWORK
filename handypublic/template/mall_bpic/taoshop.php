
    
    <?PHP
if (!defined('VERSON'))
{
	exit('Access Defined');
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="gb2312" />
<!--{template headerjs}-->

<title><?php echo $page_title ?></title>
<meta name="keywords" content="<?php echo $page_keyword ?>" />
<meta name="description" content="<?php echo $page_discription ?>" />
<link rel="stylesheet" href="images/style.css" />
<link rel="stylesheet" href="images/er_info.css" />
<!--www.cnmysoft.com -->
</head>
<body>
<!--{template header}-->


<div class="a_b" id="listpro">
    <div class="info_lf">
<!--{template left}-->
		
		<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

		
		<div class="balbo">
        
        <!--{ad/paileft}-->

        
</div>
		
	</div>
	<div class="info_rt">

	    <div class="in_weizi"><strong>您的位置：</strong> <a href="$rootroad/" class="hom">首页</a> 
        
 > $nowCat[name] > $param[keyword] 		</div>

<ul class="tx_list">

      <!--{loop $taoshopitems $k $v}-->
        

            <li>
			    <div><a href="$v[click_url_base64]" target="_blank" rel='nofollow'>&middot;{$v[shop_title]}</a></div>
                <span><img src="$rootroad/img/level/level_{$v[seller_credit]}.gif" align="absmiddle" alt="信誉度"></span>
			</li>

      <!--{/loop}-->
</ul>
<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>
        
		<div class="pages" style="clear:both">
            $pagestr
        </div>
    </div>
    <!-- 列表分页 -->




	</div>
	
</div>


 <script language="javascript">seturl_LazyLoad('listpro');</script>

<!--{template teyue}-->

<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

<!--{template footer}-->

</body>
</html>

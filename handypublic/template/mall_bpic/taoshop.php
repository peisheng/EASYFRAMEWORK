
    
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
		
		<div class="clear pd8"><img src="images/s.gif" alt="�ָ���" /></div>

		
		<div class="balbo">
        
        <!--{ad/paileft}-->

        
</div>
		
	</div>
	<div class="info_rt">

	    <div class="in_weizi"><strong>����λ�ã�</strong> <a href="$rootroad/" class="hom">��ҳ</a> 
        
 > $nowCat[name] > $param[keyword] 		</div>

<ul class="tx_list">

      <!--{loop $taoshopitems $k $v}-->
        

            <li>
			    <div><a href="$v[click_url_base64]" target="_blank" rel='nofollow'>&middot;{$v[shop_title]}</a></div>
                <span><img src="$rootroad/img/level/level_{$v[seller_credit]}.gif" align="absmiddle" alt="������"></span>
			</li>

      <!--{/loop}-->
</ul>
<div class="clear pd8"><img src="images/s.gif" alt="�ָ���" /></div>
        
		<div class="pages" style="clear:both">
            $pagestr
        </div>
    </div>
    <!-- �б��ҳ -->




	</div>
	
</div>


 <script language="javascript">seturl_LazyLoad('listpro');</script>

<!--{template teyue}-->

<div class="clear pd8"><img src="images/s.gif" alt="�ָ���" /></div>

<!--{template footer}-->

</body>
</html>

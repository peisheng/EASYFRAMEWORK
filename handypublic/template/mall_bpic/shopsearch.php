
    
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


<div class="a_b">
    <div class="info_lf">
<!--{template left}-->
		
		<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

		
	</div>
	<div class="info_rt">
	    <div class="in_weizi"><strong>当前位置</strong> <a href="<?php echo $rootroad;?>/" class="hom">首页</a> &#8250; <a href="<?php echo $listurl ?>"><?php echo $cat_name ?><?php echo empty($cat_name)?$q:" > ".$q ?></a></div>
		
		<ul class="tx_list">
        
<?php for($i = 0; $i < count($taobaokeItem); $i++) {

$taousernick = Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]);


		$urlview = " onclick=\"clickurl('".base64_encode($taobaokeItem[$i]["click_url"])."','".$rootroad."'); return false;\"";
	
 ?>


		    <li>
			    <b><?php echo $i;?> |</b><div><a href="<?php echo $taobaokeItem[$i]["click_url"];?>" target="_blank"><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["shop_title"]) ?></a></div><span><img src="<?php echo $rootroad?>/template/<?php echo $templatefolder?>/images/level_<?php echo $taobaokeItem[$i]["seller_credit"] ?>.gif"></span>
			</li>


<?php 
}?>
        
			
		</ul>
		<div class="pages">
<?php 
  $page_size=$pagenumKeys;
  $nums=$totalResults;
  $sub_pages=10;
  $pageCurrent=$page;
  
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,getsearchshopurl($q,$catid,false).($weijingtai?"-":"&page="),2,$weijingtai);
  
  
?></div>
	</div>
	
</div>



<!--{template teyue}-->

<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

<!--{template footer}-->

</body>
</html>

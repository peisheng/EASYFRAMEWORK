<?PHP
if (!defined('VERSON'))
{
	exit('Access Defined');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<!--{template headerjs}-->
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo $page_title ?></title>
<meta name="keywords" content="<?php echo $page_keyword ?>" />
<meta name="description" content="<?php echo $page_discription ?>" />
<link href="css/orange.css" rel="stylesheet" type="text/css" />
<link href="css/orange_list.css" rel="stylesheet" type="text/css" />
<link href="css/orange_shop.css" rel="stylesheet" type="text/css" />
    
<script language="javascript">
function ResizeImage(F,D,G){if(F!=null){imageObject=F}var E=imageObject.readyState;if(E!="complete"){setTimeout("ResizeImage(null,"+D+","+G+")",50);return }var B=new Image();B.src=imageObject.src;var A=B.width;var C=B.height;if(A>D||C>G){a=A/D;b=C/G;if(b>a){a=b}A=A/a;C=C/a}if(A>0&&C>0){imageObject.width=A;imageObject.height=C}}
</script>
</head>
<body>

<!--{template header}-->
<div id="main">

<?php if($result_subcats_count > 0) { ?>
<div class="taodi_right_catalogs">
<ul><div class="clear"></div>
<?php
foreach ($result_subcats as $row){ 

$tpurl = getsearchshopurl($q,$row["cid"]);
?>
<li><a href="<?php echo $tpurl ?>"><?php echo Newiconv("UTF-8","GBK",$row["name"]) ?></a></li>
<?php  } ?>
<div class="clear"></div>
</ul>
</div>
<?php } ?>

<div style="clear:both">
<div style="width:644px; text-align:left; float:left; padding:0px; margin:0px;">
<div>


<div class="taodi_tips">
<div class="listweizhi">����λ��:<a href="<?php echo $rootroad;?>/">��ҳ</a>><a href="<?php echo $listurl ?>"><?php echo $cat_name ?></a></div>
<div class="shuliang">��<span>�Ա���</span>����������<span><?php echo $totalResults ?></span>�ҡ�</div>
</div>

<div class="taodi_listshop">
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3">
<?php for($i = 0; $i < count($taobaokeItem); $i++) {

$taousernick = Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]);


		$urlview = " onclick=\"clickurl('".base64_encode($taobaokeItem[$i]["click_url"])."','".$rootroad."'); return false;\"";
	
 ?>
    <tr>
      <td width="4%" height="25">&nbsp;</td>
      <td width="67%"><a href="javascript:;" <?php echo $urlview?> target="_blank"><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["shop_title"]) ?></a></td>
      <td width="29%"><img src="<?php echo $templateroot;?>/img/orange/level_<?php echo $taobaokeItem[$i]["seller_credit"] ?>.gif"></td>
    </tr>



<?php 
}?>

  </table></div>

<div id="pages"><?php 
  $page_size=$pagenumKeys;
  $nums=$totalResults;
  $sub_pages=10;
  $pageCurrent=$page;
  
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,getsearchshopurl($q,$catid,false).($weijingtai?"-":"&page="),2,$weijingtai);
  
  
?></div>
</div>
</div>
<div style="width:300px; text-align:left; float:left">
<div class="listshop pink">




<?php
include($WEBROOT_TEMP."right.php");
?>

</div>
</div>
</div>
<div style="clear:both">
</div>
<?php include($WEBROOT_TEMP."hot.php");?>
<!--{template footer}-->
</div>
</body>
</html>
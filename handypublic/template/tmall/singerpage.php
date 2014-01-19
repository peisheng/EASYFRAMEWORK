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
<div id="main">
<!--{template header}-->
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
<div class="listweizhi"><h1>您的位置:<a href="<?php echo $rootroad;?>/">首页</a>><?php echo $page_title ?></h1></div>
</div>

<div class="taodi_listshop">

<?php 
if(is_array($linklist)){?>
<table width="95%" align="center">

<?php
foreach($linklist as $value) {
	$arr = $value["keywordlist"];
	?>
<tr>
<th width="13%"><a class='ts0' href="<?php echo $value["typeurl"];?>" target="_blank"><?php echo $value["typename"];?></a></th>
<td width="87%">
	<?php 
    if(is_array($arr)){
    for($i=0;$i<count($arr);$i++){
		?>
    <a href="<?php echo $arr[$i]["link"];?>" target="_blank"><?php echo $arr[$i]["title"];?></a> 
    <?php }
	}
	?>
	
&nbsp;</td>
</tr>
	<?php
	}
    ?>
  </table>
<?php } ?>


</div>


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

<!--{template footer}-->
</div>
</body>
</html>
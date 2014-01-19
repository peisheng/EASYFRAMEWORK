<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--{eval if(!defined('VERSON')) exit('Access Denied'); }-->
<head>
<title>$indextitle</title>
<meta name="keywords" content="$sitekey" />
<meta name="description" content="$sitedesc" />
<link rel="Shortcut Icon" href="$sitetitleurl/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--{template headerjs}-->


</head>
<body>
<center>

<!--{template header}-->

  
  <!--输出首页所有栏目--> 
  

  

  <div id="rm">
  <?php 




foreach($sitemap_arr as $big){
	$bigname = $big["name"];
	
?>
<table width="100%" cellspacing="1" class="money">
<tr>
<th width="100" rowspan="3" bgcolor="#F0F0F0"><a href="<?php echo $big["url"];?>" target="_blank" class='ts0'><?php echo $bigname ?></a></th>
<td align="left" style="padding:5px; border:#F0F0F0 solid 1px;">
	<?php foreach($big["subcats"] as $small){	?>
    <a href="<?php echo $small["url"];?>" target="_blank"><?php echo $small["name"]; ?></a>　
    <?php }  ?>
</td>
</tr>
</table>

<?php	
}
?>

  </div>

  <div style="height:20px; clear:both;"></div>
  
  <!--{template footer}-->
  
</center>
</body>
</html>
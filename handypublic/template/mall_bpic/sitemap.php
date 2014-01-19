
    
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

		
		<div class="balbo">
        
        <!--{ad/paileft}-->

        
</div>
		
	</div>
	<div class="info_rt">


<?php 




foreach($sitemap_arr as $big){
	$bigname = $big["name"];
	
?>
<table width="100%" cellspacing="3" class="money">
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
	
</div>



<!--{template teyue}-->

<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

<!--{template footer}-->

</body>
</html>

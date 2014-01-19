
    
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


<?php foreach($linklist as $value) {
	$arr = $value["keywordlist"];
	?>
<table width="100%" class="money">
<tr>
<th width="100" rowspan="3"><a class='ts0' href="<?php echo $value["typeurl"];?>" <?php if($win_daohang=="1") echo(" target=_blank"); ?>><?php echo $value["typename"];?></a></th>
<td>
	<?php 
    if(is_array($arr)){
    for($i=0;$i<count($arr);$i++){
		?>
    <a href="<?php echo $arr[$i]["link"];?>" target="_blank"><?php echo $arr[$i]["title"];?></a> 
    <?php }
	}
    ?>
</td>
</tr>
</table>
<?php } ?>



	</div>
	
</div>



<!--{template teyue}-->

<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

<!--{template footer}-->

</body>
</html>

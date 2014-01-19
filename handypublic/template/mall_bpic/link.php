<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>
<div class="f_links">

<a href="#" target="_blank">友情链接：</a>


<?php  

$arrays = application("linkarray",WEBROOT."data/applicationdate.php");

if(!is_array($arrays)){
	$arrays = array();
}
if(isset($arrays) && Count($arrays)>0){
	for($i=0;$i<Count($arrays);$i++){

?>

<a href="<?php echo $arrays[$i][0] ?>" target="_blank" title="<?php echo $arrays[$i][1] ?>"><?php echo $arrays[$i][1] ?></a>
<?php
}
}
?>

</div>

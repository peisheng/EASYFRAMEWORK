<div class="clear pd8"><img src="images/s.gif" alt="�ָ���" /></div>
<div class="f_links">

<a href="#" target="_blank">�������ӣ�</a>


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

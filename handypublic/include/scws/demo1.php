<?php
error_reporting(0);
require ('pscws3.class.php');
$dict = '../dict/dict.xdb';	// 默认采用 xdb (不需其它任何依赖) 
	$mydata  = NULL;	// 待切数据

$cws = new PSCWS3($dict);
$string = "pentax/宾得中画副单反 645d 机身 4000万像素 顶级单反相机 行货宾得中画副单反 645d 机身 4000万像素";
$res = $cws->segment($string);
$res = array_unique($res);
$returnstr = "";
foreach($res as $val){
	if(strlen($val)>2){
		$returnstr.=" ".$val;
	}
}
$returnstr = trim($returnstr);







?>
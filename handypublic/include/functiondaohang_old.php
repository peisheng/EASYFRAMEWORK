<?php


$topdaohangarray = GetArrDaohang("topdaohang");
$arrays = GetArrDaohang("daohang");
$arraykeywords = GetArrDaohang("cidaohang");

$hotkeyword = GetArrDaohang("keyword");


foreach($topdaohangarray as $key=>$val){
	$topdaohangarray[$key][0] = $topdaohangarray[$key]["typename"];
}
foreach($arrays as $key=>$val){
	$arrays[$key][0] = $arrays[$key]["typename"];
}
foreach($arraykeywords as $key=>$val){
	$arraykeywords[$key][0] = $arraykeywords[$key]["typename"];
	
	
}
foreach($hotkeyword as $key=>$val){
	$hotkeyword[$key][0] = $hotkeyword[$key]["typename"];
}


?>
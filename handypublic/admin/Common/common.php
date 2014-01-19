<?php

function checkadminHT(){
	global $manage_adminname;
	global $manage_adminpass;
	
	$adminuser = $_COOKIE['COOKIEadminuser'];
	if(empty($adminuser) || $adminuser == "") $adminuser = $_SESSION['adminuser'];
	
	$adminpass = $_COOKIE['COOKIEadminpass'];
	if(empty($adminpass) || $adminpass == "") $adminpass = $_SESSION['adminpass'];
	
	$adminpass = md5($adminpass);

	if($adminuser!=$manage_adminname || $adminpass != $manage_adminpass){
		return false;
	}
		return true;

}


?>
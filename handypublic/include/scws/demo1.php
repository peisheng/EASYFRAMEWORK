<?php
error_reporting(0);
require ('pscws3.class.php');
$dict = '../dict/dict.xdb';	// Ĭ�ϲ��� xdb (���������κ�����) 
	$mydata  = NULL;	// ��������

$cws = new PSCWS3($dict);
$string = "pentax/�����л������� 645d ���� 4000������ ����������� �л������л������� 645d ���� 4000������";
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
<?php 
define('APP_DEBUG',TRUE); // ��������ģʽ


//����ļ���Ȩ��
$check_file = array(
	'./Runtime/',
);
$error = array();
foreach ($check_file as $file) {
	$path_file =  $file;
	if (!is_writable($path_file)) {
		$error[] = $file . "���ɶ�д!";
		$flag = false;
		exit($path_file."Ŀ¼�޷���д���������к�̨��");
	}
} 


require_once '../include/adminfunction.php';
define('APP_NAME', 'admin');
define('APP_PATH', './');
require '../include/thinkphp/ThinkPHP.php';

?>
<?php
require_once "global.php";
require_once "include/application.php";
require_once "include/sysfunction.php";
					
defined('ROOT_PATH') or define('ROOT_PATH', dirname(__FILE__));
define('APP_DEBUG',TRUE); // ��������ģʽ


//����ļ���Ȩ��
$check_file = array(
	'./install/Runtime/',
);
$error = array();
foreach ($check_file as $file) {
	$path_file =  $file;
	if (!is_writable($path_file)) {
		$error[] = $file . "���ɶ�д!";
		$flag = false;
		exit($path_file."Ŀ¼�޷���д���������а�װ����");
	}
}



define('THINK_PATH', './include/thinkphp/');
define('APP_NAME', 'install');
define('APP_PATH', './install/');
require(THINK_PATH."/ThinkPHP.php");

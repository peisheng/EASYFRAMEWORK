<?php 
define('APP_DEBUG',TRUE); // 开启调试模式


//检测文件夹权限
$check_file = array(
	'./Runtime/',
);
$error = array();
foreach ($check_file as $file) {
	$path_file =  $file;
	if (!is_writable($path_file)) {
		$error[] = $file . "不可读写!";
		$flag = false;
		exit($path_file."目录无法读写，不能运行后台。");
	}
} 


require_once '../include/adminfunction.php';
define('APP_NAME', 'admin');
define('APP_PATH', './');
require '../include/thinkphp/ThinkPHP.php';

?>
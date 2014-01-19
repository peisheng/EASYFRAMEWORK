<?php
require_once "global.php";
require_once "include/application.php";
require_once "include/sysfunction.php";
					
defined('ROOT_PATH') or define('ROOT_PATH', dirname(__FILE__));
define('APP_DEBUG',TRUE); // 开启调试模式


//检测文件夹权限
$check_file = array(
	'./install/Runtime/',
);
$error = array();
foreach ($check_file as $file) {
	$path_file =  $file;
	if (!is_writable($path_file)) {
		$error[] = $file . "不可读写!";
		$flag = false;
		exit($path_file."目录无法读写，不能运行安装程序。");
	}
}



define('THINK_PATH', './include/thinkphp/');
define('APP_NAME', 'install');
define('APP_PATH', './install/');
require(THINK_PATH."/ThinkPHP.php");

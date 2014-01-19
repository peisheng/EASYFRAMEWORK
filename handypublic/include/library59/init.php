<?php
if (!defined('VERSON'))
{
	exit('Access Defined');
}

require WEBROOT.'include/library59/config.php';
//自动加载类
require WEBROOT.'include/library59/Api59miao.class.php';
require WEBROOT.'include/library59/Api59miao_Cache.class.php';
require WEBROOT.'include/library59/Api59miao_Toos.class.php';
	
//获取appkey  appsecret 信息
$AppKeySecret=Api59miao_Toos::GetAppkeySecret();

?>
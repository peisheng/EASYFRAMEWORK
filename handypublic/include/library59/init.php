<?php
if (!defined('VERSON'))
{
	exit('Access Defined');
}

require WEBROOT.'include/library59/config.php';
//�Զ�������
require WEBROOT.'include/library59/Api59miao.class.php';
require WEBROOT.'include/library59/Api59miao_Cache.class.php';
require WEBROOT.'include/library59/Api59miao_Toos.class.php';
	
//��ȡappkey  appsecret ��Ϣ
$AppKeySecret=Api59miao_Toos::GetAppkeySecret();

?>
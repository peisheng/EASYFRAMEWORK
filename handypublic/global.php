<?php 
error_reporting(0);  //��Ϊ7ʱ��������ʾphp������ϸ��Ϣ
define('DEBUG',0);  //����ģ��Ͳ���ʱ��Ϊ1������ʾһЩ���Բ���


//����PHPִ�г�ʱʱ��
ini_set("max_execution_time", "80"); //���ʱ��20 ��

//�޸Ĵ˴ε���������ڴ�
ini_set("memory_limit", 1024*1024*40);        //����ڴ� Byte 20 ��
ini_set("output_buffering", "1");
ini_set("mssql.textsize", "-1");
ini_set("mssql.textlimit", "-1");


define('WEBROOT',dirname(__FILE__)."/");
$WEBROOT = WEBROOT;
define('ROOT_PATH', dirname(__FILE__));

require_once WEBROOT."data/configdata.php";

define('ROOTROAD',$rootroad);
define('VERSON',"TaodiV_6.21");

date_default_timezone_set('Asia/Shanghai');

//ģ��������,Ҫ��ģ��ı�����ϡ� ��ѡGBK����UTF-8
$default_soft_lang = "GBK";

header("Content-Type: text/html; charset=".$default_soft_lang."");


$urlfull = substr(md5($_SERVER['SERVER_NAME'].$rootroad),0,5);
//�Կ͵۹���������URL��
define('SETSERVERURL',"http://".$urlfull.".agentv6.cnmysoft.cn/index.php");
//define('SETSERVERURL',"http://agentlocalv6.cnmysoft.com/index.php");

define('APISERVERURL',"http://api.cnmysoft.cn/");
//define('APISERVERURL',"http://apilocal.cnmysoft.cn/");


?>
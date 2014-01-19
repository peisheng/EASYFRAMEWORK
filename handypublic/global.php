<?php 
error_reporting(0);  //设为7时，可以显示php报错详细信息
define('DEBUG',0);  //调试模版和测试时设为1，可显示一些测试参数


//设置PHP执行超时时间
ini_set("max_execution_time", "80"); //最大时间20 秒

//修改此次的最大运行内存
ini_set("memory_limit", 1024*1024*40);        //最大内存 Byte 20 兆
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

//模板程序编码,要和模板的编码对上。 可选GBK或者UTF-8
$default_soft_lang = "GBK";

header("Content-Type: text/html; charset=".$default_soft_lang."");


$urlfull = substr(md5($_SERVER['SERVER_NAME'].$rootroad),0,5);
//淘客帝国设置中心URL。
define('SETSERVERURL',"http://".$urlfull.".agentv6.cnmysoft.cn/index.php");
//define('SETSERVERURL',"http://agentlocalv6.cnmysoft.com/index.php");

define('APISERVERURL',"http://api.cnmysoft.cn/");
//define('APISERVERURL',"http://apilocal.cnmysoft.cn/");


?>
<?php
require_once dirname(__FILE__)."/../global.php";

require_once WEBROOT."include/application.php";
//require_once WEBROOT."data/configdata.php";
require_once WEBROOT.'include/Taoapi.php';
require_once WEBROOT.'include/library59/init.php';
require_once WEBROOT.'include/PaiPaiOpenApiOauth.php';
require_once WEBROOT.'include/tocnmysoftapi.php';

if(!isset($_SESSION)){
	session_save_path(WEBROOT.'./data/session/');
	session_start();
} 


require_once WEBROOT."include/sysfunction.php";
if(empty($indextitle)) $indextitle = $sitetitle;

$arr_app = getoneapp();
$arr_appFirst = getoneappFirst();


$Taoapi_Config = Taoapi_Config::Init();
$Taoapi_Config->setTestMode(false)			//设置测试模式
              ->setVersion(2)		 		//这里填写申请来的 App Key
              ->setAppKey($arr_app[0])		 		//这里填写申请来的 App Key
              ->setAppSecret($arr_app[1]);			//这里填写申请来的 App Sevret

$newSPM = "2014.21136518.".$arr_appFirst[0].".0";


$Taoapi = new Taoapi;
$Taoapi->Cache->setCacheTime($setCacheTime);	//缓存时间设置单位为小时(设置为0表示关闭缓存功能)



$api59miao=new Api59miao($AppKeySecret);
$api59miao->Cache->setCacheTime($setCacheTime);	//缓存时间设置单位为小时(设置为0表示关闭缓存功能)


// 读取全部配置
$TaoConfig = array();
$applicationdata = application("",ROOT."applicationdate.php");
$indexdata = application("",ROOT."indexdata.php");
$singerpagedate = application("",ROOT."singerpagedate.php");
//模板目录设置
if($templatefolder==""){
	$templatefolder = "default";	
}
if(is_file(WEBROOT.'/template/'.$templatefolder.'/config.php')){
	include_once(WEBROOT.'/template/'.$templatefolder.'/config.php');
}else{
	$CustomVariable = array();
}
$TaoConfig["CustomVariable"] = $CustomVariable;  //模版变量
$TaoConfig["CustomAdList"] = $CustomAdList;  //广告位置变量

$TaoConfig["applicationdata"] = $applicationdata;	//其他变量
$TaoConfig["indexdata"] = $indexdata;				//首页变量
$TaoConfig["singerpagedate"] = $singerpagedate;  //导航变量

if(is_file(WEBROOT."/data/config.inc.php")){
}else{
	if(is_file(WEBROOT."/config.inc.php")){
		copy(WEBROOT."/config.inc.php",WEBROOT."/data/config.inc.php");
		unlink(WEBROOT."/config.inc.php");
	}
}
$TaoConfig["DB_CONFIG"] = require(WEBROOT."/data/config.inc.php");  //数据库配置

//设置全站绝对连接
if($httplink=="1"){
	$rootroad = $sitetitleurl.$rootroad;
}

$TaoConfig["rootroad"] =$rootroad;  //当前页面名称

$TaoConfig["DB_OPEN"] = false;
$TaoConfig["default_lang"] = $default_soft_lang;  //模版变量
$TaoConfig["pagename_template"] =$pagename_template;  //当前页面名称
$TaoConfig["WJTconfig"] = $TaoConfig["applicationdata"]["WJTconfig"];unset($TaoConfig["applicationdata"]["WJTconfig"]);
$TaoConfig["WYCconfig"] = $TaoConfig["applicationdata"]["WYCconfig"];unset($TaoConfig["applicationdata"]["WYCconfig"]);
//建立一些常用变量

?>
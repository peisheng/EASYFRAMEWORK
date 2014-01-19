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
$Taoapi_Config->setTestMode(false)			//���ò���ģʽ
              ->setVersion(2)		 		//������д�������� App Key
              ->setAppKey($arr_app[0])		 		//������д�������� App Key
              ->setAppSecret($arr_app[1]);			//������д�������� App Sevret

$newSPM = "2014.21136518.".$arr_appFirst[0].".0";


$Taoapi = new Taoapi;
$Taoapi->Cache->setCacheTime($setCacheTime);	//����ʱ�����õ�λΪСʱ(����Ϊ0��ʾ�رջ��湦��)



$api59miao=new Api59miao($AppKeySecret);
$api59miao->Cache->setCacheTime($setCacheTime);	//����ʱ�����õ�λΪСʱ(����Ϊ0��ʾ�رջ��湦��)


// ��ȡȫ������
$TaoConfig = array();
$applicationdata = application("",ROOT."applicationdate.php");
$indexdata = application("",ROOT."indexdata.php");
$singerpagedate = application("",ROOT."singerpagedate.php");
//ģ��Ŀ¼����
if($templatefolder==""){
	$templatefolder = "default";	
}
if(is_file(WEBROOT.'/template/'.$templatefolder.'/config.php')){
	include_once(WEBROOT.'/template/'.$templatefolder.'/config.php');
}else{
	$CustomVariable = array();
}
$TaoConfig["CustomVariable"] = $CustomVariable;  //ģ�����
$TaoConfig["CustomAdList"] = $CustomAdList;  //���λ�ñ���

$TaoConfig["applicationdata"] = $applicationdata;	//��������
$TaoConfig["indexdata"] = $indexdata;				//��ҳ����
$TaoConfig["singerpagedate"] = $singerpagedate;  //��������

if(is_file(WEBROOT."/data/config.inc.php")){
}else{
	if(is_file(WEBROOT."/config.inc.php")){
		copy(WEBROOT."/config.inc.php",WEBROOT."/data/config.inc.php");
		unlink(WEBROOT."/config.inc.php");
	}
}
$TaoConfig["DB_CONFIG"] = require(WEBROOT."/data/config.inc.php");  //���ݿ�����

//����ȫվ��������
if($httplink=="1"){
	$rootroad = $sitetitleurl.$rootroad;
}

$TaoConfig["rootroad"] =$rootroad;  //��ǰҳ������

$TaoConfig["DB_OPEN"] = false;
$TaoConfig["default_lang"] = $default_soft_lang;  //ģ�����
$TaoConfig["pagename_template"] =$pagename_template;  //��ǰҳ������
$TaoConfig["WJTconfig"] = $TaoConfig["applicationdata"]["WJTconfig"];unset($TaoConfig["applicationdata"]["WJTconfig"]);
$TaoConfig["WYCconfig"] = $TaoConfig["applicationdata"]["WYCconfig"];unset($TaoConfig["applicationdata"]["WYCconfig"]);
//����һЩ���ñ���

?>
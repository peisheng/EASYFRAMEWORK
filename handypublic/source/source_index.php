<?php
$pagename_template = "index";
require_once WEBROOT.'include/function.php';

$indexs = $TaoConfig["indexdata"]["index"];


foreach($indexs as &$value){
	$value["typeVarName"] = GetDaohangIdToVarName($value["typeid"]);
	$value["url"] = GetDaohangUrl($value);
}
$mod = var_request("mod","");

if($mod=="ajax" && $act=="goods_comment"){
	$act = var_request("act","");
	$comment_url = var_request("comment_url","");
	
	//$comment_url = "http://rate.taobao.com/detail_rate.htm?&auctionNumId=14794178487&showContent=2&currentPage=1&userNumId=743407449";
	$Taoapi_Util = new Taoapi_Util();
	$Taoapi_Util->submit($comment_url, array());
	
	$contentstr = $Taoapi_Util->results;
	$contentstr = str_replace("TB.detailRate = ","",$contentstr);
	$contentstr=trim(Newiconv("gb2312","utf-8//IGNORE",$contentstr));
    echo $contentstr;
	exit;
}

//��ҳ�Զ����¾�̬ҳ
if($mod=="updatehtml"){ 
	$lasttime=filemtime(WEBROOT."/index.html");
	$interval=300;  //����ʱ����Ϊ��λ1800��=30����
	$bdnum=1;//�������õ�ʱ���Զ��������HTML����
	if((time()-$lasttime)>$interval)
	{
		echo("document.write('');");		
		exit();
	}
}



if($mod=="jslogintop"){ 
	require_once Tao_template("js");
	exit;
}



//�����ҳ��Ӧģ�������
function GetArrIndex($key){
	
	global $TaoConfig;
	$returnArr = array();
	$indexs = $TaoConfig["indexdata"]["index"];
		
	if(!empty($indexs[$key]["typeid"]) && isset($indexs[$key]["typeid"])){
		
		return GetArrByValue($indexs[$key]);;
	}
}




ob_start(); 
//����ģ��
require_once Tao_template("index");
showend();

$content=ob_get_contents();

$pagename = WEBROOT."index.html";
//file_put_contents($pagename,$content);
?>


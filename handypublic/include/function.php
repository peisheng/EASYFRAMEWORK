<?php
date_default_timezone_set('Asia/Shanghai');
require_once WEBROOT."include/application.php";
require_once WEBROOT."data/configdata.php";


require_once WEBROOT.'include/template.php';
require_once WEBROOT.'include/sysfunction.php';
require_once(WEBROOT."include/pages.php");

require_once WEBROOT.'include/tocnmysoftapi.php';
require_once WEBROOT.'include/Taoapi.php';
require_once WEBROOT.'include/library59/init.php';
require_once WEBROOT.'include/PaiPaiOpenApiOauth.php';
//ini_set('session.save_path', WEBROOT.'data/session/');
session_save_path(WEBROOT.'./data/session/');
session_start();

ob_start();

//������ʼ����
$read_data_num = 0;
$read_cache_num = 0;
$pagestartime = microtime();

if(empty($indextitle)) $indextitle = $sitetitle;

// ��ȡȫ������
$TaoConfig = array();
$applicationdata = application("",ROOT."applicationdate.php");
$indexdata = application("",ROOT."indexdata.php");
$singerpagedate = application("",ROOT."singerpagedate.php");

$TaoConfig["applicationdata"] = $applicationdata;	//��������
$TaoConfig["indexdata"] = $indexdata;				//��ҳ����
$TaoConfig["singerpagedate"] = $singerpagedate;  //��������
//ģ��Ŀ¼����
if($templatefolder==""){
	$templatefolder = "default";	
}
if(is_file(WEBROOT.'/template/'.$templatefolder.'/config.php')){
	include_once(WEBROOT.'/template/'.$templatefolder.'/config.php');
}else{
	exit("ģ����ش�����Ҫ�����̨����ѡ��ģ�档");;
}



$TaoConfig["CustomVariable"] = $CustomVariable;  //ģ�����
$TaoConfig["CustomAdList"] = $CustomAdList;  //���λ�ñ���


if(is_file(WEBROOT."/data/config.inc.php")){
}else{
	if(is_file(WEBROOT."/config.inc.php")){
		copy(WEBROOT."/config.inc.php",WEBROOT."/data/config.inc.php");
		unlink(WEBROOT."/config.inc.php");
	}
}
$TaoConfig["DB_CONFIG"] = require(WEBROOT."/data/config.inc.php");  //���ݿ�����
$TaoConfig["DB_OPEN"] = false;
$TaoConfig["default_lang"] = $default_soft_lang;  //ģ�����
$TaoConfig["pagename_template"] =$pagename_template;  //��ǰҳ������
$TaoConfig["WJTconfig"] = $TaoConfig["applicationdata"]["WJTconfig"];unset($TaoConfig["applicationdata"]["WJTconfig"]);
$TaoConfig["WYCconfig"] = $TaoConfig["applicationdata"]["WYCconfig"];unset($TaoConfig["applicationdata"]["WYCconfig"]);
//����һЩ���ñ���
$TaoConfig["CustomAdListCode"]=getallad(); //��ȡ������
$query = ($_SERVER['QUERY_STRING']) ? "?".$_SERVER['QUERY_STRING']."" : "";
$url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].$query."";
$TaoConfig["pageurl"] = $url;


//print_r($TaoConfig["applicationdata"]["CustomSetFieldValue"]);
$CustomSetFieldValue = $TaoConfig["applicationdata"]["CustomSetFieldValue"];
//exit;

foreach($CustomVariable["CustomSetField"] as $key=>$val){
	if(empty($CustomSetFieldValue[$key])){
			$CustomSetFieldValue[$key] = $CustomVariable["CustomSetField"][$key]["default"];
	}
	
	if($CustomVariable["CustomSetField"][$key]["list"]=="textarea"){
		
		$CustomSetFieldValue[$key] = stripslashes(html_entity_decode($CustomSetFieldValue[$key],ENT_QUOTES));
	}
	
}


$CustomSeoconfig = $TaoConfig["applicationdata"]["seoconfig"];

//echo var_export($TaoConfig["applicationdata"]["seoconfig"],true);

//exit;

$applicationarray = array ();
$applicationarray = $TaoConfig["applicationdata"];

//����Ƿ���Ҫ����֩�����
$useragent=strtolower($_SERVER['HTTP_USER_AGENT']);
$badrobots = $applicationarray["badrobots"];
if(is_array($badrobots)){
	foreach($badrobots as $k=>$v){
		if(intval($v)==1){
			if(stripos($useragent,strtolower($k))!==false){
				
				@header("http/1.1 404 not found");  
				@header("status: 404 not found");
				exit($k." 404 not found��");
			}
		}
	}
}



//����Ƿ���Ҫ����IP
$userip=strtolower($_SERVER['REMOTE_ADDR']);
$useripnum = sprintf("%u", ip2long($userip));
$pbips = $applicationarray["pbips"];
if(is_array($pbips)){
	foreach($pbips as $ip){
		$startip = sprintf("%u", ip2long($ip["startip"]));
		$endip = sprintf("%u", ip2long($ip["endip"]));
		if($useripnum>=$startip && $endip>=$useripnum){
			exit($userip."��ֹ���ʣ�");
		}
	}
}
$GJconfig = $applicationarray["GJconfig"];
//��ȡ�߼�����

	$shoplevelstart=$GJconfig["shoplevelstart"];
	$shoplevelend=$GJconfig["shoplevelend"];
	$stratmoneyKeys=$GJconfig["stratmoneyKeys"];
	$endmoneyKeys=$GJconfig["endmoneyKeys"];
	$indexsort=$GJconfig["indexsort"];
	$indexpage=$GJconfig["indexpage"];
	$pagenumKeys=$GJconfig["pagenumKeys"];
	$pagenums=$GJconfig["pagenums"];
	$indexupdatenum=$GJconfig["indexupdatenum"];
	$listlinktype=$GJconfig["listlinktype"];
	$searchdefault=$GJconfig["searchdefault"];
	$searchkeypb=$GJconfig["searchkeypb"];
	$catidpb=$GJconfig["catidpb"];
	$numidpb=$GJconfig["numidpb"];
	$logo=$GJconfig["logo"];
	$goto301=$GJconfig["goto301"];
	
	$checkMobileTp=$GJconfig["checkMobileTp"];
	$indexpagernd=$GJconfig["indexpagernd"];
	
	$ismall=$GJconfig["ismall"];
	$httplink=$GJconfig["httplink"];
	$AppErrPages=$GJconfig["AppErrPages"];
	$gonggao=$GJconfig["gonggao"];

	$defaultarea = $GJconfig["defaultarea"];
	$defaultsort = $GJconfig["listsort"];
	$AppServerUrl = $GJconfig["AppServerUrl"];

	

	if(empty($shoplevelstart)) $shoplevelstart="1heart";
	if(empty($shoplevelend)) $shoplevelend="5goldencrown";
	if(empty($indexsort)) $indexsort="commissionNum_desc";
	if(empty($indexpage)) $indexpage="1";
	if(empty($pagenumKeys)) $pagenumKeys="18";
	if(empty($pagenums)) $pagenums="100";
	if(empty($stratmoneyKeys)) $stratmoneyKeys="100";
	if(empty($endmoneyKeys)) $endmoneyKeys="5000";
	if(empty($indexupdatenum)) $indexupdatenum="5";
	if(empty($listlinktype)) $listlinktype="tao";
	if(empty($searchdefault)) $searchdefault="0";
	if(empty($logo)) $logo=$rootroad."/img/logo.gif";
	if(empty($goto301)) $goto301="0";
	
	if(empty($indexpagernd)) $indexpagernd="";
	if(empty($ismall)) $ismall="0";
	if(empty($httplink)) $httplink="0";
	if(empty($AppErrPages)) $AppErrPages="http://www.taobao.com/go/chn/tbk_channel/channelcode.php?pid={#PID#}&eventid=101329";
	if(empty($gonggao)) $gonggao="";
	if(empty($defaultsort)) $defaultsort="";
	if(empty($AppServerUrl)) $AppServerUrl="gw.api.taobao.com";


	//��ȡαԭ������
	$WYCconfig = $applicationarray["WYCconfig"];

	$WYCpictype=$WYCconfig["pictype"];
	$WYCUrlEncodeType=$WYCconfig["UrlEncodeType"];
	$WYCUrlRewriteJr=$WYCconfig["UrlRewriteJr"];
	$WYCdescJs=$WYCconfig["descJs"];
	$WYCdeschead="����".$WYCconfig["deschead"];
	$WYCdescfooter=$WYCconfig["descfooter"];
	
	$WYCzhengheTaoBao_open=$WYCconfig["zhengheTaoBao_open"];
	$WYCzhengheTaoBao_site=$WYCconfig["zhengheTaoBao_site"];
	$WYCzhengheTaoBao_area=$WYCconfig["zhengheTaoBao_area"];
	$WYCzhengheTaoBao_url= stripslashes(html_entity_decode($WYCconfig["zhengheTaoBao_url"],ENT_QUOTES));
	$WYCzhengheTaoBao_hiddentop=$WYCconfig["zhengheTaoBao_hiddentop"];
	$WYCzhengheTaoBao_hiddenhigh=$WYCconfig["zhengheTaoBao_hiddenhigh"];

	$openGZIP = $WYCconfig["openGZIP"];
	$openGoToTaobao = $WYCconfig["openGoToTaobao"];

	$wyz_urlpamOpen = $WYCconfig["wyz_urlpamOpen"];
	$wyz_urlpam = $WYCconfig["wyz_urlpam"];
	$wyz_tongyi_title = $WYCconfig["wyz_tongyi_title"];
	$wyz_tongyi_content = $WYCconfig["wyz_tongyi_content"];
	$wyz_title_daluan = $WYCconfig["wyz_title_daluan"];
	
	$wyz_title_addword = $WYCconfig["wyz_title_addword"];
	$wyz_titlehead = $WYCconfig["wyz_titlehead"];
	$wyz_titlecenter = $WYCconfig["wyz_titlecenter"];
	$wyz_titleend = $WYCconfig["wyz_titleend"];


	if(empty($WYCpictype)) $WYCpictype="js";
	if(empty($WYCUrlEncodeType)) $WYCUrlEncodeType="auto";
	if(empty($WYCUrlRewriteJr)) $WYCUrlRewriteJr="1";
	if(empty($WYCdescJs)) $WYCdescJs="1";
	if(empty($WYCdeschead)) $WYCdeschead="";
	if(empty($WYCdescfooter)) $WYCdescfooter="";


	//��ȡҳ��ʹ������á�
	$ConfigWindows = $applicationarray["ConfigWindows"];
	$win_daohang=$ConfigWindows["win_daohang"];
	$win_pro=$ConfigWindows["win_pro"];
	$win_search=$ConfigWindows["win_search"];
	$win_listtoindex=$ConfigWindows["win_listtoindex"];
	$win_prodead=$ConfigWindows["win_prodead"];
	
	$Show_list_small=$ConfigWindows["Show_list_small"];
	$Show_list_sort=$ConfigWindows["Show_list_sort"];
	$Show_product_hotlist=$ConfigWindows["Show_product_hotlist"];
	$Show_product_hotlistnum=$ConfigWindows["Show_product_hotlistnum"];
	$Show_product_catid=$ConfigWindows["Show_product_catid"];
	$Show_product_propvalue=$ConfigWindows["Show_product_propvalue"];
	
	$Show_product_hotlisttype=$ConfigWindows["Show_product_hotlisttype"];
	
	if(($win_daohang=="")) $win_daohang="0";
	if($win_pro=="") $win_pro="1";
	if(($win_search=="")) $win_search="1";
	
	if(empty($win_listtoindex)) $win_listtoindex="0";
	if(empty($win_prodead)) $win_prodead="404text";
	

	if(($Show_list_small=="")) $Show_list_small="0";
	if(($Show_list_sort=="")) $Show_list_sort="1";
	if(($Show_product_hotlist=="")) $Show_product_hotlist="1";
	if(($Show_product_hotlistnum=="")) $Show_product_hotlistnum="6";
	if(($Show_product_catid=="")) $Show_product_catid="0";
	if(($Show_product_propvalue=="")) $Show_product_propvalue="1";
	if(($Show_product_hotlisttype=="")) $Show_product_hotlisttype="1";

	//��ȡ����ַ����
	$config_shorturlarr = $applicationarray["shorturlarr"];
	$config_shorturl = $applicationarray["shorturl"];



//����ȫվ��������
if($httplink=="1"){
	$rootroad = $sitetitleurl.$rootroad;
}

$TaoConfig["rootroad"] =$rootroad;  //��ǰҳ������


//����GZIP
if($openGZIP=="1"){
	ob_start('ob_gzip');
}

$singerpagesite = $win_listtoindex;

//ģ��Ŀ¼����
if($templatefolder==""){
	$templatefolder = "default";	
}
if($checkMobileTp��="1" && (TaodiisMobile()) || $ismobileAgent==true) {
	 $ismobileAgent = true;
}
if($ismobileAgent){
	$templatefolder = "mobile";
}




//ģ���·������ַ��
$templateroot = $rootroad."/template/".$templatefolder;
//ģ���·�����ļ���
$WEBROOT_TEMP = WEBROOT."template/".$templatefolder."/";


$pidsplit = array();
$pidsplit["{#PID#}"] = $userpid;
$pidsplit["{#SPID#}"] = $userpiddp;
$pidsplit["{#ROOT#}"] = $rootroad;
$pidsplit["{#templateroot#}"] = $templateroot;
//���õ�ȫ�ֱ�����
$TaoConfig["ad_verible"] = $pidsplit;

$AppErrPages =  strtr(stripslashes(html_entity_decode($AppErrPages,ENT_QUOTES)),$pidsplit);
$WYCzhengheTaoBao_url =  strtr(stripslashes(html_entity_decode($WYCzhengheTaoBao_url,ENT_QUOTES)),$pidsplit);
$logo =  strtr(stripslashes(html_entity_decode($logo,ENT_QUOTES)),$pidsplit);


//�����Ա�ҳ��Ĵ���
if($WYCzhengheTaoBao_open=="1"){
	if($WYCzhengheTaoBao_site=="all" || $isindexpage=="ok" && $WYCzhengheTaoBao_site=="index" ){
		
		switch($WYCzhengheTaoBao_area){
			case "top":
				$WYCzhengheTaoBao_topCode = "<script src='".$rootroad."/js/showPage.php'></script>";
				break;
			case "middle":
				$WYCzhengheTaoBao_centerCode = "<script src='".$rootroad."/js/showPage.php'></script>";
				break;
			default:
				break;	
		}
		
	}
}


//����ͼƬ�����صĴ��롣
//$WYCzhengheTaoBao_topCode .= '<script type="text/javascript" src="'.$rootroad.'/js/lazyload/jquery.js"><//script>';
//$WYCzhengheTaoBao_topCode .= '<script type="text/javascript" src="'.$rootroad.'/js/lazyload/jquery.lazyload.js"><//script>';




//α��̬����
$WJTconfig = $applicationarray['WJTconfig'];

if(isset($WJTconfig["pagelist"])){
	
	
	$wjtpageb2clist=$WJTconfig["pageb2clist"];
	$wjtpageb2cproduct=$WJTconfig["pageb2cproduct"];
	
	$wjtpagelist=$WJTconfig["pagelist"];
	$wjtpageproduct=$WJTconfig["pageproduct"];
	$wjtpageshop=$WJTconfig["pageshop"];
	$wjtpagerecommenddiscount=$WJTconfig["pagerecommenddiscount"];
	$wjtpagerecommendtype=$WJTconfig["pagerecommendtype"];
	$wjtpageshopsearch=$WJTconfig["pageshopsearch"];
	$wjtpagehz=$WJTconfig["pagehz"];
	$wjtpagepicture=$WJTconfig["pagepicture"];
	$wjtpageshorturl=$WJTconfig["pageshorturl"];
}
	if($wjtpageb2clist=="") $wjtpageb2clist="b2clist.php/";
	if($wjtpageb2cproduct=="") $wjtpageb2cproduct="b2cproduct.php/";
	if($wjtpagelist=="") $wjtpagelist="list.php/";
	if($wjtpageproduct=="") $wjtpageproduct="product.php/";
	if($wjtpageshopsearch=="") $wjtpageshopsearch="shopsearch.php/";
	if($wjtpageshop=="") $wjtpageshop="shop.php/";
	if($wjtpagerecommenddiscount=="") $wjtpagerecommenddiscount="recommenddiscount.php/";
	if($wjtpagerecommendtype=="") $wjtpagerecommendtype="recommendtype.php/";
	if($wjtpagepicture=="") $wjtpagepicture="pic.php/";
	if($wjtpageshorturl=="") $wjtpageshorturl="url.php/";

	$tempweijingtai = $WJTconfig["weijingtai"];
	if($tempweijingtai=="") $WJTconfig["weijingtai"] = $weijingtai; 
	$weijingtai = $WJTconfig["weijingtai"];
	
	
	

if($WYCUrlEncodeType=="auto"){
	if($wjtpagelist!="list.php/" && $wjtpageproduct!="product.php/" && $wjtpageshop!="shop.php/"){
		$wjturlencode = "base64";
	}else{
		$wjturlencode="2urlencode";
	}	
}else{
	$wjturlencode = $WYCUrlEncodeType;
}



//��ת301��
if($goto301){
	$hostnow = str_replace("http://","",$sitetitleurl);
	if(strpos($hostnow,"/")>0){
		$hostarr = explode("/",$hostnow);
		$hostnow = $hostarr[0];
	}

	$the_host = $_SERVER['HTTP_HOST'];//ȡ�ý��������������
	if(strpos("---".$_SERVER['REQUEST_URI'],"/index.php")){
		$_SERVER['REQUEST_URI'] = str_replace("/index.php","",$_SERVER['REQUEST_URI']);
	}
	$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';//�жϵ�ַ���沿��
	if($the_host != $hostnow)//������Ҫ��ǰ��������ַ
	{
		
	  header('HTTP/1.1 301 Moved Permanently');//����301ͷ�� 
	  header('Location: http://'.$hostnow.$request_uri);//��ת���ҵ���������ַ
	  exit;
	}
}


if($TaoConfig["WJTconfig"]["weijingtai"]=="1"){
	mod_rewrite();
}

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


//SEO����
$seoconfig = $applicationarray["seoconfig"];

$list_title=$seoconfig["list_title"];
$list_keyword=$seoconfig["list_keyword"];
$list_discription=$seoconfig["list_discription"];

$shopsearch_title=$seoconfig["shopsearch_title"];
$shopsearch_keyword=$seoconfig["shopsearch_keyword"];
$shopsearch_discription=$seoconfig["shopsearch_discription"];

$shop_title=$seoconfig["shop_title"];
$shop_keyword=$seoconfig["shop_keyword"];
$shop_discription=$seoconfig["shop_discription"];

$product_title=$seoconfig["product_title"];
$product_keyword=$seoconfig["product_keyword"];
$product_discription=$seoconfig["product_discription"];


$newslist = array();
if($pagename_template == "index"){
require_once WEBROOT.'include/newsfunction.php';
}
$defaultarea = Newiconv( "GBK","UTF-8",$defaultarea);

header("Content-Type: text/html; charset=".$default_soft_lang."");

//JSSDKר�ô���
$app_key = $arr_appFirst[0];/*��дappkey */
$app_secret=$arr_appFirst[1];/* ��дapp_secret */

$jssdktimestamp=time()."000";
$message = $app_secret.'app_key'.$app_key.'timestamp'.$jssdktimestamp.$app_secret;
$jssdkmysign=strtoupper(hmac($message,$app_secret));
setcookie("timestamp",$jssdktimestamp);
setcookie("sign",$jssdkmysign);

$Global_headerCode .= '<script src="http://l.tbcdn.cn/apps/top/x/sdk.js?appkey='.$app_key.'"></script>'."\r\n";
/*$Global_headerCode .= ' <script src="'.$rootroad.'/js/base64.js"></script>'."\r\n";
$Global_headerCode .= ' <script src="'.$rootroad.'/js/function.js"></script>'."\r\n";
*/


//������������
$webcontact = stripslashes(html_entity_decode($webcontact,ENT_QUOTES));
$webcontact = stripslashes(html_entity_decode($webcontact,ENT_QUOTES));

$tongjidaima_old = $tongjidaima;
$tongjidaima = stripslashes(html_entity_decode($tongjidaima,ENT_QUOTES));
$tongjidaima = stripslashes(html_entity_decode($tongjidaima,ENT_QUOTES));




if($_SERVER["SCRIPT_NAME"]!="/index.php") {
	$pingbistr = array();
	$pingbistr["'"] = "";
	$pingbistr[":"] = "";
	$pingbistr["\""] = "";
	$pingbistr["/"] = "";
	$pingbistr["script"] = "";
	$pingbistr["<"] = "";

	foreach($_GET as $key=>$value){
		$value = strip_tags($value);
		
		//$value = str_replace("< span>","",$value);
		//$_GET[$key] = strtr($value,$pingbistr);

		
		
		if(strpos("_".$value,"'")>0 || strpos("_".$value,"script") > 0 || strpos("_".$value,"alert") > 0 ){
			exit("��ֹ�ύΥ��������");	
		}
	}
}

//���ؾɰ汾ģ��ĵ���
if($template_is_old){
	require_once WEBROOT.'include/functiondaohang_old.php';
}



if((time() % 1000)==526){
//�Զ�ɾ������
	set_time_limit(0);
	deldir("Apicache",$setCacheTime*60*60);
}
?>
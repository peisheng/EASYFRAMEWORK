<?php
require_once '../include/adminfunction.php';
checkadmin();

$cindex = application("cindex","../data/applicationdate.php");

if(empty($cindex)) {
	$cindex=time();
	setapplication("cindex",$cindex,"../data/applicationdate.php");
}

$applicationdata = application("","../data/applicationdate.php");
$indexdata = application("","../data/indexdata.php");
$singerpagedate = application("","../data/singerpagedate.php");


//ģ��Ŀ¼����
if($templatefolder==""){
	$templatefolder = "default";	
}
if(is_file(WEBROOT.'/template/'.$templatefolder.'/config.php')){
	include_once(WEBROOT.'/template/'.$templatefolder.'/config.php');
}else{
	$CustomVariable = array();
}
$CustomVariable["taobao_level"] = $taobao_level;

$arrays = array();
$arrays["applicationdata"] = $applicationdata;
$arrays["indexdata"] = $indexdata;
$arrays["singerpagedate"] = $singerpagedate;
$arrays["CustomVariable"] = $CustomVariable;

$arrstr = base64_encode(serialize($arrays));
$action=var_request("action","");

$cindex = md5($arrstr);

if($action=="updatedata"){
	
	
	$file = var_request("file","");
	$key = var_request("key","");
	$cindex = var_request("cindex","0");
	
	
	$arrdata = unserialize(base64_decode($_POST["arrdata"]));
	
	if($file=="applicationdata"){
		setapplication($key,$arrdata,"../data/applicationdate.php");
	}
	if($file=="indexdata"){
		setapplication($key,$arrdata,"../data/indexdata.php");
	}
	if($file=="singerpagedate"){
		setapplication($key,$arrdata,"../data/singerpagedate.php");
	}
	if($file=="all"){
		setapplication("",$arrdata["applicationdata"],"../data/applicationdate.php");
		setapplication("",$arrdata["indexdata"],"../data/indexdata.php");
		setapplication("",$arrdata["singerpagedate"],"../data/singerpagedate.php");
	}
	//setapplication("cindex",$cindex,"../data/applicationdate.php");
	exit;
}

if($action=="rule"){
	$file = var_request("file","");
	$key = var_request("key","");
	$arrdata = unserialize(base64_decode($_POST["arrdata"]));

	file_put_contents("../.htaccess",$arrdata["apache"]);
	file_put_contents("../httpd.ini",$arrdata["iis"]);
	file_put_contents("../nginx.conf",$arrdata["nginx"]);
	file_put_contents("../web.config",$arrdata["dotnet"]);
	exit;
}

if($action=="singerpage"){
	$file = var_request("file","");
	$rootroad = $sitetitleurl.$rootroad;
	$pagename = $rootroad."/singerpage.php?no=".$file;

	redirect_to($pagename);

}
if($action==""){
}
if($action=="ciku"){
	redirect_to("manageciku.php");
}
if($action=="set"){
	$configfile = $arrstr;
	//ִ������ͬ����
		
}
if($action=="getTemplateVariable"){
	
		//ģ��Ŀ¼����
		if($templatefolder==""){
			$templatefolder = "default";	
		}
		if(is_file(WEBROOT.'/template/'.$templatefolder.'/config.php')){
			include_once(WEBROOT.'/template/'.$templatefolder.'/config.php');
		}else{
			$CustomVariable = array();
		}
		
        $data2 = array(
            'content' => NewIconv("GBK","UTF-8",$CustomVariable),
        );
		exit($_GET['callback'].'('.json_encode($data2).')');
	
	//ִ������ͬ����
}
if($action=="uppic"){
	$filename = var_request("filename","");
	$formID = var_request("formID","");
	$strParm = "filename=".$filename."&formID=".$formID;
	
	redirect_to("upfile.php?".$strParm);
	exit;
	
}

$pageurl = urlencode($_SERVER['REQUEST_URI']);
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�Կ͵۹�</title>
</head>

<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<center>
<table width="96%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="10" align=center></td>
  </tr>
</table>

<?php  if($action=="") {?>

<table width="96%" border="0" cellpadding="3" cellspacing="0" bgcolor="#cccccc">
  <tr bgcolor="#c8ddf4">
    <td width="24%" align="right" bgcolor="#FFFFFF" class="paragraph" title="20039669">&nbsp;</td>
    <td width="76%" bgcolor="#ffffff">���ڵ�½��Ȩ�û���վ�������ġ�������
    </td>
  </tr>
</table>
<?php } ?>
<form style="display:<?php echo $action==""?"none":""?>" name="form1" id="form1" method="post" action="<?php echo SETSERVERURL."?pageurl=".$pageurl."&action=".$action;?>">
<table width="96%" border="0" cellpadding="3" cellspacing="0" bgcolor="#cccccc">
  <tr bgcolor="#c8ddf4">
    <td width="24%" align="right" bgcolor="#FFFFFF" class="paragraph" title="20039669">&nbsp;</td>
    <td width="76%" bgcolor="#ffffff">���ڵ�½��Ȩ�û���վ�������ġ�������
      <input type="submit" name="button" id="button" value="����" style="display:none"></td>
  </tr>
</table>
<textarea name="configfile" style="display:none"><?php echo($configfile);?></textarea>
<input type="hidden" name="cindex" value="<?php echo($cindex);?>">
<input type="hidden" name="verson" value="<?php echo(VERSON);?>">
<input type="hidden" name="autousername" value="<?php echo($taobao_username);?>">
<input type="hidden" name="autopassword" value="<?php echo($taobao_usermd5);?>">
<input type="submit" name="" id="" style="display:none">
</form>
<script type="text/javascript"> 
document.getElementById("form1").submit();
</script>
<table width="96%" height="91" border="0" cellpadding="0" cellspacing="0" style="display:<?php echo $action==""?"none":""?>">
  <tr> 
    <td height="1" bgcolor="#b2b2b2"></td>
  </tr>
  <tr>
    <td height="90" align=center><p class="STYLE2">
      �߼��û���վ�������ģ��ṩ�Կ͵۹���վƽ̨�������á�</p>
      <p class="STYLE2">�������߱��ݻָ�������վ���ã������������°汾��վ��װ�����������������ṩ�������ù��ߣ�Ϊ������������á�<br> 
      </p>
      <p>&nbsp;    </p>      </td>
  </tr>
</table>
</center>
</body>
</html>

<?php
require_once '../include/adminfunction.php';
checkadmin();
function updatesettext($text){
    return $text;
}

function getsmallPid($pid){

	$pidarr = explode("_",$pid);	
	$smallpid = $pidarr[1];
	
	if(count($pidarr)!=4){
		echo("<script language=\"JavaScript\">alert(\"pid�ĸ�ʽ������ȷ��ʽΪmm_88888888_12345678_12345678�����ģ���mm���������֣���������д����\");history.go(-1);</script>");
		exit;
	}
	
	
	return $smallpid;
}


$action=var_request("action","");
$errmsg = "";
if($action=="ok"){

	$rootroad =			updatesettext(var_request("txtrootroad",""));
	
	if(strlen($crootroad)>=1 && substr($crootroad,strlen($crootroad)-1,1)=="/"){
		$crootroad = substr($crootroad,0,strlen($crootroad)-1);
	}

	
	$usernick =			updatesettext(var_request("txtnick",""));
	$ctxtweijingtai =			updatesettext(var_request("txtweijingtai","0"));
	$sitetitle =  		updatesettext(var_request("txttitle",""));
	$sitetitleurl =  			updatesettext(var_request("txturl",""));
	$sitekey =  		updatesettext(var_request("txtkeyword",""));
	$sitedesc =  	updatesettext(var_request("txtsitedesc",""));
	$indextitle =  	updatesettext(var_request("indextitle",""));
	$beianxinxi =  		updatesettext(var_request("txtbeian",""));
	$webcontact =  	updatesettext(var_request("txtwebcontact",""));
	$tongjidaima =  		updatesettext($_POST["txtcountjs"]);
	$setCacheTime =  		updatesettext(var_request("txthuancun",""));
	
	
		if(get_magic_quotes_gpc()=="1"){
			$tongjidaima=stripslashes(html_entity_decode($tongjidaima,ENT_QUOTES));
		}
		
		

	saveConfigFile();
	
	
	
	
	
	redirect_to("manageconfig.php?add=ok");
	exit;
}



?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�Կ͵۹�</title>
	<link rel='stylesheet' href='images/order.css'>
	<link href="../statics/admin/css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<center>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
  <tr>
    <td height="30" colspan="2" align="left" bgcolor="#FFFBD9">&nbsp;&nbsp;&nbsp;&nbsp;<strong>��������</strong></td>
  </tr>
</table>

<div class="height1"></div>

<div class="small_daohang_width">


<!--�м�˵���-->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1" bgcolor="#6699CC"></td>
    <td width="5" bgcolor="#D8ECFF"></td>
    <td bgcolor="#D8ECFF" align="left" valign="top" class="listdh" >
      
      <table border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="21">&nbsp;</td>
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="manageconfig.php"><strong>������������</strong></a></td>
        </tr>
      </table>
      <table border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="21">&nbsp;</td>
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="managePaiApp.php">����APPKEY����</a></td>
        </tr>
      </table>
      <table border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="21">&nbsp;</td>
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="manageB2CAPP.php">B2C��APPKEY����</a></td>
        </tr>
    </table>
      <table border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="21">&nbsp;</td>
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="manageAPP.php">�Ա�APPKEY����</a></td>
        </tr>
    </table></td>
    <td bgcolor="#6699CC" width="1"><img src="images/c.gif" alt="" width="1" height="1" border="0"></td>
  </tr>
</table>

<div class="height1"></div>

</div>

<table width="96%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="10" align=center></td>
  </tr>
</table>

<?php if(var_request("add","")=="ok"){?>
<table width="96%" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#FFFFCC"><a href="manageconfig.php"><span class="STYLE2">�޸ĳɹ���</span></a> </td>
  </tr>
</table>
<?php }?>
<form name="form1" method="post" action="manageconfig.php?action=ok">
<table width="96%" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
  <tr bgcolor="#666666">
    <td width="25%" height="30" align="right" bgcolor="#FFFFFF" class="paragraph" >��վ����Ŀ¼��</td>
    <td width="75%" align="left" bgcolor="#FFFFFF"><input type="text" name="txtrootroad" id="txtrootroad" value="<?php echo $rootroad ?>">
	<span class="paragraph">(��ܰ��ʾ�����վ����ڸ�Ŀ¼��Ϊ�ռ��� ���������Ŀ¼ ������д:/taodi)</span>
	</td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td height="30" align="right" bgcolor="#FFFFFF" class="paragraph" >����ʱ�䣺</td>
    <td align="left" bgcolor="#ffffff"><input type="text" name="txthuancun" id="txthuancun" value="<?php echo $setCacheTime ?>">
      <span class="paragraph">(��ܰ��ʾ��Ĭ��0��ʾ�رջ��湦��,��λΪСʱ����������������ٶȣ�����ռ�ÿռ䡣)</span></td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td height="30" align="right" bgcolor="#FFFFFF" class="paragraph" >��վ���ƣ�</td>
    <td align="left" bgcolor="#ffffff"><input type="text" name="txttitle" id="txttitle" value="<?php echo $sitetitle ?>"></td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td height="30" align="right" bgcolor="#FFFFFF" class="paragraph" >��վ������</td>
    <td align="left" bgcolor="#ffffff"><input name="txturl" type="text" id="txturl" value="<?php echo $sitetitleurl?>" size="40">
	<span class="paragraph">(��ܰ��ʾ����д����վ������,��ʽΪ:http://www.abc.com,��������Ŀ¼��/)</span>
	</td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td height="30" align="right" bgcolor="#FFFFFF" class="paragraph" >��ҳ���⣺</td>
    <td align="left" bgcolor="#ffffff"><input type="text" name="indextitle" id="indextitle" value="<?php echo $indextitle ?>"></td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td height="30" align="right" bgcolor="#FFFFFF" class="paragraph" >��ҳ�ؼ��ʣ�</td>
    <td align="left" bgcolor="#ffffff"><input name="txtkeyword" type="text" id="txtkeyword" value="<?php echo $sitekey?>" size="60"></td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td height="30" align="right" bgcolor="#FFFFFF" class="paragraph" >��ҳ����˵����</td>
    <td align="left" bgcolor="#ffffff"><textarea name="txtsitedesc" cols="60" rows="3" id="txtsitedesc"><?php echo $sitedesc?></textarea></td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td height="30" align="right" bgcolor="#FFFFFF" class="paragraph" >��վ�����ţ�</td>
    <td align="left" bgcolor="#ffffff"><input type="text" name="txtbeian" id="txtbeian" value="<?php echo $beianxinxi?>"></td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td height="30" align="right" bgcolor="#FFFFFF" class="paragraph" >վ����ϵ��ʽ��</td>
    <td align="left" bgcolor="#ffffff"><input name="txtwebcontact" type="text" id="txtnick8" size="60" value="<?php echo $webcontact; ?>"></td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td height="30" align="right" bgcolor="#FFFFFF" class="paragraph" >ͳ�ƴ��룺</td>
    <td align="left" bgcolor="#ffffff"><textarea name="txtcountjs" cols="60" rows="3" id="txtcountjs"><?php echo stripslashes(html_entity_decode($tongjidaima,ENT_QUOTES));?></textarea>
	<span class="paragraph">(��ܰ��ʾ��<a href="http://www.cnzz.com/" target="_blank">�������</a> ����ͳ�ƴ���)</span>
	</td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td height="30" align="right" bgcolor="#FFFFFF" class="paragraph" >&nbsp;</td>
    <td align="left" bgcolor="#ffffff"><label>
      <input type="submit" name="button" id="button" value="�ύ">
      <input type="reset" name="button2" id="button2" value="����">
    </label></td>
  </tr>
</table>
</form>
</center>


</body>
</html>

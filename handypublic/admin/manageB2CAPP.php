<?php
require_once '../include/adminfunction.php';
checkadmin();
function updatesettext($text){
	if($text=="")
		return "";
	$text = htmlspecialchars($text,ENT_QUOTES);
    return $text;
}

$B2CArrayAppKey;
$B2CArrayAppSecret;

$action=var_request("action","");
$errmsg = "";
if($action=="update" || $action=="add"){

	
	
	//����APPKEY�ı䶯
	$B2CArrayAppKey = trim(updatesettext(var_request("B2CArrayAppKey","")));
	$B2CArrayAppSecret = trim(updatesettext(var_request("B2CArrayAppSecret","")));
	
	$cappno = var_request("appno","0");
	$cbutton = var_request("button","0");
	
	if($B2CArrayAppKey=="" || $B2CArrayAppSecret==""){
		echo("<script language=\"JavaScript\">alert(\"��������ݲ�ȫ�����������룡��\");history.go(-1);</script>");
		exit;
	}
	
	
	
	//���õ��ֶ�
	saveConfigFile();
	
	redirect_to("manageB2CAPP.php?add=ok");
	exit;
}





?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�Կ͵۹�</title>
	<link rel='stylesheet' href='images/order.css'>
	<link href="../statics/admin/css/style.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
<!--
.STYLE2 {color: #FF0000}
-->
    </style>
</head>

<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<center>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
  <tr>
    <td height="30" colspan="2" align="left" bgcolor="#FFFBD9">&nbsp;&nbsp;&nbsp;&nbsp;<strong>b2c�̳�APPKEY����</strong></td>
  </tr>
</table>

<div class="height1"></div>
<div class="small_daohang_width">


<!--�м�˵���-->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1" bgcolor="#6699CC"><img src="images/c.gif" alt="" width="1" height="1" border="0"></td>
    <td width="5" bgcolor="#D8ECFF"></td>
    <td bgcolor="#D8ECFF" align="left" valign="top" class="listdh" >
      
      <table border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="21">&nbsp;</td>
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="manageconfig.php">������������</a></td>
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
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="manageB2CAPP.php"><strong>B2C��APPKEY����</strong></a></td>
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
<script language="javascript">

function showUpfile(formId,filename,GetformID){
	if(document.getElementById(formId).style.display!="none"){
		document.getElementById(formId).style.display="none";
		document.getElementById(formId).innerHTML ="";
	}else{
		document.getElementById(formId).style.display="";
		document.getElementById(formId).innerHTML ="<iframe src=\"upfile.php?filename="+filename+"&formID="+GetformID+"\" scrolling=\"no\" frameborder=\"0\" height=\"28\" width=\"500\"></iframe>";
	}
}


</script>

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
<p>
  <?php }?>
</p>
<table border="0" cellspacing="0" cellpadding="4">
  <tr>
    <th height="30" align="right" scope="row">����APPkey��һ����</th>
    <td>�� <a href="http://www.59miao.com/" target="_blank">http://www.59miao.com/</a>�����Ͻǵ�<a href="http://u.59miao.com/reg/">ע��</a>��ťע��һ�����ʺš�</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">����APPkey�ڶ�����</th>
    <td>����<a href="http://u.59miao.com/reg/" target="_blank">�û�����</a>���<a href="http://u.59miao.com/p/app/create/" target="_blank">����Ӧ��</a>�����ӡ�</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">����APPkey��������</th>
    <td><p>��д��ɺ��ύȷ�ϴ����� </p>
    </td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">����APPkey���Ĳ���</th>
    <td>���Ӧ�����ƣ����Բ鿴Ӧ����ϸ������õ�<span class="paragraph">AppKey</span> �� AppSecre ������������</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">����Ҫ����</th>
    <td>����Ŀ��д��APPKEY�������Ա�APPKEY����B2C�̳�ר��APPKEY���������ʹ�á�</td>
  </tr>
</table>
<form name="form1" method="post" action="manageB2CAPP.php?action=update" style=" margin:2px;">
  <table width="650" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc"><tr bgcolor="#c8ddf4">
    <td align="right" bgcolor="#FFFFFF" class="paragraph" >AppKey��</td>
    <td bgcolor="#ffffff"><input type="text" name="B2CArrayAppKey" id="txtrootroad" value="<?php echo $B2CArrayAppKey ?>"></td>
    <td bgcolor="#ffffff"><div align="right">AppSecre��</div></td>
    <td bgcolor="#ffffff"><input name="B2CArrayAppSecret" type="text" id="txtrootroad2" value="<?php echo $B2CArrayAppSecret ?>" size="35"></td>
    <td bgcolor="#ffffff"><label>
      <input type="submit" name="button" id="button" value="�޸�">
      <input type="hidden" name="appno" value="<?php echo $i?>">
    </label></td>
</tr>
</table>
</form>


<table width="96%" height="91" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="1" bgcolor="#b2b2b2"></td>
  </tr>
  <tr>
    <td height="90" align=center><span class="STYLE2"><br>
      <br>�������App Key ��������� <a href="http://www.cnmysoft.com/bbs/thread-178219-1-1.html" target="_blank">�������</a> �鿴���벽��</span><br> 
<p>ע�⣬���APPKEY�������Ա�APPKEY����59�뿪��ƽ̨�ģ�ר������B2C�ƹ�ġ�59�뿪��ƽ̨��Ŀǰ�����Ƶ���Ƶ�ʣ����ҿ�������������ʹ�ã����Һ���ʹ�ã���Ҫ�˷��������࿪��һ�㻺��ʱ�䡣</p>      </td>
  </tr>
</table>

</center>
</body>
</html>

<?php
require_once '../include/adminfunction.php';
checkadmin();
function updatesettext($text){
	if($text=="")
		return "";
	$text = htmlspecialchars($text,ENT_QUOTES);
    return $text;
}


$action=var_request("action","");
$errmsg = "";
if($action=="ok"){

	$cusername =			updatesettext(var_request("username",""));
	$cpassword =			updatesettext(var_request("password",""));
	$cpassword2 =			updatesettext(var_request("password2",""));

	if($cusername=="" || $cpassword=="" || $cpassword!=$cpassword2 ){
		echo("<script language=\"JavaScript\">alert(\"�˺����벻��Ϊ�գ��������������һ����\");history.go(-1);</script>");
		exit;
	}
	
	
$manage_adminname=$cusername;
$manage_adminpass=md5($cpassword);

	saveConfigFile();
	
	redirect_to("manageUser.php?add=ok");
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
<style>

</style>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
  <tr>
    <td height="30" colspan="2" align="left" bgcolor="#FFFBD9">&nbsp;&nbsp;&nbsp;&nbsp;<strong>����Ա�˺������޸�</strong></td>
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
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="manageUser.php">�˺������޸�</a></td>
        </tr>
      </table>
      
      
      </td>
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
<center>
<?php if(var_request("add","")=="ok"){?>
<table width="96%" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#FFFFCC"><a href="manageUser.php"><span class="STYLE2">�޸ĳɹ���</span></a> </td>
  </tr>
</table>
<?php }?>
<form name="form1" method="post" action="manageUser.php?action=ok">
<table width="96%" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
  <tr>
    <td height="30" colspan="2" bgcolor="white">&nbsp;</td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td align="right" bgcolor="#FFFFFF" class="paragraph" title="20039669">�˺ţ�</td>
    <td bgcolor="#ffffff"><input type="text" name="username" id="txtrootroad" value="<?php echo $manage_adminname ?>" style="width:150px;">
    �˺�Ҳ��������޸ģ�������Ӣ�ļ�����</td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td align="right" bgcolor="#FFFFFF" class="paragraph" title="20039669">�����룺</td>
    <td bgcolor="#FFFFFF">
      <label>
        <input type="password" name="password" value="" style="width:150px;">
        </label>    </td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td width="25%" align="right" bgcolor="#FFFFFF" class="paragraph" title="20039669">ȷ�����룺</td>
    <td width="75%" bgcolor="#ffffff"><input type="password" name="password2" value="" style="width:150px;"></td>
  </tr>
  <tr bgcolor="#c8ddf4">
    <td align="right" bgcolor="#FFFFFF" class="paragraph" title="20039669">&nbsp;</td>
    <td bgcolor="#ffffff"><label>
      <input type="submit" name="button" id="button" value="�ύ">
      <input type="reset" name="button2" id="button2" value="����">
    </label></td>
  </tr>
</table>
</form><br>


<table width="96%" height="91" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="1" bgcolor="#b2b2b2"></td>
  </tr>
  <tr>
    <td height="90" align=center>
<br> 
<p>&nbsp;    </p>

      </td>
  </tr>
</table>
</center>
</body>
</html>

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
	$paipai_uid = trim(updatesettext(var_request("paipai_uid","")));
	$paipai_uin = trim(updatesettext(var_request("paipai_uin","")));
	$paipai_appOAuthID = trim(updatesettext(var_request("paipai_appOAuthID","")));
	$paipai_appOAuthkey = trim(updatesettext(var_request("paipai_appOAuthkey","")));
	$paipai_accessToken = trim(updatesettext(var_request("paipai_accessToken","")));
	if($paipai_uin=="" || $paipai_appOAuthID=="" || $paipai_appOAuthkey=="" || $paipai_accessToken==""){
		echo("<script language=\"JavaScript\">alert(\"��������ݲ�ȫ�����������룡��\");history.go(-1);</script>");
		exit;
	}
	

	saveConfigFile();
	
	redirect_to("managePaiApp.php?add=ok");
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
    <td height="30" colspan="2" align="left" bgcolor="#FFFBD9">&nbsp;&nbsp;&nbsp;&nbsp;<strong>�����̳�APPKEY����</strong></td>
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
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="managePaiApp.php"><strong>����APPKEY����</strong></a></td>
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
    <th height="30" align="right" scope="row">�ƹ���id��ȡ��</th>
    <td> ��http://etg.qq.com�� ע���Ϊ���Ŀͣ� qq��¼���ɻ�ȡ�ƹ���id��</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">����APPkey��һ����</th>
    <td>��<a href="http://pop.paipai.com/"> http://pop.paipai.com/</a><a href="http://www.59miao.com/" target="_blank"> </a>�������Ϊ������顣</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">����APPkey�ڶ�����</th>
    <td>ʹ��qq��¼</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">����APPkey��������</th>
    <td>�������Ӧ��</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">����APPkey���Ĳ���</th>
    <td>Ӧ�����ͣ�ѡ��&ldquo;���Ŀ�(CPS)&rdquo;�������ɹ������Ӧ�����飬���Ի�ó��ƹ�id������в�����</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">����appkey��ɣ�</th>
    <td>Ӧ�������ڣ����Ի�ȡ<span class="paragraph">appOAuthID</span>��secretOAuthKey�� ��� &ldquo;��ȡ<span class="paragraph">accessToken</span>&rdquo; �İ�ť�󣬿��Ի��<span class="paragraph">accessToken</span>��<br>
      ע��ÿ�ε����ȡ��ť���������ɲ�ͬ��<span class="paragraph">accessToken</span>��</td>
  </tr>
</table>
<form name="form1" method="post" action="managePaiApp.php?action=update" style=" margin:2px;">
  <table width="650" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" >�ƹ���id��</td>
      <td bgcolor="#ffffff"><input type="text" name="paipai_uid" id="paipai_uid" value="<?php echo $paipai_uid ?>"></td>
    </tr>
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" >�ƹ���QQ��</td>
      <td bgcolor="#ffffff"><input type="text" name="paipai_uin" id="paipai_uin" value="<?php echo $paipai_uin ?>"></td>
    </tr>
    <tr bgcolor="#c8ddf4">
    <td align="right" bgcolor="#FFFFFF" class="paragraph" >appOAuthID��</td>
    <td bgcolor="#ffffff"><input type="text" name="paipai_appOAuthID" id="paipai_appOAuthID" value="<?php echo $paipai_appOAuthID ?>"></td>
    </tr>
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" ><div align="right">secretOAuthKey��</div></td>
      <td bgcolor="#ffffff"><input name="paipai_appOAuthkey" type="text" id="paipai_appOAuthkey" value="<?php echo $paipai_appOAuthkey ?>" size="35"></td>
      </tr>
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" >accessToken��</td>
      <td bgcolor="#ffffff"><input name="paipai_accessToken" type="text" id="paipai_accessToken" value="<?php echo $paipai_accessToken ?>" size="35"></td>
      </tr>
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" >&nbsp;</td>
      <td bgcolor="#ffffff"><input type="submit" name="button" id="button" value="�޸�"></td>
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
<p>ע�⣬���APPKEY�������Ա�APPKEY������Ѷ����ƽ̨�ģ����Һ���ʹ�ã���Ҫ�˷��������࿪��һ�㻺��ʱ�䡣����Ŀǰ�����Ǻ����У������Ѿ�չ���˾޴��Ǳ����</p>      
��Ʒ��ѯ����Ҳ���Ա������ƵĶࡣ</td>
  </tr>
</table>

</center>
</body>
</html>

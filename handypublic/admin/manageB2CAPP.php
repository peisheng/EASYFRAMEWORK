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

	
	
	//计算APPKEY的变动
	$B2CArrayAppKey = trim(updatesettext(var_request("B2CArrayAppKey","")));
	$B2CArrayAppSecret = trim(updatesettext(var_request("B2CArrayAppSecret","")));
	
	$cappno = var_request("appno","0");
	$cbutton = var_request("button","0");
	
	if($B2CArrayAppKey=="" || $B2CArrayAppSecret==""){
		echo("<script language=\"JavaScript\">alert(\"输入的内容不全，请重新输入！！\");history.go(-1);</script>");
		exit;
	}
	
	
	
	//配置的字段
	saveConfigFile();
	
	redirect_to("manageB2CAPP.php?add=ok");
	exit;
}





?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>淘客帝国</title>
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
    <td height="30" colspan="2" align="left" bgcolor="#FFFBD9">&nbsp;&nbsp;&nbsp;&nbsp;<strong>b2c商城APPKEY设置</strong></td>
  </tr>
</table>

<div class="height1"></div>
<div class="small_daohang_width">


<!--中间菜单区-->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1" bgcolor="#6699CC"><img src="images/c.gif" alt="" width="1" height="1" border="0"></td>
    <td width="5" bgcolor="#D8ECFF"></td>
    <td bgcolor="#D8ECFF" align="left" valign="top" class="listdh" >
      
      <table border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="21">&nbsp;</td>
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="manageconfig.php">基本参数设置</a></td>
        </tr>
      </table>
      <table border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="21">&nbsp;</td>
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="managePaiApp.php">拍拍APPKEY设置</a></td>
        </tr>
      </table>
      <table border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="21">&nbsp;</td>
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="manageB2CAPP.php"><strong>B2C的APPKEY设置</strong></a></td>
        </tr>
    </table>
      <table border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="21">&nbsp;</td>
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="manageAPP.php">淘宝APPKEY设置</a></td>
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
    <td height="30" colspan="2" align="center" bgcolor="#FFFFCC"><a href="manageconfig.php"><span class="STYLE2">修改成功！</span></a> </td>
  </tr>
</table>
<p>
  <?php }?>
</p>
<table border="0" cellspacing="0" cellpadding="4">
  <tr>
    <th height="30" align="right" scope="row">申请APPkey第一步：</th>
    <td>打开 <a href="http://www.59miao.com/" target="_blank">http://www.59miao.com/</a>点右上角的<a href="http://u.59miao.com/reg/">注册</a>按钮注册一个新帐号。</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">申请APPkey第二步：</th>
    <td>进入<a href="http://u.59miao.com/reg/" target="_blank">用户中心</a>点击<a href="http://u.59miao.com/p/app/create/" target="_blank">创建应用</a>的链接。</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">申请APPkey第三步：</th>
    <td><p>填写完成后，提交确认创建。 </p>
    </td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">申请APPkey第四步：</th>
    <td>点击应用名称，可以查看应用详细，将获得的<span class="paragraph">AppKey</span> 和 AppSecre 填到下面的输入框里。</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">【重要】：</th>
    <td>本栏目填写的APPKEY，不是淘宝APPKEY，是B2C商城专用APPKEY。请勿混淆使用。</td>
  </tr>
</table>
<form name="form1" method="post" action="manageB2CAPP.php?action=update" style=" margin:2px;">
  <table width="650" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc"><tr bgcolor="#c8ddf4">
    <td align="right" bgcolor="#FFFFFF" class="paragraph" >AppKey：</td>
    <td bgcolor="#ffffff"><input type="text" name="B2CArrayAppKey" id="txtrootroad" value="<?php echo $B2CArrayAppKey ?>"></td>
    <td bgcolor="#ffffff"><div align="right">AppSecre：</div></td>
    <td bgcolor="#ffffff"><input name="B2CArrayAppSecret" type="text" id="txtrootroad2" value="<?php echo $B2CArrayAppSecret ?>" size="35"></td>
    <td bgcolor="#ffffff"><label>
      <input type="submit" name="button" id="button" value="修改">
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
      <br>如何申请App Key 不会申请的 <a href="http://www.cnmysoft.com/bbs/thread-178219-1-1.html" target="_blank">点击这里</a> 查看申请步骤</span><br> 
<p>注意，这个APPKEY，不是淘宝APPKEY，是59秒开放平台的，专门用于B2C推广的。59秒开放平台，目前不限制调用频率，并且可以任意无限制使用，请大家合理使用，不要浪费流量，多开启一点缓存时间。</p>      </td>
  </tr>
</table>

</center>
</body>
</html>

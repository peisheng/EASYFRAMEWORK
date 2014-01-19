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
	$paipai_uid = trim(updatesettext(var_request("paipai_uid","")));
	$paipai_uin = trim(updatesettext(var_request("paipai_uin","")));
	$paipai_appOAuthID = trim(updatesettext(var_request("paipai_appOAuthID","")));
	$paipai_appOAuthkey = trim(updatesettext(var_request("paipai_appOAuthkey","")));
	$paipai_accessToken = trim(updatesettext(var_request("paipai_accessToken","")));
	if($paipai_uin=="" || $paipai_appOAuthID=="" || $paipai_appOAuthkey=="" || $paipai_accessToken==""){
		echo("<script language=\"JavaScript\">alert(\"输入的内容不全，请重新输入！！\");history.go(-1);</script>");
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
    <td height="30" colspan="2" align="left" bgcolor="#FFFBD9">&nbsp;&nbsp;&nbsp;&nbsp;<strong>拍拍商城APPKEY设置</strong></td>
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
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="managePaiApp.php"><strong>拍拍APPKEY设置</strong></a></td>
        </tr>
      </table>
      <table border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="21">&nbsp;</td>
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="manageB2CAPP.php">B2C的APPKEY设置</a></td>
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
    <th height="30" align="right" scope="row">推广者id获取：</th>
    <td> 打开http://etg.qq.com， 注册成为拍拍客， qq登录即可获取推广者id。</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">申请APPkey第一步：</th>
    <td>打开<a href="http://pop.paipai.com/"> http://pop.paipai.com/</a><a href="http://www.59miao.com/" target="_blank"> </a>点申请成为合作伙伴。</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">申请APPkey第二步：</th>
    <td>使用qq登录</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">申请APPkey第三步：</th>
    <td>点击创建应用</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">申请APPkey第四步：</th>
    <td>应用类型，选择&ldquo;拍拍客(CPS)&rdquo;，创建成功。点击应用详情，可以获得除推广id外的所有参数。</td>
  </tr>
  <tr>
    <th height="30" align="right" scope="row">申请appkey完成：</th>
    <td>应用详情内，可以获取<span class="paragraph">appOAuthID</span>和secretOAuthKey， 点击 &ldquo;获取<span class="paragraph">accessToken</span>&rdquo; 的按钮后，可以获得<span class="paragraph">accessToken</span>。<br>
      注意每次点击获取按钮，都会生成不同的<span class="paragraph">accessToken</span>。</td>
  </tr>
</table>
<form name="form1" method="post" action="managePaiApp.php?action=update" style=" margin:2px;">
  <table width="650" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" >推广者id：</td>
      <td bgcolor="#ffffff"><input type="text" name="paipai_uid" id="paipai_uid" value="<?php echo $paipai_uid ?>"></td>
    </tr>
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" >推广者QQ：</td>
      <td bgcolor="#ffffff"><input type="text" name="paipai_uin" id="paipai_uin" value="<?php echo $paipai_uin ?>"></td>
    </tr>
    <tr bgcolor="#c8ddf4">
    <td align="right" bgcolor="#FFFFFF" class="paragraph" >appOAuthID：</td>
    <td bgcolor="#ffffff"><input type="text" name="paipai_appOAuthID" id="paipai_appOAuthID" value="<?php echo $paipai_appOAuthID ?>"></td>
    </tr>
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" ><div align="right">secretOAuthKey：</div></td>
      <td bgcolor="#ffffff"><input name="paipai_appOAuthkey" type="text" id="paipai_appOAuthkey" value="<?php echo $paipai_appOAuthkey ?>" size="35"></td>
      </tr>
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" >accessToken：</td>
      <td bgcolor="#ffffff"><input name="paipai_accessToken" type="text" id="paipai_accessToken" value="<?php echo $paipai_accessToken ?>" size="35"></td>
      </tr>
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" >&nbsp;</td>
      <td bgcolor="#ffffff"><input type="submit" name="button" id="button" value="修改"></td>
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
<p>注意，这个APPKEY，不是淘宝APPKEY，是腾讯拍拍平台的，请大家合理使用，不要浪费流量，多开启一点缓存时间。拍拍目前还不是很流行，但是已经展现了巨大的潜力！</p>      
商品查询参数也比淘宝的完善的多。</td>
  </tr>
</table>

</center>
</body>
</html>

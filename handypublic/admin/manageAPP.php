<?php
require_once '../include/adminfunction.php';
checkadmin();
function updatesettext($text){
	if($text=="")
		return "";
	$text = htmlspecialchars($text,ENT_QUOTES);
    return $text;
}
$appkey_arr = explode(",",$ArrayAppKey);
$appsecret_arr = explode(",",$ArrayAppSecret);


$action=var_request("action","");
$errmsg = "";
if($action=="update" || $action=="add" || $action=="delete"){

	function getsmallPid($pid){
	
		$pidarr = explode("_",$pid);	
		$smallpid = $pidarr[1];
		
		if(count($pidarr)!=4){
			echo("<script language=\"JavaScript\">alert(\"pid的格式错误。正确格式为mm_88888888_12345678_12345678这样的，有mm和三串数字，请重新填写！！\");history.go(-1);</script>");
			exit;
		}
		
		
		return $smallpid;
	}
	$userpid =  			updatesettext(var_request("txtpid",""));
	$userpiddp = getsmallPid($userpid);
	
	//计算APPKEY的变动
	$ArrayAppKey = trim(updatesettext(var_request("txtappkey","")));
	$ArrayAppSecret = trim(updatesettext(var_request("txtappsecre","")));
	
	$taobao_username = trim(updatesettext(var_request("taobao_username","")));
	
	
	$taobao_usermd5_tmp = trim(updatesettext(var_request("taobao_usermd5","")));
	if($taobao_usermd5 != $taobao_usermd5_tmp){
		$taobao_usermd5 = md5($taobao_usermd5_tmp);
	}
	

	saveConfigFile(); 
	
	redirect_to("manageAPP.php?add=ok");

	
	
	exit;
}





?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>淘客帝国</title>
	<link rel='stylesheet' href='images/order.css'>
	<link href="../statics/admin/css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<center>
<style>

</style>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
  <tr>
    <td height="30" colspan="2" align="left" bgcolor="#FFFBD9">&nbsp;&nbsp;&nbsp;&nbsp;<strong>淘宝APPKEY设置</strong></td>
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
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="manageB2CAPP.php">B2C的APPKEY设置</a></td>
        </tr>
    </table>
      <table border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="21">&nbsp;</td>
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="manageAPP.php"><strong>淘宝APPKEY设置</strong></a></td>
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
<table border="0" cellspacing="8">
  <tr>
    <th height="25" align="right" scope="row">申请APPkey第一步：</th>
    <td>打开 <a href="http://my.open.taobao.com/xtao/createWebsite.htm" target="_blank">http://my.open.taobao.com/xtao/createWebsite.htm</a> 填写网站名称和网址。</td>
  </tr>
  <tr>
    <th height="25" align="right" scope="row">申请APPkey第二步：</th>
    <td>下载网站验证文件 <SPAN id="verifyfile"><a href="http://my.open.taobao.com/xtao/downloadAuthFile.do">xtaoAuth.txt 点击下载</a></SPAN></td>
  </tr>
  <tr>
    <th height="25" align="right" scope="row">申请APPkey第三步：</th>
    <td><p>上传验证文件到本站根目录下 (本表单支持两种文件：<strong>xtaoAuth.html</strong> 和<strong> root.txt</strong>)</p>
    </td>
  </tr>
  <tr>
    <th height="25" align="right" scope="row">&nbsp;</th>
    <td>&nbsp;<iframe src="upfile.php?filename=xtaoAuth" scrolling="no" frameborder="0" height="28" width="500"></iframe></td>
  </tr>
  <tr>
    <th height="25" align="right" scope="row">申请APPkey第四步：</th>
    <td>在淘宝http://my.open.taobao.com/xtao/createWebsite.htm这个页面的验证按钮点击验证。</td>
  </tr>
  <tr>
    <th height="25" align="right" scope="row">申请APPkey第五步：</th>
    <td>申请成功，复制APPKEY和appsrec填到下面第一个APP里。</td>
  </tr>
  <tr>
    <th height="50" align="right" scope="row">申请APPkey第六步【重要】：</th>
    <td>APPKEY的属性里，有一个【提交审核】的按钮，网站每日平均访客大于100，就可以提交审核。<br>审核通过后，就有充足的流量，足以满足网站任何访问频率。</td>
  </tr>
  <tr>
    <th height="25" align="right" scope="row">官方论坛完整图文教程：</th>
    <td><a href="http://www.cnmysoft.com/bbs/thread-1181-1-1.html" target="_blank">点击打开：<span class="blue"><strong>http://www.cnmysoft.com/bbs/thread-1181-1-1.html </strong></span></a></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>
  <table width="800" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
<form name="form1" method="post" action="manageAPP.php?action=update" style=" margin:2px;">
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" >淘宝客pid(淘金点)：</td>
      <td width="82%" bgcolor="#ffffff"><input name="txtpid" type="text" id="txtpid" value="<?php echo $userpid?>" size="35">        
        <span class="paragraph">(淘宝客Pid，格式为mm_12345567_4345677_98765432 。请<a href="http://www.cnmysoft.com/new/120.html" target="_blank"><strong>点击这里申请</strong></a>)</span></td>
    </tr>
</p>
<tr bgcolor="#c8ddf4">
  <td align="right" bgcolor="#FFFFFF" class="paragraph" >淘客帝国论坛授权帐号：</td>
  <td bgcolor="#ffffff"><input name="taobao_username" type="text" id="taobao_username" value="<?php echo $taobao_username ?>" size="50">
    淘客帝国论坛帐号，可以借助帝国服务器调用淘宝数据。</td>
</tr>
<tr bgcolor="#c8ddf4">
  <td align="right" bgcolor="#FFFFFF" class="paragraph" >淘客帝国论坛密码：</td>
  <td bgcolor="#ffffff"><input name="taobao_usermd5" type="password" id="taobao_usermd5" onClick="this.select();" value="<?php echo $taobao_usermd5 ?>" size="50"></td>
</tr>
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" >&nbsp;</td>
      <td bgcolor="#ffffff">&nbsp;</td>
    </tr>
    <tr bgcolor="#c8ddf4">
    <td width="18%" align="right" bgcolor="#FFFFFF" class="paragraph" >淘宝AppKey：</td>
    <td bgcolor="#ffffff"><input type="text" name="txtappkey" id="txtrootroad" value="<?php echo $ArrayAppKey ?>">
      <input type="hidden" name="appno" value="<?php echo $i?>"> 
      注意，要填写有淘宝客增值包权限的淘宝appkey。如果没有，就不用填了。新手不用考虑。</td>
    </tr>
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" ><div align="right">淘宝AppSecre：</div></td>
      <td bgcolor="#ffffff"><input name="txtappsecre" type="text" id="txtrootroad2" value="<?php echo $ArrayAppSecret ?>" size="50"></td>
      </tr>
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" >&nbsp;</td>
      <td bgcolor="#ffffff">&nbsp;</td>
    </tr>
    <tr bgcolor="#c8ddf4">
      <td align="right" bgcolor="#FFFFFF" class="paragraph" >&nbsp;</td>
      <td bgcolor="#ffffff"><input type="submit" name="button" id="button" value="修改"></td>
    </tr>
</form>
</table>








</center>
</body>
</html>

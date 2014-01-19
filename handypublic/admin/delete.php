<?php
require_once '../include/adminfunction.php';
checkadmin();
ini_set('max_execution_time',0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />


<title>清理缓存中...缓存文件很多的时候需要多等待一会儿...</title>
	<link rel='stylesheet' href='images/order.css'>
	<link href="../statics/admin/css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<center>
<style>

</style>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
  <tr>
    <td height="30" colspan="2" align="left" bgcolor="#FFFBD9">&nbsp;&nbsp;&nbsp;&nbsp;<strong>清空缓存</strong></td>
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
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="delete.php">清空缓存</a></td>
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
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align=left>
    <p>
  <?php 
$fileNum=0;
print str_pad("",100000); 
flush();



$action=$_GET["action"];

if($action==1){
deldirdd(WEBROOT."include/log");
deldirdd(WEBROOT."Apicache");
	deldirdd(WEBROOT."/data/tpl_cache");
	deldirdd("./Runtime");
	deldirdd("../install/Runtime");
echo "已经成功删除缓存文件!共删除文件" . $fileNum ."个";
	echo "<br /><input type=button value=返回 onclick='history.go(-1)' />";
exit;
}
if($action==2){
	
	deldir(WEBROOT."Apicache",$setCacheTime*60*60);
	deldirdd(WEBROOT."/data/tpl_cache");
	deldirdd("./Runtime");
	deldirdd("../install/Runtime");
	echo "已经成功删除过期缓存文件!共删除文件" . $fileNum ."个";
	echo "<br /><input type=button value=返回 onclick='history.go(-1)' />";
	exit;
}
if($action==3){
	
	unlink(WEBROOT."/index.html");
	deldirdd(WEBROOT."/data/tpl_cache");
	deldirdd("./Runtime");
	deldirdd("../install/Runtime");
	echo "已删除index.html，访问index.php即可自动生成新首页静态文件。";
	echo "<br /><input type=button value=返回 onclick='history.go(-1)' />";
	exit;
}
if($action==4){
	
	deldirdd(WEBROOT."/data/tpl_cache");
	echo "已删除/data/tpl_cache目录下的模版缓存。";
	
	deldirdd("./Runtime");
	echo "已删除./Runtime目录下的模版缓存。";
	
	deldirdd("../install/Runtime");
	echo "已删除../install/Runtime目录下的模版缓存。";
	
	echo "<br /><input type=button value=返回 onclick='history.go(-1)' />";
	exit;
}

?> 



确认需要清空缓存么？ 如果您的APPKEY还没有通过审核上线，清空缓存会导致调用量不足。</p>
<p>&nbsp;</p>
<p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align=left><p>1、　<a href="delete.php?action=2">清空过期的API缓存文件（已存在超过<?php echo $setCacheTime;?>小时以上的缓存文件。）</a></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align=left><p>2、　<a href="delete.php?action=1">清空全部的API缓存文件</a></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align=left><p>3、　<a href="delete.php?action=3">清空首页静态页缓存</a>(删除index.html页面。该页面会在访问index.php时自动生成)</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align=left><p>4、　<a href="delete.php?action=4">清空模版缓存</a>(修改模版，更换模版，更改目录，修改后台目录名，都需要先清理模版缓存)</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align=left>&nbsp;</td>
  </tr>
  <tr>
    <td align=left>备注：清空全部的缓存文件，之后会重新建立缓存，需要消耗一定的APPKEY调用量。 在APPKEY刚申请的时候，不建议清空。缓存保存时间可以在基本参数里设置. 缓存的目录名是 Apicache目录，该目录不能设置只读。如果您备份网站，可以删除该目录。</td>
  </tr>
</table>
</body>
</html>



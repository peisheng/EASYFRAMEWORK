<?php
require_once '../include/adminfunction.php';
checkadmin();
ini_set('max_execution_time',0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />


<title>��������...�����ļ��ܶ��ʱ����Ҫ��ȴ�һ���...</title>
	<link rel='stylesheet' href='images/order.css'>
	<link href="../statics/admin/css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<center>
<style>

</style>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
  <tr>
    <td height="30" colspan="2" align="left" bgcolor="#FFFBD9">&nbsp;&nbsp;&nbsp;&nbsp;<strong>��ջ���</strong></td>
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
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="delete.php">��ջ���</a></td>
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
echo "�Ѿ��ɹ�ɾ�������ļ�!��ɾ���ļ�" . $fileNum ."��";
	echo "<br /><input type=button value=���� onclick='history.go(-1)' />";
exit;
}
if($action==2){
	
	deldir(WEBROOT."Apicache",$setCacheTime*60*60);
	deldirdd(WEBROOT."/data/tpl_cache");
	deldirdd("./Runtime");
	deldirdd("../install/Runtime");
	echo "�Ѿ��ɹ�ɾ�����ڻ����ļ�!��ɾ���ļ�" . $fileNum ."��";
	echo "<br /><input type=button value=���� onclick='history.go(-1)' />";
	exit;
}
if($action==3){
	
	unlink(WEBROOT."/index.html");
	deldirdd(WEBROOT."/data/tpl_cache");
	deldirdd("./Runtime");
	deldirdd("../install/Runtime");
	echo "��ɾ��index.html������index.php�����Զ���������ҳ��̬�ļ���";
	echo "<br /><input type=button value=���� onclick='history.go(-1)' />";
	exit;
}
if($action==4){
	
	deldirdd(WEBROOT."/data/tpl_cache");
	echo "��ɾ��/data/tpl_cacheĿ¼�µ�ģ�滺�档";
	
	deldirdd("./Runtime");
	echo "��ɾ��./RuntimeĿ¼�µ�ģ�滺�档";
	
	deldirdd("../install/Runtime");
	echo "��ɾ��../install/RuntimeĿ¼�µ�ģ�滺�档";
	
	echo "<br /><input type=button value=���� onclick='history.go(-1)' />";
	exit;
}

?> 



ȷ����Ҫ��ջ���ô�� �������APPKEY��û��ͨ��������ߣ���ջ���ᵼ�µ��������㡣</p>
<p>&nbsp;</p>
<p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align=left><p>1����<a href="delete.php?action=2">��չ��ڵ�API�����ļ����Ѵ��ڳ���<?php echo $setCacheTime;?>Сʱ���ϵĻ����ļ�����</a></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align=left><p>2����<a href="delete.php?action=1">���ȫ����API�����ļ�</a></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align=left><p>3����<a href="delete.php?action=3">�����ҳ��̬ҳ����</a>(ɾ��index.htmlҳ�档��ҳ����ڷ���index.phpʱ�Զ�����)</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align=left><p>4����<a href="delete.php?action=4">���ģ�滺��</a>(�޸�ģ�棬����ģ�棬����Ŀ¼���޸ĺ�̨Ŀ¼��������Ҫ������ģ�滺��)</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td align=left>&nbsp;</td>
  </tr>
  <tr>
    <td align=left>��ע�����ȫ���Ļ����ļ���֮������½������棬��Ҫ����һ����APPKEY�������� ��APPKEY�������ʱ�򣬲�������ա����汣��ʱ������ڻ�������������. �����Ŀ¼���� ApicacheĿ¼����Ŀ¼��������ֻ���������������վ������ɾ����Ŀ¼��</td>
  </tr>
</table>
</body>
</html>



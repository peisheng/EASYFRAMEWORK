<?php require_once 'global.php';?>
<?php require_once WEBROOT.'include/function.php';?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<STYLE type=text/css>
BODY {
FONT-SIZE: 12px;
SCROLLBAR-ARROW-COLOR: #000000;
FONT-FAMILY: "Verdana", "Arial", "Helvetica", "sans-serif";
SCROLLBAR-BASE-COLOR: #828fa2;
}
TD {
FONT-SIZE: 12px;
FONT-FAMILY: "Verdana", "Arial", "Helvetica", "sans-serif";
}
A:active {
COLOR: #000000; TEXT-DECORATION: underline
}
A:visited {
COLOR: #455164; TEXT-DECORATION: underline
}
A:hover {
COLOR: #000000; TEXT-DECORATION: none
}
A:link {
COLOR: #455164; TEXT-DECORATION: underline
}
</STYLE>
<TITLE>�����ʵ�ҳ���������Ѿ������ڣ�ϵͳ����Ϊ�����¶�������վ�е���Ӧ��ҳ.......</TITLE>
</head>
<body leftmargin="10" topmargin="10" marginwidth="10" marginheight="10" style="table-layout:fixed; word-break:break-all">
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="95%" align="center">
<tr align="center" valign="middle">
<td>
<br><center>
  <p><a href="<?php echo $rootroad ?>"><img src="<?php echo $logo?>" alt="<?php echo $sitetitle ?>" border="0" /></a></p>
  <p>&nbsp;</p>
</center>
<table border="0" cellspacing="1" cellpadding="10" bgcolor="#555555" width="60%">
<tr>
<td bgcolor="#EEEEEE" align="center">
<p><b>��ӭ����"<?php echo $sitetitle ?>"<a href=<?php echo $sitetitleurl ?>><?php echo $sitetitleurl ?></a>�������Բ���-��ҳ�������һЩ�������Ժ��ٽ��з��ʣ�</b></p></td>
</tr>
<tr>
<td bgcolor="#EEEEEE" align="left">
<p><!--#echo var="REQUEST_URI" --><br>
  <br>
����㲻��ȴ�����ֱ�ӵ����������ӽ��룺<a href=<?php echo $sitetitleurl ?> var="REQUEST_URI" -->><?php echo $sitetitleurl ?>
<!--#echo var="REQUEST_URI" --></a><br>


</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>

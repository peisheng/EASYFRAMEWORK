<?php require_once dirname(__FILE__)."/".'global.php';?>
<?php require_once WEBROOT.'include/function.php';
@header("http/1.1 404 not found");  
@header("status: 404 not found");

?>
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
<TITLE>您访问的页面错误或者已经不存在，系统正在为你重新定向到新网站中的相应网页.......</TITLE>
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
<p><b>欢迎访问"<?php echo $sitetitle ?>"<a href=<?php echo $sitetitleurl ?>><?php echo $sitetitleurl ?></a>，不过对不起-您走错路啦，该页面已经不存在了！不用着急--系统正在为你定向到主站....</b></p></td>
</tr>
<tr>
<td bgcolor="#EEEEEE" align="left">
<p><!--#echo var="REQUEST_URI" --><br>
  <br>
系统在5秒后将为你重新定向到<?php echo $sitetitle ?><strong><?php echo $sitetitleurl ?></strong>中相应的页面<br>
如果你不想等待，请直接点击下面的连接进入：<a href=<?php echo $sitetitleurl ?> var="REQUEST_URI" -->><?php echo $sitetitleurl ?>
<!--#echo var="REQUEST_URI" --></a><br>


</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>

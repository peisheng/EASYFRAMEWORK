<?php
require_once '../include/adminfunction.php';
checkadmin();

$action=var_request("action","");


$errmsg = "";
$pagetext="";
if($action=="update"){
	
	
	$templatefolder = htmlentities(var_request("templatefolder","default"));
	saveConfigFile();

	
	deldir(WEBROOT.'data/tpl_cache/',0);	
	redirect_to("managestyle.php?add=ok");
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
    <td height="30" colspan="2" align="left" bgcolor="#FFFBD9">&nbsp;&nbsp;&nbsp;&nbsp;<strong>模版设置</strong></td>
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
          <td width="124"><img src="images/folder_a.gif" alt="" width="10" height="10" border="0" align="absmiddle" />&nbsp;<a href="managestyle.php">模版设置</a></td>
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
<?php if(var_request("add","")=="ok"){?>
<table width="96%" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#FFFFCC"><a href="manageconfig.php"><span class="STYLE2">修改成功！</span></a> </td>
  </tr>
</table>
<?php }?>

    <table width="96%" border="0" cellpadding="10" cellspacing="1" bgcolor="#cccccc">
      <tr bgcolor="#c8ddf4">
        <th height="30" align="center" bgcolor="#FFFFFF" class="paragraph" title="20039669">模版名称</th>
        <th align="center" bgcolor="#ffffff">模版说明</th>
        <th align="center" bgcolor="#ffffff">选择</th>
        <th align="center" bgcolor="#ffffff">目录位置</th>
      </tr>
  <form name="form1" method="post" action="managestyle.php?action=update" style=" margin:2px;">
    <?php
	$dir = WEBROOT."template";
	$dh=opendir($dir);
	
	while ($file=readdir($dh))
	{
		
		if($file!="." && $file!="..")
		{
			$fullpath=$dir."/".$file;
			
			if(is_dir($fullpath) && is_file($fullpath."/config.php"))
			{
				include($fullpath."/config.php");
				
				
				
				?>
      <tr bgcolor="#c8ddf4">
        <td width="180" height="30" align="center" bgcolor="#FFFFFF" class="paragraph" title="20039669"><?php echo $temptitle;?><br></td>
        <td align="center" bgcolor="#ffffff"><?php echo $tempabout;?></td>
        <td align="center" bgcolor="#ffffff"><span class="paragraph">
          <input type="radio" name="templatefolder" id="type" value="<?php echo $file;?>" <?php echo $templatefolder==$file?"checked":""?>>
        </span></td>
        <td align="center" bgcolor="#ffffff">template/<?php echo $file;?></td>
       </tr>
				<?php
			}
		}
	}
	closedir($dh);
	
	?>
    
    
    
      <tr bgcolor="#c8ddf4">
        <td height="30" colspan="4" align="center" bgcolor="#FFFFFF" class="paragraph" title="20039669"><input type="submit" name="button" id="button" value="确认更换模版"></td>
      </tr>
  </form>
    </table>



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

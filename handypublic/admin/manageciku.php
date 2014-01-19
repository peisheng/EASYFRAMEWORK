<?php
require_once '../include/adminfunction.php';
checkadmin();

$arrKeyword = application("","../data/replacekeydata.php");
if(!is_array($arrKeyword)){
	$arrKeyword = array();
}

$action=var_request("action","");


$errmsg = "";
$pagetext="";
if($action=="update"){
	$keyword = htmlspecialchars(var_request("keyword",""),ENT_QUOTES);
	
	$keyword = str_replace("，",",",$keyword);
	$keyword = str_replace(" ",",",$keyword);
	$keyword = str_replace("|",",",$keyword);
	
	$arr = explode("\r",$keyword);
	
	$arrKeyword = array();
	foreach($arr as $val){
			$keyarr = explode(",",trim($val));
			
			if(count($keyarr)==2 && strlen($keyarr[0])>2 && strlen($keyarr[1])>2){
				$arrKeyword[$keyarr[0]] = $keyarr[1];
			}
	}
	
	
	setapplication("",$arrKeyword,"../data/replacekeydata.php");
	
	redirect_to("manageciku.php?add=ok");
	exit;
	
}

$strarrKeyword = "";

foreach($arrKeyword as $key=>$value){
	
	$strarrKeyword .= $key.",".$value."\r";
	
}

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>淘客帝国</title>
	<link rel='stylesheet' href='images/order.css'>
    <style type="text/css">
<!--
.STYLE2 {color: #FF0000}
-->
    </style>
</head>

<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<center>
<table width="96%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align=center>
<br> 
<p>&nbsp;    </p>

      </td>
  </tr>
</table>
<?php if(var_request("add","")=="ok"){?>
<table width="96%" border="0" cellpadding="3" cellspacing="1" bgcolor="#cccccc">
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#FFFFCC"><a href="manageciku.php"><span class="STYLE2">修改成功！</span></a> </td>
  </tr>
</table>
<?php }?>

  <form name="form1" method="post" action="manageciku.php?action=update" style=" margin:2px;">
    <table width="90%" border="0" cellpadding="10" cellspacing="1" bgcolor="#cccccc"><tr bgcolor="#c8ddf4">
        <td height="30" align="right" bgcolor="#FFFFFF" class="paragraph" title="20039669">同义词词库：</td>
        <td align="left" bgcolor="#ffffff"><textarea name="keyword" cols="60" rows="30" id="keyword"><?php echo $strarrKeyword ?></textarea></td>
        </tr>
      <tr bgcolor="#c8ddf4">
        <td height="30" align="right" bgcolor="#FFFFFF" class="paragraph" title="20039669">&nbsp;</td>
        <td bgcolor="#ffffff"><input type="submit" name="button" id="button" value="修改"></td>
      </tr>
    </table>
  </form>



<table width="96%" height="91" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="1" bgcolor="#b2b2b2"></td>
  </tr>
  <tr>
    <td height="90" align=center><p><span style="color:#FF0000">提示：词语和同义词必须成对出现。本功能是用来设置伪原创用的，用于标题同义词替换。请在伪原创设置里，开启使用。</span></p>

      </td>
  </tr>
</table>
</center>
</body>
</html>

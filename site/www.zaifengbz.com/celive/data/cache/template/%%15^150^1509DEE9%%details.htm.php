<?php /* Smarty version 2.6.25, created on 2012-06-30 10:55:23
         compiled from admin/details.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['lang']['charset']; ?>
" />
<link href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/css/admin/admin.css" rel="stylesheet" type="text/css" />
<title>CElive</title>
</head>
<?php echo '
<style type="text/css">
body {background:white}

#info {padding:10px;}
</style>
'; ?>

<body>

<div id="info">
<div class="tags">
<div id="tagstitle">
   <a id="one1" onclick="setTab('one',1,6)" class="hover">交谈内容列表</a>
  </div> 
  <div id="tagscontent">
    <div id="con_one_1">

<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%" class="list" id="table">
   <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="8">&nbsp;</td>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" width="100%">
          <form action="../admin/details.php" method="post">
          <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td width="3%" height="22" bgcolor="#FFFFFF"><div align="center" class="text1">
            <div align="right">用户名称&nbsp;&nbsp;&nbsp;&nbsp;</div>
            </div></td>
            <td width="12%" height="22" bgcolor="#FFFFFF"><div align="left"><span class="text1">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['username']; ?>
</span></div></td>
            </tr>
            <?php if ($this->_tpl_vars['ifadmin'] == 1): ?>
            <?php else: ?>
          <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td height="20" bgcolor="#FFFFFF"><div align="center" class="text1">
              <div align="right">原先密码&nbsp;&nbsp;&nbsp;&nbsp;</div>
            </div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="left"><span class="text1">&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="old_password" size="20" style="width:150px;" /></span></div></td>
            </tr>
          <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td height="20" bgcolor="#FFFFFF"><div align="left" class="text1">
              <div align="right">新的密码&nbsp;&nbsp;&nbsp;&nbsp;</div>
            </div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="left"><span class="text1">&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="new_password" size="20" style="width:150px;" /></span></div></td>
            </tr>
            <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td height="20" bgcolor="#FFFFFF"><div align="center" class="text1">
              <div align="right">重复密码&nbsp;&nbsp;&nbsp;&nbsp;</div>
            </div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="left"><span class="text1">&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="new_password_again" size="20" style="width:150px;" /></span></div></td>
            </tr>
            <?php endif; ?>
            <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td height="20" bgcolor="#FFFFFF"><div align="center" class="text1">
              <div align="right">客服姓名&nbsp;&nbsp;&nbsp;&nbsp;</div>
            </div></td>
            
            <td height="20" bgcolor="#FFFFFF"><div align="left"><span class="text1">&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="realname" value="<?php echo $this->_tpl_vars['realname']; ?>
" size="20" style="width:150px;" /></span></div></td>
            </tr>
            <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
            <td height="20" bgcolor="#FFFFFF"><div align="center" class="text1">
              <div align="right"></div>
            </div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="left"><span class="text1">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="button" name="submit" value="修改资料" /></span></div></td><input type="hidden" name="action" value="1" size="20" />
            </tr>
         </form>   
        </table></td>        
      </tr>
    </table></td>
  </tr>  
</table>
  </div>   </div>   </div> </div>
</body>
</html>
<?php /* Smarty version 2.6.25, created on 2013-03-24 18:09:48
         compiled from admin/login.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['lang']['charset']; ?>
" />
<title><?php echo $this->_tpl_vars['conf']['company']; ?>
 企业在线客服管理平台 - Powered by CElive</title>
<link href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/css/login/login.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="login">
<div style="margin:200px 0px 0px 400px;">

<span class="tips"><?php echo $this->_tpl_vars['login_text']; ?>
</span>
    <form name="admin_login" id="admin_login" method="post" action="<?php echo $this->_tpl_vars['action']; ?>
">
    <input type="hidden" name="submit" value="提交">

	 <input name="username" type="text" id="username" value="" class="input" tabindex="1" />
    <input name="password" type="password" id="password" value="<?php //echo $password;?>" tabindex="2" class="input" />

     <p><input type="submit" name="submit" value=" 登 陆 " class="login" tabindex="4" /></p>
     </form>                      
   </div>
   <div style="clear:both;">&nbsp;</div>
</div>
<div id="footer">Copyright &copy; 2011 <a href="http://www.cmseasy.cn" title="Powered by CmsEasy" target="_blank">Powered by CmsEasy</a></div>

</div>
</div>
</body>
</html>
<?php /* Smarty version 2.6.25, created on 2012-06-30 11:12:24
         compiled from admin/live/mainbox.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/css/celive.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/js/jquery.js"></script>
<title><?php echo $this->_tpl_vars['conf']['company']; ?>
 企业在线客服平台 - Powered by CElive</title>
<?php echo $this->_tpl_vars['xajax_live']; ?>

<?php echo ' 
<script type="text/javascript">
var CEl = function()
{
xajax_GetEndChat(\''; ?>
<?php echo $this->_tpl_vars['chatid']; ?>
<?php echo '\');
xajax_AdminChatHistory(\''; ?>
<?php echo $this->_tpl_vars['chatid']; ?>
<?php echo '\');
setTimeout(CEl, '; ?>
<?php echo $this->_tpl_vars['conf']['tracker_refresh']; ?>
<?php echo ');
}
CEl();
function scolldown() 
{ 
var e=document.getElementById("ChatHistory");
e.scrollTop=e.scrollHeight; 
}
</script>
'; ?>

</head>
<body>

<div id="left">
<div style="padding:10px;margin-right:212px;">
<div id="ChatHistory"></div>
</div>
</div>

<div id="right">
<p><?php echo $this->_tpl_vars['lang']['welcome_to_us_please_click']; ?>
<a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/../index.php?case=guestbook&act=index" target="_blank" style="color:red;font-weight:bold;"><?php echo $this->_tpl_vars['lang']['guest']; ?>
</a>。 </p>
<p class="blank10"></p>
<p>访问者：<?php echo $this->_tpl_vars['name']; ?>
</p>
<p>邮箱:<?php echo $this->_tpl_vars['email']; ?>
</p>
<p>电话:<?php echo $this->_tpl_vars['phone']; ?>
</p>
<p>IP:<?php echo $this->_tpl_vars['ip']; ?>
</p>
<p>IP对于位置:<?php echo $this->_tpl_vars['area']; ?>
</p>
<div style="clear:both;"></div>
</div>
</body>
</html>
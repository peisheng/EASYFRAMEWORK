<?php /* Smarty version 2.6.25, created on 2012-06-30 11:12:28
         compiled from mainbox.htm */ ?>
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
 <?php echo $this->_tpl_vars['lang']['live_server']; ?>
 - Powered by CElive</title>
<?php echo $this->_tpl_vars['xajax_live']; ?>

<?php echo ' 
<script type="text/javascript">
var CEl = function()
{
xajax_GetAdminEndChat(\''; ?>
<?php echo $this->_tpl_vars['chatid']; ?>
<?php echo '\');
xajax_ChatHistory();
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

<div style="clear:both;"></div>
<script language="javascript" type="text/javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/js/common1.js"></script>
<div style="clear:both;"></div>
</div>

</body>
</html>
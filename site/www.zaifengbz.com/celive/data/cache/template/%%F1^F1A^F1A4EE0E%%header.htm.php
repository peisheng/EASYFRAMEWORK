<?php /* Smarty version 2.6.25, created on 2012-06-30 11:12:28
         compiled from header.htm */ ?>
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

<?php echo $this->_tpl_vars['ifexit']; ?>

</head>
<body onbeforeunload="chat_unload();">
<div id="top">
    <div class="top_left">
       <div class="top_left1"><a href="http://www.cmseasy.cn"  target="_blank">CmsEasy&nbsp;Live&nbsp;V1.2.0</a></div>
		   <div class="top_left2"><?php echo $this->_tpl_vars['lang']['you_with_now']; ?>
 <strong><?php echo $this->_tpl_vars['dname']; ?>
-<?php echo $this->_tpl_vars['operatorname']; ?>
</strong> <?php echo $this->_tpl_vars['lang']['communication']; ?>
	<?php echo $this->_tpl_vars['lang']['consultative_content']; ?>
</div>
    </div>
    <div class="top_right"><a  href="#" onClick="javascript:xajax_EndChat();"><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/images/close.gif" /></a></div>
<div class="clear"></div>
</div>
</body>
</html>
<?php /* Smarty version 2.6.25, created on 2012-06-30 11:11:29
         compiled from admin/response.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/css/admin/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/js/jquery.js"></script>
<title><?php echo $this->_tpl_vars['conf']['company']; ?>
 企业在线客服管理平台 - Powered by CElive</title>
<?php echo $this->_tpl_vars['xajax_live']; ?>

<?php echo $this->_tpl_vars['admin_response']; ?>

</head>

<?php echo '
<style type="text/css">
body {background:white;}

.border td {
	border:1px #F8F8F8 solid;
	padding:3px;
}
.top_status {
	background:#41C3E3;
	width:100%;
	height:100%;
	padding-left:20px;
	padding-bottom:4px;
	padding-top:3px;
}
.text_tips {
	color:red;
	font-size:11px;
}
.response_box_t {
	width:98%;
	border:solid 1px #F5F5F5;
	background:#F9F9F9;
	margin-left:auto;
	margin-right:auto;
	height:32px;
	line-height:32px;
}
.response_box_t span { 
    font-size: 12px;
	padding-left:13px;
}

.response_t {
	width:98%;
	border:solid 1px #B5D6E6;
	margin-left:auto;
	margin-right:auto;
	font-size: 12px;
	height:20px;
	line-height:20px;
}
.response_t span{
	float:right;	
	padding-right:13px;
}

#info {padding:10px;}
</style>
'; ?>

<body>

<div id="info">
<div class="tags">
<div id="tagstitle">
   <a id="one1" onclick="setTab('one',1,6)" class="hover">接通WEB咨询客户</a>
  </div> 
  <div id="tagscontent">
    <div id="con_one_1">
<div class="response_box_t"><span>等待接通的客户……</span></div>
<div id="response"></div>
</div></div></div></div>
</body>
</html>
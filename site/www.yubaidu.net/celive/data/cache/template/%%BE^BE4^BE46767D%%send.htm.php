<?php /* Smarty version 2.6.25, created on 2012-06-30 11:12:28
         compiled from send.htm */ ?>
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
<script type="text/javascript" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/js/ajaxfileupload.js"></script>

<title><?php echo $this->_tpl_vars['conf']['company']; ?>
 <?php echo $this->_tpl_vars['lang']['live_server']; ?>
 - Powered by CElive</title>
<?php echo $this->_tpl_vars['xajax_live']; ?>

<?php echo $this->_tpl_vars['ctrlenter']; ?>

<?php echo ' 
<script type="text/javascript">
function putValue() {
	var now=new Date();
	parent.window.chat_display.document.getElementById(\'ChatHistory\').innerHTML+=\'<font color=green>\'+document.form1.name.value+\' \'+now.getHours()+\':\'+now.getMinutes()+\':\'+now.getSeconds()+\'</font><br />\'+document.form1.detail.value+\'<br />\';
	document.form1.detail.value="";
	document.form1.detail.focus();
}

function set_t_value(value)
{
	document.getElementById("detail").value=value;
	document.getElementById("detail").focus();
}

function ajaxFileUpload()
{
	$("#loading")
	.ajaxStart(function(){
		$(this).show();
	})
	.ajaxComplete(function(){
		$(this).hide();
	});

	$.ajaxFileUpload
	(
		{
			url:\'doajaxfileupload.php\',
			secureuri:false,
			fileElementId:\'fileToUpload\',
			dataType: \'json\',
			success: function (data, status)
			{
				if(typeof(data.error) != \'undefined\')
				{
					if(data.error != \'\')
					{
						alert(data.error);
					}else
					{						
						set_t_value(data.msg);
						xajax_Postdata(xajax.getFormValues(form1));putValue();document.form1.detail.focus();
					}
				}
			},
			error: function (data, status, e)
			{
				alert(e);
			}
		}
	)
	
	return false;

}
function wait(t){ 
	var i=1; 
	t.disabled=false; 
	var timer=setInterval(function(){
		i++;
		if(i>4){
			//alert(\'您说话太快了，歇息一下吧！\');
			t.disabled=true;			
			i=1;
			clearInterva(timer);
		}
	},1000) 
} 
</script>
'; ?>

</head>

<body onLoad="form1.detail.focus();">

<!-- 页底 -->
<div id="footer">
<form id="form1" name="form1">
<input type="hidden" name="name" id="name" value="<?php echo $this->_tpl_vars['name']; ?>
" />
<input type="hidden" name="chatid" id="chatid" value="<?php echo $this->_tpl_vars['chatid']; ?>
" />

<div class="footer_content">
<textarea id="detail" class="input_box" style="overflow-y:auto;" name="detail" class="s_box" onKeyUp="javascript:return ctrlEnter(event);"></textarea>
<div class="btn_box"><a onClick="xajax_Postdata(xajax.getFormValues('form1'));putValue();document.form1.detail.focus();" class="send enter_btn"></a></div>
 </div>

<div class="footer1">
<a href="javascript:void(0)" onClick="JavaScript:document.getElementById('ts_file').style.display='block';" id="files"><img src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/images/files.gif" /></a>
<div id="ts_file" style="display:none">
<img id="loading" src="<?php echo $this->_tpl_vars['conf']['url']; ?>
/templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/images/loading.gif" style="display:none;">
<form name="upload_form" action="" method="POST" enctype="multipart/form-data">
<input id="fileToUpload" type="file" name="fileToUpload">
<button id="buttonUpload" onClick="return ajaxFileUpload();"><?php echo $this->_tpl_vars['lang']['tsp']; ?>
</button>
</form>
</div>
  
  </div>
  
</form>
</div>

</body>
</html>
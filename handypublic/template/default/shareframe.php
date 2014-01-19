<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--{template headerjs}-->

</head>

<body>


<form action="" method="post" name="myform" id="myform" style="margin-top:10px;">

<!--{if $mod==geturl}-->
<table width="400" border="0" cellspacing="4" cellpadding="10">
  <tr>
    <td width="8">&nbsp;</td>
    <td width="337">将需要分享的宝贝网址粘贴到下面框中</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <input type="text" class="url" name="url" value="" style="width:250px; height:20px; line-height:20px;"/>
      <input type="submit" value="确定" name="asubmit" id="asubmit" style="height:25px; width:80px;"/>
      <input type="hidden" name="$mod" id="$mod" value="$mod">
      <input type="hidden" name="dosubmit" id="dosubmit" value="ok">
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><p>已支持的网站: 
    <a href="http://www.paipai.com" target="_blank" class="taobao">腾讯拍拍商城</a> 
    <a href="http://www.taobao.com" target="_blank" class="taobao">淘宝网</a> 
    <a href="http://www.tmall.com" target="_blank" class="tmall">天猫商城</a>
    </p></td>
  </tr>
</table>

<!--{/if}-->
<!--{if $mod==setfield}-->
<?php print_r($date["item"]["pic_url"])?>
<table width="509" border="0" cellspacing="4" cellpadding="10">
  <tr>
    <td width="48">&nbsp;</td>
    <td width="409">恭喜您，采集成功，再填写以下商品的描述和类别吧。</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>
      <table border="0" cellpadding="0" cellspacing="5">
        <tr>
          <td bgcolor="#FFFFFF">
          <img src="{$date["img"]}" width="135" height="135"/>
          </td>
          <td valign="top" bgcolor="#FFFFFF"> $date["title"]</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="right">类别：</td>
    <td>        			<select onchange="get_child_cates(this,'scid');" name="pcid" id="pcid">
			          			<!--{loop $cate_list $key $val}-->
			          			<option value="{$val[id]}">{$val[name]}</option>
			          			<!--{/loop}-->
			          		</select>
      -
			          		<select onchange="get_child_cates(this,'cid');" name="scid" id="scid">
					          	<option value="">--请选择--</option>
			          		</select>			          		-
			          		<select name="cid" id="cid">
						          <option value="">--请选择--</option>
			          		</select>
                            
                            <input type="hidden" name="key" value="$date[key]" />
                            <input type="hidden" name="title" value="$date[title]" />
                            <input type="hidden" name="nick" value="$date[nick]" />
                            <input type="hidden" name="price" value="$date[price]" />
                            <input type="hidden" name="url" value="$date[click_url]" />
                            <input type="hidden" name="pic_url" value="$date[pic_url]" />
                            <input type="hidden" name="dosubmit" value="ok" />
                            <input type="hidden" name="mod" value="$mod" />
</td>
  </tr>
  <tr>
    <td align="right">描述：</td>
    <td><textarea name="info" rows="5" class="info" style="width:320px; height:100px; line-height:20px;"></textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" value="保存该商品" name="asubmit" id="asubmit" style="height:25px; width:80px;"/></td>
  </tr>
  </table>
<script style="text/javascript">
function get_child_cates(obj,to_id) {
	var parent_id = $(obj).val();
	if(to_id == 'scid') {
		$('#cid').html( '<option value=\"\">--请选择--</option>');
	}
	$.get('usercenter.php?ac=get_child_catesAll&parent_id='+parent_id,function(data){
		var obj = eval("("+data+")");
		$('#'+to_id).html( obj.content );
	});
}	
get_child_cates($('#pcid'),'scid');
</script>
  
<!--{/if}-->

</form>

<script style="text/javascript">
	var dialogt = "<?php echo $dialog;?>";
	if (dialogt!='') {
		parent.location.reload();
		art.dialog({id:dialogt}).close();
		
	}
	
	
</script>
</body>
</html>
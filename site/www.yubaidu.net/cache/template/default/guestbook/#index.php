<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<!-- 面包屑导航开始 -->
<div class="clear box">
<?php echo template('position.html'); ?>
</div><div class="blank5"></div>
<!-- 面包屑导航结束 -->

<!-- 中部开始 -->
<div class="clear box c_bg">
<div class="c_top"></div>

<!-- 左侧开始 -->
<div class="w_250">

<?php echo template('left.html'); ?>

<div class="clear"></div>
</div>
<!-- 左侧结束 -->


<!-- 右侧开始 -->
<div class="w_700">

<div id="content" class="clear" style="width:650px;">
<!-- 栏目标题开始 -->
<div class="title mt20 mb20">
<h3><a><?php echo lang('guestbook');?></a>/<span>Guestbook</span></h3>
</div>
<div class="line_2"></div><div class="blank20"></div>
<!-- 栏目标题结束 -->

<div style="text-align:center;color:red;"><?php if(hasflash()) { ?>
<?php echo showflash(); ?>
<?php } ?>
</div>
<style>
table tr td {line-height:32px;}
table input {height:16px;font-size:14px;line-height:16px;}
table #content {width:305px;height:200px;}
</style>
<form method="post" action="" name="form1">
<table width="650" border="0" align="center" cellpadding="7" cellspacing="0" style="font-size:14px;">
<tr>
<td width="100">&nbsp;&nbsp;&nbsp;<?php echo lang('contactname');?>：</td>
<td><?php echo form::input('nickname',get('username'));?>
<span style="color:#FF0000"> *</span></td>
<td width="100"></td>
 </tr>
<tr>
<td width="100">&nbsp;&nbsp;&nbsp;<?php echo lang('guesttel');?>：</td>
<td><?php echo form::input('guesttel',get('guesttel'));?>
<span style="color:#FF0000"> *</span></td>
<td width="100"></td>
</tr>
<tr>
<td width="100">&nbsp;&nbsp;&nbsp;<?php echo lang('guestemail');?>：</td>
<td><?php echo form::input('guestemail',get('guestemail'));?>
<span style="color:#FF0000"> *</span></td>
<td width="100"></td>
</tr>
<tr>
<td width="100">&nbsp;&nbsp;&nbsp;<?php echo lang('guestqq');?>：</td>
<td><?php echo form::input('guestqq',get('guestqq'));?>
<span style="color:#FF0000"> *</span></td>
<td width="100"></td>
 </tr>
<?php foreach($field as $f) { ?>
<?php
 $name=$f['name'];
 if($name==$primary_key) continue; ?>
<tr>
<td>&nbsp;&nbsp;&nbsp;<?php echo lang($name);?>：</td>
<td colspan="2"><?php echo form::getform($name,@$form,$field,@$data);?> </td>
</tr>
 <?php } ?>
<tr>
<td colspan="3" align="center" height="10">&nbsp;
</td>
</tr>
            
<tr>
<td>&nbsp;&nbsp;&nbsp;<?php echo lang('verifycode');?>：</td>
<td colspan="2"><span style="float:left;"><?php echo verify();?></span><span style="float:left;padding-left:10px;"><input type='text' id="verify"  name="verify" size="10" style="height:16px;" /></span><span style="color:#FF0000;float:left;">*</span>&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value=" <?php echo lang('submit');?> " class="btn" /></td>
</tr>

</table>
</form>

<div class="blank30"></div>
<?php if($user) { ?>


<div class="blank30"></div>
<div class="line_2"></div>
<div class="comm"><strong><?php echo lang('guestlist');?>：</strong></div>
<div class="blank30"></div>

<dl class="comment_list">
<?php foreach($data as $d) { ?>
<dt><strong><?php echo lang('username');?>：<?php echo $d['username'];?></strong><span><?php echo sdate($d['adddate'],'Y-m-d H:i');?></span></dt>
<dd><?php echo $d['content'];?></dd>
<?php if($d['reply']) { ?><dd class="admin_reply">
<?php echo lang('adminreply');?>：
<?php echo $d['reply'];?>
</dd>
<?php } ?>
<?php } ?>
</dl>

<div class="clear"></div>
<div class="blank30"></div>
<div class="pages">
<?php echo pagination::html($record_count); ?>
</div>
<?php } ?>

<style>
#title {width:146px;}
</style>

<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/images/gotop.gif"></a>
<div class="blank30"></div>
<div class="clear"></div>
</div>
</div>
<!-- 右侧结束 -->

<div class="c_bottom"></div>
<div class="clear"></div>
</div>
<!-- 中部结束 -->
<?php echo template('footer.html'); ?>
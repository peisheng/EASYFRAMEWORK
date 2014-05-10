<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="container">
<!-- 左侧导航 -->
<?php echo template('left.html'); ?>
<!-- 右侧功能区 -->
<div id="main">
<div id="content">
<?php echo template('position.html'); ?>

<div class="contentinfo"></div>
<!-- 正文 -->
<div class="contenttext">

<!-- 内容列表开始 -->
<table id="talbe" width="100%" border="1" align="center" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC"> 
<tr> 
<td width="44" align="center" background="<?php echo $skin_path;?>/images/th_bg.jpg"><strong><?php echo lang('no.');?></strong></td> 
<td width="184" align="center" background="<?php echo $skin_path;?>/images/th_bg.jpg"><strong><?php echo lang('RecruitmentPost');?></strong></td> 
<td width="199" align="center" background="<?php echo $skin_path;?>/images/th_bg.jpg"><strong><?php echo lang('RecruitingDepartment');?></strong></td> 
<td width="84" align="center" background="<?php echo $skin_path;?>/images/th_bg.jpg"><strong><?php echo lang('ReleaseTime');?></strong></td> 
<td width="101" align="center" background="<?php echo $skin_path;?>/images/th_bg.jpg"><strong><?php echo lang('intro');?></strong></td> 
</tr> 
<?php foreach($archives as $i => $archive) { ?>
<tr> 
<td height="20" align="center" style="color:#999999; font-size:11px;"><?php echo $i+1;?></td> 
<td height="20" align="center"><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></td> 
<td height="20" align="center"><?php echo $archive['my_zhaopinbumen'];?></td> 
<td height="20" align="center" style="color:#999999; font-size:11px;"><span style="color:#999999"><?php echo $archive['adddate'];?></span></td> 
<td height="20" align="center"><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><img src="<?php echo $skin_path;?>/images/btn_jobs.gif" alt="<?php echo lang('more');?>" width="80" height="21" border="0" /></a></td> 
</tr> 
<?php } ?>
</table>
<!-- 内容列表结束 -->

<div class="blank30"></div>

<!-- 列表分页开始 -->
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>
<!-- 列表分页结束 -->

</div>
<div class="blank10"></div>
<a href="#" class="clear floatright">Top&nbsp;&nbsp;</a>
</div></div>
<div class="clear"></div>
<div id="containerbottom"></div>
</div>



<script> 
function resizeImg(obj)
{ 
var obj = document.getElementById(obj); 
var objContent = obj.innerHTML;
var imgs = obj.getElementsByTagName('img'); 
if(imgs==null) return; 
for(var i=0; i<imgs.length; i++) 
{ 
if(imgs[i].width>parseInt(obj.style.width)) 
{ 
imgs[i].width = parseInt(obj.style.width);
} 
} 
} 
window.onload = function() {resizeImg('content');
} 
</script>
<?php echo template('footer.html'); ?>
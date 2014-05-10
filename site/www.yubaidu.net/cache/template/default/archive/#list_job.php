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
<h3><a><?php echo $category[$catid]['catname'];?></a>/<span><?php echo $category[$catid]['htmldir'];?></span></h3>
</div>
<div class="line_2"></div><div class="blank20"></div>
<!-- 栏目标题结束 -->

<!-- 内容列表开始 -->
<table id="talbe" width="100%" border="1" align="center" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC"> 
<tr> 
<td width="44" align="center" background="<?php echo $skin_path;?>/images/th_bg.jpg"><strong><?php echo lang('no.');?></strong></td> 
<td width="184" align="center" background="<?php echo $skin_path;?>/images/th_bg.jpg"><strong><?php echo lang('RecruitmentPost');?></strong></td> 
<td width="199" align="center" background="<?php echo $skin_path;?>/images/th_bg.jpg"><strong><?php echo lang('RecruitingDepartment');?></strong></td> 
<td width="84" align="center" background="<?php echo $skin_path;?>/images/th_bg.jpg"><strong><?php echo lang('ReleaseTime');?></strong></td> 
<td width="101" align="center" background="<?php echo $skin_path;?>/images/th_bg.jpg"><strong><?php echo lang('intro');?></strong></td> 
</tr> 
<?php foreach($archives as $i => $arc) { ?>
<tr> 
<td height="20" align="center" style="color:#999999; font-size:11px;"><?php echo $i+1;?></td> 
<td height="20" align="center"><a title="<?php echo $arc['stitle'];?>" target="_blank" href="<?php echo $arc['url'];?>"><?php echo $arc['title'];?></a></td> 
<td height="20" align="center"><?php echo $arc['my_zhaopinbumen'];?></td> 
<td height="20" align="center" style="color:#999999; font-size:11px;"><span style="color:#999999"><?php echo $arc['adddate'];?></span></td> 
<td height="20" align="center"><a title="<?php echo $arc['stitle'];?>" target="_blank" href="<?php echo $arc['url'];?>"><img src="<?php echo $skin_path;?>/images/btn_jobs.gif" alt="<?php echo lang('more');?>" width="80" height="21" border="0" /></a></td> 
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
<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div class="box line_4">
<?php echo template('left.html'); ?>
<!--left_1 end-->

<div class="right_2">
<div class="t_2 mb10"><div><h3><?php echo $category[$catid]['catname'];?></h3><span>Archive list</span></div></div>
<?php echo template('position.html'); ?>

<div id="title">
<div id="text" style="width:680px;" class="text">

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
</div>
<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/gotop.gif"></a>
<div class="clear"></div>

</div>
<div class="clear"></div>
</div>
<?php echo template('footer.html'); ?>
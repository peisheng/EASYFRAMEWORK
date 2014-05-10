<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
      <?php echo template('left.html'); ?><!-- 调用通用左栏 -->	
      <div id="bd_right2">
      	<div class="box1">
        	<?php echo template('position.html'); ?>
            <div class="content">

                       <div class="pd" id="content" style="width:630px;">

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
            </div>
        </div>
        </div>
      <div class="clear"></div>
    </div>
<?php echo template('footer.html'); ?>
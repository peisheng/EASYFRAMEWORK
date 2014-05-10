<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div class="box line_4">
<?php echo template('left.html'); ?>
<!--left_1 end-->
<div class="right_2">
<img src="<?php echo $skin_url;?>/hb_9.gif" style="float:left;padding:2px -3px 0px 5px;"/><h3><?php echo $category[$catid]['catname'];?></h3>
<?php echo template('position.html'); ?>
<div class="r-line"></div>
<div id="title">
<h1><?php echo $category[$catid]['catname'];?></h1>
<div class="text"><?php echo $category[$catid]['categorycontent'];?></div>
<div class="blank10"></div>
</div>
<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/images/gotop.gif"></a>
<div class="clear"></div>

</div>
<div class="clear"></div>
</div>
<!--box end-->
<?php echo template('footer.html'); ?>
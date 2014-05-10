<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div class="box line_4">
<?php echo template('left.html'); ?>
<!--left_1 end-->

<div class="right_2">
<div class="t_2 mb10"><div><h3><?php echo $category[$catid]['catname'];?></h3><span>Archive list</span></div></div>
<?php echo template('position.html'); ?>

<div id="title">
<h1><?php echo $category[$catid]['catname'];?></h1>
<div id="text" style="width:680px;" class="text">

<!-- 内容 -->
<?php echo $category[$catid]['categorycontent'];?>

<div class="blank30"></div>

<?php echo template('ditu.html'); ?>

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
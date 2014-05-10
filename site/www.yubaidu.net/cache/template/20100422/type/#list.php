<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div class="box line_4">
<?php echo template('left.html'); ?>
<!--left_1 end-->
<div class="right_2">
<img src="<?php echo $skin_url;?>/hb_9.gif" style="float:left;padding:2px -3px 0px 5px;"/><h3><?php echo $category[$catid]['catname'];?></h3>
<?php echo template('position.html'); ?>
<div class="r-line"></div>

<div class="text">
<ul class="ul2gg">
<?php foreach($archives as $i => $archive) { ?>
<li><span class="date"><?php echo $archive['adddate'];?></span><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
<div class="blank10"></div>
<?php if(isset($pages)) { ?>
<?php echo type_pagination($typeid);?>
<?php } ?>

<div class="blank10"></div>
</div>
<div class="blank30"></div>
<a title="返回顶部" href="#" class="clear floatright"><img alt="返回顶部" src="<?php echo $skin_url;?>/gotop.gif"></a>
<div class="clear"></div>

</div>
<div class="clear"></div>
</div>

   <?php echo template('footer.html'); ?>
<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>

<div class="blank10"></div>

<div class="about">
<img src="<?php echo $skin_path;?>/about.gif" />
<div class="blank5"></div>
<p><?php echo templatetag::tag('公司简介');?>
<?php $t=position_p($catid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>">
<img src="<?php echo $skin_path;?>/i_more.jpg" alt="<?php echo lang(more);?>" /></a>
<?php?>
</p>
<div class="blank5"></div>
</div>
</div>
<?php echo template('footer.html'); ?>
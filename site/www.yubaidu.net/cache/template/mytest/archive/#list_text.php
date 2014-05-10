<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div class="box line_4">
<?php echo template('left.html'); ?>
<!--left_1 end-->

<div class="right_2">
<div class="t_2 mb10"><div><h3><?php echo $category[$catid]['catname'];?></h3><span>Archive list</span></div></div>
<?php echo template('position.html'); ?>

<?php foreach($archives as $i => $archive) { ?>
<div class="news_text">
<h5><span class=date><?php echo $archive['adddate'];?></span><a title="<?php echo $archive['stitle'];?>" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></h5>
<p><?php echo cut(strip_tags($archive['introduce']),100);?>…<a title="<?php echo $archive['stitle'];?>" href="<?php echo $archive['url'];?>">[<?php echo lang(more);?>]</a><p>
<span class="strgrade"><?php echo lang(strgrade);?>：<?php echo $archive['strgrade'];?></span>
<div class="clear"></div>
</div>
<?php } ?>
<div class="blank10"></div>
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>
<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/gotop.gif"></a>

<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
<!--box end-->
<?php echo template('footer.html'); ?>
<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
<div id="bd_left">
    	<?php echo template('left.html'); ?>
    </div>
    <div id="bd_right">
      <?php echo template('position.html'); ?>

  <div style="padding:10px;">
 <?php foreach($archives as $i => $archive) { ?>
<div class="news_text">
<h5><span class=date><?php echo $archive['adddate'];?></span><a title="<?php echo $archive['stitle'];?>" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></h5>
<p><?php echo cut(strip_tags($archive['introduce']),100);?>…<a title="<?php echo $archive['stitle'];?>" href="<?php echo $archive['url'];?>">[<?php echo lang(more);?>]</a><p>
<div class="clear"></div>
</div>
<?php } ?>

<div class="blank10"></div>
<!-- 内容列表分页 -->
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>

<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/gotop.gif"></a>
<div class="blank30"></div>
<div class="clear"></div>
</div>
      </div>
      
      </div>
<?php echo template('footer.html'); ?>
<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="container">
<!-- 左侧导航 -->
<?php echo template('left.html'); ?>
<!-- 右侧功能区 -->
<div id="main">
<div id="content">
<?php echo template('position.html'); ?>
<!-- 正文 -->
<div class="contenttext">
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
<div class="blank10"></div>
<a href="#" class="clear floatright">Top&nbsp;&nbsp;</a>
</div></div>
<div class="clear"></div>
<div id="containerbottom"></div>
</div>
</div>
<?php echo template('footer.html'); ?>
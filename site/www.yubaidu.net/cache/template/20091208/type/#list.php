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
<ul class="news_list">
<?php foreach($archives as $i => $archive) { ?>
<li><span class="date"><?php echo $archive['adddate'];?></span><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
<div class="blank10"></div>
<?php if(isset($pages)) { ?>
<?php echo type_pagination($typeid);?>
<?php } ?>
</div>
<div class="blank10"></div>
<a href="#" class="clear floatright">Top&nbsp;&nbsp;</a>
</div>
<div class="clear"></div>
<div id="containerbottom"></div>
</div>

<?php echo template('footer.html'); ?>
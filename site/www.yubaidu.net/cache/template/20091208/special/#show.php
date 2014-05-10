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
<div class="blank10"></div>
<!-- 专题图片 -->
<img src="<?php echo $special['banner'];?>" style="float:left;margin:0px 20px 20px 0px;" />
<!-- 专题介绍 -->
<?php echo $special['description'];?>

<div class="blank30"></div>

<ul class="news_list">
<?php foreach($archives as $i => $sp) { ?>
<li><span class="date"><?php echo $sp['adddate'];?></span><a title="<?php echo $sp['title'];?>" target="_blank" href="<?php echo $sp['url'];?>"><?php echo $sp['title'];?></a></li>
<?php } ?>
</ul>
<div class="blank10"></div>
<!-- 内容列表分页 -->
<?php if(isset($pages)) { ?>
<?php echo tag::pagination($tag);?>
<?php } ?>
</div>
<div class="blank10"></div>
<a href="#" class="clear floatright">Top&nbsp;&nbsp;</a>
</div>
<div class="clear"></div>
<div id="containerbottom"></div>
</div>

<?php echo template('footer.html'); ?>
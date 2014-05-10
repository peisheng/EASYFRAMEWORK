<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<!-- 面包屑导航开始 -->
<div class="clear box">
<?php echo template('position.html'); ?>
</div><div class="blank5"></div>
<!-- 面包屑导航结束 -->

<!-- 中部开始 -->
<div class="clear box c_bg">
<div class="c_top"></div>

<!-- 左侧开始 -->
<div class="w_250">

<?php echo template('left.html'); ?>

<div class="clear"></div>
</div>
<!-- 左侧结束 -->


<!-- 右侧开始 -->
<div class="w_700">

<!-- 栏目标题开始 -->
<div class="title mt20 mb20">
<h3><a><?php echo $category[$catid]['catname'];?></a>/<span><?php echo $category[$catid]['htmldir'];?></span></h3>
</div>
<div class="line_2"></div><div class="blank20"></div>
<!-- 栏目标题结束 -->

<!-- 内容列表开始 -->
<?php foreach($archives as $i => $arc) { ?>
<div class="news_text">
<h5><span class="date"><?php echo $arc['adddate'];?></span><a title="<?php echo $arc['stitle'];?>" target="_blank" href="<?php echo $arc['url'];?>"><?php echo $arc['title'];?></a></h5>
<p><?php echo cut(strip_tags($arc['introduce']),100);?>…<a title="<?php echo $arc['stitle'];?>" href="<?php echo $arc['url'];?>">[<?php echo lang(more);?>]</a><p>
<div class="clear"></div>
</div>
<?php } ?>
<!-- 内容列表结束 -->

<div class="blank30"></div>

<!-- 内容列表分页开始 -->
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>
<!-- 内容列表分页开始 -->

<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/images/gotop.gif"></a>
<div class="blank30"></div>
<div class="clear"></div>
</div>

<!-- 右侧结束 -->

<div class="c_bottom"></div>
<div class="clear"></div>
</div>
<!-- 中部结束 -->
<div class="blank10"></div>
<?php echo template('footer.html'); ?>
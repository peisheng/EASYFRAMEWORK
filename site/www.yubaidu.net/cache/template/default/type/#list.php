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

<div id="content" class="clear" style="width:650px;">

<!-- 栏目标题开始 -->
<div class="title mt20 mb20">
<h3><a><?php echo type::getpositionhtml($type['typeid']);?></a>/<span>Type</span></h3>
</div>
<div class="line_2"></div><div class="blank20"></div>
<!-- 栏目标题结束 -->

<!-- 内容列表开始 -->
<ul class="news_list">
<?php foreach($archives as $i => $archive) { ?>
<li><span class="date"><?php echo $archive['adddate'];?></span><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
<!-- 内容列表结束 -->

<div class="blank30"></div>

<!-- 列表分页开始 -->
<?php if(isset($pages)) { ?>
<?php echo type_pagination($typeid);?>
<?php } ?>
<!-- 列表分页结束 -->

<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/images/gotop.gif"></a>
<div class="blank30"></div>
<div class="clear"></div>
</div>
</div>
<!-- 右侧结束 -->

<div class="c_bottom"></div>
<div class="clear"></div>
</div>
<!-- 中部结束 -->
<?php echo template('footer.html'); ?>
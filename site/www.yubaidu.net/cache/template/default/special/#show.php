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

<!-- 标题 -->
<div class="archive_title"><div class="r_box_top"></div><div class="r_box"><h1><?php echo $special['title'];?></h1></div><div class="r_box_bottom"></div></div>

<div id="content" class="clear" style="width:650px;">

<div class="blank30"></div>
<!-- 专题图片 -->
<img src="<?php echo $special['banner'];?>" style="float:left;margin:0px 20px 20px 0px;" />
<!-- 专题介绍 -->
<?php echo $special['description'];?>

<div class="line_2"></div><div class="blank30"></div>

<!-- 内容列表开始 -->
<ul class="news_list">
<?php foreach($archives as $i => $sp) { ?>
<li><span class="date"><?php echo $sp['adddate'];?></span><a title="<?php echo $sp['title'];?>" target="_blank" href="<?php echo $sp['url'];?>"><?php echo $sp['title'];?></a></li>
<?php } ?>
</ul>
<!-- 内容列表结束 -->

<div class="blank30"></div>

<!-- 列表分页开始 -->
<?php if(isset($pages)) { ?>
<?php echo special::pagination($tag);?>
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
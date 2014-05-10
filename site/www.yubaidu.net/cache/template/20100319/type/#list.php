<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?><!-- 调用页头模板 -->
<div id="c">
<div id="position">
<span><a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>"><?php echo get('sitename');?></a><?php echo type::getpositionhtml($type['typeid']);?></span><strong><?php echo lang(nowposition);?></strong>
</div>
<?php echo template('left.html'); ?><!-- 调用通用左栏 -->

<div id="right">
<div id="text">

<!-- 内容_内容简介列表 -->
<ul class="news_list">
<?php foreach($archives as $i => $archive) { ?>
<li><span class="date"><?php echo $archive['adddate'];?></span><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
<div class="blank10"></div>
<?php if(isset($pages)) { ?>
<?php echo type_pagination($typeid);?>
<?php } ?>

<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/gotop.gif"></a>
<div class="blank30"></div>

</div>
</div>
<div class="clear"></div>
</div>
<!-- 调用页底模板 -->
<?php echo template('footer.html'); ?>
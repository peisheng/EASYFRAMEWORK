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

<div id="content" class="clear" style="width:650px;overflow:hidden;">

<!-- 栏目标题开始 -->
<div class="title mt20 mb20">
<h3><a><?php echo $category[$catid]['catname'];?></a>/<span><?php echo $category[$catid]['htmldir'];?></span></h3>
</div>
<div class="line_2"></div><div class="blank20"></div>
<!-- 栏目标题结束 -->

<!-- 内容缩略图列表 -->
<ul id="list-view">
<?php foreach($archives as $i => $arc) { ?>
<?php if($i%4==0) { ?><div class="clear blank5"></div><?php } else { ?><?php } ?>
<li><div class="img-wrap"><a title="<?php echo $arc['stitle'];?>" target="_blank" href="<?php echo $arc['url'];?>"><img alt="<?php echo $arc['stitle'];?>" src="<?php echo $arc['sthumb'];?>" onerror='this.src="<?php echo $base_url;?>/<?php echo config::get('onerror_pic');?>"' /></a></div>
<h5><a title="<?php echo $arc['stitle'];?>" target="_blank" href="<?php echo $arc['url'];?>"><?php echo $arc['title'];?></a></h5><?php if($arc['attr2']) { ?><?php if($arc['attr2']==$arc['oldprice']) { ?><?php echo lang(price);?>：<span><?php echo $arc['attr2'];?></span><?php echo lang(unit);?><?php } else { ?>原价：<span><?php echo $arc['oldprice'];?></span><?php echo lang(unit);?> 折扣价：<span><?php echo $arc['attr2'];?></span><?php echo lang(unit);?><?php } ?><?php } ?>
</li>
<?php } ?>
</ul>
<!-- 内容缩略图列表结束 -->

<div class="clear"></div>
<div class="blank30"></div>

<!-- 内容列表分页开始 -->
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>
<!-- 内容列表分页结束 -->

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
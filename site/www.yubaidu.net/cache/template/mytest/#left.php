<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div class="left_1">

<!--左侧栏目导航开始-->
<div class="t_1 mb5"><div><h3>+	快速导航</h3></div></div>
<ul class="leftmenu mb10">
<!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = getcategoryparentsid($catid);?>
<?php foreach(categories_nav() as $t) { ?>
<li><a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>"<?php if(isset($topid) && $topid==$t['catid']) { ?> class="on"<?php } ?>><?php echo $t['catname'];?></a></li>
<?php if($t['catid']==$__pid) { ?>
<!-- <?php foreach(category::listcategorydata($__pid) as $type) { ?> -->
<li><a href="<?php echo $type['url'];?>" title="<?php echo $type['catname'];?>" class="<?php if($type['catid']==$catid) { ?>on<?php } ?>"><?php echo $type['catname'];?></a></li>
<!-- <?php } ?> -->
<?php } ?>
<?php } ?>
<!--只展开当前栏目所在一级栏目下的分类-->
</ul>
<!--左侧栏目导航结束-->
<?php echo template('left/quick.html'); ?>
<?php echo template('left/search.html'); ?>

<div class="t_1 mb10"><div><h3>专题</h3></div></div>
<ul class="f_link">
<!-- <?php foreach(special::listdata() as $special) { ?> -->
<li><a href="<?php echo $special['url'];?>" title="<?php echo $special['title'];?>"><?php echo $special['title'];?></a></li>
<!-- <?php } ?> -->
</ul>

<div class="t_1 mb10"><div><h3>相关内容</h3></div></div>
<ul class="f_link">
<!-- <?php foreach(archive($catid,0,0,'0,0,0',20,'aid',5,false,0) as $i => $archive) { ?> -->
<li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a></li>
<!-- <?php } ?> -->
</ul>
</div>
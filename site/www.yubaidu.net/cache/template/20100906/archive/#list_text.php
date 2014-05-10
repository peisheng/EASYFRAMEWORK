<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
 <?php echo template('left.html'); ?><!-- 调用通用左栏 -->
<div id="bd_right">
      	<div class="box">
            <?php echo template('position.html'); ?>
            <div class="content">
            	<div class="pd_title"></div>
                       <div class="pd">
<?php foreach($archives as $i => $archive) { ?>
<div class="news_text">
<h5><span class=date><?php echo $archive['adddate'];?></span><a title="<?php echo $archive['stitle'];?>" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a><?php if($archive['attr2']) { ?>&nbsp;&nbsp;<a title="<?php echo lang(makeorders);?>" target="_blank" href="<?php echo url('archive/orders/aid/'.$archive['aid'],true);?>" class="orders"><?php echo lang(makeorders);?></a><?php } ?></h5>
<p><?php echo cut(strip_tags($archive['introduce']),100);?>…<a title="<?php echo $archive['stitle'];?>" href="<?php echo $archive['url'];?>">[<?php echo lang(more);?>]</a><p>
<div class="clear"></div>
</div>
<?php } ?>
<div class="blank30"></div>
<!-- 内容列表分页 -->
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>
</div><div class="blank30"></div>
            </div>
            </div>
      </div>
      <div class="clear"></div>
    </div>
<?php echo template('footer.html'); ?>
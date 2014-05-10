<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?><!-- 调用页头模板 -->

<div id="bd">
    	<?php echo template('left.html'); ?><!-- 调用通用左栏 -->
      <div id="bd_right2">
      	<div class="box1">
        	<?php echo template('position.html'); ?><!-- 调用导航模板 -->
            <div class="content" style="padding:15px;">
<!-- 内容缩略图列表 --><div class="blank10"></div>
<ul id="list-view">
<?php foreach($archives as $i => $archive) { ?>
<?php if($i%4==0) { ?><div class="clear blank5"></div><?php } else { ?><?php } ?>
<li><div class="img-wrap"><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><img alt="<?php echo $archive['stitle'];?>" src="<?php echo $archive['sthumb'];?>" onerror='this.src="<?php echo $base_url;?>/<?php echo config::get('onerror_pic');?>"' /></a></div>
<h5><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></h5><?php if($archive['attr2']) { ?><?php echo lang(price);?>	:	<span><?php echo $archive['attr2'];?></span><?php echo lang(unit);?><?php } ?>
</li>
<?php } ?>
</ul>
<!-- 内容缩略图列表结束 -->

            
            <div class="blank30"></div>
<!-- 内容列表分页 -->
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>
              <div class="blank30"></div><div class="clear"></div>
            </div>
        </div>
        </div>
      <div class="clear"></div>
    </div>

<!-- 调用页底模板 -->
<?php echo template('footer.html'); ?>
<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd2j">
      <div id="bd_box">
          <div id="bd_leftg">
<?php echo template('left.html'); ?>
<div>
<img src="<?php echo $skin_path;?>/hy_11.gif" width="250" height="62" /></div>
          </div>
        <div id="bd_rightg">
          	<?php echo template('position.html'); ?>
<div class="blank30"></div>
<!-- 内容缩略图列表 -->
<ul id="list-view">
<?php foreach($archives as $i => $archive) { ?>
<?php if($i%4==0) { ?><div class="clear blank5"></div><?php } else { ?><?php } ?>
<li><div class="img-wrap"><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><img alt="<?php echo $archive['stitle'];?>" src="<?php echo $archive['sthumb'];?>" onerror='this.src="<?php echo $base_url;?>/<?php echo config::get('onerror_pic');?>"' /></a></div>
<h5><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></h5><?php if($archive['attr2']) { ?><?php echo lang(price);?>	:	<span><?php echo $archive['attr2'];?></span><?php echo lang(unit);?><?php } ?>
</li>
<?php } ?>
</ul>
<!-- 内容缩略图列表结束 -->
<div class="blank10"></div>
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>

<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/gotop.gif"></a>
<div class="blank30"></div>
<div class="clear"></div>

</div>
        </div>
          <div class="clear"></div>
    </div>
<?php echo template('footer.html'); ?>
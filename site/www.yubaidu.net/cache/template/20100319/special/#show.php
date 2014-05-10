<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
    	<div id="bdleft">
    		<?php echo template('left.html'); ?>
        </div>
        <div id="bd_right2">     	
                <div class="box">
                	<div class="em">
                    	<?php echo template('position.html'); ?>
                       <div class="pd">
  <div id="content" style="width:550px;" class="text">
<ul class="news_list">
<?php foreach($archives as $i => $sp) { ?>
<li><span class="date"><?php echo $sp['adddate'];?></span><a title="<?php echo $sp['title'];?>" target="_blank" href="<?php echo $sp['url'];?>"><?php echo $sp['title'];?></a></li>
<?php } ?>
</ul>
<div class="blank10"></div>
<!-- 内容列表分页 -->
<?php if(isset($pages)) { ?>
<?php echo special::pagination();?>
<?php } ?>

<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/gotop.gif"></a>
<div class="blank30"></div>
<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/gotop.gif"></a>
<div class="blank30"></div>
<div class="clear"></div>
   </div>
   <div class="clear"></div>
                    </div>
                </div><div class="b"></div>
        </div>
        </div>
<?php echo template('footer.html'); ?>
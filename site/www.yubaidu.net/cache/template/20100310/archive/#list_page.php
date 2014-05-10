<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
<div id="bd_left">
    	<?php echo template('left.html'); ?>
    </div>
    <div id="bd_right">
      <?php echo template('position.html'); ?>

 <div style="padding:10px;">


<div id="title">
<h1><?php echo $category[$catid]['catname'];?></h1>
</div>
<div id="textDiv" style="width:710px;" class="text">
<?php echo $category[$catid]['categorycontent'];?>

<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/gotop.gif"></a>
<div class="blank30"></div>
</div>

<div class="clear"></div>
</div>
      </div>
      
      </div>
<?php echo template('footer.html'); ?>
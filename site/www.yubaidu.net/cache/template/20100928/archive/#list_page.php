<?php defined('ROOT') or exit('Can\'t Access !'); ?>
   <?php echo template('header.html'); ?>
    <div id="bd">
    	<div id="bd_left">
        	<div class="boxn">
            	<?php echo template('position.html'); ?>
                <div class="content">
                  <div class="pd_title"><?php echo $category[$catid]['catname'];?></div>
                       <div class="pd">
<?php echo $category[$catid]['categorycontent'];?>
</div>
                    </div>
            </div>
      </div>
   	  <div id="bd_right">
     <?php echo template('left.html'); ?></div>
    	<div class="clear"></div>
    </div> 

   <?php echo template('footer.html'); ?>
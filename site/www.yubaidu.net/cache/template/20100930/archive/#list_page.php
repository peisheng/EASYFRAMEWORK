<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
      <?php echo template('left.html'); ?><!-- 调用通用左栏 -->	
      <div id="bd_right2">
      	<div class="box1">
        	<?php echo template('position.html'); ?>
            <div class="content">
           	  <div class="pd_title"><?php echo $category[$catid]['catname'];?></div>
                       <div class="pd">　　<?php echo $category[$catid]['categorycontent'];?></div>
            </div>
        </div>
        </div>
      <div class="clear"></div>
    </div>

<?php echo template('footer.html'); ?>
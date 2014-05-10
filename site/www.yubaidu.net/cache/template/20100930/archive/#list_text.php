<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
      <?php echo template('left.html'); ?><!-- 调用通用左栏 -->	
      <div id="bd_right2">
      	<div class="box1">
        	<?php echo template('position.html'); ?>
            <div class="content">

                       <div class="pd">
           	  <ul class="ul2">
              
              <!-- 内容_内容简介列表 -->
                    <?php foreach($archives as $i => $archive) { ?>		
                    <li><a href="<?php echo $archive['url'];?>"><span class="date"><?php echo $archive['adddate'];?></span><?php echo $archive['title'];?></a></li>                    
                    <?php } ?>                  
</ul>
            </div>
                            <div class="blank10"></div>
                <!-- 内容列表分页 -->
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?><div class="blank30"></div>
       </div>
            </div>
        </div>
        </div>
      <div class="clear"></div>
    </div>
<?php echo template('footer.html'); ?>
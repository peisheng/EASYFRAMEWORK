<?php defined('ROOT') or exit('Can\'t Access !'); ?>
   <?php echo template('header.html'); ?>
    <div id="bd">
    	<div id="bd_left">
        	<div class="boxn">
            	<?php echo template('position.html'); ?>
                <div class="content">
                  <div class="pd_title"><?php echo $category[$catid]['catname'];?></div>
                       <div class="pd" id="content" style="width:554px;">
<ul class="ul2gg">
<?php foreach($archives as $i => $archive) { ?>
<li><span class="date"><?php echo $archive['adddate'];?></span><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
<div class="blank30"></div>
<!-- 内容列表分页 -->
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>
</div>
                    </div>
            </div>
      </div>
   	  <div id="bd_right">
     <?php echo template('left.html'); ?></div>
    	<div class="clear"></div>
    </div> 
<script> 
function resizeImg(obj)
{ 
var obj = document.getElementById(obj); 
var objContent = obj.innerHTML;
var imgs = obj.getElementsByTagName('img'); 
if(imgs==null) return; 
for(var i=0; i<imgs.length; i++) 
{ 
if(imgs[i].width>parseInt(obj.style.width)) 
{ 
imgs[i].width = parseInt(obj.style.width);
} 
} 
} 
window.onload = function() {resizeImg('content');
} 
</script>
   <?php echo template('footer.html'); ?>
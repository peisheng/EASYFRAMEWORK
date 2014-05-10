<?php defined('ROOT') or exit('Can\'t Access !'); ?>
   <?php echo template('header.html'); ?>
    <div id="bd">
    	<div id="bd_left">
        	<div class="boxn">
            	<?php echo template('position.html'); ?>
                <div class="content">
                  <div class="pd_title"><?php echo $category[$catid]['catname'];?></div>
                       <div class="pd" id="content" style="width:554px;">

<!-- 内容 -->
<?php echo $category[$catid]['categorycontent'];?>

<div class="blank30"></div>

<?php echo template('ditu.html'); ?>

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
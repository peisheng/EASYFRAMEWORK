<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
 <?php echo template('left.html'); ?><!-- 调用通用左栏 -->
<div id="bd_right">
      	<div class="box">
            <?php echo template('position.html'); ?>
            <div class="content">
            	<div class="pd_title"><?php echo $category[$catid]['catname'];?></div>
                       <div class="pd">

<!-- 内容 -->
<?php echo $category[$catid]['categorycontent'];?>

<div class="blank30"></div>

<?php echo template('ditu.html'); ?>

<div class="blank30"></div></div>
            </div>
            </div>
      </div>
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
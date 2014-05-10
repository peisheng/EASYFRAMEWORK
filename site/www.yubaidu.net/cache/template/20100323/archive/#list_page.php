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
            <div class="pd_title"><?php echo $category[$catid]['catname'];?></div>
                       <div class="pd">
   <div id="content" style="width:620px;"><?php echo $category[$catid]['categorycontent'];?></div>
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
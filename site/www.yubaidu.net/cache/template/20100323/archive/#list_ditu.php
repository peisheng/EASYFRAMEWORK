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
                       <div class="pd">
   <div id="content" style="width:620px;">

<!-- 内容 -->
<?php echo $category[$catid]['categorycontent'];?>

<div class="blank30"></div>

<?php echo template('ditu.html'); ?>

</div>
   </div>
        </div>
          <div class="clear"></div>
    </div>
<!-- 中部结束 -->


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
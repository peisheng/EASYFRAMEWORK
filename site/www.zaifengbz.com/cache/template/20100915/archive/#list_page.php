<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
<div id="bd_right">
<?php echo template('position.html'); ?>

<div id="text" style="width:570px;padding:20px 15px 10px 25px;">
<h1 id="title"><?php echo $category[$catid]['catname'];?></h1>
<div class="blank30"></div>

<?php echo $category[$catid]['categorycontent'];?>



</div>
</div>

<div id="bd_left">
<?php echo template('left.html'); ?><!-- 调用通用左栏 -->

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
window.onload = function() {resizeImg('text');
} 
</script>
<?php echo template('footer.html'); ?>
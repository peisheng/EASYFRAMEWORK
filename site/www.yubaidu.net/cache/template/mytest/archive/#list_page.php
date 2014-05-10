<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div class="box line_4">
<?php echo template('left.html'); ?>
<!--left_1 end-->

<div class="right_2">
<div class="t_2 mb10"><div><h3><?php echo $category[$catid]['catname'];?></h3><span>Archive list</span></div></div>
<?php echo template('position.html'); ?>

<div id="title">
<h1><?php echo $category[$catid]['catname'];?></h1>
<div id="text" style="width:680px;" class="text"><?php echo $category[$catid]['categorycontent'];?></div>
<div class="blank10"></div>
</div>
<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/gotop.gif"></a>
<div class="clear"></div>

</div>
<div class="clear"></div>
</div>
<!--box end-->
<script language="javascript" type="text/javascript">
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
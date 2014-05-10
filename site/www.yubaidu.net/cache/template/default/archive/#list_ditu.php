<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>

<!-- 面包屑导航开始 -->
<div class="clear box">
<?php echo template('position.html'); ?>
</div><div class="blank5"></div>
<!-- 面包屑导航结束 -->

<!-- 中部开始 -->
<div class="clear box c_bg">
<div class="c_top"></div>

<!-- 左侧开始 -->
<div class="w_250">

<?php echo template('left.html'); ?>

<div class="clear"></div>
</div>
<!-- 左侧结束 -->


<!-- 右侧开始 -->
<div class="w_700">

<!-- 标题 -->
<div class="archive_title"><div class="r_box_top"></div><div class="r_box"><h1><?php echo $category[$catid]['catname'];?></h1></div><div class="r_box_bottom"></div></div>

<div id="content" class="clear" style="width:650px;">

<!-- 内容 -->
<?php echo $category[$catid]['categorycontent'];?>

<div class="blank30"></div>

<?php echo template('ditu.html'); ?>

<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/images/gotop.gif"></a>
<div class="blank30"></div>
<div class="clear"></div>
</div>
</div>
<!-- 右侧结束 -->

<div class="c_bottom"></div>
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
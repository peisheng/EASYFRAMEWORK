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

<div id="content" style="width:650px;">

<!-- 标题 -->
<div class="archive_title"><div class="r_box_top"></div><div class="r_box"><h1><?php echo $category[$catid]['catname'];?></h1></div><div class="r_box_bottom"></div></div>

<!-- 内容 -->
<?php
$page = intval(front::$get['page']);
if($page==0)$page=1;
$content = $category[$catid][categorycontent];
$contents = preg_split('%<div style="page-break-after(.*?)</div>%si', $content);
if ($contents) {
$pages = count($contents);
front::$record_count = $pages * config::get('list_pagesize');
$category[$catid][categorycontent] = $contents[$page - 1];
}
?>
<?php echo $category[$catid]['categorycontent'];?>

<div class="blank30"></div>
<?php if($pages>1) { ?>
<!-- 内页分页 -->
<div class="blank10"></div>
<div class="pages">
<?php echo category_pagination($catid);?>
</div>
<div class="blank30"></div>
<?php } ?>
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
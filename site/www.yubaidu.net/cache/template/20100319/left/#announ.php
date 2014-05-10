<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div id="bd_left2">
<div class="bd_left_title"><div class="title_img"><img src="<?php echo $skin_path;?>/tz_10.gif" /></div>
<div class="title1">网站公告</div>
</div>
<div class="box">
<div class="em">
<div class="newsli2">
<ul class="ul2 an">
<?php foreach(announ(5) as $an) { ?>
<li><a href="<?php echo $an['url'];?>"><?php echo $an['title'];?></a></li>
<?php } ?>
</ul>
</div>
<div class="clear"></div>
</div>
</div>
<div class="b"></div>  
</div>
<div class="blank10"></div>
<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<script type="text/javascript" src="<?php echo $skin_path;?>/js/jquery-1.3.2.min.js"></script>
<div class="sidebar">
<div class="title_red">
<strong><?php $t=position_p($catid=2);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
<?php?></strong><span> - News</span>
</div>
<div class="blank5"></div>
<ul class="padding10 news">
<!-- <?php foreach(archive(2,0,0,'0,0,0',15,'aid',5,false,0) as $i => $archive) { ?>  -->
<li><strong>"</strong> <a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a></li>
<!-- <?php } ?> -->
</ul>
<div class="blank10"></div>
<div class="title_gray">
<h5><strong><?php echo lang(contactus);?></strong><span> - Contact</span></h5>
</div>
<div class="blank5"></div>
<ul class="padding5">
<li><strong><?php echo lang(address);?>：</strong><?php echo get('address');?></li>
<li><strong><?php echo lang(tel);?>：</strong><?php echo get('tel');?></li>
<li><strong><?php echo lang(fax);?>：</strong><?php echo get('fax');?></li>
<li><strong><?php echo lang(email);?>：</strong><?php echo get('email');?></li>
</ul>
</div>
<!--  -->
<div class="middle">
<div id="announce" style="width:468px;height:20px;line-height:20px;overflow:hidden;">
<?php foreach(announ(5) as $an) { ?>
<p><a href="<?php echo $an['url'];?>" title="<?php echo $an['title'];?>"><?php echo $an['title'];?></a> [<?php echo $an['adddate'];?>]</p>
<?php } ?>
</div>

<div class="blank10"></div>
<div class="title_gray">
<h5><strong><?php $t=position_p($catid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
<?php?></strong><span> - About </span></h5>
</div>
<div class="about">
<img src="<?php echo $skin_path;?>/about.jpg" style="float:left;width:100px;margin:0px 10px 10px 0px;" />
<p style="float:right;width:340px;height:76px;padding:10px;margin:text-indent:20px;background:#F5F5F5;overflow:auto;"><?php echo templatetag::tag('公司简介');?></p>
</div>
<div class="blank5"></div>
<div class="title">
<strong><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
<?php?></strong><span> - Products List</span><img src="<?php echo $skin_path;?>/more.gif" />
</div>

<div class="blank5"></div>

<!-- 滚动图片开始 -->
<script type="text/javascript" src="<?php echo $skin_path;?>/js/jquery.bxSlider.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
<!--用于滚动图片-->
    if($('#scroll a').length > 0){
$('#scroll').bxSlider({
auto: true,
displaySlideQty:3,
prevText: '',
nextText: '',
moveSideQty: 1
});
}
});
</script>

<div class="scroll">
<ul id="scroll" class="list-view">
<?php echo templatetag::tag('首页滚动图片');?>
</ul>
</div>
<!-- 滚动图片结束 -->


</div>
<div class="i_news">
<div class="title_black">
<strong><?php echo lang(userlogin);?></strong><span> - Login</span>
</div>

<div id="login">
 <?php echo login_js();?>
 </div>
<div class="blank10"></div>
<div class="title_gray">
<h5><strong><?php echo lang(vote);?></strong><span> - Vote</span></h5>
</div>
<div class="blank5"></div>
<?php echo ballot(1);?>
</div>
<div class="blank10"></div>
<?php echo template('footer.html'); ?>
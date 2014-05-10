<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>

<div id="HomeMain"><div class="blank10"></div>
<div  style="float:left;width:236px;">
<div class="DialogTitle1">
<div class="DialogTitle2"><?php echo templatetag::tag('首页联系我们栏目');?></div>
</div>
<div class="DialogContent1">
<div class="DialogContent2">
<img src="<?php echo $skin_path;?>/banner_aboutus.gif"  />
<div style="line-height:15px;padding:4px 10px;color:#585757">
<?php echo templatetag::tag('公司简介');?>
</div>
</div>
</div>
<div class="DialogBottom1">
<div class="DialogBottom2"></div>
</div>
</div>
<div style="float:left;width:443px;padding:0px 2px;">
<div class="DialogTitle1">
<div class="DialogTitle2"><?php echo templatetag::tag('首页企业新闻栏目');?></div>
</div>
<div class="DialogContent1">
<div class="DialogContent2" >
<div>
<div id="HomeNewPic">
<img src="<?php echo $skin_path;?>/home_news_pic.jpg" />
</div>
<div style="width:320px;padding:10px;float:left;font-weight:bold;font-size:11px;color:#4D4D4D;">
Autopass (Corporate web site management system) is a compact, efficient and humane procedures Enterprises Website.
</div>
</div>
<!--news list-->				
<div id="HomeNewsList">
<ul>
<?php foreach(archive(2,0,0,'0,0,0',16,'aid',3,false,0) as $i => $archive) { ?> 
 <li><img src="<?php echo $skin_path;?>/dot.gif"  align="absmiddle" />&nbsp;<a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
 <?php } ?>

</ul>
</div>
</div>
</div>
<div class="DialogBottom1">
<div class="DialogBottom2"></div>
</div>
</div>
<div  style="float:right;width:236px;">
<div class="DialogTitle1">
<div class="DialogTitle2"><?php echo templatetag::tag('首页产品中心栏目');?></div>
</div>
<div class="DialogContent1">
<div class="DialogContent2">
<img src="<?php echo $skin_path;?>/banner_products.gif"  />
<!--products type list-->
<div id="protype">
<ul>
<?php foreach(categories(3) as $t1) { ?>
<li style="width:50%;float:left;">
<img src="<?php echo $skin_path;?>/dot.gif"  align="absmiddle" />&nbsp;<a href="<?php echo $t1['url'];?>" title="<?php echo $t1['catname'];?>"><?php echo $t1['catname'];?></a></li>
<?php } ?>
</ul>
</div>
</div>
</div>
<div class="DialogBottom1">
<div class="DialogBottom2"></div>
</div>
</div>
</div>
<!-- footer -->
<?php echo template('footer.html'); ?>
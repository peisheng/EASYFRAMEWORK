<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="container">
<!-- 左侧导航 -->
<?php echo template('left.html'); ?>
<!-- 右侧功能区 -->
<div id="main">
<div id="content">
<?php echo template('position.html'); ?>

<div class="contentinfo"></div>
<!-- 正文 -->
<div class="contenttext">
<!-- 栏目标题结束 -->

<!-- 内容列表开始 -->
<?php foreach($archives as $i => $archive) { ?>
<div class="news_text_pic">
<div class="list_text_pic"><div class="img-wrap"><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><?php if($archive['thumb']) { ?><img alt="<?php echo $archive['stitle'];?>" src="<?php echo $archive['sthumb'];?>" /><?php } else { ?><img src="<?php echo $base_url;?>/<?php echo config::get('onerror_pic');?>" /><?php } ?></a></div></div>
<h5><span class="date"><?php echo $archive['adddate'];?></span><a title="<?php echo $archive['stitle'];?>" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></h5>
<p><?php echo lang(view);?>：<?php echo view_js($archive['aid']);?></p>
<p><?php echo lang(strgrade);?>：<?php echo $archive['strgrade'];?></p>
<p><?php echo lang(nowdownload);?>：<?php if($archive['attachment_id']) { ?><?php echo attachment_js($archive['aid']);?><?php } else { ?><?php echo lang(NoDownload);?><?php } ?></p>

<div class="clear"></div>
</div>
<?php } ?>
<!-- 内容列表结束 -->

<div class="blank30"></div>

<!-- 内容列表分页开始 -->
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>
<!-- 内容列表分页开始 -->

</div>
<div class="blank10"></div>
<a href="#" class="clear floatright">Top&nbsp;&nbsp;</a>
</div></div>
<div class="clear"></div>
<div id="containerbottom"></div>
</div>

<?php echo template('footer.html'); ?>
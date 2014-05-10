<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="container">
<!-- 左侧导航 -->
<?php echo template('left.html'); ?>
<!-- 右侧功能区 -->
<div id="main">
<div id="content">
<?php echo template('position.html'); ?>
<!-- 正文 -->
<div class="contenttext">

<div style="width:380px;margin:0px auto;padding:0px auto;">
<?php echo lang(orderquery);?>：<input size="40"  id="oid" name="oid" type="text" align="absmiple" />
<input type="submit" id="search_btn" align="absmiple" name='submit' value=" <?php echo lang(look);?> " onclick="javascript:window.location.href='<?php echo url('archive/orders');?>&oid='+document.getElementById('oid').value;" />
</div>
<div class="blank10"></div>
<div class="blank10"></div>


<!-- 内容缩略图列表 -->
<ul id="list-view">
<?php foreach($archives as $i => $archive) { ?>
<?php if($i%4==0) { ?><div class="clear blank5"></div><?php } else { ?><?php } ?>
<li><div class="img-wrap"><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><img alt="<?php echo $archive['stitle'];?>" src="<?php echo $archive['sthumb'];?>" onerror='this.src="<?php echo $base_url;?>/<?php echo config::get('onerror_pic');?>"' /></a></div>
<h5><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></h5><?php if($archive['attr2']) { ?><?php echo lang(price);?>	:	<span><?php echo $archive['attr2'];?></span><?php echo lang(unit);?><?php } ?>
</li>
<?php } ?>
</ul>
<!-- 内容缩略图列表结束 -->

<div class="clear"></div>
<div class="blank10"></div>
<!-- 内容列表分页 -->
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>

</div>
<div class="blank10"></div>
<a href="#" class="clear floatright">Top&nbsp;&nbsp;</a>
</div></div>
<div class="clear"></div>
<div id="containerbottom"></div>
</div>

<?php echo template('footer.html'); ?>
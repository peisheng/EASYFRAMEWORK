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

<div id="content" class="clear" style="width:650px;">
<!-- 栏目标题开始 -->
<div class="title mt20 mb20">
<h3><a><?php echo lang('commentlist');?></a>/<span>Comment List</span></h3>
</div>
<div class="line_2"></div><div class="blank20"></div>
<!-- 栏目标题结束 -->


<!-- 评论 -->
<div id="comment">
<!-- 评论框开始 -->
<form action="<?php echo url('comment/add'); ?>" method="POST" name="comment_form" id="comment">
<div class="comm">
<a href='<?php echo url('comment/list/aid/'.$archive['aid']); ?>' style="float:right;padding-right:20px;font-size:12px;"><?php echo lang('have');?><span class="commentnumber"><?php echo comment::countcomment($archive['aid']);?></span><?php echo lang(bitofcommenters);?>&nbsp;&nbsp;<strong><?php echo lang('clicktoview');?></strong></a><strong><?php echo lang('iwanttocomment');?>:</strong></div>
<div class="blank5"></div>
<textarea name="content" id="textarea"></textarea>
<div style="margin-top:10px;line-height:34px;"><input type="hidden" name="aid" value="<?php echo $aid;?>"/>
<?php echo lang('username');?>：<input type="text" name="username" class="key" value="<?php echo get('username');?>"/> &nbsp;&nbsp;<?php echo lang('verifycode');?>：<?php echo verify();?> &nbsp;<input type="text" name="verify" value="" size="4" />&nbsp;<input name="submit" class="btn" value="<?php echo lang('submit');?>" type="submit"/>
</div>
</form>
<!-- 评论框结束 -->
</div>

<div class="blank30"></div>
<div class="line_2"></div>
<div class="comm"><strong><?php echo lang('commentlist');?>：</strong></div>
<div class="blank30"></div>

<dl class="comment_list">

<?php foreach($comments as $comment) { ?>
<dt><strong><?php echo lang('username');?>：<?php echo $comment['username'];?></strong><span><?php echo sdate($comment['adddate'],'Y-m-d H:i');?></span></dt>
<dd><?php echo strip_tags($comment['content']);?></dd>
<?php if(!isset($i)) $i=0;  $i++; if($i<count($comments)) {echo "<br>";} else unset($i); ?>
<?php } ?>
</dl>
<div class="clear blank30"></div>
<div class="pages">
 <?php echo pagination::html($record_count);?>
</div>


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
<?php echo template('footer.html'); ?>
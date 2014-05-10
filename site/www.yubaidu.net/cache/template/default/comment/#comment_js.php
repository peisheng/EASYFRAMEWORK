<?php defined('ROOT') or exit('Can\'t Access !'); ?>

<div class="blank30"></div>
<div class="line_2"></div>
<div class="comm"><strong><?php echo lang('commentlist');?>：</strong></div>
<div class="blank30"></div>
<!-- 评论列表开始 -->
<dl class="comment_list"><?php foreach($comments as $comment) { ?>
<dt><strong><?php echo lang('username');?>：<?php echo $comment['username'];?></strong><span><?php echo sdate($comment['adddate'],'Y-m-d H:i');?></span></dt>
<dd><?php echo strip_tags($comment['content']);?></dd>
<?php if(!isset($i)) $i=0;  $i++; if($i<count($comments)) {echo "<br>";} else unset($i); ?>
<?php } ?></dl>
<!-- 评论列表结束 -->

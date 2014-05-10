<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div class="blank30"></div>
<div class="line_2"></div>
<form action="<?php echo url('comment/add'); ?>" method="POST" name="comment_form" id="comment">
<div class="comm">
<a href='<?php echo url('comment/list/aid/'.$archive['aid']); ?>' style="float:right;padding-right:20px;font-size:12px;"><?php echo lang('have');?><span class="commentnumber"><?php echo comment::countcomment($archive['aid']);?></span><?php echo lang(bitofcommenters);?>&nbsp;&nbsp;<strong><?php echo lang('clicktoview');?></strong></a><strong><?php echo lang('iwanttocomment');?>:</strong></div>
<div class="blank5"></div>
<textarea name="content" id="textarea"></textarea>
<div style="margin-top:10px;line-height:34px;"><input type="hidden" name="aid" value="<?php echo $aid;?>"/>
<?php echo lang('username');?>：<input type="text" name="username" class="input_d" value="<?php echo get('username');?>"/> &nbsp;&nbsp;<?php echo lang('verifycode');?>：<?php echo verify();?> &nbsp;<input type="text" name="verify" value="" class="input_c" />&nbsp;<input name="submit" class="btn" value="<?php echo lang('submit');?>" type="submit"/>
</div>
</form>

<!-- 评论列表开始 -->
<?php echo comment_js($aid);?>
<!-- 评论列表结束 -->
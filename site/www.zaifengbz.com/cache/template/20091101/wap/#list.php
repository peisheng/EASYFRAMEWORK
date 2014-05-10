<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('wap/header.html'); ?>
<?php foreach($archives as $i => $archive) { ?>
<a title="<?php echo $archive['stitle'];?>" href="?case=archive&act=show&t=wap&aid=<?php echo $archive['aid'];?>"><?php echo $archive['title'];?></a>	[<?php echo $archive['adddate'];?>]<br />
<?php } ?>
<?php echo $category[$catid]['catname'];?>
<br />
<?php echo $category[$catid]['categorycontent'];?>
<br />
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>
<br />
<br />
<a href="javascript:history.back(-1)">返回上一页</a>	|	<a href="<?php echo $base_url;?>/wap/">返回首页</a>
<?php echo template('wap/footer.html'); ?>
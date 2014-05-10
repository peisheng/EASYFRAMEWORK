<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('wap/header.html'); ?>
<?php echo $archive['title'];?><br />
<?php echo lang(author);?>：<?php echo $archive['author'];?><br />
<?php echo lang(adddate);?>：<?php echo $archive['adddate'];?>
<br />
<?php echo $archive['content'];?>
<br />
<?php if($archive['attr2']) { ?>
<!-- tag -->
<?php echo lang(productprice);?>： <?php echo $archive['attr2'];?><br />
<?php } ?>

<?php if($archive['tag']) { ?>
<!-- tag -->
<?php echo lang(tag);?>： <?php echo $archive['tag'];?><br />
<?php } ?>

<?php if($archive['special']) { ?>
<!-- 专题 -->
<?php echo lang(special);?>： <?php echo $archive['special'];?><br />
<?php } ?>


<?php if($archive['type']) { ?>
<!-- 分类 -->
<?php echo lang(type);?>： <?php echo $archive['type'];?><br />
<?php } ?>


<?php if($archive['area']) { ?>
<!-- 地区 -->
<?php echo lang(area);?>： <?php echo $archive['area'];?><br />
<?php } ?>

<br />
<?php if($pages>1) { ?>
<!-- 内页分页 -->
<br />
<?php echo archive_pagination($archive);?>
<br />
<?php } ?>



<br />
<br />
<a href="javascript:history.back(-1)">返回上一页</a>	|	<a href="<?php echo $base_url;?>/wap/">返回首页</a>
<?php echo template('wap/footer.html'); ?>
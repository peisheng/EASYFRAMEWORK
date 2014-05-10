<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('wap/header.html'); ?>
<div id="nav">
  <ul id="navmenu">
    <li><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/?case=wap"><?php echo lang(homepage);?></a></li>
    <?php foreach(categories_nav() as $t) { ?>
    <li><a href="?case=archive&act=list&t=wap&catid=<?php echo $t['catid'];?>" title="<?php echo $t['catname'];?>"><?php echo $t['catname'];?></a>
      <ul>
        <?php foreach(categories($t['catid']) as $t1) { ?>
        <li><a title="<?php echo $t1['catname'];?>" href="?case=archive&act=list&t=wap&catid=<?php echo $t1['catid'];?>"><?php echo $t1['catname'];?></a></li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>
  </ul>
</div>
<br />
<?php echo template('wap/footer.html'); ?>

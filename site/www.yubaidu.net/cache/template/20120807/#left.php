<?php defined('ROOT') or exit('Can\'t Access !'); ?>
 <div class="box3"><img src="<?php echo $skin_path;?>/anli_17.gif" width="260" height="104" /></div>
      	<div class="box3">
            	<div class="title"><?php echo lang(contactus);?></div>
                <div class="content">
                	<div class="p">
<ul>
<li><?php echo lang(address);?>：<?php echo get(address);?></li>
<li><?php echo lang(tel);?>：<?php echo get(tel);?></li>
<li><?php echo lang(fax);?>：<?php echo get(fax);?></li> 
<li><?php echo lang(email);?>：<?php echo get(email);?></li> 
</ul>
                  </div>
  <div class="blank10"></div>
  <div class="title"><?php echo lang(quicknav);?></div>
                <div class="content">
                	<div class="p">
<ul>
<!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = getcategoryparentsid($catid);?>
<?php foreach(categories_nav() as $t) { ?>

<?php if($t['catid']==$__pid) { ?>
<!-- <?php foreach(category::listcategorydata($__pid) as $type) { ?> -->
<li><a href="<?php echo $type['url'];?>" title="<?php echo $type['catname'];?>" class="on"><?php echo $type['catname'];?></a></li>
<!-- <?php } ?> -->
<?php } ?>
<?php } ?>
<!--只展开当前栏目所在一级栏目下的分类-->
</ul>
                  </div>
  </div>
      	</div>
 </div>
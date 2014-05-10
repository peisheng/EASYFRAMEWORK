<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div id="bd_left2">
        		<div class="bd_left_title"><div class="title_img"><img src="<?php echo $skin_path;?>/tz_10.gif" /></div>
                	<div class="title1"><?php echo lang(quicknav);?></div>
                    </div>
        		<div class="box">
                	<div class="em">
                   	  <div class="newsli2">
                       	<ul class="ul2">
<!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = getcategoryparentsid($catid);?>
<?php foreach(categories_nav() as $t) { ?>
<li><a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>"<?php if(isset($topid) && $topid==$t['catid']) { ?> class="on"<?php } ?>><?php echo $t['catname'];?></a></li>
<?php if($t['catid']==$__pid) { ?>
<!-- <?php foreach(category::listcategorydata($__pid) as $type) { ?> -->
<li><a href="<?php echo $type['url'];?>" title="<?php echo $type['catname'];?>" class="<?php if($type['catid']==$catid) { ?>on<?php } ?>"><?php echo $type['catname'];?></a></li>
<!-- <?php } ?> -->
<?php } ?>
<?php } ?>
<!--只展开当前栏目所在一级栏目下的分类-->
         </ul>
                      </div>
                        <div class="clear"></div>
                  </div>
          </div>  <div class="b"></div>  
        </div>
<div class="blank10"></div>
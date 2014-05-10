<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div id="bd_leftg">

<div id="menu"><div class="leftbox1">
            	<div class="lbox_title"><div class=" lv14g">
<a href="javascript:void(0)" class="home" id="listnav" onclick="displayblock(labelarr)">+	<?php echo lang(quicknav);?></a></div></div>
                <div class="lbox_content">
                  <ul class="ul2g">
<!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = getcategoryparentsid($catid);?>
<?php foreach(categories_nav() as $t) { ?>
<li><a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>"<?php if(isset($topid) && $topid==$t['catid']) { ?> class="on"<?php } ?>><?php echo $t['catname'];?></a></li>
<?php if($t['catid']==$__pid) { ?>
<?php foreach(category::listcategorydata($__pid) as $type) { ?>
<li><a href="<?php echo $type['url'];?>" title="<?php echo $type['catname'];?>" class="<?php if($type['catid']==$catid) { ?>on<?php } ?>"><?php echo $type['catname'];?></a></li>
<?php } ?>
<?php } ?>
<?php } ?>
<!--只展开当前栏目所在一级栏目下的分类-->
 </ul>
                </div>
            </div>
</div>
<!--左侧栏目导航结束-->

            
            <div class="leftbox2">
            	<div class="lbox_title2">
            	  <div class=" lv14g">联系我们</div>
            	</div>
                <div class="lbox_content">
                  <div class="pg">
<?php echo lang(address);?>：<?php echo get(address);?>
              <br />
               <?php echo lang(tel);?>：<span class="lv12"><?php echo get(tel);?></span> 
              <br />
          <?php echo lang(email);?>：<?php echo get(email);?>
  </div>
                </div>
            </div>
            
        </div>
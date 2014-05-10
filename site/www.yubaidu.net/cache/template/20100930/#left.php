<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div id="bd_left2">
    	  <div class="box1">
       
        	<div class="title1">
            	<div class="title1_left"><img src="<?php echo $skin_path;?>/xx_25.gif" /></div>
                <div class="title1_ioc"><img src="<?php echo $skin_path;?>/xx_27.gif" /></div>
                <div class="title1_wd"><a href="javascript:void(0)" id="listnav" onclick="displayblock(labelarr)" style="text-decoration:none; color:#FFF"><?php echo lang(quicknav);?></a></div>
                <div class="more"><img src="<?php echo $skin_path;?>/xx_26.gif" /></div>
            </div>
            <div class="content">
            	<ul class="ul2ggg">
                    <!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = getcategoryparentsid($catid);?>
<?php foreach(categories_nav() as $t) { ?>

<?php if($t['catid']==$__pid) { ?>
<!-- <?php foreach(category::listcategorydata($__pid) as $type) { ?> -->
<li<?php if($type['catid']==$catid) { ?> class="on"<?php } ?>><a href="<?php echo $type['url'];?>" title="<?php echo $type['catname'];?>"><?php echo $type['catname'];?></a></li>
<!-- <?php } ?> -->
<?php } ?>
<?php } ?>
<!--只展开当前栏目所在一级栏目下的分类-->
</ul>
            </div>
        </div> 
        <div class="box1g"><img src="<?php echo $skin_path;?>/zxbm.gif" /></div>
        <div class="box1g">
        	<div class="title1">
            	<div class="title1_left"><img src="<?php echo $skin_path;?>/xx_25.gif" /></div>
                <div class="title1_ioc"><img src="<?php echo $skin_path;?>/xx_27.gif" /></div>
                <div class="title1_wd"><?php $t=position_p($catid=2);?><?php echo $t['name'];?></div>
                <div class="more"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/xx_26.gif" /></a></div>
            </div>
            <div class="content">
            	<ul class="ul2">
                    <?php foreach(archive(2,0,0,'0,0,0',20,'aid',6,false,0) as $i => $archive) { ?> 
                    <li><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
                <?php } ?>
</ul>
            </div>
        </div>              
   	  </div>


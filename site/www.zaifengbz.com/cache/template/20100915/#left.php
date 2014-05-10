<?php defined('ROOT') or exit('Can\'t Access !'); ?>
 <div class="box3ggg">
          	<div class="titlet">
                	<div class="title1_wd"><?php echo lang(quicknav);?></div>
                    <div class="title1_en">Products</div>
                    <div class="title_ico"><img src="<?php echo $skin_path;?>/hs_12.gif" /></div>
                </div>
            <div class="contentt">
                	<ul class="dg">
            <!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = getcategoryparentsid($catid);?>
<?php foreach(categories_nav() as $t) { ?>
<?php if($t['catid']==$__pid) { ?>
<!-- <?php foreach(category::listcategorydata($__pid) as $type) { ?> -->
<div class="links_wd"><a href="<?php echo $type['url'];?>" title="<?php echo $type['catname'];?>" class="<?php if($type['catid']==$catid) { ?>on<?php } ?>">【<?php echo $type['catname'];?>】</a></div>
<!-- <?php } ?> -->
<?php } ?>
<?php } ?>
<!--只展开当前栏目所在一级栏目下的分类-->
</ul>
                </div>
          </div>
            

<div class="box3">
          	<div class="title">
                	<div class="title1_wd">业务范围</div>
                    <div class="title1_en">About us</div>
                    <div class="title_ico"><img src="<?php echo $skin_path;?>/hs_12.gif" /></div>
                    <div class="more"><img src="<?php echo $skin_path;?>/hs_13.gif" /></div>
                </div>
                
           <div class="content">
                	<div class="pg"><div class="picys"><img src="<?php echo $skin_path;?>/hs_11.gif" /></div>
                	　　<?php echo templatetag::tag('公司简介');?></div>
                </div>
          </div>

          <div class="box3">
          	<div class="title">
                	<div class="title1_wd"><?php echo lang(relatedcontent);?></div>
                    <div class="title1_en"></div>
                    <div class="title_ico"><img src="<?php echo $skin_path;?>/hs_12.gif" /></div>
                    <div class="more"><img src="<?php echo $skin_path;?>/hs_13.gif" /></div>
                </div>
                
           <div class="content">
                	<div class="pg">
<ul class="ul2d">
 <?php foreach(archive($catid,0,0,'0,0,0',16,'aid',5,false,0) as $i => $archive) { ?> 
<li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
</div>
                </div>
          </div>
            
           
            
            <div>
            </div>
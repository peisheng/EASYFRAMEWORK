<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div id="bd_left">
<!--左侧栏目导航开始-->

<div class="left_box1" id="menu">
            	<div class="box1_title">
                <div class="box1_title_l"><img src="<?php echo $skin_path;?>/fdc_7.gif" /></div>
                <div class="box1_title_c"><span><img src="<?php echo $skin_path;?>/fdc_9.gif" /></span><a href="javascript:void(0)" class="home" id="listnav" onclick="displayblock(labelarr)">　<?php echo lang(quicknav);?>　</a><span><img src="<?php echo $skin_path;?>/fdc_10.gif" /></span></div>
                </div>
                <div class="box1_content">
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

</div>


        	<div class="left_box1">
            	<div class="box1_title">
                <div class="box1_title_l"><img src="<?php echo $skin_path;?>/fdc_7.gif" /></div>
                <div class="box1_title_c"><span><img src="<?php echo $skin_path;?>/fdc_9.gif" /></span>　相关内容　<span><img src="<?php echo $skin_path;?>/fdc_10.gif" /></span></div>
                </div>
                <div class="box1_content">
                  <ul class="ul2">
<?php foreach(archive($catid,0,0,'0,0,0',13,'aid',5,false,0) as $i => $archive) { ?> 
<li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
            </ul>
              </div>
            </div>
            
            <div class="left_box2">
           	  <div class="input_box">
  <form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
 <div class="input_boxl">
  <input type="text"  name="keyword" class="sinput" value="请输入关键字！"  style="width:140px;height:18px;line-height:18px;border:1px solid #ccc;font-size:12px;padding-left:5px;color:#ccc;" />
              </div>
              <div class="input_img"><input  name='submit' type="image" src="<?php echo $skin_path;?>/fdc_12.gif" /></div>
  </form>
              </div>
           	  
            </div>
        </div>
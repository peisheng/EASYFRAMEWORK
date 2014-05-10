<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
   <div id="bd">
    	<div class="bd_bg_left">
        	<div class="bd_bg_right" style="width:320px;">
            
            	<div id="bd_left" style="width:320px;">
                	<div class="left_content" style="width:320px;">
                    	<div class="title"><div class="title_img"><img src="<?php echo $skin_path;?>/11.png" /></div><div class="title_wd"><?php $t=position_p($typeid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a><span class="title_wde">About Us</span></div></div>
                      <div class="content">
                       	  <div class="p" style="width:280px;height:80px;overflow:auto;">　　<a href="#"><?php echo templatetag::tag('公司简介');?></a></div>
                          <div class="kjdh">
                          	<div class="kjdh_wd"> > <a href="#">服务中心</a></div>
                            <div class="kjdh_wd"> > <a href="#">在线报修</a></div>
                            <div class="kjdh_wd"> > <a href="#">加盟中心</a></div>
                            <div class="kjdh_wd"> > <a href="#">选购指南</a></div>
                          </div>
                        </div><div class="clear"></div>
                    </div>
                </div></div>
                <div id="bd_right">
                	<div class="right_content">
                    	<div class="title"><div class="title_img"><img src="<?php echo $skin_path;?>/13.png" /></div>
                    	<div class="title_wd"><?php $t=position_p($typeid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a><span class="title_wde">Products</span></div>
                    	</div>
                        <div class="content">
                        	
                            <div class="cp_c">
 <?php foreach(archive(3,0,0,'0,0,0',20,'aid',1,true,0) as $i => $archive) { ?>
<div class="c_pic"><a href="<?php echo $archive['url'];?>"><img src="<?php echo $archive['sthumb'];?>" alt="<?php echo $archive['stitle'];?>" width="198" height="120" /></a></div>
                                <div class="c_wd"><?php echo $archive['title'];?></div>
<?php } ?>
                            	
                            </div>
                        </div>
                    </div>
                </div>
                <div id="bd_center">
                <div class="center_content">
                	<div class="title"><div class="title_img"><img src="<?php echo $skin_path;?>/12.png" /></div>
                	<div class="title_wd"><?php $t=position_p($typeid=2);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a><span class="title_wde">News</span></div>
                	</div>
                        <div class="content">
                            <ul class="ul2">
<?php foreach(archive(2,0,0,'0,0,0',16,'aid',3,false,0) as $i => $archive) { ?> 
<li><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a><br />
<?php echo cut(strip_tags($archive['content']),20);?></li>
<?php } ?>
                            </ul>
                        </div>
                </div>
                </div>
<div class="clear"></div>
                <div class="bd_bgb">
                    <div class="bd_bgb_left">
                    <div class="bd_bgb_right"></div>
                    </div>
                </div>
            </div>

        
<div class="clear"></div>
    </div>
    <!--bd部结束-->
   <?php echo template('footer.html'); ?>
<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
  <div id="bd" class="clear">
 
    	<div id="bd_left">
        
          <div class="box3">
          	<div class="title">
                	<div class="title1_wd"><?php $t=position_p($catid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
</div>
                    <div class="title1_en">About us</div>
                    <div class="title_ico"><img src="<?php echo $skin_path;?>/hs_12.gif" /></div>
                    <div class="more"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/hs_13.gif" /></a></div><?php?>
                </div>
                
           <div class="content" style="width:352px;">
                	<div class="pg" style="height:158px;overflow:auto;"><div class="picys"><img src="<?php echo $skin_path;?>/hs_11.gif" /></div>
                	　　<?php echo templatetag::tag('公司简介');?></div>
                </div>
          </div>
            
            <div class="box3ggg">
          	<div class="titlet">
                	<div class="title1_wd"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
</div>
                    <div class="title1_en">Products</div>
                    <div class="title_ico"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/hs_13.gif" /></a></div><?php?>
                </div>
            <div class="contentt">
                	<ul class="dg">
                    <?php foreach(categories(3) as $t1) { ?>
<div class="links_wd"><a href="<?php echo $t1['url'];?>" title="<?php echo $t1['catname'];?>"><?php echo $t1['catname'];?></a></div>
<?php } ?>
</ul>
                </div>
          </div>
            
            <div>
            </div>
        </div>
      <div id="bd_right">

        <div class="bd_right_left">
        	<div class="box3g">
          	<div class="title">
                	<div class="title1_wd"><?php $t=position_p($catid=2);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
</div>
                    <div class="title1_en">About us</div>
                    <div class="title_ico"><img src="<?php echo $skin_path;?>/hs_12.gif" /></div>
                    <div class="more"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/hs_13.gif" /></a></div><?php?>
                </div>
                
           <div class="content">
                	<ul class="ul2">
                    <?php foreach(archive(2,0,0,'0,0,0',16,'aid',7,false,0) as $i => $archive) { ?> 
<li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><span class="date"><?php echo $archive['adddate'];?></span><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
                </div>
          </div>
        </div>
        <div class="bd_right_right">
        	<div class="box3">
          	<div class="title">
                	<div class="title1_wd"><?php $t=position_p($catid=5);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
</div>
                    <div class="title1_en">About us</div>
                    <div class="title_ico"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/hs_12.gif" /></a></div><?php?>
                </div>
                
           <div class="content1">
                	<div class="pg1">
<ul>
<li><?php echo lang(address);?>：<?php echo get(address);?></li>
<li><?php echo lang(tel);?>：<?php echo get(tel);?></li>
<li><?php echo lang(fax);?>：<?php echo get(fax);?></li> 
<li><?php echo lang(email);?>：<?php echo get(email);?></li> 
</ul>

  
</div>
<div class="search1"><?php echo lang(search);?></div>
            <div class="search2 clear"><form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
                 <input type="text" class="inupt2" name="keyword" size="23" /><input class="s_btn" name='submit' type="image" src="<?php echo $skin_path;?>/hs_6.gif" /></form>
          </div>
                </div>
          </div>
        </div>
        
        <div class="box3gg">
          	<div class="title">
                	<div class="title1_wd"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
</div>
                    <div class="title1_en">Products Show</div>
                    <div class="title_ico"><img src="<?php echo $skin_path;?>/hs_12.gif" /></div>
                    <div class="more"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/hs_13.gif" /></a></div><?php?>
                </div>
           <div class="content">
                	
             <?php foreach(archive(3,0,0,'0,0,0',20,'aid',4,true,0) as $i => $archive) { ?>
<div class="prod_box">
                        <a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><img src="<?php echo $archive['sthumb'];?>" alt="<?php echo $archive['stitle'];?>" class="prod" /></a><br />
                       <a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>" class="prod_font"><?php echo $archive['title'];?></a>
</div>
<?php } ?>
<div class="clear"></div>             
                    </div>
                </div>
          </div>
      </div>
<div class="clear"></div>
    <!--bd部结束-->
<?php echo template('footer.html'); ?>
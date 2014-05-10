<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<!--head部结束-->
    <div id="bd">
    	<div id="bd_left">
        	<div class="bd_left_left">
            	<div class="box"><img src="<?php echo $skin_path;?>/xx_21.gif" /></div>
                <div class="box2g">
                	<div class="title2">
                    	<div class="title2_left"><img src="<?php echo $skin_path;?>/xx_22.gif" /></div>
                        <div class="title2_wd"><?php $t=position_p($catid=2);?><?php echo $t['name'];?></div>
                        <div class="more1"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/xx_24.gif" /></a></div>
                    </div>
                    <div class="content2">
                    	<ul class="ul2">
                        <?php foreach(archive(2,0,0,'0,0,0',16,'aid',7,false,0) as $i => $archive) { ?> 
                        <li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><span class="date"><?php echo $archive['adddate'];?></span><?php echo $archive['title'];?></a></li>
                        <?php } ?>                    
</ul>
                    </div>
                </div>
            </div>
            <div class="bd_left_right">
            	<div class="box2">
                	<div class="title2">
                    	<div class="title2_left"><img src="<?php echo $skin_path;?>/xx_22.gif" /></div>
                        <div class="title2_wd"><?php $t=position_p($catid=3);?><?php echo $t['name'];?></div>
                        <div class="more1"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/xx_24.gif" /></a></div>
                    </div>
                    <div class="content2">
                    	<ul class="ul2">
                     <?php foreach(archive(3,0,0,'0,0,0',16,'aid',7,false,0) as $i => $archive) { ?> 
                        <li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><span class="date"><?php echo $archive['adddate'];?></span><?php echo $archive['title'];?></a></li>
                        <?php } ?>
</ul>
                    </div>
                </div>
                
                <div class="box2g">
                	<div class="title2">
                    	<div class="title2_left"><img src="<?php echo $skin_path;?>/xx_22.gif" /></div>
                        <div class="title2_wd"><?php $t=position_p($catid=6);?><?php echo $t['name'];?></div>
                        <div class="more1"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/xx_24.gif" /></a></div>
                    </div>
                    <div class="content2">
                    	<ul class="ul2">
                    <?php foreach(archive(6,0,0,'0,0,0',16,'aid',7,false,0) as $i => $archive) { ?> 
                        <li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><span class="date"><?php echo $archive['adddate'];?></span><?php echo $archive['title'];?></a></li>
                        <?php } ?>
</ul>
                    </div>
                </div>
            	
            </div>
<div class="clear"></div> 
            <div class="bd_leftg">
            <div class="box2">
                	<div class="title2">
                    	<div class="title2_left"><img src="<?php echo $skin_path;?>/xx_22.gif" /></div>
                        <div class="title2_wd"><?php $t=position_p($catid=3);?><?php echo $t['name'];?></div>
                        <div class="more1"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/xx_24.gif" /></a></div>
                    </div>
                    <div class="content2">
                    <?php foreach(archive(3,0,0,'0,0,0',16,'aid',4,true,0) as $i => $archive) { ?> 
                         <div class="prod_box">
                         <a href="<?php echo $archive['url'];?>"><img src="<?php echo $archive['sthumb'];?>" class="prod"/></a><br />
                      <a href="<?php echo $archive['url'];?>" class="prod_font"><?php echo $archive['title'];?></a></div>
                      <?php } ?>
 <div class="clear"></div>             
                    </div>
                </div>
            </div>
                   
    	</div>
      <div id="bd_right">
      	<div class="box1">
        	<div class="title1">
            	<div class="title1_left"><img src="<?php echo $skin_path;?>/xx_25.gif" /></div>
                <div class="title1_ioc"><img src="<?php echo $skin_path;?>/xx_27.gif" /></div>
                <div class="title1_wd"><?php echo lang(siteannoun);?></div>
                <div class="more"><img src="<?php echo $skin_path;?>/xx_26.gif" /></div>
            </div>
            <div class="content">
            	<ul class="ul2g">
                <?php foreach(announ(7) as $an) { ?>
                <li><a href="<?php echo $an['url'];?>"><?php echo $an['title'];?></a></li>
                <?php } ?>
</ul>
            </div>
        </div>
        <div class="box1g">
        	<div class="title1">
            	<div class="title1_left"><img src="<?php echo $skin_path;?>/xx_25.gif" /></div>
                <div class="title1_ioc"><img src="<?php echo $skin_path;?>/xx_27.gif" /></div>
                <div class="title1_wd"><?php $t=position_p($catid=3);?><?php echo $t['name'];?></div>
                <div class="more"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/xx_26.gif" /></a></div>
            </div>
            <div class="content">
            <?php foreach(archive(3,0,0,'0,0,0',10,'aid',1,true,0) as $i => $archive) { ?> 
            	<div class="shizi">
                	<div class="shizi_left"><a href="<?php echo $archive['url'];?>"><img src="<?php echo $archive['sthumb'];?>" border="0" class="picys" width="65" height="74" /></a></div>
                    <div class="shizi_right"><strong><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></strong><br />
<?php echo $archive['introduce'];?></div>
                </div>
            <?php } ?>
            	<ul class="ul2gg">
                <?php foreach(archive(3,0,0,'0,0,0',10,'aid',4,false,0) as $i => $archive) { ?> 
                    <li><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
                <?php } ?>
</ul>
            </div>
        </div>
        <div class="box1g">
        	<div class="title1">
            	<div class="title1_left"><img src="<?php echo $skin_path;?>/xx_25.gif" /></div>
                <div class="title1_ioc"><img src="<?php echo $skin_path;?>/xx_27.gif" /></div>
                <div class="title1_wd"><?php $t=position_p($catid=7);?><?php echo $t['name'];?></div>
                <div class="more"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/xx_26.gif" /></a></div>
            </div>
            <div class="content">
            	<ul class="ul2">
                    <?php foreach(archive(7,0,0,'0,0,0',20,'aid',6,false,0) as $i => $archive) { ?> 
                    <li><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
                <?php } ?>
</ul>
            </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <!--bd部结束-->
<?php echo template('footer.html'); ?>
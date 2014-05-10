<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
    	<div id="bd_left">
        	<div class="box1">
            	<div class="title"><?php $t=position_p($catid=2);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
<?php?></div>
                <div class="content">
                	<div class="pic"><img src="<?php echo $skin_path;?>/anli_10.gif" /></div>
                    <div class="pic_yy"><img src="<?php echo $skin_path;?>/anli_16.gif" /></div>
                    <ul class="ul2">
                   <?php foreach(archive(2,0,0,'0,0,0',16,'aid',6,false,0) as $i => $archive) { ?> 
<li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
                    <div class="more"><?php $t=position_p($catid=2);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo lang(more);?>>></a><?php?></div>
                </div>
            </div>
            <div class="box2">
            	<div class="title"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
<?php?></div>
                <div class="content">
                	<div class="pic"><img src="<?php echo $skin_path;?>/anli_10.gif" /></div>
                    <div class="pic_yy"><img src="<?php echo $skin_path;?>/anli_16.gif" /></div>
                    <ul class="ul2">
                   <?php foreach(archive(3,0,0,'0,0,0',16,'aid',6,false,0) as $i => $archive) { ?> 
<li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
                    <div class="more"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo lang(more);?>>></a><?php?></div>
                </div>
            </div>
            <div class="box2">
            	<div class="title"><?php $t=position_p($catid=4);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
<?php?></div>
                <div class="content">
                	<div class="pic"><img src="<?php echo $skin_path;?>/anli_10.gif" /></div>
                    <div class="pic_yy"><img src="<?php echo $skin_path;?>/anli_16.gif" /></div>
                    <ul class="ul2">
                   <?php foreach(archive(2,0,0,'0,0,0',16,'aid',6,false,0) as $i => $archive) { ?> 
<li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
                    <div class="more"><?php $t=position_p($catid=4);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo lang(more);?>>></a><?php?></div>
                </div>
            </div>
    	</div>
      <div id="bd_right">
      	<div class="box3">
            	<div class="title"><?php $t=position_p($catid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
<?php?></div>
                <div class="content">
                	<div class="p"><span class="lanwd"><strong><?php echo get(sitename);?></strong></span><br />
<?php echo templatetag::tag('公司简介');?></div>
                  <ul class="ul2g">
                    <?php foreach(archive(2,0,0,'0,0,0',16,'aid',6,false,0) as $i => $archive) { ?> 
<li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><span class="date"><?php echo sdate($archive['adddate'],'Y/m');?></span><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
                    <div class="more1"><?php $t=position_p($catid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><img src="<?php echo $skin_path;?>/anli_8.gif" border="0" /></a><?php?></div>
                </div>
            </div>
      </div>
      <div class="clear"></div>
    </div>
    <!--bd部结束-->
   
<?php echo template('footer.html'); ?>
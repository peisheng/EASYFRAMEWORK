<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
<div id="i">
    	<div id="bd_left" style="float:right;width:395px;">
        		<div class="bd_right_title"><div class="title_img"><img src="<?php echo $skin_path;?>/tz_10.gif" /></div>
                	<div class="title1"><?php $t=position_p($catid=2);?>
<a href="<?php echo $t['url'];?>"><span>新闻中心</span></a></div>
                    <div class="more1">
<a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/tz_13.gif" border="0" /></a></div>
          		</div>
                <div class="box">
                	<div class="em">
                   	  <div class="newsli">
                        	<ul class="ul2">
                            	<?php foreach(archive(2,0,0,'0,0,0',16,'aid',6,false,0) as $i => $archive) { ?> 
<li><span class="date">[<?php echo $archive['adddate'];?>]</span><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
                            </ul>
                      </div>
                        <div class="clear"></div>
                  </div>
                </div>
                   
        </div>

        <div id="bd_right" style="float:left;width:480px;">
        	<div class="bd_right_title"><div class="title_img"><img src="<?php echo $skin_path;?>/tz_10.gif" /></div>
            	<div class="title1"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>"><span></span></a></div>
                <div class="more1"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/tz_13.gif" border="0" /></a></div>
            </div>
                <div class="box">
                	<div class="em">
                    	<div class="pimg">
<?php echo template('system/slide.html'); ?>
</div>
                    </div>
                </div>
        </div>




        <div id="bd_cass">
        	<div class="bd_right_title"><div class="title_img"><img src="<?php echo $skin_path;?>/tz_10.gif" /></div>
                	<div class="title1"><?php $t=position_p($catid=4);?>
<a href="<?php echo $t['url'];?>"><span><?php echo $t['name'];?></span></a></div>
                <div class="more1">
<a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/tz_13.gif" border="0" /></a></div>
          </div>
                <div class="box" style="width:878px;">
                	<div class="em" style="width:864px;">
<div class="blank10"></div>
<style>#list-view li {
  float:left;
  margin:0 5px 10px;
  width:150px;  
  overflow:hidden;
  text-align:center;
  display:block;
  position:relative;
  line-height:1em;
}
</style>
<ul id="list-view">
<?php foreach(archive(3,0,0,'0,0,0',20,'aid',10,true,0) as $i => $archive) { ?>
<?php if($i%5==0) { ?><div class="clear blank5"></div><?php } else { ?><?php } ?>
<li><div class="img-wrap"><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><img alt="<?php echo $archive['stitle'];?>" src="<?php echo $archive['sthumb'];?>" onerror='this.src="<?php echo $base_url;?>/<?php echo config::get('onerror_pic');?>"' /></a></div>
<h5><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></h5><?php if($archive['attr2']) { ?><?php echo lang(price);?>	:	<span><?php echo $archive['attr2'];?></span><?php echo lang(unit);?><?php } ?>
</li>
<?php } ?>
</ul>
<div class="blank10"></div>
                        <div class="clear"></div>
                  </div>
   <div class="clear"></div>
                </div>
 <div class="clear"></div>
        </div>

 <div class="clear"></div>
        </div>

    <div class="clear"></div>
</div>
<?php echo template('footer.html'); ?>
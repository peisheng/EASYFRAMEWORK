<?php defined('ROOT') or exit('Can\'t Access !'); ?>
 <div id="footer">
    	<div class="foot_nav">
        	<div class="foot_nav_left"><img src="<?php echo $skin_path;?>/xx_29.gif" /></div>
            <div class="foot_nav_right">
            	<div class="foot_nav_wd">
                <?php $t=position_p($typeid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>	|	
<?php?>
<!-- <?php foreach(archive(1,0,0,'0,0,0',20,'aid',10,false,0) as $i => $archive) { ?> -->
<a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['stitle'];?></a>	|	
<!-- <?php } ?> --><?php $t=position_p($typeid=5);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>	|	
<?php?>
<a href="#">TOP</a><br />
</div>
            </div>
        </div> 
        <div class="cprt">
<!-- 页底说明 -->
<?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved.      
<div class="blank5"></div>
<?php echo getcnzzcount();?>&nbsp;&nbsp;<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a>
<div class="blank5"></div>
<?php if($topid==0) { ?><!-- 热门关键词 -->
<div class="hot_keys"><?php echo lang(hotkeys);?>： <?php echo gethotsearch(10);?></div><?php } ?>
</div>
   </div><!--fooder部结束-->
</div>
<!-- 在线客服 -->
<?php echo template('system/servers.html'); ?>
<!-- 短信 -->
<?php echo template('system/sms.html'); ?>

<?php if(get('lang_type')=='cn') { ?><script type="text/javascript" src="<?php echo $base_url;?>/js/tc.js"></script><?php } ?>
</body>
</html>
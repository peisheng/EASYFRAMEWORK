<?php defined('ROOT') or exit('Can\'t Access !'); ?>
 <div id="footer">
    	<div class="footer_nav"><?php foreach(archive(1,0,0,'0,0,0',6,'aid',6,false,0) as $i => $archive) { ?> 
<a href="<?php echo $archive['url'];?>"><?php echo $archive['stitle'];?></a>　|　
<?php } ?><a href="#">Top</a></div>
        <div class="footer_cprt">
<div class="cprt_l">
<?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved.      
</div>
<div class="cprt_r">
<?php echo getcnzzcount();?>&nbsp;&nbsp;<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a>
</div>
<div class="blank5"></div>
<?php if($topid==0) { ?><!-- 热门关键词 -->
<div class="hot_keys"><?php echo lang(hotkeys);?>： <?php echo gethotsearch(10);?></div><?php } ?>
</div>

<!-- 友情链接 -->
<?php if($topid==0) { ?><select name="website" onchange="javascript:window.open(this.options[this.selectedIndex].value)" style="float:right; margin-top:10px;">
<option value="default"><?php echo lang('links');?></option>
<?php foreach(friendlink('text',0,20) as $flink) { ?>
<option value="<?php echo $flink['url'];?>"><?php echo $flink['name'];?></option>
<?php } ?>
</select><?php } ?>
  </div><!--fooder部结束-->
</div>

<!-- 在线客服 -->
<?php echo template('system/servers.html'); ?>
<!-- 短信 -->
<?php echo template('system/sms.html'); ?>

<?php if(get('lang_type')=='cn') { ?><script type="text/javascript" src="<?php echo $base_url;?>/js/tc.js"></script><?php } ?>
</body>
</html>
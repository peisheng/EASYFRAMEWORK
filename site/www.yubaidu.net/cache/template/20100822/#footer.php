<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div id="footer">
    	<div class="foot_nav"><!-- <?php foreach(archive(1,0,0,'0,0,0',6,'aid',5,false,0) as $i => $archive) { ?>  -->
<a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['stitle'];?></a>	|	
<!-- <?php } ?> --><?php echo login_js();?>	|	
<a href="<?php echo $base_url;?>/index.php?case=manage&act=guestadd&manage=archive&guest=1">发布信息</a>	|	
<a href="#">TOP</a></div>
        <div class="foot_cprt">
<!-- 页底说明 -->
<?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved.      
<div class="blank5"></div>
<?php echo getcnzzcount();?>&nbsp;&nbsp;<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a>
<br />

<div class="copyright"><?php if($topid==0) { ?><!-- 热门关键词 -->
<div class="hot_keys"><?php echo lang(hotkeys);?>： <?php echo gethotsearch(10);?></div><?php } ?></div>

<!-- 友情链接 -->
<?php if($topid==0) { ?><select name="website" onchange="javascript:window.open(this.options[this.selectedIndex].value)" style="float:right; margin-top:10px;">
<option value="default"><?php echo lang('links');?></option>
<?php foreach(friendlink('text',0,20) as $flink) { ?>
<option value="<?php echo $flink['url'];?>"><?php echo $flink['name'];?></option>
<?php } ?>
</select><?php } ?>
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
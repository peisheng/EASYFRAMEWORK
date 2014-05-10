<?php defined('ROOT') or exit('Can\'t Access !'); ?>
	<div class="blank10"></div>
<div id="footer">
<span style="float:right;">
<!-- <?php foreach(archive(1,0,0,'0,0,0',6,'aid',5,false,0) as $i => $archive) { ?> -->
<a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a>	-	
<!-- <?php } ?> -->
<a href="#">Top</a>
</span>
<!-- 页底说明 -->
<?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved.  
</div>

<!-- 非商业用户请勿删除 -->
<div class="copyright" style="margin:5px 0px;"> &nbsp;&nbsp;<?php echo getcnzzcount();?>&nbsp;&nbsp;<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a></div>

<!-- 热门关键词 -->
<div style="clear:both;text-align:center;"><?php echo lang(hotkeys);?>： <?php echo gethotsearch(10);?></div>

<!-- 友情链接 -->
<?php if($topid==0) { ?><select name="website" onchange="javascript:window.open(this.options[this.selectedIndex].value)" style="float:right; margin-top:10px;">
<option value="default"><?php echo lang('links');?></option>
<?php foreach(friendlink('text',0,20) as $flink) { ?>
<option value="<?php echo $flink['url'];?>"><?php echo $flink['name'];?></option>
<?php } ?>
</select><?php } ?>
</div>
<!-- 在线客服 -->
<?php echo template('system/servers.html'); ?>
<!-- 短信 -->
<?php echo template('system/sms.html'); ?>

<?php if(get('lang_type')=='cn') { ?><script type="text/javascript" src="<?php echo $base_url;?>/js/tc.js"></script><?php } ?>
</body>
</html>
<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div id="footer">
<div class="center">
<ul class="copy">
<li>
<?php $t=position_p($typeid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>	|	
<?php?>
<!-- <?php foreach(archive(1,0,0,'0,0,0',20,'aid',10,false,0) as $i => $archive) { ?> -->
<a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a>	|	
<!-- <?php } ?> --><?php $t=position_p($typeid=5);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>	|	
<?php?>
<a href="#">TOP</a>
</li>
<li>Copyright © 2010 <a href="<?php echo $base_url;?>/"><?php echo get(sitename);?></a>. All Rights Reserved.
<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a></li>
<li><div class="copyright"> &nbsp;&nbsp;<?php echo getcnzzcount();?>

<!-- 友情链接 -->
<?php if($topid==0) { ?><select name="website" onchange="javascript:window.open(this.options[this.selectedIndex].value)" style="float:right; margin-top:10px;">
<option value="default"><?php echo lang('links');?></option>
<?php foreach(friendlink('text',0,20) as $flink) { ?>
<option value="<?php echo $flink['url'];?>"><?php echo $flink['name'];?></option>
<?php } ?>
</select><?php } ?>

<?php if($topid==0) { ?><!-- 热门关键词 -->
<div class="hot_keys" style="clear:both;text-align:left;"><?php echo lang(hotkeys);?>： <?php echo gethotsearch(10);?></div><?php } ?>

</div>
</li>

</ul>

</div>



<!-- 在线客服 -->
<?php echo template('system/servers.html'); ?>
<!-- 短信 -->
<?php echo template('system/sms.html'); ?>

<?php if(get('lang_type')=='cn') { ?><script type="text/javascript" src="<?php echo $base_url;?>/js/tc.js"></script><?php } ?>
</body>
</html>
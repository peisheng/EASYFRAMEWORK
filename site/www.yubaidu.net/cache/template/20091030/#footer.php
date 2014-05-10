<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div id="footer" style="width:945px;clear:both;height:28px;margin:0px auto;background:url(./images/foot_bg.gif) bottom repeat-x;background-color:#3F4A52;text-align:left;font-size:11px;color:#949CA1;line-height:21px;">
<div style="width:500px;height:21px;float:left;padding-left:20px;"><?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved.
</div>
<div style="width:405px;height:21px;float:right;padding-right:20px;text-align:right;">
<?php echo templatetag::tag('网站页底关于我们等说明');?>
<a href="#">TOP</a>
</div>
<br /><br />
<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a>	
&nbsp;&nbsp;<?php echo getcnzzcount();?>

<!-- 友情链接 -->
<?php if($topid==0) { ?><select name="website" onchange="javascript:window.open(this.options[this.selectedIndex].value)" style="float:right; margin-top:10px;">
<option value="default"><?php echo lang('links');?></option>
<?php foreach(friendlink('text',0,20) as $flink) { ?>
<option value="<?php echo $flink['url'];?>"><?php echo $flink['name'];?></option>
<?php } ?>
</select><?php } ?>

</div>
</div>
</div>

<?php if($topid==0) { ?><!-- 热门关键词 -->
<div class="hot_keys" style="clear:both;margin:10px 0px;text-align:center;"><?php echo lang(hotkeys);?>： <?php echo gethotsearch(10);?></div><?php } ?>

<!-- 在线客服 -->
<?php echo template('system/servers.html'); ?>
<!-- 短信 -->
<?php echo template('system/sms.html'); ?>

<?php if(get('lang_type')=='cn') { ?><script type="text/javascript" src="<?php echo $base_url;?>/js/tc.js"></script><?php } ?>
</body>
</html>
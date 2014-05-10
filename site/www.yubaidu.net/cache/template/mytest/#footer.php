<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div style="clear:both;height:10px;"></div>
<div class="bottom clear">
<div class="bottom_menu">
<?php echo templatetag::tag('网站页底关于我们等说明');?>
<a href="#">TOP</a>
</div>
<p>
<?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved.  
<br />
<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a><?php echo getcnzzcount();?>
</p>
</div>
<!-- 非商业用户请勿删除 -->

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
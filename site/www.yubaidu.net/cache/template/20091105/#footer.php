<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div id="footer">
<p><?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved. &nbsp;<a title="ICP备案" href="http://www.miibeian.gov.cn" target="_blank"><?php echo get('site_icp');?></a>	</p>
</div>
</div>
</div>
</div>
<!-- 非商业用户请勿删除 -->
<div class="copyright">
 &nbsp;&nbsp;<?php echo getcnzzcount();?>

<?php if($topid==0) { ?><!-- 热门关键词 -->
<div class="hot_keys"><?php echo lang(hotkeys);?>： <?php echo gethotsearch(10);?></div><?php } ?>
</div>

<!-- 在线客服 -->
<?php echo template('system/servers.html'); ?>
<!-- 短信 -->
<?php echo template('system/sms.html'); ?>

<?php if(get('lang_type')=='cn') { ?><script type="text/javascript" src="<?php echo $base_url;?>/js/tc.js"></script><?php } ?>

<map name="Map2"><area shape="rect" coords="81,-1,156,19"  href='<?php echo $base_url;?>/' onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $base_url;?>/');">
<area shape="rect" coords="0,-1,71,19" href="javascript:void(0);" onClick="window.external.AddFavorite(document.location.href,document.title)"></map>
</body>
</html>
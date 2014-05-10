<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div class="clear"></div>  
    <!--bd部结束-->
    <div id="footer">
    	<div class="foot_logo"><img src="<?php echo $skin_path;?>/ls_23.gif" /></div><!-- 友情链接 -->
<?php if($topid==0) { ?><select name="website" onchange="javascript:window.open(this.options[this.selectedIndex].value)" style="float:right; margin:10px;">
<option value="default"><?php echo lang('links');?></option>
<?php foreach(friendlink('text',0,20) as $flink) { ?>
<option value="<?php echo $flink['url'];?>"><?php echo $flink['name'];?></option>
<?php } ?>
</select><?php } ?>
        <div class="foot_bq"><?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved.  
<br />
<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a>&nbsp;&nbsp;<?php echo getcnzzcount();?>&nbsp;&nbsp;</div>
    </div>
    <!--fooder部结束-->
</div>




<?php if($topid==0) { ?><!-- 热门关键词 -->
<div class="hot_keys" style="clear:both;margin:10px 0px;text-align:center;"><?php echo lang(hotkeys);?>： <?php echo gethotsearch(10);?></div><?php } ?>


<!-- 在线客服 -->
<?php echo template('system/servers.html'); ?>
<!-- 短信 -->
<?php echo template('system/sms.html'); ?>

<?php if(get('lang_type')=='cn') { ?><script type="text/javascript" src="<?php echo $base_url;?>/js/tc.js"></script><?php } ?>

<!--[if ie 6]>
<script src="http://letskillie6.googlecode.com/svn/trunk/letskillie6.zh_CN.pack.js"></script>
<![endif]-->
</body>
</html>
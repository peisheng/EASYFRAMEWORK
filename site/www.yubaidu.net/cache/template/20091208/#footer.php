<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!-- 页底 -->
<div id="footer">
<span class="floatleft"><?php echo templatetag::tag('网站页底关于我们等说明');?>
<a href="#">TOP</a></span>
<?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved. <br />
<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a>

&nbsp;&nbsp;<?php echo getcnzzcount();?>&nbsp;&nbsp;<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a>
</div>
</div>
</body>
</html>
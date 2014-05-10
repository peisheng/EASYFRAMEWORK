<?php defined('ROOT') or exit('Can\'t Access !'); ?>
 <div id="footer">
    	<div class="footerl"><img src="<?php echo $skin_path;?>/hy_17.gif" /></div>
        <div class="p1"><?php $t=position_p($typeid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>	|	
<?php?>
<!-- <?php foreach(archive(1,0,0,'0,0,0',20,'aid',10,false,0) as $i => $archive) { ?> -->
<a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a>	|	
<!-- <?php } ?> --><?php $t=position_p($typeid=5);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>	|	
<?php?>
<a href="#">TOP</a><br />Copyright © 2010 <a href="<?php echo $base_url;?>/"><?php echo get(sitename);?></a>. All Rights Reserved.
<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a></div>
   </div>
<!-- 非商业用户请勿删除 -->
<div class="copyright">&nbsp;&nbsp;<?php echo getcnzzcount();?></div>
<?php echo template('system/servers.html'); ?>
</div>
</body>
</html>
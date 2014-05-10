<?php defined('ROOT') or exit('Can\'t Access !'); ?>
    <!--bd部结束-->
    <div id="footer">
    	<div class="foot_nav"><div class="foot_nav_left"><img src="<?php echo $skin_path;?>/lvsb_18.gif" /></div><?php $t=position_p($typeid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>	|	
<?php?>
<!-- <?php foreach(archive(1,0,0,'0,0,0',20,'aid',10,false,0) as $i => $archive) { ?> -->
<a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['stitle'];?></a>	|	
<!-- <?php } ?> --><?php $t=position_p($typeid=5);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>	|	
<?php?>
<a href="#">TOP</a></div>
        <div class="foot_cprt">
<?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved.      
<div class="blank5"></div>
<?php echo getcnzzcount();?>&nbsp;&nbsp;<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a>
<div class="blank5"></div>
<?php if($topid==0) { ?><!-- 热门关键词 -->
<div class="hot_keys"><?php echo lang(hotkeys);?>： <?php echo gethotsearch(10);?></div><?php } ?>
</div>
<?php if($catid==0) { ?>
<style type="text/css">
#links {
position:relative;
float:right;
width:168px;
height:19px;
line-height:16px;color:#fff;
margin-right:20px;
margin-top:-35px;
background:url(<?php echo $skin_path;?>/links.gif) right 2px no-repeat;
}

#links ul li a, #links ul li a:visited {color:#fff;display:block; text-decoration:none; width:168px; height:19px; text-align:left; padding-left:10px;  line-height:19px; font-size:12px;}
#links ul {padding:0; margin:0;list-style-type: none; }
#links ul li {float:left; position:relative;}
#links ul li ul {display: none;}
/* specific to non IE browsers */

#links ul li:hover ul {display:block; position:absolute; bottom:18px; left:0;}
#links ul li:hover ul li a.hide {}
#links ul li:hover ul li {display:block; width:168px; clear:both;
background:url(<?php echo $skin_path;?>/links_bg.gif) left top repeat-y;
}

</style>
<!--[if lte IE 6]>
<style type="text/css">
table {border-collapse:collapse; margin:0; padding:0;}
#links ul li a.hide, #links ul li a:visited.hide {display:none;}
#links ul li a:hover ul li a.hide {display:none;}
#links ul li a:hover {color:#fff; background:none;}
#links ul li a:hover ul {display:block; position:absolute; bottom:22px; right:0;}
#links ul li a:hover ul li {display:block; background:none; color:#fff; width:168px;overflow:hidden;
background:url(<?php echo $skin_path;?>/links_bg.gif) repeat-y left top;}
</style>
<![endif]-->

<div id="links">
<ul>


<li><a class="hide" style="text-align:right;font-size:10px;color:#999;">Links<span style="padding-right:80px;"></span></a>
<!--[if lte IE 6]>
<a href="#" style="text-align:right;font-size:10px;padding-right:80px;color:#999;">Links
<table><tr><td>
<![endif]-->
<ul>
<li style="height:7px;background:url(<?php echo $skin_path;?>/links_top.png) no-repeat left top !important; /*For Firefox*/*background:none;/*For IE7 & IE6*/_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $skin_path;?>/links_top.png',sizingMethod='crop');/*For IE6*/display: block;"></li>
<?php foreach(friendlink('text',0,6) as $flink) { ?>
<li><?php echo $flink['link'];?></li>
<?php } ?>
<li style="height:41px;background:url(<?php echo $skin_path;?>/links_bt.png) no-repeat left top !important; /*For Firefox*/*background:none;/*For IE7 & IE6*/_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $skin_path;?>/links_bt.png',sizingMethod='crop');/*For IE6*/display: block;"><a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a></li>

</ul>
<!--[if lte IE 6]>
</td></tr></table>
</a>
<![endif]-->
</li>
</ul>
</div>
<?php } ?>
    </div><!--fooder部结束-->
</div>
<!-- 在线客服 -->
<?php echo template('system/servers.html'); ?>
<!-- 短信 -->
<?php echo template('system/sms.html'); ?>

<?php if(get('lang_type')=='cn') { ?><script type="text/javascript" src="<?php echo $base_url;?>/js/tc.js"></script><?php } ?>
</body>
</html>
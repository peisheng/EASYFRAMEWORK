<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!-- 页底 -->
<div id="footer" class="mt10">
<div class="box">
<div class="footer">
<!-- 友情logo -->
<div class="links">
<?php if($topid==0) { ?>
<?php foreach(friendlink('image',0,20) as $flink) { ?>
<a href="<?php echo $flink['url'];?>" title="<?php echo $flink['name'];?>"><img src="<?php echo $flink['logo'];?>" /></a>
<?php } ?>
<?php } else { ?>
<?php echo lang(hotkeys);?>： <?php echo gethotsearch(10);?>
<?php } ?>
</div>
<!-- 页底导航 -->
<div class="about">
 
<?php echo templatetag::tag('网站页底关于我们等说明');?>
<a href="#">TOP</a>
</div>

<div class="copyright">
<!-- 友情链接 -->
<?php if($topid==0) { ?><select name="website" onchange="javascript:window.open(this.options[this.selectedIndex].value)" style="float:right; margin-top:10px;">
<option value="default"><?php echo lang('links');?></option>
<?php foreach(friendlink('text',0,20) as $flink) { ?>
<option value="<?php echo $flink['url'];?>"><?php echo $flink['name'];?></option>
<?php } ?>
</select><?php } ?>
<!-- 页底说明 -->
<?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved.   <?php echo login_js();?>
<div class="blank5"></div>
<?php echo getcnzzcount();?>  <a href="http://www.yubaidu.net" title="Powered by 誉百度工作室" target="_blank">Powered by 誉百度工作室</a>  <a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a>
</div>
<div class="clear"></div>
</div>
<?php if($topid==0) { ?><!-- 热门关键词 -->
<div class="hot_keys"><?php echo lang(hotkeys);?>： <?php echo gethotsearch(10);?></div><?php } ?>
</div>
</div>


<script type="text/javascript"> 
// 公告滚动js
var t=setInterval(myfunc,1000); 
var oBox=document.getElementById("announ"); 
function myfunc(){ 
var o=oBox.firstChild 
oBox.removeChild(o) 
oBox.appendChild(o) 
} 
oBox.onmouseover=function()
{
clearInterval(t)
} 
oBox.onmouseout=function()
{
t=setInterval(myfunc,2000)//滚动时间，默认2秒
} 
</script>

<!-- 在线客服 -->
<?php echo template('system/servers.html'); ?>
<!-- 短信 -->
<?php echo template('system/sms.html'); ?>


<?php if(get('lang_type')=='cn') { ?>
<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=slide&img=6&pos=right&uid=620555" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
var bds_config = {"bdTop":150};
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();
</script>
<!-- Baidu Button END -->
<?php } ?>

</body>
</html>
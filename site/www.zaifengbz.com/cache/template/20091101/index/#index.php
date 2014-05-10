<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<table width="948" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4" background="<?php echo $skin_path;?>/middle_bg1.jpg"><img width="4" height="1" /></td>
    <td width="940">
<table width="920" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:6px;" id="menu">
      <tr>
        <td height="35" background="<?php echo $skin_path;?>/menu_bg.jpg">
<a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/" <?php if($catid==0) { ?>class="aA"<?php } ?>><?php echo lang(homepage);?></a>
<?php foreach(categories_nav() as $t) { ?>
<span><img src="<?php echo $skin_path;?>/split.gif" width="2" height="11" /></span>
<a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>"<?php if(isset($topid) && $topid==$t['catid']) { ?> class="aA"<?php } ?>><?php echo $t['catname'];?></a>
<?php } ?>
        </td>
      </tr>
    </table>
      
      <div style="margin:10px;padding:20px;height:auto;overflow:auto;">
      <div style="background:url(<?php echo $skin_path;?>/arr3.gif) left 5px no-repeat;padding:0px 0px 0px 20px;"><strong><?php echo get('sitename');?></strong></div>
      <div style="line-height:26px; padding-top:6px; font-family:Arial;overflow:auto;">
       <?php echo get('site_description');?>
      </div>
<div class="blank10"></div>

<div style="background:url(<?php echo $skin_path;?>/arr3.gif) left 5px no-repeat;padding:0px 0px 0px 20px;"><strong><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>"><?php echo $t['name'];?></a><?php?></strong></div>
<div id="jsweb8_cn_left" style="overflow:hidden;width:880px;height:140px;">
<table cellpadding="0" cellspacing="0" border="0">
<tr><td id="jsweb8_cn_left1" valign="top" align="center">
<table cellpadding="2" cellspacing="0" border="0">
<tr align="center">
<?php foreach(archive(3,0,0,'0,0,0',20,'aid',10,true,0) as $i => $archive) { ?>
<td width="164px" height="150">
<a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><img src="<?php echo $archive['sthumb'];?>" alt="<?php echo $archive['stitle'];?>" onerror='this.src="<?php echo $base_url;?>/<?php echo config::get('onerror_pic');?>"' class="advice_pic" /></a>
<a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a>
</td><td width="10">&nbsp;</td>
<?php } ?>
</tr>
</table>
</td>
<td id="jsweb8_cn_left2" valign="top"></td>
</tr>
</table>
</div>
<style>
#jsweb8_cn_left1 td a {display:block;width:150px;overflow:hidden;}
.advice_pic {height:100px;}
</style>
<script>
var speed=30//速度数值越大速度越慢
jsweb8_cn_left2.innerHTML=jsweb8_cn_left1.innerHTML
function Marquee3(){
if(jsweb8_cn_left2.offsetWidth-jsweb8_cn_left.scrollLeft<=0)
jsweb8_cn_left.scrollLeft-=jsweb8_cn_left1.offsetWidth
else{
jsweb8_cn_left.scrollLeft++
}
}
var MyMar3=setInterval(Marquee3,speed)
jsweb8_cn_left.onmouseover=function() {
clearInterval(MyMar3)}
jsweb8_cn_left.onmouseout=function() {
MyMar3=setInterval(Marquee3,speed)
}
</script>

<div class="clear"></div>
      </div>
      

    <td width="4" background="<?php echo $skin_path;?>/middle_bg2.jpg"> </td>
  </tr>
</table>
<table width="948" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="948"><img src="<?php echo $skin_path;?>/btm_bg.jpg" width="948" height="7" /></td>
  </tr>
</table>
<?php echo template('footer.html'); ?>
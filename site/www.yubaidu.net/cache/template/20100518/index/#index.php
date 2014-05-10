<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
    	<div id="bd_box">
        <div style="height:16px;"></div>
          <div id="bd_left">
          	<div class="left_box1">
           	  <div class="title"><div class="title_img"><img src="<?php echo $skin_path;?>/lvse_7.gif" /></div><div class="title_wd"><span class="lvwd"><?php $t=position_p($catid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a></span></div>
           	  </div>
                <div class="content">
                	<div class="content_pic"><img src="<?php echo $skin_path;?>/lvse_15.gif" /></div>
                  <div class="p" style="height:138px;overflow:auto;margin-bottom:10px;"><?php echo templatetag::tag('公司简介');?></div>
                    <div class="more"><?php $t=position_p($catid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><img src="<?php echo $skin_path;?>/lvse_13.gif" border="0" /></a></div>
                </div>
            </div>
          </div>
          <div id="bd_right">
          	<div class="right_left">
            	<div class="box2">
                    <span class="tl"></span><span class="tr"></span>
                    <div class="cc">
                    <div class="left_box1">
           	  <div class="titlegg"><div class="title_img"><img src="<?php echo $skin_path;?>/lvse_9.gif" /></div>
           	  <div class="title_wdg"><span class="lvwd"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a></span></div>
           	  </div>
                <div class="content">

<?php foreach(archive(3,0,0,'0,0,0',20,'aid',2,true,0) as $i => $archive) { ?>
<div class="anli_pic"><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><img src="<?php echo $archive['sthumb'];?>" alt="<?php echo $archive['stitle'];?>" class="anli_img" /></a></div>
<?php } ?>

                    </div>
                    </div>
                  </div>
                    <span class="bl"></span><span class="br"></span>
                </div>
            </div>
            <div class="right_right">
            
            	<div class="right_box1">
           	  <div class="titleg"><div class="title_img"><img src="<?php echo $skin_path;?>/lvse_8.gif" /></div>
           	  <div class="title_wd"><span class="lvwd"><?php $t=position_p($catid=2);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a></span></div>
           	  </div>
                <div class="contentg">
                  <ul class="ul2">
<?php foreach(archive(2,0,0,'0,0,0',16,'aid',4,false,0) as $i => $archive) { ?> 
<li><span class="date"><?php echo sdate($archive['adddate'],'Y-m');?></span><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a><?php echo $archive['adddate'];?></li>
<?php } ?>

            </ul>
                    <div class="moreg"><?php $t=position_p($catid=2);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><img src="<?php echo $skin_path;?>/lvse_13.gif" border="0" /></a></div>
                </div>
            </div>
            
            <div class="right_box2">
              <div class="contentgg">
  <div id="jsweb8_cn_left" style="overflow:hidden;width:360px;height:145px;">
<table cellpadding="0" cellspacing="0" border="0">
<tr><td id="jsweb8_cn_left1" valign="top" align="center">
<table cellpadding="2" cellspacing="0" border="0">
<tr align="center">
<?php foreach(archive(3,0,0,'0,0,0',20,'aid',10,true,0) as $i => $archive) { ?>
<td width="124px" height="150">
<div class="prod_box">
                <a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><img src="<?php echo $archive['sthumb'];?>" alt="<?php echo $archive['stitle'];?>"  class="prod" /></a>
                <a href="<?php echo $archive['url'];?>" class="prod_font"><?php echo $archive['title'];?></a>
              </div> 
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
#jsweb8_cn_left1 td a {display:block;width:110px;overflow:hidden;}
.prod {height:90px;margin-bottom:5px;}
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


              
               <div class="moregg"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><img src="<?php echo $skin_path;?>/lvse_19.gif" border="0" /></a></div>  
              </div>
            </div>
            
            
            </div>
          </div><div class="clear"></div>
        </div>
    </div>
    <!--bd部结束-->
<?php echo template('footer.html'); ?>


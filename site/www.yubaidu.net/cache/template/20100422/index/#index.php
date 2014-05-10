<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
   <div id="bd">
        <div id="bd_left">
        <div class="left_box1">
        	<div class="left_box1_title"><div class="title_pic"><img src="<?php echo $skin_path;?>/hb_9.gif" /></div>
        	<?php $t=position_p($catid=2);?><div class="lv14"><?php echo $t['name'];?></div><div class="more"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/hb_21.gif" border="0" /></a></div><?php?>
       	  </div>
        	<div class="left_box1_content">
 <div class="content1">
            	<ul class="ul2">
                    <!-- <?php foreach(archive(2,0,0,'0,0,0',15,'aid',8,false,0) as $i => $archive) { ?> -->
                            	<li><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
                    <!-- <?php } ?> -->
                </ul>
            </div>
<div class="blank10"></div>
            <div class="left_box1_contentb"><img src="<?php echo $skin_path;?>/hb_11.gif" /></div>
            </div>
        </div>
        <div class="left_box2">
        	<div class="p">
<?php echo lang(address);?>：<?php echo get(address);?>
              <br />
               <?php echo lang(tel);?>：<span class="lv12"><?php echo get(tel);?></span> 
              <br />
          <?php echo lang(email);?>：<?php echo get(email);?>
</div>
        </div>
        </div>
<div id="bd_right">
        	<div class="right_L_box">
            	<div class="right_box_title"><div class="title_pic"><img src="<?php echo $skin_path;?>/hb_9.gif" /></div><?php $t=position_p($catid=1);?><div class="lv14"><?php echo $t['name'];?></div><div class="more"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/hb_21.gif" border="0" /></a></div><?php?>
           	  </div>
                <div class="p1">　　<span style="font-weight:bold; color:#0c9507;"><?php echo get(sitename);?></span>，<?php echo templatetag::tag('公司简介');?></div>
            </div>
            <div class="right_r_box">
            	<div class="right_box_title"><div class="title_pic"><img src="<?php echo $skin_path;?>/hb_9.gif" /></div><?php $t=position_p($catid=4);?><div class="lv14"><?php echo $t['name'];?></div><div class="more"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/hb_21.gif" border="0" /></a></div><?php?>
           	  </div>
  <?php foreach(archive(3,0,0,'0,0,0',8,'aid',1,true,0) as $archive) { ?>
                <div class="anli"><div class="anli_pic"><a href="<?php echo $archive['url'];?>"><img src="<?php echo $archive['sthumb'];?>" border="0" /></a></div>
                <div class="anli_p"><span class="titles"><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></span><br />
                          <?php echo cut(strip_tags($archive['content']),20);?>/<?php echo $archive['adddate'];?></div></div>
  <?php } ?>
            </div>
<div class="blank10"></div>
            <div class="right_c_box">
            	<div class="right_box_title"><div class="title_pic"><img src="<?php echo $skin_path;?>/hb_9.gif" /></div>
            	<?php $t=position_p($catid=3);?><div class="lv14"><?php echo $t['name'];?></div><div class="more"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/hb_8.gif" width="47" height="31" border="0" /></a></div><?php?>
           	  </div>
                <div class="content3">

<div id="jsweb8_cn_left" style="overflow:hidden;width:638px;height:150px;">
<table cellpadding="0" cellspacing="0" border="0">
<tr><td id="jsweb8_cn_left1" valign="top" align="center">
<table cellpadding="2" cellspacing="0" border="0">
<tr align="center">
<?php foreach(archive(3,0,0,'0,0,0',20,'aid',10,true,0) as $i => $archive) { ?>
<td width="164px" height="150">
<div class="prod_box">
                    <a href="<?php echo $archive['url'];?>"><img src="<?php echo $archive['sthumb'];?>" alt="<?php echo $archive['stitle'];?>" class="prod" /></a><br />
<a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"class="prod_font"><span><?php echo $archive['title'];?></span></a>
                    </div>
</td><td width="10"> </td>
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
.prod_box {width:164px;height:150px;}
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
            </div>
        </div>
      <div class="clear"></div>
    </div>
<!--bd部结束-->
   <?php echo template('footer.html'); ?>
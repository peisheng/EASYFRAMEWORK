<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
    	<div id="bd_left">
                    <?php $t=position_p($typeid=1);?><div class="title"><div class="title_r"><img src="<?php echo $skin_path;?>/ls_13.gif" /></div><span class="more">
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>">+MORE</a></span><div class="title_w"><a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a></div></div><?php?>
                   
                        <div class="pro"><a href="#"><img src="<?php echo $skin_path;?>/ls_7.gif" border="0" /></a></div>
                        <div class="p"><?php echo templatetag::tag('公司简介');?></div>
             
                </div>    	
    	<div id="bd_center">
                    <div class="title">
                      <?php $t=position_p($typeid=1);?><div class="title_w">
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a></div><div class="title_r"><img src="<?php echo $skin_path;?>/ls_13.gif" /></div><span class="more"><a href="<?php echo $t['url'];?>">+MORE</a></span></div><?php?>
                    <div class="content1">
                        <ul class="ul2">
                           <?php foreach(archive(2,0,0,'0,0,0',16,'aid',7,false,0) as $i => $archive) { ?> 
<li><span class="date"><?php echo $archive['adddate'];?></span><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
                        </ul>
                    </div>
                </div>
<div id="bd_right">
                    <div class="title1">
                      <?php $t=position_p($typeid=5);?><div class="title_w">
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a></div><div class="title_r"><img src="<?php echo $skin_path;?>/ls_13.gif" /></div><span class="more"><a href="<?php echo $t['url'];?>">+MORE</a></span></div><?php?>
                 
                        <div class="prog"><img src="<?php echo $skin_path;?>/gd_21.gif" /></div>
                        <div class="p"><strong><?php echo lang(address);?>：</strong><?php echo get(address);?><br />
                        <strong><?php echo lang(tel);?>：</strong><?php echo get(tel);?><br /> 
                          <strong><?php echo lang(fax);?>：</strong><?php echo get(fax);?><br /> 
                          <strong><?php echo lang(email);?>：</strong><?php echo get(email);?><br /> 
                          <strong><?php echo lang(QQ);?>：</strong><?php echo get(qq1);?></div>

</div>
    </div>
<div class="clear"></div>
    <div class="bd1">
    	<div class="bd1_title"><div class="title_w1"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a><?php?></div>
    	<span class="more1">+ <a href="<?php echo $t['url'];?>"><?php echo $t['name'];?></a></span></div>
        <div class="clear"></div>
        <div class="bd1_content">

<div id="jsweb8_cn_left" style="overflow:hidden;float:left;width:940px;height:132px;"> <div class="blank10"></div>
<div id="jsweb8_cn_left1" valign="top" align="center" style="width:800%;"> 
<div class="list_2"> 
 <?php foreach(archive(3,0,0,'0,0,0',20,'aid',10,true,0) as $i => $archive) { ?>
<div class="prod_box"> <a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><img src="<?php echo $archive['sthumb'];?>" alt="<?php echo $archive['stitle'];?>"  class="prod"/></a><br /><a href="<?php echo $archive['url'];?>" class="prod_font"><?php echo $archive['title'];?></a></div>
<?php } ?><?php foreach(archive(3,0,0,'0,0,0',20,'aid',10,true,0) as $i => $archive) { ?>
<div class="prod_box"> <a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><img src="<?php echo $archive['sthumb'];?>" alt="<?php echo $archive['stitle'];?>"  class="prod"/></a><br /><a href="<?php echo $archive['url'];?>" class="prod_font"><?php echo $archive['title'];?></a></div>
<?php } ?>
</div> 
</div> 
<div id="jsweb8_cn_left2" valign="top"></div> 

</div> 
<script> 
var speed=50//速度数值越大速度越慢 
jsweb8_cn_left2.innerHTML=jsweb8_cn_left1.innerHTML 
function Marquee3()
{ 
if(jsweb8_cn_left2.offsetWidth-jsweb8_cn_left.scrollLeft<=0) 
jsweb8_cn_left.scrollLeft-=jsweb8_cn_left1.offsetWidth 
else{ 
jsweb8_cn_left.scrollLeft++ 
} 
} 
var MyMar3=setInterval(Marquee3,speed) 
jsweb8_cn_left.onmouseover=function() 
{
clearInterval(MyMar3)
} 
jsweb8_cn_left.onmouseout=function() 
{
MyMar3=setInterval(Marquee3,speed)
} 
</script>
        </div>   	 
    </div>
<div class="clear"></div>  
   <?php echo template('footer.html'); ?>
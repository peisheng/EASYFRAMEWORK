<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
    <div id="bd">
    	<div id="bd_left">
    	  <div class="box">
            	<div class="title">
                	<div class="title_wde"><img src="<?php echo $skin_path;?>/lvsb_6.gif" /></div>
                	<div class="title_wd"><?php $t=position_p($typeid=3);?><?php echo $t['name'];?></div><!--服务项目，这里的ID为2,请修改成你对应栏目的ID-->
            </div>
            	<div class="content">
                	<ul class="ul2g">          
<?php foreach(categories(3) as $t) { ?><!--服务项目，这里的ID为3,请修改成你对应栏目的ID--> 
<li><a title="<?php echo $t['catname'];?>" target="_blank" href="<?php echo $t['url'];?>" class="t_1"><?php echo $t['catname'];?></a></li>

<?php } ?>
                    </ul>
                </div>
            </div>
            
            <div class="box1">
            	<div class="title">
                	<div class="title_wde"><img src="<?php echo $skin_path;?>/lvsb_6.gif" /></div>
                	<div class="title_wd"><?php echo lang(contactus);?></div>
              </div>
            	<div class="content">
                	<div class="p"> <strong><?php echo lang(address);?>：</strong><?php echo get(address);?> <br />
                <strong><?php echo lang(tel);?>：</strong><?php echo get(tel);?><br />
                <strong><?php echo lang(fax);?>：</strong><?php echo get(fax);?><br />
                <strong><?php echo lang(email);?>：</strong><?php echo get(email);?><br />
                <strong><?php echo lang(servers);?>：</strong><?php echo get(qq1);?></div>
                </div>
            </div>
    	</div>
      <div id="bd_right">
      	<div class="bd_right_left">
        	<div class="box">
           	  <div class="title1">
               	  <div class="title_wde"><img src="<?php echo $skin_path;?>/lvsb_7.gif" /></div>
               	<div class="title1_wd"><?php $t=position_p($typeid=1);?><?php echo $t['name'];?></div>
                    <div class="more"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/lvsb_10.gif" border="0" /></a></div>
              </div>
                <div class="content1">
                	<div class="pro_l"><img src="<?php echo $skin_path;?>/lvsb_24.gif" /></div>
                  <div class="pro_r"> <?php echo templatetag::tag('公司简介');?></div>
<div class="clear"></div>
              </div>
            </div>
            

<div class="box1">
           	  <div class="title1">
               	  <div class="title_wde"><img src="<?php echo $skin_path;?>/lvsb_7.gif" /></div>
               	<div class="title1_wd"><?php $t=position_p($typeid=2);?><?php echo $t['name'];?></div>
                    <div class="more"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/lvsb_10.gif" alt="More" border="0" /></a></div>
              </div>
                <div class="content">
                	<ul class="ul2">
                    <?php foreach(archive(2,0,0,'0,0,0',16,'aid',5,false,0) as $i => $archive) { ?> 
                    <li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><span class="date"><?php echo $archive['adddate'];?></span><?php echo $archive['title'];?></a></li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bd_right_right">
        	<div class="box">
            	<div class="title">
                	<div class="title_wde"><img src="<?php echo $skin_path;?>/lvsb_6.gif" /></div>
                	<div class="title_wd"><?php $t=position_p($typeid=3);?><a href="<?php echo $t['url'];?>" style="color:#FFF; text-decoration:none"><?php echo $t['name'];?></a></div>
              </div><div class="content">
  <!--下面是向上滚动代码-->
<div style="padding:10px 0px;">
<style type="text/css">
<!--
#demo {overflow: hidden; height: 320px;}
#demo,#demo1,#demo2 {
text-align: center;
float: left;
}

#demo ul li {margin:10px 20px;text-align:center;}
#demo img {
width:140px;
display: block;
}
-->
</style>

<div id="demo">
<div id="demo1">

<!-- <?php foreach(archive(3,0,0,'0,0,0',20,'view',10,true,0) as $i => $archive) { ?> -->
<div class="prodg_box">
                    <a href="<?php echo $archive['url'];?>"><img src="<?php echo $archive['sthumb'];?>" class="prodg"/></a><br />
                    <a href="<?php echo $archive['url'];?>" class="prodg_font"><?php echo $archive['title'];?></a>
            </div>
<!-- <?php } ?> -->


</div>
<div id="demo2"></div>
</div>

<div class="clear"></div>
</div>
<script>
<!--
var speed=20; //数字越大速度越慢
var tab=document.getElementById("demo");
var tab1=document.getElementById("demo1");
var tab2=document.getElementById("demo2");
tab2.innerHTML=tab1.innerHTML; //克隆demo1为demo2
function Marquee(){
if(tab2.offsetTop-tab.scrollTop<=0)//当滚动至demo1与demo2交界时
tab.scrollTop-=tab1.offsetHeight //demo跳到最顶端
else{
tab.scrollTop++
}
}
var MyMar=setInterval(Marquee,speed);
tab.onmouseover=function() {
clearInterval(MyMar)
};//鼠标移上时清除定时器达到滚动停止的目的
tab.onmouseout=function() {
MyMar=setInterval(Marquee,speed)
};//鼠标移开时重设定时器
-->
</script>

            	
                 
<div class="clear"></div>
              </div>
            </div>
        </div>
<div class="clear"></div>        
        <div class="box1">
            	<div class="title1">
                <div class="title_wde"><img src="<?php echo $skin_path;?>/lvsb_7.gif" /></div>
                <div class="title1_wd"><?php $t=position_p($typeid=3);?><?php echo $t['name'];?></div>
                    <div class="more"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/lvsb_10.gif" /></a></div>
                </div>
<div class="content" style="height:150px;">
<div id="jsweb8_cn_left" style="overflow:hidden;width:700px;height:130px;margin:0px 8px;">
<table cellpadding="0" cellspacing="0" border="0">
<tr><td id="jsweb8_cn_left1" valign="top" align="center">
<table cellpadding="2" cellspacing="0" border="0">
<tr align="center">
<?php foreach(archive(3,0,0,'0,0,0',20,'aid',10,true,0) as $i => $archive) { ?>
<td width="160px" height="140">

                	<div class="prod_box" style="clear:both;width:160px;">
                    <a href="<?php echo $archive['url'];?>"><img src="<?php echo $archive['sthumb'];?>" class="prod"/></a><br />
                    <a href="<?php echo $archive['url'];?>" class="prodg_font"><?php echo $archive['title'];?></a>
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
            </div>
        
      </div>
      <div class="clear"></div>
    </div>
<?php echo template('footer.html'); ?>
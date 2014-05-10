<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<link href="<?php echo $skin_path;?>/style2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $skin_path;?>/reset.css" rel="stylesheet" type="text/css" />
<div class="box line_3">
<div class="left_1">
<div class="t_1 mb5"><div><h3>产品导航</h3></div></div>
<style>
.t_1 {font-weight:bold;}
</style>
<table>
<?php foreach(categories() as $t) { ?>
<tr>
      <td class="prolist"><a title="<?php echo $t['catname'];?>" target="_blank" href="<?php echo $t['url'];?>"><?php echo $t['catname'];?></a></td>
    </tr>
<?php } ?>
</table>

<div class="t_1 mb10"><div><h3>友情链接</h3></div></div>
<ul class="f_link" style="height:120px;overflow:auto;">
<?php foreach(friendlink('text',0,20) as $flink) { ?>
<li><?php echo $flink['link'];?></li>
<?php } ?>
</ul>

</div>
<!--left_1 end-->


<div class="center_1">

<div class="t_2 clear mb10"><div><h3><?php $t=position_p($catid=27);?>
<a href="<?php echo $t['url'];?>">行业资讯</a></h3><span>news</span></div></div>
<img src="<?php echo $skin_path;?>/temp_1.jpg" width="165" height="105" class="img_1 fr ml10" />
<div class="fr" style="width:220px;">
<ul class="line_2 list">
<!-- <?php foreach(archive(2,0,0,'0,0,0',16,'aid',4,false,0) as $i => $archive) { ?>  -->
<li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><span><?php echo $archive['title'];?></span></a></li>
<!-- <?php } ?> -->
</ul>
</div>
<div class="clear"></div>

<div class="t_2 clear mb10"><div><h3><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>">产品展示</a></h3><span>products show</span></div></div>


<div id="jsweb8_cn_left" style="overflow:hidden;width:520px;height:140px;">
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
<div class="blank10"></div>

<div class="t_2 clear mt10 mb10"><div><h3><?php $t=position_p($catid=5);?>
<a href="<?php echo $t['url'];?>">联系我们</a></h3><span>contact us</span></div></div>
<img src="<?php echo $skin_path;?>/temp_3.jpg" width="165" height="105" class="img_1 fl mr10" />
<div class="fr" style="width:220px;">
<p class="line_2">
营业部<br />
电话：<?php echo get(tel);?><br />传真：<?php echo get(fax);?><br />
邮箱：<?php echo get('email');?><br />
地址：<?php echo get(address);?>
</p>
</div>

</div>
<!--center_1 end-->


<div class="right_1">
<div class="t_1"><div><h3>网站公告</h3></div></div>
<ul class="login mb10">
<?php foreach(announ(5) as $an) { ?>
<li><a href="<?php echo $an['url'];?>" title="<?php echo $an['title'];?>"><?php echo $an['title'];?></a></li>
<?php } ?>
</ul>
</form>



<div class="t_1"><div><h3>关注热点</h3></div></div>



<!--下面是向上滚动代码-->
<div style="padding:10px 0px;border:1px solid #DEDEDE;">
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
<ul>
<!-- <?php foreach(archive(3,0,0,'0,0,0',20,'view',10,true,0) as $i => $archive) { ?> -->
<li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><img src="<?php echo $archive['sthumb'];?>" alt="<?php echo $archive['stitle'];?>" onerror='this.src="<?php echo $base_url;?>/<?php echo config::get('onerror_pic');?>"' /></a></li>
<li><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
<!-- <?php } ?> -->
</ul>

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

<div class="blank10"></div>

 


</div>
<!--right_1 end-->
<div class="clear"></div>
</div>
<!--box end-->

<?php echo template('footer.html'); ?>
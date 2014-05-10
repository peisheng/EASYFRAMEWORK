<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div class="box line_3">
<div class="left_1">
<div class="t_1 mb5"><div><h3>产品导航</h3></div></div>
<style>
.t_1 {font-weight:bold;}
</style>
<ul class="leftmenu mb10">
<?php foreach(categories(3) as $t) { ?>
<li><a title="<?php echo $t['catname'];?>" target="_blank" href="<?php echo $t['url'];?>" class="t_1"><?php echo $t['catname'];?></a></li>
<?php foreach(categories($t['catid']) as $t1) { ?>
<li><a title="<?php echo $t1['catname'];?>" target="_blank" href="<?php echo $t1['url'];?>" class="t_2" style="padding-left:50px;"><?php echo $t1['catname'];?></a></li>
<?php } ?>
<?php } ?>
</ul>

<div class="t_1 mb10"><div><h3>快速通道</h3></div></div>
<div class="quick mb10">
<?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" class="q_1"><?php echo $t['name'];?></a>
<?php $t=position_p($catid=4);?>
<a href="<?php echo $t['url'];?>" class="q_2"><?php echo $t['name'];?></a>
<?php $t=position_p($catid=5);?>
<a href="<?php echo $t['url'];?>" class="q_3"><?php echo $t['name'];?></a>
<?php $t=position_p($catid=1);?>
<a href="<?php echo $t['url'];?>" class="q_4"><?php echo $t['name'];?></a>
<a title="<?php echo lang(feedback);?>" href="<?php echo url('guestbook');?>" target="_blank" class="q_5"><?php echo lang(feedback);?></a>
</div>

<div class="t_1 mb10"><div><h3>友情链接</h3></div></div>
<ul class="f_link" style="height:120px;overflow:auto;">
<?php foreach(friendlink('text',0,20) as $flink) { ?>
<li><?php echo $flink['link'];?></li>
<?php } ?>
</ul>

</div>
<!--left_1 end-->


<div class="center_1">
<div class="t_2 mb10"><div><h3>公司简介</h3><span>company introduce</span></div></div>
<img src="<?php echo $skin_path;?>/temp_2.jpg" width="265" height="160" class="img_1 fl mr10" />
<div class="fr pt10" style="width:240px;">
<h2 class="f14 fb"><?php echo get('sitename');?></h2>
<p class="line_2 ti" style="height:130px;overflow:auto;"><?php echo templatetag::tag('公司简介');?></p>
<?php $t=position_p($catid=1);?>
<a href="<?php echo $t['url'];?>" class="fb c_gray fr mt10">[阅读详细信息]</a>
</div>
<div class="clear"></div>

<div class="t_2 clear mb10"><div><h3><?php $t=position_p($catid=27);?>
<a href="<?php echo $t['url'];?>">行业资讯</a></h3><span>news</span></div></div>
<img src="<?php echo $skin_path;?>/temp_1.jpg" width="165" height="105" class="img_1 fr ml10" />
<div class="fr" style="width:340px;">
<ul class="line_2 list">
<!-- <?php foreach(archive(2,0,0,'0,0,0',16,'aid',4,false,0) as $i => $archive) { ?>  -->
<li><span class="date"><?php echo $archive['adddate'];?></span><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><span><?php echo $archive['title'];?></span></a></li>
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
<?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" class="fr"><img src="<?php echo $skin_path;?>/btn_more.jpg" width="55" height="20" /></a>

<div class="t_2 clear mt10 mb10"><div><h3><?php $t=position_p($catid=5);?>
<a href="<?php echo $t['url'];?>">联系我们</a></h3><span>contact us</span></div></div>
<img src="<?php echo $skin_path;?>/temp_3.jpg" width="165" height="105" class="img_1 fl mr10" />
<div class="fr" style="width:340px;">
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

 <div class="t_1"><div><h3>调查投票</h3></div></div>

<?php echo ballot(1);?>


</div>
<!--right_1 end-->
<div class="clear"></div>
</div>
<!--box end-->

<?php echo template('footer.html'); ?>
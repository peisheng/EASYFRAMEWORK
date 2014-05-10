<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="container">
<!-- 左侧导航 -->
<?php echo template('left.html'); ?>
<!-- 右侧功能区 -->
<div id="main">
<!-- 网站介绍 -->
<div id="myinfo">
<h4>网站介绍</h4>
<?php echo templatetag::tag('公司简介');?>
</div>
<div class="blank10"></div>
<div id="rightbox">
<div id="products">
<div class="top"><h5><a href="<?php echo $base_url;?>/products/">产品中心</a></h5></div>
<!-- 产品中心 -->
<div style="margin:0px 20px;">
<div class="dis"><img src="<?php echo $skin_url;?>/picleft.gif" alt="向左滚动" onclick="doSlide(-1)" /></div>
<div id=picbox>
<div id="content0" style="border:0px solid red;width:2376px">
 <?php foreach(archive(3,0,0,'0,0,0',20,'aid',10,true,0) as $i => $archive) { ?>
<div class="pic"><a href="<?php echo $archive['url'];?>"><img src="<?php echo $archive['sthumb'];?>" class="p$i" alt="<?php echo $archive['stitle'];?>" /></a><h5><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></h5></div>
<?php } ?>
</div>
</div>
<div class="dis"><img src="<?php echo $skin_url;?>/picright.gif" alt="向右滚动" onclick="doSlide(1)" /></div>
<div class="clear"></div>
</div>
<div class="clear"></div>
<!-- 企业新闻 -->
<div class="title"><h4><a href="<?php echo $base_url;?>/news/">新闻动态</a></h4></div>
<div id="newsbox">
<ul>
<?php foreach(archive(2,0,0,'0,0,0',16,'aid',12,false,0) as $i => $archive) { ?> 
<li>&nbsp; &middot; &nbsp;<a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
</div>

</div>
<div id="links">
<!-- 合作伙伴 -->
<div class="title"><h5 class="white">合作伙伴</h5></div>
<div class="blank10"></div>
<?php foreach(friendlink('image',0,8,80) as $flink) { ?>
<?php echo $flink['link'];?>
 <?php } ?>
 <div class="blank10"></div>
<img src="<?php echo $skin_url;?>/grayline.gif" />
<ul>
<li>
<?php foreach(friendlink('text',0,5) as $flink) { ?>
<?php echo $flink['link'];?>
<?php } ?>
</li>
</ul>
<div class="blank10"></div>
</div>
</div>
<div class="blank10"></div>
<a href="#" class="clear floatright">Top&nbsp;&nbsp;</a>
</div>
<div class="clear"></div>
<div id="containerbottom"></div>
</div>

<!-- 广告调用 -->
<script language="JavaScript">
  var ele=document.getElementById("picbox");
  var w=ele.clientWidth;
  var n=20,t=50;
  var timers=new Array(n);
  //////document.getElementById("content0").style.width=document.getElementById("content").clientWidth;
  var k=0;doSlide(0);
  function doSlide(s){
   k+=s;
    var x=ele.scrollLeft;
    var d=k*w-x;
    for(var i=0;i<n;i++)(
     function(){
      if(timers[i]) clearTimeout(timers[i]);
      var j=i;
//      alert(x)
      timers[i]=setTimeout(function(){ele.scrollLeft=x+Math.round(d*Math.sin(Math.PI*(j+1)/(2*n)));},(i+1)*t);
     }
    )();
}
</script>
<!-- 页底 -->
<?php echo template('footer.html'); ?>
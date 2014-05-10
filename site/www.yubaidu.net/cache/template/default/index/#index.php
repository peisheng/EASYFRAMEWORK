<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>


<!-- 页面中部开始 -->
<div class="clear box">

<!-- 页面左侧开始 -->
<div class="w_305">

<!-- 新闻中心 -->
<div class="title mt5 mb20">
<h3><?php foreach(plugins::categoryinfo(2) as $c) { ?><!-- 如修改栏目名称，可直接将2修改为栏目ID值 -->
<a href="<?php echo $c['url'];?>" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a>/<span><?php echo $c['htmldir'];?></span><?php } ?></h3>
</div>

<div class="text_pic">
<?php echo templatetag::tag('首页新闻图文1条');?>
</div>


<div class="line"></div>

<ul class="news_list">
<?php echo templatetag::tag('首页新闻4条');?>
</ul>

<?php $t=position_p($catid=2);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>" class="readme"></a>
<?php?>

<!-- 文档下载 -->
<div class="title mt20 mb20">
<h3><?php foreach(plugins::categoryinfo(6) as $c) { ?><!-- 如修改栏目名称，可直接将6修改为栏目ID值 -->
<a href="<?php echo $c['url'];?>" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a>/<span><?php echo $c['htmldir'];?></span><?php } ?></h3>
</div>
<ul class="down_list">
<?php echo templatetag::tag('首页文档下载10条');?>
</ul>


<!-- 订单查询 -->
<div class="title mt20 mb20">
<h3><a><?php echo lang(vieworders);?></a>/<span>Order</span></h3>
</div>
<div class="order">
<input class="o_text" id="oid" name="oid" type="text" align="absmiple"value=" <?php echo lang(orderid);?>… " onfocus="if(this.value==' <?php echo lang(orderid);?>… ') {this.value=''}" onblur="if(this.value=='') this.value=' <?php echo lang(orderid);?>… '" style="width:210px;" /> 
<input type="submit" class="o_btn" align="absmiple" name='submit' value=" <?php echo lang(look);?> " onclick="javascript:window.location.href='<?php echo url('archive/orders');;?>&oid='+document.getElementById('oid').value;" class="oidbtn" />
</div>

<!-- 联系我们 -->
<div class="title mt20 mb20">
<h3><a><?php echo lang(contactus);?></a>/<span>Contact Us</span></h3>
</div>
<ul class="contact_list">
<li><strong><?php echo lang(address);?>：</strong><?php echo get(address);?></li>
<li><strong><?php echo lang(tel);?>：</strong><?php echo get(tel);?></li>
<li><strong><?php echo lang(fax);?>：</strong><?php echo get(fax);?></li>
<li><strong><?php echo lang(email);?>：</strong><?php echo get(email);?></li>
</ul>

</div>
<!-- 左侧结束 -->


<!-- 右侧开始 -->
<div class="w_622">
<!-- 产品展示开始 -->
<div class="title mt5 mb20">
<h3><?php foreach(plugins::categoryinfo(3) as $c) { ?><!-- 如修改栏目名称，可直接将3修改为栏目ID值 -->
<a href="<?php echo $c['url'];?>" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a>/<span><?php echo $c['htmldir'];?></span><?php } ?></h3>
</div>

<!-- 滚动图片开始 -->
<script type="text/javascript" src="<?php echo $skin_path;?>/js/jquery.bxSlider.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
<!--用于滚动图片-->
    if($('#scroll a').length > 0){
$('#scroll').bxSlider({
auto: true,
displaySlideQty:4,
prevText: '',
nextText: '',
moveSideQty: 1
});
}
});
</script>

<div class="scroll">
<ul id="scroll" class="list-view">
<?php echo templatetag::tag('首页滚动图片');?>
</ul>
</div>
<!-- 滚动图片结束 -->
<!-- 产品展示结束 -->

<!-- 产品分类开始 -->
<div class="i_type">
<a class="on"><?php echo lang(ContentType);?></a><?php echo templatetag::tag('首页全部分类');?>
</div>

<!-- 产品分类结束 -->

<!-- 专题开始 --><?php foreach(special::listdata(1) as $special) { ?>
<div class="title mt20 mb20">
<h3><a href="<?php echo $special['url'];?>" title="<?php echo $special['title'];?>"><?php echo $special['title'];?></a>/<span>Special</span></h3>
</div>
<div class="special">
<div class="text_pic">
<a href="<?php echo $special['url'];?>" title="<?php echo $special['title'];?>" class="text_img"><img src="<?php echo $base_url;?>/<?php echo $special['banner'];?>" alt="<?php echo $archive['stitle'];?>" width="140" /></a><p><?php echo cut(strip_tags($special['description']),290);?></p><a href="<?php echo $special['url'];?>" title="<?php echo $special['title'];?>" class="readme" style="float:right;"></a>
</div>
<div class="clear"></div>
</div>
<?php } ?><!-- 专题结束 -->
<div class="clear line"></div>


<!-- 职位招聘开始 -->
<div class="i_job">
<div class="title mt5 mb20">
<h3><?php foreach(plugins::categoryinfo(7) as $c) { ?><!-- 如修改栏目名称，可直接将7修改为栏目ID值 -->
<a href="<?php echo $c['url'];?>" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a>/<span><?php echo $c['htmldir'];?></span><?php } ?></h3>
</div>

<ul class="news_list">
<?php echo templatetag::tag('首页职位招聘4条');?>
</ul>


</div>
<!-- 职位招聘结束 -->

<!-- 网站投票开始 -->
<div class="i_vote">
<div class="title mt5 mb20">
<h3><a><?php echo lang(vote);?></a>/<span>Vote</span></h3>
</div>


<?php echo ballot(1);?>

</script>


</div>
<!-- 网站投票结束 -->

<div class="clear"></div>
</div>
<!-- 右侧结束 -->


<div class="clear"></div>
</div>
<!-- 中部结束 -->


<?php echo template('footer.html'); ?>
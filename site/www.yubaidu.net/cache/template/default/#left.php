<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div class="l_box">
<?php
if(front::get('case') == 'area'){
?>
<dl id="leftmenu">
<dt class="parent" id="p1"><?php echo area::getpositonhtml(get('province_id'),get('city_id'),get('section_id'),get('id'));?></dt>
</dl>           
<?php
}elseif(front::get('case') == 'announ'){
?>
<dl id="leftmenu">
<dt class="parent" id="p1"><a><?php echo lang(siteannoun);?></a></dt>
</dl>
<?php
}elseif(front::get('case') == 'guestbook'){
?>
<dl id="leftmenu">
<dt class="parent" id="p1"><a><?php echo lang('guestbook');?></a></dt>
</dl>
<?php
}elseif(front::get('case') == 'comment'){
?>
<dl id="leftmenu">
<dt class="parent" id="p1"><a><?php echo lang('commentlist');?></a></dt>
</dl>
<?php
}elseif(front::get('case') == 'type'){
?>



<dl id="leftmenu">

<?php foreach(type() as $t) { ?>
<dt class="parent" id="p1"><a href="<?php echo $t['url'];?>" <?php if(isset($topid) && $topid==$t['typeid']) { ?>class="current"<?php } ?>><?php echo $t['typename'];?></a></dt>
<!--loop一级目录-->
<dd class="child"><?php foreach(type($t) as $t1) { ?>
<a href="<?php echo $t1['url'];?>" <?php if(isset($typeid) && $typeid==$t1['typeid']) { ?>class="current"<?php } ?>>&nbsp;└	<?php echo $t1['typename'];?></a>
<!--loop二级目录...-->
<?php foreach(type($t1) as $t2) { ?>
<a href="<?php echo $t2['url'];?>" <?php if(isset($typeid) && $typeid==$t2['typeid']) { ?>class="current"<?php } ?>>&nbsp;&nbsp;└<?php echo $t2['typename'];?></a>
<!--loop三级目录...-->
<?php foreach(type($t2) as $t3) { ?>
<a href="<?php echo $t3['url'];?>" <?php if(isset($typeid) && $typeid==$t3['typeid']) { ?>class="current"<?php } ?>>&nbsp;&nbsp;&nbsp;└<?php echo $t3['typename'];?></a>
<?php } ?>
<?php } ?>
<?php } ?>
</dd>
<?php } ?>
</dl>     

<?php
}elseif(front::get('case') == 'special'){
?>
<dl id="leftmenu">
<dt class="parent" id="p1"><a><?php echo $special['title'];?></a></dt>
</dl>              
<?php
}elseif(front::get('case') == 'tag'){
?>
<dl id="leftmenu">
<dt class="parent" id="p1"><a><?php echo $tag;?></a></dt>
</dl>
<?php
}elseif(front::get('case') == 'mailsubscription'){
?>
<dl id="leftmenu">
<dt class="parent" id="p1"><a><?php echo lang(mailsubscription);?></a></dt>
<?php
}else{
?>



<!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = getcategoryparentsid($catid);?>

<dl id="leftmenu">
<?php foreach(categories() as $t) { ?>
<?php if($t['catid']==$__pid) { ?>
<dt class="parent"<?php if(isset($topid) && $topid==$t['catid']) { ?> id="p1"<?php } ?>><a><?php echo $t['catname'];?></a></dt>
<dd class="child">
<?php foreach(categories($t['catid']) as $t1) { ?>
<a title="<?php echo $t1['catname'];?>" href="<?php echo $t1['url'];?>"<?php if($t1['catid']==$catid) { ?> class="on"<?php } ?>>&nbsp;└	<?php echo $t1['catname'];?></a>
<?php foreach(categories($t1['catid']) as $t2) { ?>  
<a title="<?php echo $t2['catname'];?>" href="<?php echo $t2['url'];?>"<?php if($t2['catid']==$catid) { ?> class="on"<?php } ?>>&nbsp;&nbsp;└<?php echo $t2['catname'];?></a>  
<?php foreach(categories($t2['catid']) as $t3) { ?>  
<a title="<?php echo $t3['catname'];?>" href="<?php echo $t3['url'];?>"<?php if($t3['catid']==$catid) { ?>  class="on"<?php } ?>>&nbsp;&nbsp;&nbsp;└<?php echo $t3['catname'];?></a>  
<?php } ?>  
<?php } ?>  
<?php } ?>
</dd><?php } ?>
<?php } ?>
<!--只展开当前栏目所在一级栏目下的分类-->
</dl>

<?php
}
?>

</div>
<div class="l_box_bottom"></div>


<!-- 订单查询 -->
<div class="title mt20 mb20">
<h3><a><?php echo lang(vieworders);?></a>/<span>Order</span></h3>
</div>


<div class="l_box_top"></div>
<div class="l_box">
<div class="order">
<input size="20" id="oid" class="o_text" name="oid" type="text" align="absmiple"value=" <?php echo lang(orderid);?>… " onfocus="if(this.value==' <?php echo lang(orderid);?>… ') {this.value=''}" onblur="if(this.value=='') this.value=' <?php echo lang(orderid);?>… '" /> 
<input type="submit" id="search_btn" align="absmiple" name='submit' value=" <?php echo lang(look);?> " onclick="javascript:window.location.href='<?php echo url('archive/orders');?>&oid='+document.getElementById('oid').value;" class="o_btn" />
</div>
</div>
<div class="l_box_bottom"></div>


<!-- 联系我们 -->
<div class="title mt20 mb20">
<h3><a><?php echo lang(contactus);?></a>/<span>Contact Us</span></h3>
</div>

<div class="l_box_top"></div>
<div class="l_box">
<ul class="news_list">
<li><strong><?php echo lang(address);?>：</strong><?php echo get(address);?></li>
<li><strong><?php echo lang(tel);?>：</strong><?php echo get(tel);?></li>
<li><strong><?php echo lang(fax);?>：</strong><?php echo get(fax);?></li>
<li><strong><?php echo lang(email);?>：</strong><?php echo get(email);?></li>
</ul></div>
<div class="l_box_bottom"></div>
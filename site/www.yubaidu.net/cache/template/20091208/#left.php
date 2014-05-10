<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div id="sidebar">
<!-- 功能菜单 -->
<?php if(($catid==0)) { ?>
<?php } else { ?>
<div class="boxtop">
<div class="top">
<h5><?php echo lang(categorylist);?></h5>
</div>
</div>
<div class="box">
<div class="boxright">
<ul>
<?php $__pid = getcategoryparentsid($catid);?>
<?php foreach(categories_nav() as $t) { ?>
<?php if($t['catid']==$__pid) { ?>
<?php foreach(category::listcategorydata($__pid) as $type) { ?>
<li><a href="<?php echo $type['url'];?>" title="<?php echo $type['catname'];?>" class="<?php if($type['catid']==$catid) { ?>on<?php } ?>"><?php echo $type['catname'];?></a></li>
<?php } ?>
<?php } ?>
<?php } ?>
</ul>
<div class="clear"></div>

</div>
</div>
<div class="boxbottom">
<div class="bottom"></div>
</div>
<div class="blank5"></div>
<?php } ?>

<div class="boxtop">
<div class="top">
<h5><?php echo lang(userlogin);?></h5>
</div>
</div>
<div class="box">
<div class="boxright">

<div id="login">
 <?php echo login_js();?>
 </div>
<div class="clear"></div>

</div>
</div>
<div class="boxbottom">
<div class="bottom"></div>
</div>
<div class="blank5"></div>



<div class="boxtop">
<div class="top">
<h5><?php echo lang(vieworders);?></h5>
</div>
</div>
<div class="box">
<div class="boxright">
<div style="padding-left:25px;">
<input size="20"  id="oid"  class="oid" name="oid" type="text" align="absmiple" value=" <?php echo lang(orderid);?>… " onfocus="if(this.value==' <?php echo lang(orderid);?>… ') {this.value=''}" onblur="if(this.value=='') this.value=' <?php echo lang(orderid);?>… '"  />
<input type="submit" id="search_btn" align="absmiple" name='submit' value=" <?php echo lang(look);?> " onclick="javascript:window.location.href='<?php echo url('archive/orders');?>&oid='+document.getElementById('oid').value;" class="oidbtn" />
<div class="clear"></div>
</div>
</div>
</div>
<div class="boxbottom">
<div class="bottom"></div>
</div>
<div class="blank5"></div>




<!-- 联系我们 -->
<div class="contactus">
<h5>联系我们</h5>
<ul>
<li>&middot; &nbsp;客服：<?php echo get('qq1');?></li>
<li>&middot; &nbsp;电话：<?php echo get('tel');?></li>
<li>&middot; &nbsp;邮箱：<?php echo get('email');?></li>
<li>&middot; &nbsp;地址：<?php echo get('address');?></li>
</ul>
</div>
</div>
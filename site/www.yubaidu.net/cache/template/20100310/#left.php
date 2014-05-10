<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div class="bd_left1 clear">
            <div class="title1"><div class="title1_t"><?php echo lang(quicknav);?></div></div>
                <ul class="ul2">
<!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = getcategoryparentsid($catid);?>
<?php foreach(categories_nav() as $t) { ?>

<?php if($t['catid']==$__pid) { ?>
<!-- <?php foreach(category::listcategorydata($__pid) as $type) { ?> -->
<li><a href="<?php echo $type['url'];?>" title="<?php echo $type['catname'];?>" class="<?php if($type['catid']==$catid) { ?>on<?php } ?>"><?php echo $type['catname'];?></a></li>
<!-- <?php } ?> -->
<?php } ?>
<?php } ?>
<!--只展开当前栏目所在一级栏目下的分类-->
</ul>
</div>



<div id="bd_right_Rs" style="clear:both;float:left;margin-top:15px;width:200px;">
        <div class="bd_right_R_1s" style="width:188px;overflow:hidden;">
          <div class="title1_ts"><?php echo lang(contactus);?></div>
              <div class="p_contact">
 <ul>
<li><?php echo lang(address);?>：<?php echo get(address);?></li>
<li><?php echo lang(tel);?>：<?php echo get(tel);?></li>
<li><?php echo lang(fax);?>：<?php echo get(fax);?></li> 
<li><?php echo lang(email);?>：<?php echo get(email);?></li> 
</ul>
  </div>
        </div>
      </div>




  <div id="bd_left2">
            <div class="title2"><div class="title1_ts"><?php echo lang(search);?></div></div>
              <div style="height:10px;"> </div>

         <form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">		
<table width="160" border="0" cellspacing="0" cellpadding="0" align="right" style="margin-right:20px;">
          <tr>
            <td height="10"> </td>
          </tr>
          <tr>
            <td><input  type="text"  id="inputsearch" name="keyword" size="28" height="30" /></td>
          </tr>

  <tr>
              <td height="10"> </td>
            </tr>
 <tr>
              <td align="right">
<input  name="submit" type="image" src="<?php echo $skin_path;?>/five_16.gif" />
</td>
            </tr>
        </table>
</form>
              <div style="height:10px;"> </div>

</div>
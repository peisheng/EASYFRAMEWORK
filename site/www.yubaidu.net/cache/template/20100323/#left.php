<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div class="bd_left_titleg">
            <div class="titleg">+&nbsp;&nbsp;<?php echo lang(quicknav);?></div>
          </div>
            <ul class="ul2g">
<!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = getcategoryparentsid($catid);?>
<?php foreach(categories_nav() as $t) { ?>
<li><a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>"<?php if(isset($topid) && $topid==$t['catid']) { ?> class="on"<?php } ?>><?php echo $t['catname'];?></a></li>
<?php if($t['catid']==$__pid) { ?>
<!-- <?php foreach(category::listcategorydata($__pid) as $type) { ?> -->
<li><a href="<?php echo $type['url'];?>" title="<?php echo $type['catname'];?>" class="<?php if($type['catid']==$catid) { ?>on<?php } ?>"><?php echo $type['catname'];?></a></li>
<!-- <?php } ?> -->
<?php } ?>
<?php } ?>
<!--只展开当前栏目所在一级栏目下的分类-->
            </ul>

<div class="bd_left_titleg">
            <div class="titleg">+&nbsp;&nbsp;Search</div>
          </div>
           <div id="search">
<form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
<input  id="inputsearch" name="keyword" type="text" align="absmiple" />&nbsp; 
<input type="submit" class="s_btn" align="absmiple" name='submit' value=" " />
</form>
</div>

            <div class="bd_left_titleg">
            <div class="titleg">+&nbsp;&nbsp;<?php echo lang(contactus);?></div>
          </div>
            <ul class="ul2g">
                    <li><?php echo lang(address);?>：<?php echo get(address);?></li>
<li><?php echo lang(tel);?>：<?php echo get(tel);?></li>
<li><?php echo lang(fax);?>：<?php echo get(fax);?></li> 
<li><?php echo lang(email);?>：<?php echo get(email);?></li> 
            </ul>
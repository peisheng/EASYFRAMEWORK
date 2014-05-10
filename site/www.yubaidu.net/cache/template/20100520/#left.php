<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div class="left_content">

<div class="left2ji_box1">
                    	<div class="title"><div class="title_img"><img src="<?php echo $skin_path;?>/11.gif" /></div>
                    	<div class="title_wd">网站公告<span class="title_wde">Announ</span></div>
                    	</div>
<div class="content">
                       	  
                <ul class="ul2g">
<?php foreach(announ(5) as $an) { ?>
<li><a href="<?php echo $an['url'];?>"><?php echo $an['title'];?></a></li>
<?php } ?>
 </ul>
</div>
                        </div>
<div class="clear"></div>

<!--左侧栏目导航开始-->
<script language="javascript" type="text/javascript">
var labelarr = new Array();
function displaynone(id){
document.getElementById(id).style.display='none';
}
function displayblock(labelarr){
for(i=0;i<=labelarr.length;i++){
document.getElementById(labelarr[i]).style.display='block';
}	
}
</script>
<div id="menu" class="left2ji_box1">
                    	<div class="title"><div class="title_img"><img src="<?php echo $skin_path;?>/11.gif" /></div>
                    	<div class="title_wd">
<a href="javascript:void(0)" class="home" id="listnav" onclick="displayblock(labelarr)">+<?php echo lang(quicknav);?></a><span class="title_wde">Navigation</span></div>
                    	</div>
<div class="content">
                        <div class="kjdh">
<!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = getcategoryparentsid($catid);?>
<?php foreach(categories_nav() as $t) { ?>

<?php if($t['catid']==$__pid) { ?>
<!-- <?php foreach(category::listcategorydata($__pid) as $type) { ?> -->
<div class="kjdh_wd"><a href="<?php echo $type['url'];?>" title="<?php echo $type['catname'];?>"<?php if($type['catid']==$catid) { ?> class="on"<?php } ?>><?php echo $type['catname'];?></a></div>
<!-- <?php } ?> -->
<?php } ?>
<?php } ?>
<!--只展开当前栏目所在一级栏目下的分类-->



</div>
<!--左侧栏目导航结束-->

</div>

                        </div>
<div class="clear"></div>


                        
                        <div class="left2ji_box2">
                    	<div class="title"><div class="title_img"><img src="<?php echo $skin_path;?>/11.gif" /></div><div class="title_wd">相关内容<span class="title_wde">Service</span></div></div>

                          <ul class="ul2g">
<!--  <?php foreach(archive($catid,0,0,'0,0,0',20,'aid',6,false,0) as $i => $archive) { ?> -->
<li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a></li>
<!-- <?php } ?> -->
                          </ul>
                        </div>
                        </div>
<div class="clear"></div>
                    </div>
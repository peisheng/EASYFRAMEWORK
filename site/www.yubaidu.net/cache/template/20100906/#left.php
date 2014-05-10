<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div id="bd_left">
    	  <div class="box">
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

            	<div class="content">
<!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = getcategoryparentsid($catid);?>

<dl id="leftmenu" class="treemenu">
<?php foreach(categories() as $t) { ?>
<?php if($t['catid']==$__pid) { ?>
<div class="title">
                	<div class="title_wde"><img src="<?php echo $skin_path;?>/lvsb_6.gif" /></div>
                	<div class="title_wd" onclick="displayblock(labelarr)"><?php echo $t['catname'];?></div>
            </div>
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
                </div>
            </div>
            
            <div class="box1">
            	<div class="title">
                	<div class="title_wde"><img src="<?php echo $skin_path;?>/lvsb_6.gif" /></div>
                	<div class="title_wd"><?php echo lang(contactus);?></div>
              </div>
            	<div class="content">
                	<div class="p"><strong><?php echo lang(address);?>：</strong><?php echo get(address);?> <br />
                <strong><?php echo lang(tel);?>：</strong><?php echo get(tel);?><br />
                <strong><?php echo lang(fax);?>：</strong><?php echo get(fax);?><br />
                <strong><?php echo lang(email);?>：</strong><?php echo get(email);?><br />
                <strong><?php echo lang(servers);?>：</strong><?php echo get(qq1);?></div>
                </div>
            </div>
    	</div>
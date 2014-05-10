<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
    	<div id="bdleft">
    		<?php echo template('left.html'); ?>
        </div>
        <div id="bd_right2">     	
                <div class="box">
                	<div class="em">
                    	<?php echo template('position.html'); ?>
                       <div class="pd">
   
   <div class="pd_title"><?php echo $archive['title'];?></div>
  
<div class="contentinfo"><?php echo lang(author);?>：<?php echo $archive['author'];?>&nbsp;&nbsp; <?php echo lang(adddate);?>：<?php echo $archive['adddate'];?>&nbsp;&nbsp; <?php echo lang(view);?>：<span id="view_js" class="view_js"><img src="<?php echo $skin_path;?>/loading.gif" /></span></div>

<!-- 正文 -->
<div id="content" style="width:550px;" class="text">
<div class="blank30"></div>
<?php echo $archive['content'];?>
<div class="blank30"></div>

<?php if($archive['tag']) { ?>
<!-- tag -->
<div class="blank10"></div>
<?php echo lang(tag);?>： <?php echo $archive['tag'];?>
<?php } ?>

<?php if($archive['special']) { ?>
<!-- 专题 -->
<div class="blank10"></div>
<?php echo lang(special);?>： <?php echo $archive['special'];?>
<?php } ?>


<?php if($archive['type']) { ?>
<!-- 分类 -->
<div class="blank10"></div>
<?php echo lang(type);?>： <?php echo $archive['type'];?>
<?php } ?>


<?php if($archive['area']) { ?>
<!-- 地区 -->
<div class="blank10"></div>
<?php echo lang(area);?>： <?php echo $archive['area'];?>
<?php } ?>

<div class="blank30"></div>
<?php if($pages>1) { ?>
<!-- 内页分页 -->
<div class="blank10"></div>
<div class="pages">
<?php echo archive_pagination($archive);?>
</div>
<div class="blank30"></div>
<?php } ?>

<!--自动调用自定义字段-->
<?php
$set_field=type::getpositionlink($data['typeid']);
$set_fields=array();
if(is_array($set_field))
foreach($set_field as $key => $value) {
    $set_fields[]=$value['id'];
}
?>
<?php echo cb_data($archive);?>
<?php foreach($archive as $key => $value) { ?>
<?php if(setting::$var['archive'][$name]['typeid'] && !in_array(setting::$var['archive'][$name]['typeid'],$set_fields)){
  unset($field[$name]);
  continue;
}?>
<?php if(!preg_match('/^my/',$key) || !$value) continue; ?>
<p> <?php echo setting::$var['archive'][$key]['cname'];?>: <?php echo $value;?></p>
<?php } ?>
<div class="blank20"></div>

<?php if(archive_attachment($archive['aid'],'id')) { ?>
<!-- 附件 -->
<p>
<?php echo lang(attachment);?>：<?php echo attachment_js($archive['aid']);?>
</p>
<?php } ?>
<div class="blank30"></div>

<?php if(hasflash()) { ?>
        <div style="color:red;font-size:16px;"><?php echo showflash(); ?></div><?php } ?>

<!-- 投票 -->
        <?php echo vote_js($archive['aid']);?>


<!-- 自定义表单开始 -->
<?php if($archive['showform']) { ?><div class="blank30"></div>
<?php echo template('myform/nrform.html'); ?>
<?php } ?>
<!-- 自定义表单结束 -->

<script language="JavaScript">
function shutwin(){
window.close();
return;}
</script>

<div class="blank30"></div>
<div id="tool">
<ul>
<li><a href="javascript:window.print()" class="print"><?php echo lang(printcontent);?></a></li>
<li><a href="javascript:shutwin()" class="close"><?php echo lang(shutwin);?></a></li>
<li style="width:65px;"><a href='<?php echo url('comment/list/aid/'.$archive['aid']); ?>' class="t_4"><?php echo lang(comment);?></a></li>
<li style="width:60px;"><?php echo lang(strgrades);?>：</li>
<li style="width:100px;"><?php echo $archive['strgrade'];?></li>
</ul>
</div>
<div class="blank30"></div>
<div id="page">
<?php if($archive['p']['aid']) { ?>
<strong><?php echo lang(archivep);?>：</strong><a href="<?php echo $archive['p']['url'];?>"><?php echo $archive['p']['title'];?></a>
<?php } else { ?>
<strong><?php echo lang(archivep);?>：</strong><?php echo lang(nopage);?>	
<?php } ?>
<div class="clear"></div>
<?php if($archive['n']['aid']) { ?>
 <strong><?php echo lang(archiven);?>：</strong><a href="<?php echo $archive['n']['url'];?>"><?php echo $archive['n']['title'];?></a>
<?php } else { ?>
<strong><?php echo lang(archiven);?>：</strong><?php echo lang(nopage);?>	
<?php } ?>
</div>

<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/gotop.gif"></a>
<div class="blank30"></div>
<div class="clear"></div>
   </div>
   <div class="clear"></div>
                    </div><div class="b"></div>
                </div></div>
        </div>
        </div>
<div id="view-js" style="display:none;">
<?php echo view_js($archive['aid']);?>
</div>
<script type="text/javascript">
function $(ID) {
return document.getElementById(ID);
}
$('view_js').innerHTML = $('view-js').innerHTML;
</script>

<script> 
function resizeImg(obj)
{ 
var obj = document.getElementById(obj); 
var objContent = obj.innerHTML;
var imgs = obj.getElementsByTagName('img'); 
if(imgs==null) return; 
for(var i=0; i<imgs.length; i++) 
{ 
if(imgs[i].width>parseInt(obj.style.width)) 
{ 
imgs[i].width = parseInt(obj.style.width);
} 
} 
} 
window.onload = function() {resizeImg('content');
} 
</script>
<?php echo template('footer.html'); ?>
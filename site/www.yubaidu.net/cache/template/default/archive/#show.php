<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<!-- 面包屑导航开始 -->
<div class="clear box">
<?php echo template('position.html'); ?>
</div><div class="blank5"></div>
<!-- 面包屑导航结束 -->

<!-- 中部开始 -->
<div class="clear box c_bg">
<div class="c_top"></div>

<!-- 左侧开始 -->
<div class="w_250">
<?php echo template('left.html'); ?>

<div class="clear"></div>
</div>
<!-- 左侧结束 -->


<!-- 右侧开始 -->
<div class="w_700">


<!-- 内容标题 -->
<div class="archive_title"><div class="r_box_top"></div><div class="r_box"><h1><?php echo $archive['title'];?></h1></div><div class="r_box_bottom"></div></div>

<div id="content" class="clear" style="width:650px;">


<div class="contentinfo"><?php echo lang(author);?>：<a href="javascript:void(0);" onclick="javascript:document.getElementById('addcontentuser').style.display='block';"><?php echo $archive['author'];?></a>&nbsp;&nbsp; <?php echo lang(adddate);?>：<?php echo $archive['adddate'];?>&nbsp;&nbsp; <?php echo lang(view);?>：<?php echo view_js($archive['aid']);?></div>


<!-------------------发布内容会员信息----------------------->
<?php if($archive['userid']!='-999') { ?>
<div id="addcontentuser" style="display:none"> 
<strong><?php echo lang(publisherinformation);?>》</strong> 
<!-- <?php echo $adduser['userid'];?> -->
<?php echo lang('username');?>：<?php echo $archive['author'];?>&nbsp;/&nbsp;<?php echo lang('nickname');?>：<?php echo $adduser['nickname'];?>&nbsp;/&nbsp;QQ：<?php echo $adduser['qq'];?> <?php echo lang('guestemail');?>：<?php echo $adduser['e_mail'];?>&nbsp;/&nbsp;<?php echo lang('orderaddress');?>：<?php echo $adduser['address'];?>&nbsp;/&nbsp;<?php echo lang('guesttel');?>：<?php echo $adduser['tel'];?>&nbsp;/&nbsp;<?php echo lang('userinfo');?>：<?php echo $adduser['intro'];?>
</div>  
    
<?php } ?>
<!------------------发布内容会员信息------------------------>

<div class="blank30"></div>
<!-- 正文 -->
<?php echo $archive['content'];?>

<div class="blank30"></div>


<?php if($archive['attr2']) { ?>
<!-- 价格 -->
<div class="blank10"></div>
<?php echo lang(productprice);?>： <?php echo $archive['attr2'];?>
<?php } ?>

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


<?php
/*$set_field=type::getpositionlink($data['typeid']);
$set_fields=array();
if(is_array($set_field))
foreach($set_field as $key => $value) {
    $set_fields[]=$value['id'];
}*/
?><!--自动调用自定义字段-->
<?php echo cb_data($archive);?>
<?php foreach($archive as $key => $value) { ?>
<?php
/*if(setting::$var['archive'][$name]['typeid'] && !in_array(setting::$var['archive'][$name]['typeid'],$set_fields)){
  unset($field[$name]);
  continue;
}*/
?>
<?php if(!preg_match('/^my/',$key) || !$value) continue; ?>
<?php
$category = category::getInstance();
$sonids = $category->sons(setting::$var['archive'][$key]['catid']);
if(setting::$var['archive'][$key]['catid'] != $archive['catid'] && !in_array($archive['catid'],$sonids) && (setting::$var['archive'][$key]['catid'])){
unset($field[$key]);
    continue;
}
?>
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
<?php if($archive['showform']) { ?>
<?php echo template('myform/nrform.html'); ?>
<?php } ?>
<!-- 自定义表单结束 -->


<script language="JavaScript">
function shutwin(){
window.close();
return;}
</script>
<?php if(get('lang_type')=='cn') { ?>
<div class="blank30"></div>
<!-- JiaThis Button BEGIN -->
<div id="ckepop" style="margin-left:10px;">
<a href="http://www.jiathis.com/share/" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank">分享到：</a>
<a class="jiathis_button_tools_1"></a>
<a class="jiathis_button_tools_2"></a>
<a class="jiathis_button_tools_3"></a>
<a class="jiathis_button_tools_4"></a>
</div>
<script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>
<!-- JiaThis Button END -->
<?php } ?>
<div class="blank30"></div>
<div class="line_2"></div>
<div id="tool">
<ul>
<li><a href="javascript:window.print()" class="print"><?php echo lang(printcontent);?></a></li>
<li><a href="javascript:shutwin()" class="close"><?php echo lang(shutwin);?></a></li>
<li style="width:90px; padding-left:5px;"><a href='<?php echo url('comment/list/aid/'.$archive['aid']); ?>' class="t_4"><?php echo lang(comment);?></a></li>
<li style="width:60px; padding-left:5px;"><?php echo lang(strgrades);?>：</li>
<li style="width:100px; padding-left:5px;"><?php echo $archive['strgrade'];?></li>
<?php if($archive['attr2']) { ?>
<li><a title="<?php echo lang(buy);?>" target="_blank" href="<?php echo url('archive/orders/aid/'.$archive['aid'],true);?>"><?php echo lang(buy);?></a></li>
<li><a title="<?php echo lang(makeorders);?>" href="<?php echo url('archive/doorders/aid/'.$archive['aid'],true);?>"><?php echo lang(makeorders);?></a></li>
<?php } ?>
</ul>
</div><div class="line_2"></div>
<div class="blank30"></div>



<!-- 上下页开始 -->
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
<!-- 上下页结束 -->


<!-- 评论框开始 -->
<?php echo template('comment/comment.html'); ?>
<!-- 评论框结束 -->

<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/images/gotop.gif"></a>
<div class="blank30"></div>
<div class="clear"></div>
</div>
</div>
<!-- 右侧结束 -->

<div class="c_bottom"></div>
<div class="clear"></div>
</div>
<!-- 中部结束 -->

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
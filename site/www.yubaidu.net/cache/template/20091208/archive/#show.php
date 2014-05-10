<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="container">
<!-- 左侧导航 -->
<?php echo template('left.html'); ?>
<!-- 右侧功能区 -->
<div id="main">
<div id="content">
<?php echo template('position.html'); ?>
<!-- 正文 -->
<div class="contenttext">
            <div class="pd_title"><?php echo $archive['title'];?></div>
                       <div id="content" style="width:685px;" class="pd">
   <div class="contentinfo"><?php echo lang(author);?>：<a href="javascript:void(0);" onclick="javascript:document.getElementById('addcontentuser').style.display='block';"><?php echo $archive['author'];?></a>&nbsp;&nbsp; <?php echo lang(adddate);?>：<?php echo $archive['adddate'];?>&nbsp;&nbsp; <?php echo lang(view);?>：<span id="view_js" class="view_js"><img src="<?php echo $skin_path;?>/loading.gif" /></span></div>


<!-------------------发布内容会员信息----------------------->
<?php if($archive['userid']!='-999') { ?>
<div id="addcontentuser" style="display:none"> 
<strong><?php echo lang(publisherinformation);?>》</strong> 
<!-- <?php echo $adduser['userid'];?> -->
{lang('<?php echo lang(username);?>')}：<?php echo $adduser['username'];?> <?php echo lang('nickname');?>：<?php echo $adduser['nickname'];?> QQ：<?php echo $adduser['qq'];?> <?php echo lang('guestemail');?>：<?php echo $adduser['e_mail'];?> <?php echo lang('orderaddress');?>：<?php echo $adduser['address'];?> <?php echo lang('guesttel');?>：<?php echo $adduser['tel'];?> <?php echo lang('userinfo');?>：<?php echo $adduser['intro'];?>
</div>  
    
<?php } ?>
<!------------------发布内容会员信息------------------------>
<!-- 正文 -->
<?php echo $archive['content'];?>
<div class="blank30"></div>


<?php if($archive['attr2']) { ?>
<!-- tag -->
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
<div id="tool">
<ul>
<li><a href="javascript:window.print()" class="print"><?php echo lang(printcontent);?></a></li>
<li><a href="javascript:shutwin()" class="close"><?php echo lang(shutwin);?></a></li>
<li style="width:90px; padding-left:5px;"><a href='<?php echo url('comment/list/aid/'.$archive['aid']); ?>' class="t_4"><?php echo lang(comment);?></a></li>
<li style="width:60px; padding-left:5px;"><?php echo lang(strgrades);?>：</li>
<li style="width:100px; padding-left:5px;"><?php echo $archive['strgrade'];?></li>
<?php if(get('lang_type')=='cn') { ?>
<li><a href="javascript:void((function(s,d,e,r,l,p,t,z,c) {var%20f='http://v.t.sina.com.cn/share/share.php?appkey=4174743220',u=z||d.location,p=['&url=',e(u),'& title=',e(t||d.title),'&source=',e(r),'&sourceUrl=',e(l),'& content=',c||'gb2312','&pic=',e(p||'')].join('');function%20a() {if(!window.open([f,p].join(''),'mb', ['toolbar=0,status=0,resizable=1,width=440,height=430,left=',(s.width- 440)/2,',top=',(s.height-430)/2].join('')))u.href=[f,p].join('');}; if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();}) (screen,document,encodeURIComponent,'','','','<?php echo $archive['title'];?>','',''));" class="sinaicon">分享到微博</a></li>
<?php } ?>
<?php if($archive['attr2']) { ?>
<li><a title="<?php echo lang(makeorders);?>" target="_blank" href="<?php echo url('archive/orders/aid/'.$archive['aid'],true);?>" class="orders"><?php echo lang(makeorders);?></a></li>
<?php } ?>
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

</div>
<div class="blank10"></div>
<a href="#" class="clear floatright">Top&nbsp;&nbsp;</a>
</div>
<div class="clear"></div>
<div id="containerbottom"></div>
</div>
</div>
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

<div id="view-js" style="display:none;">
<?php echo view_js($archive['aid']);?>
</div>
<script language="javascript" type="text/javascript">
function $(ID) {
return document.getElementById(ID);
}
$('view_js').innerHTML = $('view-js').innerHTML;
</script>
<?php echo template('footer.html'); ?>
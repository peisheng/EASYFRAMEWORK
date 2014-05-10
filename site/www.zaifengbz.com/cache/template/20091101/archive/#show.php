<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<table width="948" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4" background="<?php echo $skin_path;?>/middle_bg1.jpg"> </td>
    <td valign="top">
<?php echo template('left.html'); ?>	
</td>
        <td width="724" valign="top"><?php echo template('position.html'); ?></td>
          </tr>
          <tr>
            <td height="20"> </td>
          </tr>
          <tr>
            <td>
            <div style="border:1px dotted #FEB697; padding:8px; text-align:center; font-size:14px; color:#333333; background:#FFFAF9;"><h1><?php echo $archive['title'];?></h1></div></td>
          </tr>
          <tr>
            <td><img src="<?php echo $skin_path;?>/t.gif" width="1" height="6" /></td>
          </tr>
          <tr>
            <td align="right" style="font-size:11px; color:#BCBCBC;"></td>
          </tr>
          <tr>
            <td height="16"> </td>
          </tr>
          <tr>
            <td class="newsCon text">
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

<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/gotop.gif"></a>
<div class="blank30"></div>
</td>
          </tr>
          <tr>
            <td height="16" style="border-bottom:1px dotted #E6E6E6;"> </td>
          </tr>
          <tr>
            <td height="38" align="right"><a href="javascript:history.go(-1);"><img src="<?php echo $skin_path;?>/back.gif" alt="返回列表" width="72" height="21" border="0" /></a></td>
          </tr>
        </table></td>
      </tr>      
    </table></td>
    <td width="4" background="<?php echo $skin_path;?>/middle_bg2.jpg"> </td>
  </tr>
</table>
<table width="948" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="948"><img src="<?php echo $skin_path;?>/btm_bg.jpg" width="948" height="7" /></td>
  </tr>
</table>
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
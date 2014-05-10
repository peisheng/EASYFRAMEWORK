<?php defined('ROOT') or exit('Can\'t Access !'); ?>
   <?php echo template('header.html'); ?>
    <div id="bd">
    	<div id="bd_left">
        	<div class="boxn">
            	<?php echo template('position.html'); ?>
                <div class="content">

<div class="blank30"></div>
<script type="text/javascript" src="<?php echo $skin_path;?>/js/jquery-1.3.2.min.js"></script>
<script src="<?php echo $skin_path;?>/js/products_pic/jqzoom.pack.1.0.1.js" type="text/javascript"></script>
<script src="<?php echo $skin_path;?>/js/products_pic/jquery.jcarousel.pack.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $skin_path;?>/js/products_pic/jquery.jcarousel.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $skin_path;?>/js/products_pic/skin.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $skin_path;?>/js/products_pic/jqzoom.css" />
<style type = "text/css">
#pro_view {margin:12px;width:650px;}
#pro_infor {}
.big_pic {
  float:left;
  width:350px;
  overflow:hidden;
  text-align:center;
  display:block;
  position:relative;
  line-height:1em;
}

#image_box {
  margin:0 auto;
  width:326px;
  height:90%;
  /*非IE的主流浏览器识别的垂直居中的方法*/
  display: table-cell;
  vertical-align:middle;
  /*设置水平居中*/
  text-align:center;
  /* 针对IE的Hack */
  *display: block;
  *font-size: 139px;/*约为高度的0.873，200*0.873 约为175*/
  *font-family:Arial;/*防止非utf-8引起的hack失效问题，如gbk编码*/
  padding:5px;
  border:1px solid #ccc;
  _border:none;
  background:url(<?php echo $skin_path;?>/images/pic_bg.gif) left top no-repeat;
  border-right:1px solid white; 
  border-bottom:1px solid white;
}
#image_box img {
  display:block;
  width:326px;
  margin:0px auto;
  vertical-align:middle;
  
}
#pro_baseinfo {float:right; width:290px;}
#image_list {clear:both;}
#image_list li {height:54px;overflow:hidden;}
#image_list img {height:50px; padding:2px;cursor:pointer;}

#pro_baseinfo ul li {line-height:32px;}
.p_info {height:40px;line-height:40px;padding-left:20px;background:url(<?php echo $skin_path;?>/images/comment.gif) left center no-repeat;border-bottom:1px dotted #ccc;}
</style>
<!-- 幻灯片 -->

<?php $pics = array_values(unserialize($archive['pics'])); ?>

<script type="text/javascript">

$(function() {

// 放大镜
var options =
{
zoomWidth: 350,
zoomHeight: 250,
showEffect:'show',
hideEffect:'fadeout',
fadeoutSpeed: 'slow',
title :false
}
$(".jqzoom").jqzoom(options);

// 图片左右滚动
$('#image_list').jcarousel();

// 点击小图更换大图
$('#image_list img:only-child').click(function(){
$('#current_img').attr('src', this.src);
// 大图的命名方式为 小图 + 下划线
$('#current_img').parent().attr('href', this.alt);
});
});
</script>

<div id="pro_view">
<div id="pro_infor">

<!-- 左侧产品图 -->
<div class="big_pic">
<div id="image_box">
<a href="<?php echo $pics['0'];?>" class="jqzoom" title=""><img src="<?php echo $pics['0'];?>"  onerror='this.src="<?php echo $base_url;?>/<?php echo config::get('onerror_pic');?>"' alt="" id="current_img"></a>
</div>

<div class="blank10"></div>
<!-- 小图滚动列表 -->
<ul id="image_list" class="clear jcarousel-skin-tango">
<?php foreach($pics as $pic) { ?>
<?php if($pic) { ?><li><img src="<?php echo $pic;?>" alt="<?php echo $pic;?>" onerror='this.src="<?php echo $base_url;?>/<?php echo config::get('onerror_pic');?>"' /></li><?php } ?>
<?php } ?> 
</ul>

</div>

<!-- 右侧说明 -->
<div id="pro_baseinfo">
<ul>
<li><strong><?php echo lang(productname);?>：</strong><?php echo $archive['title'];?></li>
<?php if($archive['attr2']) { ?><li><strong><?php echo lang(price);?>：</strong><?php echo $archive['attr2'];?> <?php echo lang(unit);?></li><?php } ?>
<li><strong><?php echo lang(view);?>：</strong><?php echo view_js($archive['aid']);?></li>
<li><strong><?php echo lang(adddate);?>：</strong><?php echo $archive['adddate'];?></li>
<li><strong><?php echo lang(strgrades);?>：</strong><?php echo $archive['strgrade'];?></li>
<li>&nbsp;</li>
<?php if($archive['attr2']) { ?><li><a target="_blank" href="<?php echo url('archive/orders/aid/'.$archive['aid'],true);?>"><img src="<?php echo $skin_path;?>/images/buy.gif" /></a>&nbsp;&nbsp;&nbsp;&nbsp;<a title="<?php echo lang(makeorders);?>" href="<?php echo url('archive/doorders/aid/'.$archive['aid'],true);?>"><img src="<?php echo $skin_path;?>/images/shopping.gif" /></a></li><?php } ?>
</ul>
</div>
</div>

</div>
<div class="blank30"></div>
<div class="p_info"><?php echo lang(pintro);?>：</div>
<div class="blank30"></div>
<div class="pd" id="content" style="width:554px;">
<?php echo $archive['content'];?>
</div>

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
<li style="width:90px; padding-left:5px;"><a href='<?php echo url('comment/list/aid/'.$archive['aid']); ?>' class="t_4"><?php echo lang(comment);?></a></li>
<?php if(get('lang_type')=='cn') { ?>
<li><a href="javascript:void((function(s,d,e,r,l,p,t,z,c) {var%20f='http://v.t.sina.com.cn/share/share.php?appkey=4174743220',u=z||d.location,p=['&url=',e(u),'& title=',e(t||d.title),'&source=',e(r),'&sourceUrl=',e(l),'& content=',c||'gb2312','&pic=',e(p||'')].join('');function%20a() {if(!window.open([f,p].join(''),'mb', ['toolbar=0,status=0,resizable=1,width=440,height=430,left=',(s.width- 440)/2,',top=',(s.height-430)/2].join('')))u.href=[f,p].join('');}; if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();}) (screen,document,encodeURIComponent,'','','','<?php echo $archive['title'];?>','',''));" class="sinaicon">分享到微博</a></li>
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

                    </div>
            </div>
      </div>
   	  <div id="bd_right">
     <?php echo template('left.html'); ?></div>
    	<div class="clear"></div>
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
<?php echo template('footer.html'); ?>
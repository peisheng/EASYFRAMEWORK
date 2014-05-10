<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="CmsEasy 5_0_0_20120626_UTF8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php if(!empty($archive['mtitle'])) { ?><?php echo $archive['mtitle'];?><?php } elseif ($category[$catid][meta_title] and !$archive['title']) { ?><?php echo $category[$catid]['meta_title'];?><?php } else { ?><?php if(!empty($archive['title'])) { ?><?php echo $archive['title'];?>-<?php } ?><?php if($type['meta_title']) { ?><?php echo $type['meta_title'];?>-<?php } elseif (typename($type['typeid'])) { ?><?php echo typename($type['typeid']);?>-<?php } ?><?php if($category[$catid][meta_title]) { ?><?php echo $category[$catid]['meta_title'];?>-<?php } elseif (!empty($catid)) { ?><?php echo catname($catid);?>-<?php } ?><?php echo get('fullname');?><?php } ?> - Powered by CmsEasy</title>
<meta name="keywords" content="<?php if($archive['keyword']) { ?><?php echo $archive['keyword'];?><?php } else { ?><?php if($type['keyword']) { ?><?php echo $type['keyword'];?><?php } elseif ($category[$catid][keyword]) { ?><?php echo $category[$catid]['keyword'];?><?php } else { ?><?php echo get('site_keyword');?><?php } ?><?php } ?>" />
<meta name="description" content="<?php if($archive['description']) { ?><?php echo $archive['description'];?><?php } else { ?><?php if($type['description']) { ?><?php echo $type['description'];?><?php } elseif ($category[$catid][description]) { ?><?php echo $category[$catid]['description'];?><?php } else { ?><?php echo get('site_description');?><?php } ?><?php } ?>" />
<meta name="author" content="CmsEasy Team" />
<link rel="icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />
<link href="<?php echo $skin_path;?>/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $skin_path;?>/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $base_url;?>/js/jquery.min.js"></script>
<!--[if IE 6]> 
<script language="javascript" type="text/javascript">
navHover = function() { 
var lis = document.getElementById("navmenu").getElementsByTagName("LI"); 
for (var i=0; i<lis.length; i++) { 
lis[i].onmouseover=function() { 
this.className+=" iehover"; 
} 
lis[i].onmouseout=function() { 
this.className=this.className.replace(new RegExp(" iehover\\b"), ""); 
} 
} 
} 
if (window.attachEvent) window.attachEvent("onload", navHover); 

stuHover = function() {
 var cssRule;
 var newSelector;// 
 for (var i = 0; i < document.styleSheets.length; i++)
  for (var x = 0; x < document.styleSheets[i].rules.length ; x++)
   {
   cssRule = document.styleSheets[i].rules[x];
   if (cssRule.selectorText.indexOf("LI:hover") != -1)
   {
     newSelector = cssRule.selectorText.replace(/LI:hover/gi, "LI.iehover");
    document.styleSheets[i].addRule(newSelector , cssRule.style.cssText);
   }
  }
 var getElm = document.getElementById("menu").getElementsByTagName("LI");
 for (var i=0; i<getElm.length; i++) {
  getElm[i].onmouseover=function() {
  this.className+=" iehover";
  }
  getElm[i].onmouseout=function() {
  this.className=this.className.replace(new RegExp(" iehover\\b"), "");
  }
 }
}
if (window.attachEvent) window.attachEvent("onload", stuHover);
 
</script>
<![endif]--> 
<script language="javascript" type="text/javascript">
function killerrors()
{
return true;
}
window.onerror = killerrors;
</script>
<!--用于PNG图片在IE6下透明-->
<!--[if IE 6]>
<script src="<?php echo $skin_path;?>/js/png.js"></script>
<script>
  DD_belatedPNG.fix('.logo');
  DD_belatedPNG.fix(' .cfooter');
  DD_belatedPNG.fix('.cleft_box .cright');
  DD_belatedPNG.fix('.cleft_box_content .cfooter');
  DD_belatedPNG.fix('.cleft_box_content .cheader');
</script>
<![endif]--> 
</head>

<body>

<div id="main">
<div id="sig"></div>
<div id="header">
  	<div class="logo"><a href="<?php echo $base_url;?>/"><img src="<?php echo get('site_logo');?>" alt="<?php echo $sitename;?>" width="<?php echo get('logo_width');?>"></a></div>
    <div class="top">
<div class="top_a"><a title="<?php echo lang(sitewap);?>" href="<?php echo $base_url;?>/wap/"><?php echo lang(sitewap);?></a>&nbsp;&nbsp;-&nbsp;&nbsp;<a href="<?php echo url('archive/orders');?>"><?php echo lang(shoppingcart);?></a>&nbsp;&nbsp;-&nbsp;&nbsp;
<a href="<?php echo $site_url;?>" onclick="window.external.addFavorite(this.href,this.title);return false;" title='<?php echo get(sitename);?>' rel="sidebar"><?php echo lang(favorite);?></a>&nbsp;&nbsp;-&nbsp;&nbsp;
<a title="<?php echo lang(feedback);?>" href="<?php echo url('guestbook');?>" target="_blank"><?php echo lang(feedback);?></a>&nbsp;&nbsp;-&nbsp;&nbsp;
<a id="StranLink" title="繁简转换">繁体</a>&nbsp;&nbsp;-&nbsp;&nbsp;
<?php echo login_js();?></div>
<div class="top_wd clear"><a href="index.php?case=archive&act=show&aid=4">SITEMAP</a>  |  <?php $t=position_p($catid=5);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>">CONTACT</a><?php?></div>
<form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
<div class="top_input">
<input type="text" name="keyword" value="<?php echo lang(pleaceinputtext);?>" onfocus="if(this.value=='<?php echo lang(pleaceinputtext);?>') {this.value=''}" onblur="if(this.value=='') this.value='<?php echo lang(pleaceinputtext);?>'" size="24" />
    </div> 
<div  class="top_inputimg"><input name='submit' type="image" src="<?php echo $skin_path;?>/sm_3.gif" align="middle" /></div>
</form>
<!-- 多站切换 -->
<div class="website">
<select name="website" onchange="javascript:window.open(this.options[this.selectedIndex].value)">
  <option value="default"><?php echo lang('websitego');?></option>
  <?php foreach(getwebsite() as $d) { ?>
  <option value="<?php echo $d['url'];?>"><?php echo $d['name'];?></option>
  <?php } ?>
</select>
</div>
   </div>

<div class="clear"></div>
<div id="nav">
<ul id="navmenu"> 
<li><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/" class="one<?php if($topid==0) { ?> on<?php } ?>"><?php echo lang(homepage);?></a></li>
<?php foreach(categories_nav() as $t) { ?>
<li><img src="<?php echo $skin_path;?>/nav_line.gif" /></li>
<li><a href="<?php echo $t['url'];?>" title="<?php echo $t['catname'];?>" class="one<?php if(isset($topid) && $topid==$t['catid']) { ?> on<?php } ?>"><?php echo $t['catname'];?></a>
<ul>
<?php foreach(categories($t['catid']) as $t1) { ?>
<li><a title="<?php echo $t1['catname'];?>" href="<?php echo $t1['url'];?>"><?php echo $t1['catname'];?></a>
<ul><?php foreach(categories($t1['catid']) as $t2) { ?>
<li><a title="<?php echo $t2['catname'];?>" href="<?php echo $t2['url'];?>"><?php echo $t2['catname'];?></a>
<ul><?php foreach(categories($t2['catid']) as $t3) { ?>
<li><a title="<?php echo $t3['catname'];?>" href="<?php echo $t3['url'];?>"><?php echo $t3['catname'];?></a>
<ul><?php foreach(categories($t3['catid']) as $t4) { ?>
<li><a title="<?php echo $t4['catname'];?>" href="<?php echo $t4['url'];?>"><?php echo $t4['catname'];?></a>
<ul><?php foreach(categories($t4['catid']) as $t5) { ?>
<li><a title="<?php echo $t5['catname'];?>" href="<?php echo $t5['url'];?>"><?php echo $t5['catname'];?></a></li> 
<?php } ?></ul>
</li> 
<?php } ?></ul>
</li>
<?php } ?></ul>
</li>
<?php } ?></ul>
</li> 
<?php } ?></ul>
</li><?php } ?>
</ul>
</div>

<div class="blank5"></div>

<div class="banner">
<?php echo template('system/slide.html'); ?>
</div>

<div class="announ"><div id="announ">
<?php foreach(announ(5) as $an) { ?>
<p><a href="<?php echo $an['url'];?>" title="<?php echo $an['title'];?>"><?php echo $an['title'];?></a> [<?php echo $an['adddate'];?>]</p>
<?php } ?>
</div></div>
</div>

<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="CmsEasy 5_0_0_20120626_UTF8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php if(!empty($archive['mtitle'])) { ?><?php echo $archive['mtitle'];?>-<?php } elseif (!empty($archive['title'])) { ?><?php echo $archive['title'];?>-<?php } ?><?php if($type['meta_title']) { ?><?php echo $type['meta_title'];?>-<?php } elseif (typename($type['typeid'])) { ?><?php echo typename($type['typeid']);?>-<?php } ?><?php if($category[$catid][meta_title]) { ?><?php echo $category[$catid]['meta_title'];?>-<?php } elseif (!empty($catid)) { ?><?php echo catname($catid);?>-<?php } ?><?php echo get('fullname');?> - Powered by CmsEasy</title>
<meta name="keywords" content="<?php if($archive['keyword']) { ?><?php echo $archive['keyword'];?><?php } else { ?><?php if($type['keyword']) { ?><?php echo $type['keyword'];?><?php } elseif ($category[$catid][keyword]) { ?><?php echo $category[$catid]['keyword'];?><?php } else { ?><?php echo get('site_keyword');?><?php } ?><?php } ?>" />
<meta name="description" content="<?php if($archive['description']) { ?><?php echo $archive['description'];?><?php } else { ?><?php if($type['description']) { ?><?php echo $type['description'];?><?php } elseif ($category[$catid][description]) { ?><?php echo $category[$catid]['description'];?><?php } else { ?><?php echo get('site_description');?><?php } ?><?php } ?>" />
<meta name="author" content="CmsEasy Team" />
<link rel="icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />
<link href="<?php echo $skin_path;?>/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $skin_path;?>/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
<!-- 
function ResumeError()  
{ 
    return true; 
} 
window.onerror = ResumeError; 
function check()
{
if(document.search.keyword.value.length==0){
     alert("<?php echo lang(pleaceinputtext);?>");
     document.search.keyword.focus();
     return false;
    }

}
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
// --> 
// --> 
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
<script language="javascript" type="text/javascript">
function killerrors()
{
return true;
}
window.onerror = killerrors;
</script>
<style type="text/css">
.logo {float:left;display:block;width:<?php echo get('logo_width');?>px; height:<?php echo get('logo_height');?>px; background:url(<?php echo $base_url;?>/<?php echo get('site_logo');?>) center center no-repeat;}
</style>
</head>
<body>
<div id="one"> 
<div id="head">
<div id="head1">
<div class="logo"><a title="<?php echo get(sitename);?>" href="<?php echo $base_url;?>/"></a></div>
    	<div class="headfont">
<!-- 页头导航 -->
<a title="<?php echo lang(sitewap);?>" href="<?php echo $base_url;?>/wap/"><?php echo lang(sitewap);?></a>  -  <a href="<?php echo url('archive/orders');?>"><?php echo lang(shoppingcart);?></a>  -  
<a title="<?php echo lang(feedback);?>" href="<?php echo url('guestbook');?>" target="_blank"><?php echo lang(feedback);?></a>  -  
<?php if(get('lang_type')=='cn') { ?><a id="StranLink" title="繁简转换">繁体</a>  -  <?php } ?>
<?php echo login_js();?>
</div>
  </div>
    <div id="head2">
    	<div id="head2_left"><img src="<?php echo $skin_path;?>/five_2.gif" /></div>
        <div id="head2_right"><img src="<?php echo $skin_path;?>/five_3.gif" /></div>

<!-- 网站导航 -->
<div class="nav">
<ul id="nav"> 
<li class="one<?php if($topid==0) { ?> on<?php } ?>"><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/"><?php echo lang(homepage);?></a></li>
<?php foreach(categories_nav() as $t) { ?>
<li class="one<?php if(isset($topid) && $topid==$t['catid']) { ?> on<?php } ?>"><a href="<?php echo $t['url'];?>" title="<?php echo $t['catname'];?>" target="<?php if(config::get('nav_blank')==1) { ?> _blank<?php } ?>"><?php echo $t['catname'];?></a>
<?php if(count(categories($t['catid']))) { ?><ul>
<?php foreach(categories($t['catid']) as $t1) { ?>
<li><a title="<?php echo $t1['catname'];?>" href="<?php echo $t1['url'];?>"><?php echo $t1['catname'];?></a>
<?php if(count(categories($t1['catid']))) { ?><ul><?php foreach(categories($t1['catid']) as $t2) { ?><span></span>
<li><a title="<?php echo $t2['catname'];?>" href="<?php echo $t2['url'];?>"><?php echo $t2['catname'];?></a>
<?php if(count(categories($t2['catid']))) { ?><ul><?php foreach(categories($t2['catid']) as $t3) { ?><span></span>
<li><a title="<?php echo $t3['catname'];?>" href="<?php echo $t3['url'];?>"><?php echo $t3['catname'];?></a>
<?php if(count(categories($t3['catid']))) { ?><ul><?php foreach(categories($t3['catid']) as $t4) { ?><span></span>
<li><a title="<?php echo $t4['catname'];?>" href="<?php echo $t4['url'];?>"><?php echo $t4['catname'];?></a>
<?php if(count(categories($t4['catid']))) { ?><ul><?php foreach(categories($t4['catid']) as $t5) { ?><span></span>
<li><a title="<?php echo $t5['catname'];?>" href="<?php echo $t5['url'];?>"><?php echo $t5['catname'];?></a></li> 
<?php } ?></ul><?php } ?>
</li> 
<?php } ?></ul><?php } ?>
</li>
<?php } ?></ul><?php } ?>
</li>
<?php } ?></ul><?php } ?>
</li> 
<?php } ?></ul><?php } ?>
</li><?php } ?>
</ul>
</div>
<!-- 导航结束 -->

    </div>
</div>
 <div id="banner"style="width:980px;height:<?php echo get(slide_height);?>px;overflow:hidden;">
<?php echo template('system/slide.html'); ?>
</div>
<div class="clear"></div>
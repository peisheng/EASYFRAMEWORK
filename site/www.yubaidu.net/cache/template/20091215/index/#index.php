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
<link href="<?php echo $skin_path;?>/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.logo {float:left;display:block;width:<?php echo get('logo_width');?>px; height:96px; background:url(<?php echo get('site_logo');?>) center center no-repeat;}
</style>
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

<style type="text/css">
body {
  background:#FFF url(<?php echo $skin_path;?>/bg.gif) left 470px repeat-x;
}
#i_bg {

  background:url(<?php echo $skin_path;?>/i_bg.jpg) center top no-repeat;
  }
  #i_news {
  float:left;
  width:280px;
  height:140px;
  margin:210px 50px 24px 0px;

}

#i_news h5 {
  height:30px;
  line-height:30px;
  background:url(<?php echo $skin_path;?>/line.gif) right center no-repeat;
}

#i_news ul li .date {
  float:right;
  color:#ccc;
}

#i_pic {
  float:left;
  width:230px;
  height:230px;
  margin:100px 0px 0px;
}

#i_pic a img {
  float:left;
  width:70px;
  height:70px;
  border:3px solid white;
}

#i_pic a:hover img {
  border:3px solid #FF9900;
}
#about {
  clear:both;
  float:left;
  width:170px;
  height:130px;
  margin:30px 50px 20px 0px;
  padding-left:120px;
  background:url(<?php echo $skin_path;?>/about_bg.jpg) left bottom no-repeat;
}

#about p {
  width:170px;
  height:110px;
  overflow:hidden;
}

.logo {background:url(<?php echo get('site_logo');?>) center center no-repeat; margin:0px 10px 0px 0px;}

</style>
<script type="text/javascript" src="<?php echo $skin_path;?>/png.js"></script>
<!--背景透明-->
<script>
  DD_belatedPNG.fix('#logo');
</script>
</head>
<body>

<div id="i_bg">
<div id="main">
<!-- logo -->

<a title="<?php echo get(sitename);?>" href="<?php echo $base_url;?>/" class="logo"></a>

<div id="top">
<a title="<?php echo lang(sitewap);?>" href="<?php echo $base_url;?>/wap/"><?php echo lang(sitewap);?></a>  -  <a href="<?php echo url('archive/orders');?>"><?php echo lang(shoppingcart);?></a>  -  
<a title="<?php echo lang(feedback);?>" href="<?php echo url('guestbook');?>" target="_blank"><?php echo lang(feedback);?></a>  -  
<?php if(get('lang_type')=='cn') { ?><a id="StranLink" title="繁简转换">繁体</a>  -  <?php } ?>
<?php echo login_js();?>
</div>
<div class="clear"></div>
<div id="i_news">
<h5>Top News</h5>
<ul>
<?php foreach(archive(2,0,0,'0,0,0',16,'aid',4,false,0) as $i => $archive) { ?> 
<li><span class="date"><?php echo $archive['adddate'];?></span><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
</div>
<style type="text/css">.p3 {clear:both;}</style>
<div id="i_pic">
<?php foreach(archive(3,0,0,'0,0,0',20,'aid',5,true,0) as $i => $archive) { ?>
<a href="<?php echo $archive['url'];?>"><img src="<?php echo $archive['thumb'];?>" class="p$i" alt="<?php echo $archive['stitle'];?>" /></a>
<?php } ?>

</div>


<div id="nav">
<ul id="navmenu"> 
<li><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/" class="one"><?php echo lang(homepage);?></a></li>

<?php foreach(categories_nav() as $t) { ?>
<li><a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>" class="one"><?php echo $t['catname'];?></a>
<ul> <?php foreach(categories($t['catid']) as $t1) { ?>
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

<div id="about">
<p><?php echo templatetag::tag('公司简介');?></p>
</div>

<div id="contact">
<div style="background:url(<?php echo $skin_path;?>/address.gif) 5px center no-repeat;" />
<?php echo get('address');?>
</div>

<div style="background:url(<?php echo $skin_path;?>/mail.gif) 5px center no-repeat;" />
<?php echo get('email');?>
</div>

<div style="background:url(<?php echo $skin_path;?>/tel.gif) 5px center no-repeat;" />
<?php echo get('tel');?>
</div>
</div>

<div class="slide">
<?php echo template('system/slide.html'); ?>
</div>

</div>
</div>
<?php echo template('footer.html'); ?>
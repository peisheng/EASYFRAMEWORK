<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="CmsEasy 5_0_0_20120626_UTF8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php if(!empty($archive['mtitle'])) { ?><?php echo $archive['mtitle'];?>-<?php } elseif (!empty($archive['title'])) { ?><?php echo $archive['title'];?>-<?php } else { ?><?php if($type['meta_title']) { ?>    <?php echo $type['meta_title'];?>-<?php } elseif (typename($type['typeid'])) { ?><?php echo typename($type['typeid']);?>-<?php } ?><?php if($category[$catid][meta_title]) { ?><?php echo $category[$catid]['meta_title'];?>-<?php } elseif (!empty($catid)) { ?><?php echo catname($catid);?>-<?php } ?><?php } ?><?php echo get('fullname');?> - Powered by CmsEasy</title>
<meta name="keywords" content="<?php if($archive['keyword']) { ?><?php echo $archive['keyword'];?><?php } else { ?><?php if($type['keyword']) { ?><?php echo $type['keyword'];?><?php } elseif ($category[$catid][keyword]) { ?><?php echo $category[$catid]['keyword'];?><?php } else { ?><?php echo get('site_keyword');?><?php } ?><?php } ?>" />
<meta name="description" content="<?php if($archive['description']) { ?><?php echo $archive['description'];?><?php } else { ?><?php if($type['description']) { ?><?php echo $type['description'];?><?php } elseif ($category[$catid][description]) { ?><?php echo $category[$catid]['description'];?><?php } else { ?><?php echo get('site_description');?><?php } ?><?php } ?>" />
<meta name="author" content="CmsEasy Team" />
<link rel="icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />
<link href="<?php echo $skin_path;?>/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $skin_path;?>/style.css" rel="stylesheet" type="text/css" />
<!--用于PNG图片在IE6下透明-->
<!--[if IE 6]>
<script src="<?php echo $base_url;?>/js/png.js"></script>
<script>
  DD_belatedPNG.fix('.logo');
  DD_belatedPNG.fix('.cleft_box .cright');
  DD_belatedPNG.fix('.cleft_box_content .cfooter');
  DD_belatedPNG.fix('.cleft_box_content .cheader');
</script>
<![endif]--> 
<script type="text/javascript">
sfHover = function() {
var sfEls = document.getElementById("nav").getElementsByTagName("LI");
for (var i=0; i<sfEls.length; i++) {
sfEls[i].onmouseover=function() {
    this.className+=" sfhover";
}
sfEls[i].onmouseout=function() {
    this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
}
}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
</script>
</head>
<body>
<div class="header box">
<div class="logo"><a href="<?php echo $site_url;?>"><img src="<?php echo $base_url;?>/<?php echo get('site_logo');?>" alt="<?php echo $sitename;?>" width="<?php echo get('logo_width');?>"></a></div>
<div class="topnav">
<a title="<?php echo lang(sitewap);?>" href="<?php echo $base_url;?>/wap/"><?php echo lang(sitewap);?></a>  -  <a href="<?php echo url('archive/orders');?>"><?php echo lang(shoppingcart);?></a>  -  
<a title="<?php echo lang(feedback);?>" href="<?php echo url('guestbook');?>" target="_blank"><?php echo lang(feedback);?></a>  -  
<?php if(get('lang_type')=='cn') { ?><a id="StranLink" title="繁简转换">繁体</a>  -  <?php } ?>
<?php echo login_js();?>
</div>
<div class="blank10"></div>
<div class="topmenu">
<!-- 网站导航 -->
<div class="topmenu">
<div>
<ul id="navmenu"> 
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
</div>
<!-- 导航结束 -->
</div>
</div>
<div class="blank10"></div>
<div class="banner_1 box" style="width:970px;overflow:hidden;">
<?php echo template('system/slide.html'); ?>
</div>
<div class="blank10"></div>
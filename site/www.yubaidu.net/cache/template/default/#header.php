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
<!-- 调用样式表 -->
<link rel="stylesheet" href="<?php echo $skin_path;?>/base.css" type="text/css" media="all"  />
<link rel="stylesheet" href="<?php echo $skin_path;?>/reset.css" type="text/css" media="all"  />
<link rel="stylesheet" href="<?php echo $skin_path;?>/style.css" type="text/css" media="all"  />
<script type="text/javascript" src="<?php echo $skin_path;?>/js/jquery-1.3.2.min.js"></script>
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
<!--用于PNG图片在IE6下透明-->
<!--[if IE 6]>
<script src="<?php echo $skin_path;?>/js/png.js"></script>
<script>
  DD_belatedPNG.fix('.logo');
  DD_belatedPNG.fix('.nav');

  DD_belatedPNG.fix('.r_bg');
  DD_belatedPNG.fix('.cfooter');
  DD_belatedPNG.fix('.cleft_box .cright');
  DD_belatedPNG.fix('.cleft_box_content .cfooter');
  DD_belatedPNG.fix('.cleft_box_content .cheader');
</script>
<![endif]--> 
<style type="text/css">
.logo {width:<?php echo get('logo_width');?>px; height:<?php echo get('logo_height');?>px; background:url(<?php echo $base_url;?>/<?php echo get('site_logo');?>) center center no-repeat;}
</style>
<script language="javascript" type="text/javascript">
function killerrors()
{
return true;
}
window.onerror = killerrors;
</script>
</head>
 <body>


<div class="header">

<span class="subnav">
<!-- 页头导航 -->
<a title="RSS" href="<?php echo $base_url;?>/index.php?case=archive&act=rss&catid=<?php echo $catid;?>" target="_blank">RSS</a> - <a title="<?php echo lang(sitewap);?>" href="<?php echo $base_url;?>/wap/"><?php echo lang(sitewap);?></a>  -  <a href="<?php echo url('archive/orders');?>"><?php echo lang(shoppingcart);?></a>  -  
<a title="<?php echo lang(feedback);?>" href="<?php echo url('guestbook');?>" target="_blank"><?php echo lang(feedback);?></a>

<!-- 搜索框 -->
<div class="search">
<form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
<input type="text" name="keyword" value="<?php echo lang(pleaceinputtext);?>" onfocus="if(this.value=='<?php echo lang(pleaceinputtext);?>') {this.value=''}" onblur="if(this.value=='') this.value='<?php echo lang(pleaceinputtext);?>'" class="s_text" />
<input name='submit' type="submit" value="" align="middle" class="s_btn" />
</form>
</div>
</span>

<div class="logo"><a title="<?php echo get(sitename);?>" href="<?php echo $base_url;?>/"></a></div>

</div>

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

<div class="clear box">

<!-- 公告开始 -->
<div id="announ">
<?php foreach(announ(5) as $an) { ?>
<p><a href="<?php echo $an['url'];?>" title="<?php echo $an['title'];?>"><?php echo $an['title'];?></a> [<?php echo $an['adddate'];?>]</p>
<?php } ?>
</div>
<!-- 公告结束 -->

<!-- 多站切换开始 -->
<div class="website">
<a href="index.php?case=archive&act=show&aid=4" target="_blank">Sitemap</a> | <?php $t=position_p($catid=5);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>" target="_blank">Contact</a><?php?>

<!-- 多站切换开始 -->
<select name="website" onchange="javascript:window.open(this.options[this.selectedIndex].value)">
<option value="default"><?php echo lang('websitego');?></option>
<?php foreach(getwebsite() as $d) { ?>
<option value="<?php echo $d['url'];?>"><?php echo $d['name'];?></option>
<?php } ?>
</select>
<!-- 多站切换结束 -->
</div>
</div>


<!-- 幻灯开始 -->
<div class="banner"><?php if($topid==0) { ?>
<?php echo template('system/slide.html'); ?>
<!-- 幻灯结束 --><?php } else { ?>
<!-- 其它页图片切换 -->
<?php echo template('system/cslide.html'); ?>
</div>
<?php } ?></div>
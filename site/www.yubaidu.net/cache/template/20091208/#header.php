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
<link rel="stylesheet" type="text/css" href="<?php echo $skin_url;?>/style.css" media="screen" title="shandesigns (screen)" />
<style type="text/css">
.logo {float:left;display:block;width:<?php echo get('logo_width');?>px; height:<?php echo get('logo_height');?>px; background:url(<?php echo $base_url;?>/<?php echo get('site_logo');?>) center center no-repeat;}
</style>
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
<!-- 整体布局开始 -->
<div id="wrapper">
<!-- 页头 -->
<div id="header">
<a title="<?php echo get(sitename);?>" href="<?php echo $base_url;?>/" class="logo"></a>
<div id="top">
<script>
function search_check() {
word=dojo.byId('keyword').value;
if(!word) {
alert('请输入查询信息！');
return false;
}
else return true;
}
</script>
<form name='search_form' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
<div id="search">
<input  id="keyword" name="keyword" type="text" class="key" />
<input type="submit" name='submit'  value="<?php echo lang(pleaceinputtext);?>" onfocus="if(this.value=='<?php echo lang(pleaceinputtext);?>') {this.value=''}" onblur="if(this.value=='') this.value='<?php echo lang(pleaceinputtext);?>'" class="searchbutton" />
</div>
</form>

</div>
<!-- 顶部导航 -->

<div id="nav">
<a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/" class="one<?php if($topid==0) { ?> on<?php } ?>"><?php echo lang(homepage);?></a>
<?php foreach(categories_nav() as $t) { ?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['catname'];?>" class="one<?php if(isset($topid) && $topid==$t['catid']) { ?> on<?php } ?>"><?php echo $t['catname'];?></a>
<?php } ?>
</div>
<div class="clear"></div><div id="banner"></div>
<!-- 辅助导航 -->
<div id="subnav">
<ul><?php echo substr($an['title'],0,10);?>
<?php foreach(announ(3) as $an) { ?>
<li>○ <a href="#" onclick="window.open('<?php echo $an['url'];?>','Sample','height=520,width=524,scrollbars=yes')"><?php echo $an['title'];?></a></li>
<?php } ?>
</ul>
</div>

</div>
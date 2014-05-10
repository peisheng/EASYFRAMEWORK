<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="CmsEasy 5_0_0_20120626_UTF8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php if(isset($archive['keyword'])) { ?><?php echo $archive['keyword'];?>,<?php } ?><?php if(isset($typeid)) { ?><?php echo $type[$typeid]['keyword'];?>,<?php } ?><?php echo get('site_keyword');?>" />
<meta name="description" content="<?php if(isset($archive['description'])) { ?><?php echo $archive['description'];?>,<?php } ?><?php if(isset($typeid)) { ?><?php echo $type[$typeid]['description'];?>,<?php } ?><?php echo get('site_description');?>" />
<meta name="author" content="pown.net[九州易通科技有限公司] & 625569327[qq] & cmseasy@163.com[e-mail]" />
<title><?php if(!empty($archive['mtitle'])) { ?><?php echo $archive['mtitle'];?>-<?php } elseif (!empty($archive['title'])) { ?><?php echo $archive['title'];?>-<?php } else { ?><?php if($type['meta_title']) { ?>    <?php echo $type['meta_title'];?>-<?php } elseif (typename($type['typeid'])) { ?><?php echo typename($type['typeid']);?>-<?php } ?><?php if($category[$catid][meta_title]) { ?><?php echo $category[$catid]['meta_title'];?>-<?php } elseif (!empty($catid)) { ?><?php echo catname($catid);?>-<?php } ?><?php } ?><?php echo get('fullname');?> - Powered by CmsEasy</title>
<link rel="icon" href="<?php echo get('site_url');?>favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo get('site_url');?>favicon.ico" type="image/x-icon" />
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
     alert("请输入查询信息！");
     document.search.keyword.focus();
     return false;
    }

}
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
</head>

<body>
<div id="main">
  <div id="header">
  	
    <div class="top">
    	<div class="topwd">
      	<div class="pic"><img src="<?php echo $skin_path;?>/jt_3.gif" /></div>
   	    <a title="留言" href="<?php echo url('guestbook');?>" target="_blank">访客留言</a>
</div>
    	<div class="topwd"><div class="pic"><img src="<?php echo $skin_path;?>/jt_4.gif" /></div>
   	    <a href="<?php echo $site_url;?>" onclick="window.external.addFavorite(this.href,this.title);return false;" title='公司名称' rel="sidebar">加入收藏</a></div>
    	<div class="topwd"><div class="pic"><img src="<?php echo $skin_path;?>/jt_5.gif" /></div>
   	    <a href="<?php echo get('site_url');?>">返回首页</a></div>

<form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
        <div class="serach"><div class="inputys"><input id="inputsearch" name="keyword" type="text" size="26"  class="input" />
        </div><input  name='submit' type="image" src="<?php echo $skin_path;?>/hb_7.gif" /></div>
</form>
</div>    
<div class="logo"><a href="<?php echo $base_url;?>/" title="<?php echo get(sitename);?>"><img src="<?php echo $base_url;?>/<?php echo get(site_logo);?>" width="<?php echo get(logo_width);?>" alt="<?php echo get(sitename);?>" /></a></div>
    <div class="nav">
    <div class="nav_l"><img src="<?php echo $skin_path;?>/hb_2.gif" /></div>
<div class="nav_c">
        <ul class="nav_ul">
        <li><a title="<?php echo lang(homepage);?>" href="<?php echo $base_url;?>/"><span><?php echo lang(homepage);?></span></a></li>
<?php foreach(categories_nav() as $t) { ?>
<li><img src="<?php echo $skin_path;?>/hb_4.gif" /></li>
        <li><a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>"<?php if(isset($topid) && $topid==$t['catid']) { ?> <?php } ?>><span><?php echo $t['catname'];?></span></a></li>
        <?php } ?> 
        
        </ul>
</div>
    </div>
    <div class="banner">
<?php echo template('system/slide.html'); ?>
</div>
    <div class="banner_yy"></div>

<!--head部结束-->
<div class="blank10"></div>
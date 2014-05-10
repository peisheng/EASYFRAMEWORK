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
<style type="text/css">
.logo {width:<?php echo get('logo_width');?>px; height:<?php echo get('logo_height');?>px; background:url(<?php echo $base_url;?>/<?php echo get('site_logo');?>) center center no-repeat;}
</style>
</head>
 <body>
 
 <div id="main">
  <div id="header">
  	<div class="top">
    	<div class="top_left"><div class="logo"><a title="<?php echo get(sitename);?>" href="<?php echo $base_url;?>/"></a></div></div>
        <div class="top_right">
        	<div class="top_nav">
            	<div class="top_nav_left"><img src="<?php echo $skin_path;?>/xx_3.gif" /></div>
                <div class="top_nav_right">
                	<div class="nav_ioc"><img src="<?php echo $skin_path;?>/xx_4.gif" /></div>
                    <div class="nav_wd"><a href="javascript:setHomepage('<?php echo $base_url;?>/');">设为首页</a></div>
                  <div class="nav_ioc"><img src="<?php echo $skin_path;?>/xx_5.gif" /></div>
                    <div class="nav_wd"><a href="<?php echo $site_url;?>" onclick="window.external.addFavorite(this.href,this.title);return false;" title='<?php echo get(sitename);?>' rel="sidebar"><?php echo lang(favorite);?></a></div>
                  <div class="nav_ioc"><img src="<?php echo $skin_path;?>/xx_6.gif" /></div>
                    <div class="nav_wd"><a href="<?php echo url('guestbook');?>"><?php echo lang(feedback);?></a></div>
              </div>
            </div>
            <div class="search">
            	<div class="search_left"><img src="<?php echo $skin_path;?>/xx_8.gif" /></div>
                <div class="search_right">
                	<div class="search1"><img src="<?php echo $skin_path;?>/xx_10.gif" /></div>
                    <div class="search2"><?php echo lang(search);?></div>                    
                    <form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
                    <div class="search3"><input type="text" size="26" name="keyword" /></div>
                    <div class="search4"><input type="image" src="<?php echo $skin_path;?>/xx_9.gif" name="submit" /></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="nav">
        <div class="nav_l"><img src="<?php echo $skin_path;?>/xx_12.gif" /></div>
        <div class="nav_c">
            <ul class="nav_ul">
            <li><a href="<?php echo $base_url;?>/"><?php echo lang(homepage);?></a></li>            
            <?php foreach(categories_nav() as $t) { ?>
            <li><img src="<?php echo $skin_path;?>/xx_14.gif" /></li>
            <li><a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>"><?php echo $t['catname'];?></a></li>
            <?php } ?>
            </ul>
        </div>
    </div>
    <div class="nav_yy">
    	<div class="nav_yy_left"><img src="<?php echo $skin_path;?>/xx_16.gif" /></div>
        <div class="nav_yy_right">
        	<div class="gonggao">
            	<div class="gongao_ioc"><img src="<?php echo $skin_path;?>/xx_17.gif" /></div>
                <div class="gongao_wd"><strong><?php echo lang(siteannoun);?>：</strong><?php foreach(announ(1) as $an) { ?><a href="<?php echo $an['url'];?>" style="text-decoration:none; color:#000"><?php echo $an['title'];?></a><?php } ?></div>
            </div>
            <div class="rexian">
            	<div class="rexian_ioc"><img src="<?php echo $skin_path;?>/xx_18.gif" /></div>
                <div class="rexian_wd">报名咨询热线：<span class="hongwd"><strong><?php echo get(tel);?></strong></span></div>
            </div>
        </div>
    </div>
    
    <div class="banner">
    	<div class="banner_left">
        
       <?php echo template('system/slide.html'); ?>

        </div>
        <div class="banner_right">
        	<div class="p" style="overflow:auto;height:150px;">    <span class="huangwd"><strong><?php echo get(sitename);?></strong></span><?php echo templatetag::tag('公司简介');?></div>
<div class="blank10"></div>
            <div class="kuaijie">
            	<div class="kj_wd"><?php $t=position_p($catid=1);?><a href="<?php echo $t['url'];?>"><?php echo $t['name'];?></a></div>
                <div class="kj_wd"><?php $t=position_p($catid=2);?><a href="<?php echo $t['url'];?>"><?php echo $t['name'];?></a></div>
                <div class="kj_wd"><?php $t=position_p($catid=3);?><a href="<?php echo $t['url'];?>"><?php echo $t['name'];?></a></div>
                <div class="kj_wd"><?php $t=position_p($catid=4);?><a href="<?php echo $t['url'];?>"><?php echo $t['name'];?></a></div>
            </div>
      </div>
        <div class="clear"></div>
    </div>

  </div>
<!--head部结束-->
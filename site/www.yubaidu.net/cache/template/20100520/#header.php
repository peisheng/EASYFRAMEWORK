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
// --> 
</script>
<style type="text/css">
.logo {width:<?php echo get('logo_width');?>px; height:<?php echo get('logo_height');?>px; background:url(<?php echo $base_url;?>/<?php echo get('site_logo');?>) center center no-repeat;}
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
<div id="main">
  <div id="header">
  	<div class="logo"><a title="<?php echo get(sitename);?>" href="<?php echo $base_url;?>/"></a></div>
    <div class="top">
        <div class="top_box">

            <div class="top_wd"><span style="padding-right:8px;"><a href="<?php echo $site_url;?>" onclick="window.external.addFavorite(this.href,this.title);return false;" title='<?php echo get(sitename);?>' rel="sidebar">加入收藏</a></span></div> 
<div class="top_wd"><span style="padding-right:8px;"><a title="留言" href="<?php echo url('guestbook');?>" target="_blank">访客留言</a></span></div> 
<div class="top_wd"><span style="padding-right:8px;"><a id="StranLink" title="繁简转换">繁体</a></span></div> 
<div class="top_wd"><span style="padding-right:8px;"><a href="<?php echo $base_url;?>/index.php?case=user&act=login">会员中心</a></span></div> 
        </div>
    </div>
    <div class="nav">
    <div class="nav_l"><img src="<?php echo $skin_path;?>/tyn_6.gif" /></div>
    <div class="nav_c">
    	<ul class="nav_ul">

 <li><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/" class="on"><?php echo lang(homepage);?></a></li>
<?php foreach(categories_nav() as $t) { ?>
 <li><img src="<?php echo $skin_path;?>/tyn_7.gif" /></li>
        <li><a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>"<?php if(isset($topid) && $topid==$t['catid']) { ?> class="on"<?php } ?>><?php echo $t['catname'];?></a></li>
<?php } ?>
        </ul>
    </div>
    </div>
    <div class="banner">
    	<div class="banner_bg"></div>
        <div class="search_box">
            <div class="search_box_l">
                <div class="serach_wd">产品搜索</div>
<form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
<div class="serach_input"><input name="keyword" type="text" align="absmiple" size="38" /></div>
<div class="serach_bt"><input type="image" src="<?php echo $skin_path;?>/tyn_9.gif" align="absmiple" name='submit' value=" " /></div>
</form>
            </div>
            <div class="search_box_c"><img src="<?php echo $skin_path;?>/tyn_20.gif" /></div>
            <div class="search_box_r">全国招商热线：<span class="chengwd"><?php echo get(tel);?></span>  企业邮箱：<span class="chengwd"><?php echo get(email);?></span> </div>
        </div>
    </div>
  </div>
<div class="blank5"></div>
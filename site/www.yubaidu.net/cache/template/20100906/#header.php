<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="CmsEasy 5_0_0_20120626_UTF8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(!empty($archive['mtitle'])) { ?><?php echo $archive['mtitle'];?>-<?php } elseif (!empty($archive['title'])) { ?><?php echo $archive['title'];?>-<?php } else { ?><?php if($type['meta_title']) { ?>    <?php echo $type['meta_title'];?>-<?php } elseif (typename($type['typeid'])) { ?><?php echo typename($type['typeid']);?>-<?php } ?><?php if($category[$catid][meta_title]) { ?><?php echo $category[$catid]['meta_title'];?>-<?php } elseif (!empty($catid)) { ?><?php echo catname($catid);?>-<?php } ?><?php } ?><?php echo get('fullname');?> - Powered by CmsEasy</title>
<meta name="keywords" content="<?php if($archive['keyword']) { ?><?php echo $archive['keyword'];?><?php } else { ?><?php if($type['keyword']) { ?><?php echo $type['keyword'];?><?php } elseif ($category[$catid][keyword]) { ?><?php echo $category[$catid]['keyword'];?><?php } else { ?><?php echo get('site_keyword');?><?php } ?><?php } ?>" />
<meta name="description" content="<?php if($archive['description']) { ?><?php echo $archive['description'];?><?php } else { ?><?php if($type['description']) { ?><?php echo $type['description'];?><?php } elseif ($category[$catid][description]) { ?><?php echo $category[$catid]['description'];?><?php } else { ?><?php echo get('site_description');?><?php } ?><?php } ?>" />
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
</head>

<body>
<div class="blank10"></div>
<div id="main">
  <div id="header">
  	<div class="top">
    	<div class="logo"><a href="<?php echo $base_url;?>/" title="<?php echo get(sitename);?>"><img src="<?php echo $base_url;?>/<?php echo get(site_logo);?>" width="<?php echo get(logo_width);?>" alt="<?php echo get(sitename);?>" /></a></div>
        <div class="top_right">
        	<div class="top_links"><div class="top_links_wd"><a href="<?php echo $base_url;?>/"><?php echo lang(backhome);?></a></div>  <div class="top_links_wd"><a href="#" style="CURSOR: hand" onClick="window.external.addFavorite('<?php echo $base_url;?>/','<?php echo get('fullname');?>')" title="<?php echo get('fullname');?>">加入收藏</a></div>  <div class="top_links_wd"><?php $t=position_p($typeid=5);?><a href="<?php echo $t['url'];?>"><?php echo lang(contactus);?></a></div>	
<div class="top_links_wd"><a title="留言" href="<?php echo url('guestbook');?>" target="_blank"><?php echo lang(feedback);?></a></div>
        	</div>
            <div class="rexian"><div class="rexian_l"><img src="<?php echo $skin_path;?>/lvsb_12.gif" /></div><div class="rexian_w"><?php echo lang(servertel);?>：<?php echo get(tel);?></div></div>
        </div>
    </div>
  	
    <div class="nav">
    <div class="nav_c">
    	<ul class="nav_ul">
         <li><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/"<?php if($catid==0) { ?> class="on"<?php } ?>><?php echo lang(homepage);?></a></li>
        <?php foreach(categories_nav() as $t) { ?>
        <li><a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>"<?php if(isset($topid) && $topid==$t['catid']) { ?> class="on"<?php } ?>><?php echo $t['catname'];?></a>
        <?php } ?>
        </ul>
    </div>
    </div>
    
    <div class="banner">
<?php echo template('system/slide.html'); ?>
</div>
    
  </div>
<!--head部结束-->
<?php echo template('tag/tag_ifocus.html'); ?>  
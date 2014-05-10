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
</head>

<body>
<div id="main">
  <div id="header">
  	<div class="top">
    	<div class="top_left"><a href="<?php echo $site_url;?>"><img src="<?php echo $base_url;?>/<?php echo get('site_logo');?>" alt="<?php echo $sitename;?>" width="<?php echo get('logo_width');?>"></a></div>
        <div class="top_right">
        	<div class="search"><span style="float:right;">  <a id="StranLink" title="繁简转换"> 繁体 -	 </a>
<a title="<?php echo lang(feedback);?>" href="<?php echo url('guestbook');?>" target="_blank"> <?php echo lang(feedback);?> -	</a>
<a href="<?php echo $site_url;?>" onclick="window.external.addFavorite(this.href,this.title);return false;" title='<?php echo get(sitename);?>' rel="sidebar"> <?php echo lang(favorite);?></a></span>
<form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
<div class="serch_3"><input  type="image" src="<?php echo $skin_path;?>/anli_4.gif" id="search_btn" align="absmiple" name='submit' value=" <?php echo lang(search);?> " /></div>
 <div class="serch_2"><input  id="search_text" name="keyword" type="text" align="absmiple" /></div>
</form>
            </div>
            
            <div class="nav">
                <div class="nav_c">
                    <ul class="nav_ul">
                    <li><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/"<?php if($catid==0) { ?> class="m"<?php } ?>><?php echo lang(homepage);?></a></li>
<?php foreach(categories_nav() as $t) { ?>
<li><a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>"<?php if(isset($topid) && $topid==$t['catid']) { ?> class="m"<?php } ?>><?php echo $t['catname'];?></a></li>
<?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
    <!-- 幻灯 -->
    <div class="banner">
<?php echo template('system/slide.html'); ?>
</div>
  </div>
<!--head部结束-->
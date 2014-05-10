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
    function selectTag(showContent,selfObj){
// 操作标签
var tag = document.getElementById("tags").getElementsByTagName("li");
var taglength = tag.length;
for(i=0; i<taglength; i++){
tag[i].className = "";
}
selfObj.parentNode.className = "selectTag";
// 操作内容
for(i=0; j=document.getElementById("tagContent"+i); i++){
j.style.display = "none";
}
document.getElementById(showContent).style.display = "block";


}


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
    	<div class="topwd">
   	    <a title="<?php echo lang(feedback);?>" href="<?php echo url('guestbook');?>" target="_blank"><?php echo lang(feedback);?></a></div>
    	<div class="topwd">
   	    <a href="<?php echo $site_url;?>" onclick="window.external.addFavorite(this.href,this.title);return false;" title='<?php echo get(sitename);?>' rel="sidebar"><?php echo lang(favorite);?></a></div>
</div>    

  	<div class="logo"><a href="<?php echo $base_url;?>/"><img src="<?php echo $base_url;?>/<?php echo get('site_logo');?>" alt="<?php echo $sitename;?>" width="<?php echo get('logo_width');?>"></a></div>
    
    <div class="nav">
    <div class="nav_l"><img src="<?php echo $skin_path;?>/fdc_2.gif" /></div>
<div class="nav_c">
        <ul class="nav_ul">
<li><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/" <?php if($catid==0) { ?>class="on"><?php } ?><span><?php echo lang(homepage);?></span></a></li>
<?php foreach(categories_nav() as $t) { ?>
<li><a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>"<?php if(isset($topid) && $topid==$t['catid']) { ?> class="on"<?php } ?>><span><?php echo $t['catname'];?></span></a></li>
<?php } ?>
   
        </ul>
</div>
    </div>
    <div class="banner"><img src="<?php echo $skin_path;?>/fdc_1.jpg" / ></div>

    <div class="banner_yy"></div>

<!--head部结束-->

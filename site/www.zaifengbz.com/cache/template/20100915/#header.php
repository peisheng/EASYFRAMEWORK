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
<script type=text/javascript><!--//--><![CDATA[//><!--
function menuFix() {
 var sfEls = document.getElementById("nav").getElementsByTagName("li");
 for (var i=0; i<sfEls.length; i++) {
  sfEls[i].onmouseover=function() {
  this.className+=(this.className.length>0? " ": "") + "sfhover";
  }
  sfEls[i].onMouseDown=function() {
  this.className+=(this.className.length>0? " ": "") + "sfhover";
  }
  sfEls[i].onMouseUp=function() {
  this.className+=(this.className.length>0? " ": "") + "sfhover";
  }
  sfEls[i].onmouseout=function() {
  this.className=this.className.replace(new RegExp("( ?|^)sfhover\\b"), 
"");
  }
 }
}
window.onload=menuFix;
//--><!]]></script>
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
    	<div class="logo"><a href="<?php echo $base_url;?>/" title="<?php echo get(sitename);?>"><img src="<?php echo $base_url;?>/<?php echo get(site_logo);?>" width="<?php echo get(logo_width);?>" alt="<?php echo get(sitename);?>" /></a></div>
        <div class="nav">
      <div class="nav_c">
            <div id="nav" class="nav_ul">
<ul>
<li><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/" <?php if($catid==0) { ?> class="on"<?php } ?>><?php echo lang(homepage);?></a></li>
<?php foreach(categories() as $t) { ?>
<li><a title="<?php echo $t['catname'];?>" target="_blank" href="<?php echo $t['url'];?>"<?php if(isset($topid) && $topid==$t['catid']) { ?> class="on"<?php } ?>><?php echo $t['catname'];?></a>
   <ul>
   <?php foreach(categories($t['catid']) as $t1) { ?>
<li><a title="<?php echo $t1['catname'];?>" target="_blank" href="<?php echo $t1['url'];?>"><?php echo $t1['catname'];?></a></li>
<?php } ?>
   </ul>
</li>
<?php } ?>
          </ul>
        </div>
        </div>
        </div>
    </div>
  </div>
  
<!--head部结束-->

<div id="bd">
    	<div id="bd_left">
        	<div class="box1">
            	<div class="title">
                	<div class="title_wd"><?php $t=position_p($catid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
</div>
                    <div class="title1_en" style="color:white;">About us</div>
                    <div class="title_ico"><img src="<?php echo $skin_path;?>/hs_12g.gif" /></div>
                   <?php?>
                </div>
                <div class="content" style="width:352px;">
                	<div class="p" style="height:158px;overflow:auto;"><?php echo templatetag::tag('公司简介');?></div>
                </div>
            </div>
            
          <div class="box2">
           	 <div class="search1"><?php echo lang(products);?><br />
       	      <?php echo lang(search);?></div>
            <div class="search2">
                	<div class="inupt1"></div><form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
                    <div class="inupt2"><input type="text" style="height:28px;" size="23" name="keyword" />
                    </div>
            </div>
                <div class="search3"><input  name='submit' type="image" src="<?php echo $skin_path;?>/hs_6.gif" /></div></form>
          </div>
  </div>
  <div id="bd_right">
      	<div class="box" style="width:620px;overflow:hidden;">
<?php echo template('system/slide.html'); ?>
</div>
</div>
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
     alert("请输入查询信息！");
     document.search.keyword.focus();
     return false;
    }

}
// --> 
</script>
<script language=javascript type=text/javascript>
//<!CDATA[
function g(o){return document.getElementById(o);}
//参数说明:n为标签编号,m为标签数量,q为标签名称的前缀，如id=tb_1中的"tb_",p为内容层的前缀,如id=tbc_01的"tbc_0"
function HoverLi(n,m,q,p){
//m为标签数量 m=6
//q为前缀  q=tb_
//如果有N个标签,就将i<=N;
//兼容IE7,FF,IE6

for(var i=1;i<=m;i++)
{
g(q +i).className='normaltab';
g(p+i).className='undis';
}
g(p+n).className='dis';
g(q+n).className='hovertab';
}
//如果要做成点击后再转到请将<li>中的onmouseover 改成 onclick;
//]]>
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
//--><!]]>
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
   	    <div class="topwd"><div class="pic"><img src="<?php echo $skin_path;?>/jt_3.gif" /></div>
   	    <a title="<?php echo lang(feedback);?>" href="<?php echo url('guestbook');?>" target="_blank"><?php echo lang(feedback);?></a></div>
    	<div class="topwd"><div class="pic"><img src="<?php echo $skin_path;?>/jt_4.gif" /></div>
   	    <a href="<?php echo $site_url;?>" onclick="window.external.addFavorite(this.href,this.title);return false;" title='<?php echo get(sitename);?>' rel="sidebar"><?php echo lang(favorite);?></a></div>
<div class="topwd"><div class="pic"><img src="<?php echo $skin_path;?>/jt_4.gif" /></div>
   	    <a href="<?php echo url('user');?>" title="<?php echo lang(login);?>"><?php echo lang(login);?></a></div>
    	<div class="topwd"><div class="pic"><img src="<?php echo $skin_path;?>/jt_5.gif" /></div>
   	    <a href="<?php echo $base_url;?>/"><?php echo lang(homepage);?></a></div>
    </div>
    <div class="nav">
    	<div class="nav_l"><img src="<?php echo $skin_path;?>/jt_6.gif" /></div>
   		<div class="header_nav">
    	<div id="nav">
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
    <div class="nav_yy"></div>
    <div class="banner"><img src="<?php echo $skin_path;?>/jt_1.jpg" /></div>
  </div>
<!--head部结束-->
<div class="blank5"></div>
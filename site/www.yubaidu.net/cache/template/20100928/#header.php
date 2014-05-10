<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="CmsEasy 5_0_0_20120626_UTF8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php if(!empty($archive['mtitle'])) { ?><?php echo $archive['mtitle'];?>-<?php } elseif (!empty($archive['title'])) { ?><?php echo $archive['title'];?>-<?php } else { ?><?php if($type['meta_title']) { ?>    <?php echo $type['meta_title'];?>-<?php } elseif (typename($type['typeid'])) { ?><?php echo typename($type['typeid']);?>-<?php } ?><?php if($category[$catid][meta_title]) { ?><?php echo $category[$catid]['meta_title'];?>-<?php } elseif (!empty($catid)) { ?><?php echo catname($catid);?>-<?php } ?><?php } ?><?php echo get('fullname');?> - Powered by CmsEasy</title>
<meta name="keywords" content="<?php if($archive['keyword']) { ?><?php echo $archive['keyword'];?><?php } else { ?><?php if($type['keyword']) { ?><?php echo $type['keyword'];?><?php } elseif ($category[$catid][keyword]) { ?><?php echo $category[$catid]['keyword'];?><?php } else { ?><?php echo get('site_keyword');?><?php } ?><?php } ?>" />
<meta name="description" content="<?php if($archive['description']) { ?><?php echo $archive['description'];?><?php } else { ?><?php if($type['description']) { ?><?php echo $type['description'];?><?php } elseif ($category[$catid][description]) { ?><?php echo $category[$catid]['description'];?><?php } else { ?><?php echo get('site_description');?><?php } ?><?php } ?>" />
 
<link rel="icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />
<link href="<?php echo $skin_path;?>/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $skin_path;?>/style.css" rel="stylesheet" type="text/css" />
<style >
#nav {padding-left:20px;}
#nav li {float: left;text-align:left;}
#nav a { color:white;text-decoration: none;}


#nav li.one {
  float:left;
  width:96px;
  height:44px;
  line-height:40px;
  text-align:center;
  font-size:14px;
  overflow:hidden;
}
#nav li.one a {
  display:block;
  width:96px;
  height:44px;
  
}

#nav li.on { 
  font-weight:bold;
}

#nav li.one:hover,#nav li.one a:hover {
  width:96px;
  color:#104578;
  font-weight:bold;
 
}
/*background:url(/template/20100928/skin/images/nav__bg_.png) no-repeat;*/
#nav li.one:hover a,#nav li.one ul li a:hover {color:white;background:none;}
#nav li ul {position: absolute;left: -999em;height: auto;width:180px; background-color:rgb(0,47,115);color:white;fone-weight:bold;  margin:34px 0px 0px -20px;_margin:34px 0px 0px -20px; padding:0px 0px 10px 0px;  z-index:99999; }
#nav li ul li {display: block; width:180px;height:50px;      line-height:50px;overflow:hidden;}
#nav li ul ul {margin: 0 0 0 180px;}
#nav li ul span,#nav li ul ul span {display:block; margin:0px 5px;  }
 
#nav li:hover ul ul, #nav li:hover ul ul ul, #nav li.sfhover ul ul, #nav li.sfhover ul ul ul {left: -999em;}
#nav li:hover ul, #nav li li:hover ul, #nav li li li:hover ul, #nav li.sfhover ul, #nav li li.sfhover ul, #nav li li li.sfhover ul {left: auto;}

#nav li.one ul li a,#nav li.one ul li a:link {width:158px; margin-left:40px;  font-weight:normal;font-size:12px;background:none;} 
#nav li.one ul li a:hover {color:white;}
</style>
 
<script src="/js/jquery-1.4.4.min.js" type="text/javascript"></script>
 
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


sfHover = function() {
var sfEls = document.getElementById("nav").getElementsByTagName("LI");
for (var i=0; i<sfEls.length; i++) {sfEls[i].onmouseover=function() { 
this.className+=" sfhover";}
sfEls[i].onmouseout=function() 
{    
this.className=this.className.replace(new RegExp(" sfhover\\b"), "");}}}if (window.attachEvent) window.attachEvent("onload", sfHover);
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
    	<div class="top_left"><a href="<?php echo $site_url;?>"><img src="<?php echo $base_url;?>/<?php echo get('site_logo');?>" alt="<?php echo $sitename;?>" width="<?php echo get('logo_width');?>" style="margin-top:-20px; height:80px;"></a></div>
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
                    <ul class="nav_ul" id="nav">
                    <li rel="<?php echo $t['catid'];?>" style="text-align:center;"><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/" ><?php echo lang(homepage);?></a></li>
<?php foreach(categories_nav() as $t) { ?>

<li rel="<?php echo $t['catid'];?>" class="one<?php if(isset($topid) && $topid==$t['catid']) { ?> on<?php } ?>"><a href="<?php echo $t['url'];?>" title="<?php echo $t['catname'];?>" target="<?php if(config::get('nav_blank')==1) { ?> _blank<?php } ?>"><?php echo $t['catname'];?></a>
<?php if(count(categories($t['catid']))) { ?><ul rel='coron'>
<?php foreach(categories($t['catid']) as $t1) { ?>
<li><a title="<?php echo $t1['catname'];?>" href="<?php echo $t1['url'];?>"><?php echo $t1['catname'];?></a>
<?php if(count(categories($t1['catid']))) { ?><ul  rel='coron'><?php foreach(categories($t1['catid']) as $t2) { ?><span></span>
<li><a title="<?php echo $t2['catname'];?>" href="<?php echo $t2['url'];?>"><?php echo $t2['catname'];?></a>
 
</li>
<?php } ?></ul><?php } ?>
</li> 
<?php } ?></ul><?php } ?>
</li>
<?php } ?>
<!-- 
<li class="one<?php if(isset($topid) && $topid==$t['catid']) { ?> on<?php } ?> m"><a href="<?php echo $t['url'];?>" title="<?php echo $t['catname'];?>" target="<?php if(config::get('nav_blank')==1) { ?> _blank<?php } ?>"><?php echo $t['catname'];?></a>
<?php if(count(categories($t['catid']))) { ?><ul rel='coron'>
<?php foreach(categories($t['catid']) as $t1) { ?>
<li><a title="<?php echo $t1['catname'];?>" href="<?php echo $t1['url'];?>"><?php echo $t1['catname'];?></a>
<?php if(count(categories($t1['catid']))) { ?><ul  rel='coron'><?php foreach(categories($t1['catid']) as $t2) { ?><span></span>
<li><a title="<?php echo $t2['catname'];?>" href="<?php echo $t2['url'];?>"><?php echo $t2['catname'];?></a>
<?php if(count(categories($t2['catid']))) { ?><ul  rel='coron'><?php foreach(categories($t2['catid']) as $t3) { ?><span></span>
<li><a title="<?php echo $t3['catname'];?>" href="<?php echo $t3['url'];?>"><?php echo $t3['catname'];?></a>
<?php if(count(categories($t3['catid']))) { ?><ul  rel='coron'><?php foreach(categories($t3['catid']) as $t4) { ?><span></span>
<li><a title="<?php echo $t4['catname'];?>" href="<?php echo $t4['url'];?>"><?php echo $t4['catname'];?></a>
<?php if(count(categories($t4['catid']))) { ?><ul  rel='coron'><?php foreach(categories($t4['catid']) as $t5) { ?><span></span>
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
</li>  -->
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
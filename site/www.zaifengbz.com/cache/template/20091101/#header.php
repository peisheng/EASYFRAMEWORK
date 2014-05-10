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

<table width="940" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="940" height="32" background="<?php echo $skin_path;?>/top_bg.jpg"><div id="topMenu">
<a title="<?php echo lang(sitewap);?>" href="<?php echo $base_url;?>/wap/" class="a1"><?php echo lang(sitewap);?></a>
<a href="<?php echo url('archive/orders');?>" class="a2"><?php echo lang(shoppingcart);?></a>
<a title="<?php echo lang(feedback);?>" href="<?php echo url('guestbook');?>" target="_blank" class="a3"><?php echo lang(feedback);?></a>
<?php if(get('lang_type')=='cn') { ?><a id="StranLink" title="繁简转换" class="a4">繁体</a>&nbsp;<?php } ?>
&nbsp;&nbsp;<?php echo login_js();?>
</div></td>
  </tr>
</table>
<table width="948" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4" valign="top" background="<?php echo $skin_path;?>/middle_bg1.jpg"><img src="<?php echo $skin_path;?>/left_bg.jpg" width="4" /></td>
    <td width="940" valign="top" style="background:url(<?php echo $skin_path;?>/top_bg2.jpg) repeat-x; background-color:#FFFFFF;">
    <table width="920" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="516" height="58"><a href="<?php echo $base_url;?>/"><img src="<?php echo $base_url;?>/<?php echo get('site_logo');?>" alt="<?php echo $sitename;?>" width="<?php echo get('logo_width');?>" style="margin-left:8px;" /></a></td>
    <td width="404" align="right" valign="top">
<form name='search_form' action="<?php echo url('archive/search');?>"  onsubmit="if(document.getElementById('keys').value=='<?php echo lang(search);?>' || document.getElementById('keys').value==''){alert('<?php echo lang(search);?>');return false;}" method="post">
      <input id="inputsearch" name="keyword" type="text" style="background:url(<?php echo $skin_path;?>/sear_bg.gif) no-repeat 3px 3px; background-color:#FFFFFF; padding-left:22px; width:138px; vertical-align:middle; margin-top:16px;" value="<?php echo lang(search);?>" onfocus="if(this.value=='<?php echo lang(search);?>'){this.value='';}" onblur="if(this.value==''){this.value='<?php echo lang(search);?>';}" />
      <input type="image" src="<?php echo $skin_path;?>/btn1.gif" name='submit' style="vertical-align:middle; border:0px none; margin-top:17px; padding:0px; margin-left:3px; margin-right:8px;" />
    </form></td>
  </tr>
</table>

<?php if($topid==0) { ?>
<?php } else { ?>
<div id="mainnav">

<ul id="navmenu"> 
<li class="one<?php if($topid==0) { ?> on<?php } ?>"><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/"><?php echo lang(homepage);?></a></li>
<?php foreach(categories_nav() as $t) { ?>
<span><img src="<?php echo $skin_path;?>/nav_line.gif" width="1" height="40" /></span>
<li class="one<?php if(isset($topid) && $topid==$t['catid']) { ?> on<?php } ?>"><a href="<?php echo $t['url'];?>" title="<?php echo $t['catname'];?>" target="<?php if(config::get('nav_blank')==1) { ?> _blank<?php } ?>"><?php echo $t['catname'];?></a>
<?php if(count(categories($t['catid']))) { ?><ul>
<?php foreach(categories($t['catid']) as $t1) { ?>
<li><a title="<?php echo $t1['catname'];?>" href="<?php echo $t1['url'];?>"><?php echo $t1['catname'];?></a>
<?php if(count(categories($t1['catid']))) { ?><ul><?php foreach(categories($t1['catid']) as $t2) { ?><span></span>
<li><a title="<?php echo $t2['catname'];?>" href="<?php echo $t2['url'];?>"><?php echo $t2['catname'];?></a>
<?php if(count(categories($t2['catid']))) { ?><ul><?php foreach(categories($t2['catid']) as $t3) { ?><span></span>
<li><a title="<?php echo $t3['catname'];?>" href="<?php echo $t3['url'];?>"><?php echo $t3['catname'];?></a>
<?php if(count(categories($t3['catid']))) { ?><ul><?php foreach(categories($t3['catid']) as $t4) { ?><span></span>
<li><a title="<?php echo $t4['catname'];?>" href="<?php echo $t4['url'];?>"><?php echo $t4['catname'];?></a>
<?php if(count(categories($t4['catid']))) { ?><ul><?php foreach(categories($t4['catid']) as $t5) { ?><span></span>
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
</li><?php } ?>
</ul>

</div>
<?php } ?>
    <table width="920" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="920">
<div style="width:920px;overflow:hidden;">
<?php echo template('system/slide.html'); ?>
</div>
</td>
        </tr>
      </table></td>
    <td width="4" valign="top" background="<?php echo $skin_path;?>/middle_bg2.jpg"><img src="<?php echo $skin_path;?>/right_bg.jpg" width="4" /></td>
  </tr>
</table>
<table width="948" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
     <td width="4" background="<?php echo $skin_path;?>/middle_bg1.jpg"></td>
    <td width="940" height="10" valign="top">
<td width="4" valign="top" background="<?php echo $skin_path;?>/middle_bg2.jpg"></td>
  </tr>
</table>


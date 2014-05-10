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
<link href="<?php echo $skin_path;?>/ime.css" rel="stylesheet" type="text/css" />

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
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:20px;">
  <tr>
    <td width="530"><a href="<?php echo $base_url;?>/" title="<?php echo get(sitename);?>"><img src="<?php echo $base_url;?>/<?php echo get(site_logo);?>" width="<?php echo get(logo_width);?>" alt="<?php echo get(sitename);?>" /></a></td>
    <td width="320" align="right" valign="bottom" style="padding-bottom:3px;">


<a title="<?php echo lang(sitewap);?>" href="<?php echo $base_url;?>/wap/"><img src="<?php echo $skin_path;?>/arr1.gif" width="4" height="4" border="0" align="absmiddle" /> &nbsp;<?php echo lang(sitewap);?></a>
<a href="<?php echo url('archive/orders');?>"><img src="<?php echo $skin_path;?>/arr1.gif" width="4" height="4" border="0" align="absmiddle" /> &nbsp;<?php echo lang(shoppingcart);?></a>
<a title="<?php echo lang(feedback);?>" href="<?php echo url('guestbook');?>" target="_blank"><img src="<?php echo $skin_path;?>/arr1.gif" width="4" height="4" border="0" align="absmiddle" /> &nbsp;<?php echo lang(feedback);?></a>
<?php if(get('lang_type')=='cn') { ?><a id="StranLink" title="繁简转换"><img src="<?php echo $skin_path;?>/arr1.gif" width="4" height="4" border="0" align="absmiddle" /> &nbsp;繁体</a>&nbsp;<img src="<?php echo $skin_path;?>/arr1.gif" width="4" height="4" border="0" align="absmiddle" /> &nbsp;<?php } ?>
<?php echo login_js();?>
</td>
  </tr>
</table>
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:10px;" id="menu">
  <tr>
    <td width="8"><img src="<?php echo $skin_path;?>/menu_left.png" width="8" height="35" /></td>
    <td width="829" background="<?php echo $skin_path;?>/menu.png"><table width="833" border="0" cellspacing="0" cellpadding="0">
      <tr>
<td width="86" height="35" align="center" valign="middle"><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/" <?php if($catid==0) { ?> class="menuA"<?php } ?>><?php echo lang(homepage);?></a></td>
<?php foreach(categories_nav() as $t) { ?>
<td width="86" height="35" align="center" valign="middle"><a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>"<?php if(isset($topid) && $topid==$t['catid']) { ?>  class="menuA"<?php } ?>><?php echo $t['catname'];?></a></td>
<?php } ?>

      </tr>
    </table></td>
    <td width="8"><img src="<?php echo $skin_path;?>/menu_right.png" width="8" height="35" /></td>
  </tr>
</table>
<div id="show">

  <?php echo template('system/slide.html'); ?>

</div>
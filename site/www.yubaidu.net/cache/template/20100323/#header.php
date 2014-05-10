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
  	<div id="header_logo"><img src="<?php echo $skin_path;?>/hy_2.gif" /></div>
    <div id="header_top">
<table width="310" border="0" cellpadding="0" cellspacing="0" class="chengwd12">
          <tr>
            <td align="center" valign="middle">在线咨询：</td>
            <td align="center" valign="middle"><a title="在线客服" href="tencent://message/?uin=<?php echo get(qq1);?>&Site=您的建站服务专家&Menu=yes"><img src="<?php echo $skin_path;?>/mb_2.gif" width="59" height="21" alt="<?php echo get(qq1);?>" /></a></td>
            <td align="center" valign="middle"><img src="<?php echo $skin_path;?>/mb_3.gif" width="24" height="21" /></td>
            <td align="center" valign="middle"><?php echo get(tel);?></td>
            <td width="25">&nbsp;</td>
          </tr>
        </table>
</div>
    <div class="header_yy"><img src="<?php echo $skin_path;?>/hy_3.gif" /></div>
    <div id="header_nav">
      <div class="header_navr">
       	<div class="navl">
          <ul class="nav_ul">
  <li class="navr">
  <form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
<input name="keyword" type="text" align="absmiple" class="input" /><input name="" type="image" src="<?php echo $skin_path;?>/hy_8.gif" class="but" />
</form>
</li>
<li<?php if($catid==0) { ?> class="m"<?php } ?>><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/"><?php echo lang(homepage);?></a></li>
<?php foreach(categories_nav() as $t) { ?>
<li<?php if(isset($topid) && $topid==$t['catid']) { ?> class="m"<?php } ?>><a title="<?php echo $t['catname'];?>" href="<?php echo $t['url'];?>"><?php echo $t['catname'];?></a></li>
<?php } ?>
          </ul>
        </div> 
      </div>
        <div class="clear"></div>
    </div>
    <div id="header_banner">
<?php if($typeid==0) { ?><div style="width:924px;overflow:hidden;">
<?php echo template('system/slide.html'); ?></div>
<?php } else { ?><img src="<?php echo $skin_path;?>/hy_2.jpg" /><?php } ?></div>
  </div>
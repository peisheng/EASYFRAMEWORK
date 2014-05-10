<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="CmsEasy 5_0_0_20120626_UTF8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php echo lang(ordersinfo);?>-<?php echo lang(tipsinfo);?> - Powered by CmsEasy</title>
<meta name="keywords" content="<?php if(isset($archive['keyword'])) { ?><?php echo $archive['keyword'];?>,<?php } ?><?php if(isset($catid)) { ?><?php echo $type[$catid]['keyword'];?>,<?php } ?><?php echo get('site_keyword');?>" />
<meta name="description" content="<?php if(isset($archive['description'])) { ?><?php echo $archive['description'];?>,<?php } ?><?php if(isset($catid)) { ?><?php echo $type[$catid]['description'];?>,<?php } ?><?php echo get('site_description');?>" />
<meta name="author" content="pown.net[九州易通科技有限公司] & 625569327[qq] & cmseasy@163.com[e-mail]" />
</head>
<body>

<style>

.copyright {width:588px;margin:0px auto;padding:0px auto;text-align:right;font-size:10px;color:gray;}
.copyright a  {color:#999;}

.table{ width:600px; margin:66px auto 5px;text-align:center; font-size:12px;  border:1px solid #DDD; border-collapse:collapse; background:white;}
.table * td{ padding:3px 6px; border:1px solid #EEE; }
.table thead * th{ background:#F5F5F5; border:1px solid #E3E3E3; padding:0px 6px; color:#999; } 
.table tbody * th{  background:#F5F5F5; border:1px solid #DDD; }
.table tbody * th strong{ line-height:21px; text-indent:10px; color:#999; }
.td1{ text-align:right; color:#666; }
.td2,.td3,.td4,.td5,.td6,.td7,.td8,.td9{ text-align:center; } 
.td5{ background:#F5F5F5; }
.td6,.td7,.td8,.td9{ background:#F5F5F5; }
.abctxt {padding:10px;}
</style>


<table cellspacing="1" cellpadding="3" border="1" align="center" class="table">
<tbody>
<th>
<?php echo lang(ordersinfo);?>
</th>
   <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
    <td>
   
    <?php if($orders['oid']) { ?>
    <table width="100%" border="0" cellspacing="1" cellpadding="0"> 
      <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff"> 
        <td width="20%" align="right"><?php echo lang(orderid);?>：</td> 
        <td width="80%"><font color="red"><?php echo $orders['oid'];?></font></td> 
      </tr>  
      <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff"> 
        <td width="20%" align="right"><?php echo lang(orderadddate);?>：</td> 
        <td width="80%"><?php echo date('Y-m-d H:i:s',$orders['adddate']);?></td> 
      </tr> 
      <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff"> 
        <td align="right"><?php echo lang(ordercontactname);?>：</td> 
        <td><?php echo $orders['pname'];?></td> 
      </tr> 
      <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff"> 
        <td align="right"><?php echo lang(ordertel);?>：</td> 
        <td><?php echo $orders['telphone'];?></td> 
      </tr> 
      <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff"> 
        <td align="right"><?php echo lang(orderaddress);?>：</td> 
        <td><?php echo $orders['address'];?></td> 
      </tr> 
            <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff"> 
        <td align="right"><?php echo lang(postcode);?>：</td> 
        <td><?php echo $orders['postcode'];?></td> 
      </tr> 
            <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff"> 
        <td align="right"><?php echo lang(ordercontent);?>：</td> 
        <td><?php echo $orders['content'];?></td> 
      </tr> 
      <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff"> 
        <td align="right"><?php echo lang(orderstatus);?>：</td> 
        <td><font color="red"><?php echo $orders['status'];?></font></td> 
      </tr> 
      <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff"> 
        <td align="right">&nbsp;</td> 
        <td><input type="submit" value="<?php echo lang(shutwin);?>" onClick="window.close()"/></td> 
      </tr> 
    </table>   
    <?php } else { ?>
    <?php echo lang(ordersnot);?>
    <?php } ?>
    
    </td>
   </tr>
</tbody>
</table>
<div class="copyright"><a href="http://www.cmseasy.cn" title="Powered by CmsEasy" target="_blank">Powered by CmsEasy</a></div>

</body>
</html>
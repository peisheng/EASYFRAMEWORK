<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="CmsEasy 5_0_0_20120626_UTF8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php echo lang(OnlinePayment);?> - Powered by CmsEasy</title>
<meta name="keywords" content="<?php if($archive['keyword']) { ?><?php echo $archive['keyword'];?><?php } else { ?><?php if($type['keyword']) { ?><?php echo $type['keyword'];?><?php } elseif ($category[$catid][keyword]) { ?><?php echo $category[$catid]['keyword'];?><?php } else { ?><?php echo get('site_keyword');?><?php } ?><?php } ?>" />
<meta name="description" content="<?php if($archive['description']) { ?><?php echo $archive['description'];?><?php } else { ?><?php if($type['description']) { ?><?php echo $type['description'];?><?php } elseif ($category[$catid][description]) { ?><?php echo $category[$catid]['description'];?><?php } else { ?><?php echo get('site_description');?><?php } ?><?php } ?>" />
<meta name="author" content="CmsEasy Team" />
<link rel="icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />

<style type="text/css">
body {font-size:12px;}
td.td_left,td.td_right {padding:3px 15px;}
td.td_left {text-align:right;}
.back {
  display:block;
  width:72px;
  height:21px;
  line-height:20px;
  padding-left:10px;
  background:url(<?php echo $skin_path;?>/images/back.gif) left top no-repeat;
  text-align:center;
  color:white;
  font-size:12px;
  text-decoration: none;
  border:none;
}
.title h1 {
  line-height:40px;
  padding-top:20px;
  font-size:22px;
  text-align:center;
  background:url(<?php echo $skin_path;?>/images/point.gif) left bottom repeat-x;
  color:#333;
  font-weight:normal;
  font-family:'微软雅黑';
}
.back a,.back a:hover {text-decoration: none;color:white;}
.f a {color:#ccc;text-decoration: none;}

.blank30 {clear:both;height:30px;}
.blank10 {clear:both;height:10px;}
.box {clear:both; width:699px;margin:0px auto;padding:0px auto;overflow:hidden;}
.c_top {
  clear:both;
  height:10px;
  background:url(<?php echo $skin_path;?>/images/c_top.gif) -280px top no-repeat;
}

.c_bg {
  background:url(<?php echo $skin_path;?>/images/c_bg.gif) left top repeat-y;
}

.c_bottom {
  clear:both;
  height:10px;
  background:url(<?php echo $skin_path;?>/images/c_bottom.gif) left top no-repeat;
}

textarea {margin:5px 0px;}

</style>
</head>
<body>

<!-- 中部开始 -->
<div class="clear box c_bg">
<div class="c_top"></div>
<div style="padding:0px 20px;">
<!-- 内容标题 -->
<div class="title"><h1><?php echo lang(OnlinePayment);?></h1></div>
<div id="content" class="clear">


<script type="text/javascript">
window.onload = function(){
document.getElementById('totalorders').innerHTML = document.getElementById('pnums').value*document.getElementById('pprice').innerText;
}
function changetotalprdersprice(){
var num = document.getElementById('pnums').value;
var numarr = num.match(/^[0-9]+$/);
if(num<1){
alert('<?php echo lang(orderquantity);?>');
document.getElementById(numid).value=1;
}else if(numarr==null){
alert('<?php echo lang(orderquantity);?>');
document.getElementById(numid).value=1;
}
document.getElementById('totalorders').innerHTML = document.getElementById('pnums').value*document.getElementById('pprice').innerText;
}
function changetotalprdersprice1(id,priceid,numid){
var num = document.getElementById(numid).value;
var numarr = num.match(/^[0-9]+$/);
if(num<1 && num!=0){
alert('<?php echo lang(orderquantity);?>');
document.getElementById(numid).value=1;
}else if(numarr==null && num!=0){
alert('<?php echo lang(orderquantity);?>');
document.getElementById(numid).value=1;
}
document.getElementById(id).innerHTML = document.getElementById(numid).value*document.getElementById(priceid).innerText;
gettotalprice();
}
function gettotalprice(){
var listt = 0;
<?php
if(isset($orderaidlist)){
foreach($orderaidlist as $val){
?>		
listt = parseInt(document.getElementById('thistotal<?php echo $val['aid'];?>').innerHTML)+listt;
document.getElementById('listtotal').value = listt;
//alert(listt);
<?php
}
}
?>
document.getElementById('listtotalhidden').value = document.getElementById('listtotal').value;
}
</script>

<script type="text/javascript">

function check()
            {

if(document.orders.pnums.value.length==0){
   alert("<?php echo lang(enter);?><?php echo lang(ordercontactname);?>!");
   document.orders.pnums.focus();
   return false;
}

if(document.orders.pname.value.length==0){
   alert("<?php echo lang(enter);?><?php echo lang(ordercontactname);?>!");
   document.orders.pname.focus();
   return false;
}

if(document.orders.telphone.value.length==0){
   alert("<?php echo lang(enter);?><?php echo lang(ordertel);?>!");
   document.orders.telphone.focus();
   return false;
}

if(document.orders.address.value.length==0){
   alert("<?php echo lang(enter);?><?php echo lang(orderaddress);?>!");
   document.orders.address.focus();
   return false;
}

if(document.orders.postcode.value.length==0){
   alert("<?php echo lang(enter);?><?php echo lang(postcode);?>!");
   document.orders.postcode.focus();
   return false;
}


if(document.orders.pnums.value.length==0){
   alert("<?php echo lang(enter);?><?php echo lang(ordercontactname);?>!");
   document.orders.pnums.focus();
   return false;
}

return true; 
} 
</script>

<form action="<?php echo uri();?>" id="orders" name="orders" method="post" onclick="gettotalprice();" onsubmit="return check()">
<table width="100%" border="1" align="center" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse;" bgcolor="#F9F9F9">
    <?php if($orderaidlist) { ?>
   <tr>
    <td colspan="2">
    
       <table width="100%" border="1" align="center" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse;" bgcolor="#F9F9F9">
        <tr class="th">
          <th><?php echo lang(productname);?></th>
          <th><?php echo lang(productprice);?></th>
          <th><?php echo lang(pordernums);?></th>
          <th><?php echo lang(subtotal);?></th>
          <th></th>
        </tr>
        <?php foreach($orderaidlist as $val) { ?>
        <input type="hidden" name="aid[]" value="<?php echo $val['aid'];?>" />
        <tr id="list<?php echo $val['aid'];?>">
          <td align="center"><?php echo $val['title'];?></td>
          <td id="thisprice<?php echo $val['aid'];?>" align="center"><?php echo $val['attr2'];?></td>
          <td align="center"><input type="text" style="text-align:center;" id="thisnum<?php echo $val['aid'];?>" name="thisnum[<?php echo $val['aid'];?>]" value="<?php echo $val['amount'];?>" size="5"  onchange="changetotalprdersprice1('thistotal<?php echo $val['aid'];?>','thisprice<?php echo $val['aid'];?>','thisnum<?php echo $val['aid'];?>')" /></td>
          <td id="thistotal<?php echo $val['aid'];?>" align="center"><?php echo $val['attr2']*$val['amount'];?></td>
          <td align="center"><input type="button" name="" value=" <?php echo lang(delete);?> " onclick="document.getElementById('list<?php echo $val['aid'];?>').style.display='none';document.getElementById('thisnum<?php echo $val['aid'];?>').value=0;changetotalprdersprice1('thistotal<?php echo $val['aid'];?>','thisprice<?php echo $val['aid'];?>','thisnum<?php echo $val['aid'];?>');gettotalprice();" /></td>
        </tr>
        <?php } ?>
      </table>

</td>
</tr>

    <?php } else { ?>
      <tr> 
        <td width="30%" align="right"><?php echo lang(productname);?>：</td> 
        <td width="70%" align="left"><?php echo $archive['title'];?></td> 
      </tr> 
      <tr> 
        <td align="right"><?php echo lang(productprice);?>：</td> 
        <td align="left"><span id="pprice"><?php echo $archive['attr2'];?></span> <?php echo lang(unit);?></td> 
      </tr> 
      
     <?php } ?>
      <tr> 
        <td align="right"> </td> 
        <td align="left"> </td> 
      </tr>     
       
     <?php if(!$orderaidlist) { ?>
      <tr> 
        <td align="right"><?php echo lang(pordernums);?>：</td> 
        <td align="left"><input type="text" size="10" maxlength="10" name="pnums" id="pnums" value="1" onchange="changetotalprdersprice()" /> <font color="green"><?php echo lang(canfill);?></font>
          </td> 
      </tr>
       <tr>
        <td style="width:160px;" align="right"><?php echo lang(ordertotal);?>：</td> 
        <td id="totalorders" align="left"></td> 
      </tr>
      <?php } else { ?>
      <tr> 
        <td style="width:160px;"  align="right"><?php echo lang(ordertotal);?>：</td> 
        <td align="left"><input id="listtotal" type="text" name="listtotal" value="" size="10" disabled="disabled" />
        <input type="hidden" name="listtotalhidden" value="" size="10" />
        </td> 
      </tr> 
      <?php } ?> 
      
      
      <tr> 
        <td align="right"><?php echo lang(ordercontactname);?>：</td> 
        <td align="left"><input type="text" size="20" name="pname" /> 
          <font color="green"><?php echo lang(pcontactnametips);?></font></td> 
      </tr> 
      <tr> 
        <td align="right"><?php echo lang(ordertel);?>：</td> 
        <td align="left"><input type="text" size="10" name="telphone" /> 
          <font color="green"><?php echo lang(pcontactteltips);?></font></td> 
      </tr> 
      <tr> 
        <td align="right"><?php echo lang(orderaddress);?>：</td> 
        <td align="left"><input type="text" size="50" name="address"/></td> 
      </tr> 
      <tr> 
        <td align="right"><?php echo lang(postcode);?>：</td> 
        <td align="left"><input type="text" size="10" name="postcode"/></td> 
      </tr> 
      
      <?php if($logisticslist) { ?>
      <tr> 
        <td align="right"><?php echo lang(pickingmethods);?>：</td> 
        <td align="left">
        <?php foreach($logisticslist as $logistics) { ?>
        <div style="border:1px solid #CCC">
        <input name="logisticsid" type="radio" value="<?php echo $logistics['id'];?>" checked="checked" /><strong><?php echo $logistics['title'];?></strong> <?php echo lang(fees);?>：<?php echo $logistics['price'];?><br />
        <?php echo $logistics['content'];?>
        </div>
        <?php } ?>
        </td> 
      </tr>
      <?php } ?> 
      
     
      <tr> 
        <td align="right"><?php echo lang(payment);?>：</td>
        
        <td align="left">
        <?php if($paylist) { ?>
        <?php foreach($paylist as $pay) { ?>
        <?php if($pay['enabled']==1) { ?> 
        <div>
        <input name="payname" type="radio" value="<?php echo $pay['pay_code'];?>" checked="checked" /><strong><?php echo $pay['pay_name'];?></strong> <?php echo lang(rates);?>：<?php echo $pay['pay_fee'];?>%<br />
        <!-- <?php echo $pay['pay_desc'];?> -->
        </div>       
        <?php } ?>
        <?php } ?>
        
        <?php } else { ?>
        <?php echo lang(nopayment);?>   
        <?php } ?>     
        </td> 
        
      </tr> 
      
      
      <tr> 
        <td align="right"><?php echo lang(ordercontent);?>：</td> 
        <td align="left" valign="top"><textarea name="content" cols="41" rows="7"></textarea> 
         </td> 
      </tr> 
 
      <tr> 
        <td align="right"> </td> 
        <td align="left"><input type="submit" name="submit" value=" <?php echo lang(submit);?> " /> 
        <input type="reset" value=" <?php echo lang(reset);?> " /> 
          </td> 
      </tr> 
    </table> 
</form>

<div class="blank30"></div>
<div class="clear"></div>
</div>



<div class="clear"></div>
</div>
<!-- 中部结束 -->


<div class="c_bottom"></div>
<div class="clear"></div>
</div>
<div class="blank10"></div>
<div class="f" style="color:#ccc;text-align:center;">
<?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved.      <a href="http://www.cmseasy.cn" title="Powered by CmsEasy" target="_blank">Powered by CmsEasy</a>
</div>

</body>
</html>
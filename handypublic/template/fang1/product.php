<?PHP
if (!defined('VERSON'))
{
	exit('Access Defined');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<!--{template headerjs}-->

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo $page_title ?></title>
<meta name="keywords" content="<?php echo $page_keyword ?>" />
<meta name="description" content="<?php echo $page_discription ?>" />
<link href="css/eaea_all.css" rel="stylesheet" type="text/css" />
<link href="css/eaea_goods.css" rel="stylesheet" type="text/css" />
<link rel="Shortcut Icon" href="<?php echo $sitetitleurl;?>/favicon.ico">
<link rel="Bookmark" href="<?php echo $sitetitleurl;?>/favicon.ico">
<!-- ��������������ղؼнű� -->
<script language="javascript">
function addfavor(url,title) {
    if(confirm("��վ���ƣ�"+title+"\n��ַ��"+url+"\nȷ������ղ�?")){
        var ua = navigator.userAgent.toLowerCase();
        if(ua.indexOf("msie 8")>-1){
            external.AddToFavoritesBar(url,title,'');//IE8
        }else{
            try {
                window.external.addFavorite(url, title);
            } catch(e) {
                try {
                    window.sidebar.addPanel(title, url, "");//firefox
                } catch(e) {
                    alert("�����ղ�ʧ�ܣ���ʹ��Ctrl+D�������");
                }
            }
        }
    }
    return false;
}
</script>
</head>
<body>
<!-- ����ͷ��ģ�� -->
<!--{template header}-->
<div class="list">
<!-- �󲿿�ʼ -->
<div class="list_left">
	<!-- ������Ʒ -->
	<div class="list_hot">
    	<div class="hot_head"><span>�����Ƽ�</span></div>

        <!--�б�ģ��-->
      <?php include($WEBROOT_TEMP."left_pro.php");?>

        
        <!--�󲿹��-->
      <div class="leftad">
        	<ul>
        <?php echo $ggleftcontent;?>
            </ul>       
      </div>
        
    </div>
    

</div>
<?php
	$listurl = getsearchurl("",$catid);
	$prourl = getproducturl($iid);
?>

<!-- �Ҳ���ʼ -->
<div class="list_right">
	<!-- ��ǰλ�� -->
	<div class="list_place">
    	<div class="list_place_ioc"><img src="<?php echo $templateroot;?>/img/eaea/ioc_02.gif" align="absmiddle"/></div>
    	<div class="list_place_nav">����λ��:<a href="<?php echo $rootroad;?>/">��ҳ</a>><a href="<?php echo $listurl?>"><?php echo Newiconv("UTF-8","GBK",$cat_name) ?></a>><a href="<?php echo $prourl?>"><?php echo Newiconv("UTF-8", "GBK",$title) ?></a></div>
    </div>
    
	<!-- �б��� -->
    <div class="topad"> 
        <ul>
			 <?php echo get_neirong_str("productgg")?>
        </ul>
    </div>
    
    <!-- ��Ʒ���� -->
    <div class="goods_title">
		<div class="title_ioc"><img src="<?php echo $templateroot;?>/img/eaea/title_ioc.gif" /></div>
        <div class="goodstitle"><?php echo Newiconv("UTF-8", "GBK",$title) ?></div>
        <div class="title_iocr"><a href="javascript:;" onclick="javascript:addfavor('<?php echo $prourl ?>','<?php echo Newiconv("UTF-8","GBK",$title) ?>');"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc08.gif" align="absmiddle" alt="�ղ���Ʒ���ղؼ�" /></a></div>
    </div>

    <!-- ��Ʒ��Ϣ -->
    <div class="goods_info">
		<div class="goods_info_img" onMouseOver="this.className='goods_info_img_hover'" onMouseOut="this.className='goods_info_img'"><a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><?php setPic($pic_path."_310x310.jpg",0,0,Newiconv("UTF-8","GBK",$title))?></a>
        </div>
        
        <div class="goods_info_div">
        	<ul>
                <li class="price">�Ա��ۼۣ�<b><?php echo $coupon_price==""?"&yen;".$price:"<s>&yen;".$price."</s>  �ۿۣ�".$coupon_price."Ԫ" ?></b></li>
                <li>�ƹ����ƣ�<?php echo Newiconv("UTF-8", "GBK",$nick) ?> </li>
                <li>�������ã�<img src="<?php echo $templateroot;?>/img/eaea/level_<?php echo $level; ?>.gif"></li>
                <li>��Ʒ���ԣ�<?php echo Newiconv("UTF-8", "GBK",$state) ?> <?php echo Newiconv("UTF-8", "GBK",$city) ?></li>
                <li class="ems">�˷ѽ��ܣ�<?php if ($express_fee!="���Ұ���"){?>ƽ�ʣ�<?php echo $post_fee; ?>Ԫ&nbsp;&nbsp;��ݣ�<?php echo $express_fee; ?>Ԫ&nbsp;&nbsp;EMS��<?php echo $ems_fee; ?>Ԫ<?php } else { echo $express_fee; }?></li>
                <li class="stocknum">����������<b><?php echo $volume ?></b>��</li>
                <li class="stocknum">���������<b><?php echo $num ?></b>��</li>
                <li>�ϼ�ʱ�䣺<?php echo $list_time; ?></li>
                <li>�¼�ʱ�䣺<?php echo $delist_time; ?></li>
            </ul>
            <div class="go_buy">
		<a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="<?php echo $templateroot;?>/img/eaea/buy.gif"></a>
		<a href="javascript:;" onclick="clickurl('<?php echo base64_encode($shop_click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="<?php echo $templateroot;?>/img/eaea/shop.gif"></a>
			</div>
        </div>
    </div>
    
    <!-- ��Ʒͷ�� -->
	<div class="goods_head">
    	<div class="goods_head_ioc"><img src="<?php echo $templateroot;?>/img/eaea/ioc_02.gif" align="absmiddle"/></div>
    	<div class="goods_head_nav">��Ʒ��ϸ��Ϣ - </div>
        <h1 class="goods_head_h1"><?php echo Newiconv("UTF-8", "GBK",$title) ?></h1>
    </div>

    <!-- ��Ʒ���� -->

    <?php if(is_array($props)) { ?>
    <div class="goods_props">
    	<div class="goods_props_catalogs">
        <div class="clear"></div>
        <ul>
		<?php
            if(is_array($props)){
                for($i = 0; $i < count($props); $i++) {
                    echo '<li><img src="'.$templateroot.'/img/eaea/ioc_03.gif"/>'.Newiconv("UTF-8","GBK",$props[$i]['prop_name']).':'.Newiconv("UTF-8","GBK",$props[$i]['name']).'</li>';
                    }
                }
        
        
        ?>
        </ul>
        <div class="clear"></div>
        </div>
    </div>
    <?php } ?>
    
    <!-- ��Ʒ��ϸ -->
    <div id="goods_desc">
<div id="tb_content">
<?php 
writeDesc("");
?>

</div>
    </div>
    
    
</div>

</div>

<!-- ���صײ�ģ�� -->
<?php include("footer.php");?>


 </body>
</html>
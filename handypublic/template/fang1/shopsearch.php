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
<link href="css/eaea_list.css" rel="stylesheet" type="text/css" />
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
<!--{template header}-->
<div class="list">
<!-- �󲿿�ʼ -->
<div class="list_left">
	<!-- ������Ʒ -->
	<div class="list_hot">
    	<div class="hot_head"><span>�����Ƽ�</span></div>
        	
        <!--�б�ģ��-->
<!--{template left}-->
      
      <!--�󲿹��-->
      <div class="leftad">
        	<ul>
            	        <!--{ad/paileft}-->

            </ul>       
      </div>  
      
    </div>
    
</div>

<!-- �Ҳ���ʼ -->
<div class="list_right">
	<!-- ��ǰλ�� -->
	<div class="list_place">
    	<div class="list_place_ioc"><img src="<?php echo $templateroot;?>/img/eaea/ioc_02.gif" align="absmiddle"/></div>
    	<div class="list_place_nav">����λ��:<a href="<?php echo $rootroad;?>/">��ҳ</a>>
        <?php
        if($catid != 0 || $catid == ""){
			echo '<a href="'.$listurl.'">'.$cat_name.'</a> ������ '.$cat_name.$q.' �����Ʒ<span class="goods_list_num">'.$totalResults.'</span>��';
        }else{
			echo '�����ؼ���<span class="goods_list_num">'.$q.'</span>��Ʒ�б�';
		}
		?>
        
        </div>
    </div>
    
    <!-- �¼����� -->
    <?php if($result_subcats_count > 0 && $catid > 0) { ?>
    <div class="list_class">
    	<div class="list_class_catalogs">
        <div class="clear"></div>
        <ul>
		<?php
        foreach ($result_subcats as $row){
			if(!ischengrencid($row["cid"])) { 
				$tpurl = getsearchurl("",$row["cid"]);
		?>
        <li><img src="<?php echo $templateroot;?>/img/eaea/ioc_03.gif"/><a href="<?php echo $tpurl ?>"<?php if($win_daohang=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$row["name"]) ?></a></li>
		<?php } } ?>
        </ul>
        <div class="clear"></div>
        </div>
    </div>
    <?php } ?>
<?php
			$listurl = getshopIDurl($userid,$sortnum);
			$urlsort = getshopIDurl($userid,$sortnum,false);
?>
    

    <!-- �߼�ѡ�� -->
        
    <!-- ��Ʒ�б� -->
    <div class="list_goodslist">
    
    
<?php for($i = 0; $i < count($taobaokeItem); $i++) {

$taousernick = Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]);


		$urlview = " onclick=\"clickurl('".base64_encode($taobaokeItem[$i]["click_url"])."','".$rootroad."'); return false;\"";
	
 ?>


		    <li style=" line-height:30px; height:30px; padding-left:20px;">
			 - <a href="javascript:;" <?php echo $urlview?> target="_blank"><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["shop_title"]) ?></a> <span><img src="<?php echo $rootroad?>/template/<?php echo $templatefolder?>/img/eaea/level_<?php echo $taobaokeItem[$i]["seller_credit"] ?>.gif"></span>
			</li>


<?php 
}?>

    </div>

    
    <!-- �б��ҳ -->
    <div id="pages">
 <?php 
  $page_size=$pagenumKeys;
  $nums=$totalResults;
  $sub_pages=10;
  $pageCurrent=$page;
  
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,getsearchshopurl($q,$catid,false).($weijingtai?"-":"&page="),2,$weijingtai);
  
?>       
    </div>
</div>

</div>

<!-- ���صײ�ģ�� -->
<!--{template footer}--></body>
</html>
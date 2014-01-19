<?php 
require_once dirname(__FILE__)."/".'global.php';
$default_soft_lang = "UTF-8";
header("Content-Type: text/html; charset=".$default_soft_lang."");
require_once WEBROOT.'include/function.php';

?>
<!DOCTYPE html>
<html>
<head>
<script src="http://a.tbcdn.cn/apps/top/x/sdk.js?appkey=<?php echo $app_key;?>"></script>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />

<!--�Խ����룬ת���ƹ�����ʱ�����á�-->
<script type="text/javascript">
    (function(win,doc){
        var s = doc.createElement("script"), h = doc.getElementsByTagName("head")[0];
        if (!win.alimamatk_show) {
            s.charset = "utf-8";
            s.async = true;
            s.src = "http://a.alimama.cn/tkapi.js";
            h.insertBefore(s, h.firstChild);
        };
        var o = {
            pid: "<?php echo $userpid?>",/*�ƹ㵥ԪID���������ֲ�ͬ���ƹ�����*/
            appkey: "<?php echo $ArrayAppKey?>",/*ͨ��TOPƽ̨�����appkey�����ú������ɽ������appkey*/
            unid: ""/*�Զ���ͳ���ֶ�*/
        };
        win.alimamatk_onload = win.alimamatk_onload || [];
        win.alimamatk_onload.push(o);
    })(window,document);
	
</script>


<?php

$iid = htmlspecialchars(var_request("iid",""),ENT_QUOTES);
$nick = htmlspecialchars(var_request("nick",""),ENT_QUOTES);
$pai_iid = htmlspecialchars(var_request("pai_iid",""),ENT_QUOTES);
$b2cmall_id = htmlspecialchars(var_request("b2cmall_id",""),ENT_QUOTES);

if(strpos($rootroad,"ttp://")<1){
	$rootroad = $sitetitleurl.$rootroad;
}


if($b2cmall_id!=""){
	
		$Api59miaoData=$api59miao->ListShopsDetail($b2cmall_id);
		
		if($Api59miaoData["shops"]!="" && isset($Api59miaoData["shops"]["shop"])){
			
			$url = 	$Api59miaoData["shops"]["shop"]["click_url"];
			echo("<script language=\"javascript\">location.href='".$url."';</script>");	
			exit;
			
		}else{
			
			exit("��ѯ�̼�ʧ�ܣ��뷵����ҳ��");	
		}
		exit;
	
}

if($pai_iid!=""){
	
	$paiproduct = GetPaiProduct($pai_iid);
	
	$url = GetClickUrl_re($paiproduct[0]["url"]);
	
	echo("<script language=\"javascript\">location.href='".$url."';</script>");	
	exit;
	
}


if(!empty($iid)){
	?>
    

</head>
<body >
���ã������ڲ鿴��<font color="#FF0000">�Ա���Ʒ</font>�ǣ� <br>
<br>

<a data-itemid="<?php echo $iid?>" data-rd="1" data-type="0" data-style="2" data-tmpl="230x312" href="" name="goto" id="goto" target="_blank">
�����ת
</a>
<br>
<br>

��������Ա�ֱ�ӹ��򡣸�л���Ĺ�ע��ף��������졣



</body>
</html>

    <?php
	exit;

}
if(!empty($nick)){
	?>
 <script>
   function widgetShopsConvert() {
      TOP.api('rest', 'post', {
         method : 'taobao.taobaoke.widget.shops.convert',
         fields : 'click_url,seller_credit,shop_title',
         seller_nicks : '<?php echo Newiconv("GBK","UTF-8",$nick);?>'
      }, function(response) {
         if (response.taobaoke_shops) {
			var urlstr = response.taobaoke_shops.taobaoke_shop[0].click_url+"&spm=<?php echo $newSPM;?>";
			location.href=urlstr;
			//alert(urlstr);
         } else {
			alert('�����Ҳ����ڣ���ȷ���ǳ�������������');
			location.href="<?php echo $rootroad;?>";
         }
      });
	  
   }
   
</script>
</head>
<body onload="widgetShopsConvert();">
</body>
</html>
    <?php
	exit;
}
$url = base64_decode($_GET["url"]);
if(empty($url)){
	//header("location:".$AppErrPages);
	exit;
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="refresh" content="0; url=<?php echo $url?>" />


<title>����ָ�����Ե�</title>
</head>

<body>



<a href="<?php echo $url;?>" id="goto">   </a>

<script type="text/javascript"> 
	try{
		document.getElementById("goto").click();
	}catch(e){
		location.href="<?php echo $url?>";
	}
</script>
</body>
</html>

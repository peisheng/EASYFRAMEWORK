<div class="hot_goods">

                  <!--列表循环-->
<?php 
$taobaokeItem_type = $taobaokeItem;
for($i = 0; $i < count($taobaokeItem_type); $i++) {

$taousernick = Newiconv("utf-8","gbk",$taobaokeItem_type[$i]["nick"]);

	$urlview =getproducturl($taobaokeItem_type[$i]["num_iid"]);
	if($listlinktype=="tao"){
		$picurl = " onclick=\"clickurl('".base64_encode($taobaokeItem_type[$i]["click_url"])."','".$rootroad."'); return false;\"";
	}else{
		$picurl = "";
	}
	
 ?>
                
        	<div class="hot_goods_list">
            	<div class="hot_goods_list_title">
                <a href="<?php echo $urlview?>" <?php if($win_pro=="1") echo(" target=_blank"); ?> onfocus="this.blur()"><?php echo Newiconv("UTF-8","GBK",$taobaokeItem_type[$i]["title"]) ?></a>
                </div>
            	<div class="hot_goods_list_img" onMouseOver="this.className='hot_goods_list_img_hover'" onMouseOut="this.className='hot_goods_list_img'">
                <a href="<?php echo $urlview?>" <?php echo $picurl?> <?php if($win_pro=="1") echo(" target=_blank"); ?> onfocus="this.blur()">
                <?php setPic($taobaokeItem_type[$i]["pic_url"]."_160x160.jpg",0,0,strip_tags(Newiconv("UTF-8","GBK",$taobaokeItem_type[$i]["title"])))?></a>
                </div>
                <div class="hot_goods_list_price">市场价:￥<span class="hot_goods_list_scprice"><?php echo ($taobaokeItem_type[$i]["price"]*$CustomSetFieldValue[ProShiChang]); //调用市场价格?>
                </span> 元<br />
                <span class="hot_goods_list_tbprice">淘宝价:￥<b><?php echo $taobaokeItem_type[$i]["price"] ?></b> 元</span><br />
                <?php 
					if ($list_hot[$i]["volume"]>5){
						echo '本月热销:<span class="hot_goods_list_num"><b>'.$taobaokeItem_type[$i]["volume"].'</b></span> 件';
                }
                ?>
                </div>
            </div>
    <?php }?>    


            
      </div>
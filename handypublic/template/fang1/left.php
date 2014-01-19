<div class="hot_goods">

<?php
$taobaokeItem_type = GetArrByValue(array("typeid"=>"15","keyword"=>$CustomSetFieldValue[ProListKeyword],"page_size"=>$CustomSetFieldValue[ProListKeywordNum],"sort"=>$sort));;

?>
              <!--{loop $taobaokeItem_type $k $v}-->
                
        	<div class="hot_goods_list">
            	<div class="hot_goods_list_title">
                <a href="$v[url]" $v[rel] target="$v[target]">$v[title]</a>
                </div>
            	<div class="hot_goods_list_img" onMouseOver="this.className='hot_goods_list_img_hover'" onMouseOut="this.className='hot_goods_list_img'">
                <a href="$v[url]" $v[rel] target="$v[target]">
                <?php setPic($v["pic_url"],160,160,strip_tags($v["title"]))?></a>
                </div>
                <div class="hot_goods_list_price">市场价:￥<span class="hot_goods_list_scprice"><?php echo ($v["price"]*$CustomSetFieldValue[ProShiChang]); //调用市场价格?>
                </span> 元<br />
                <span class="hot_goods_list_tbprice"><?php echo $v["seller_name"] ?>价:￥<b><?php echo $v["price"] ?></b> 元</span><br />
                </div>
            </div>
          <!--{/loop}-->
              


            
      </div>
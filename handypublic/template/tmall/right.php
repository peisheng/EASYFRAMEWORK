<ul class="order-list">
        
        
<?php
$indexs = application("index",ROOT."indexdata.php");


$indextaobaokeItemArray = array ();


for($i=0;$i<count($indexs);$i++){
	//自动提交更新JS
	for($x=1;$x<=count($indexs[$i]["shoplist"]);$x++){
		$indexs[$i]["shoplist"][$x]["shopurl"] = strtr($indexs[$i]["shoplist"][$x]["shopurl"],$pidsplit);
	}
}

function showindex($class,$no){
global $indexs;
global $indextaobaokeItemArray;
global $rootroad;
global $weijingtai;
global $wjtpageproduct;
global $wjtpagelist;
global $wjtpagehz;
global $templatefolder;
global $templateroot;

?>
        <li class="order <?php echo $class?>">
            <h3>
             <?php echo $indexs[$no]["catname"]?>综合Top10
            </h3>
            <ol>
        	<?php 
			for($i=1;$i<=count($indexs[$no]["shoplist"]);$i++){
				
				$shopurl = $indexs[$no]["shoplist"][$i]["shopurl"];
				$picurl = " onclick=\"clickurl('".base64_encode($indexs[$no]["shoplist"][$i]["shopurl"])."','".$rootroad."'); return false;\"";
				
			?>
                <li class="ol-<?php echo $i;?>"><a href="javascript:" <?php echo $picurl;?> target="_blank"><?php echo $indexs[$no]["shoplist"][$i]["shopname"]?> <span class="star_com"><img src="<?php echo $templateroot;?>/img/orange/level_<?php echo $indexs[$no]["shoplist"][$i]["shoplevel"]?>.gif" align="absmiddle"/></span></a></li>
            <?php }?>

          </ol>
        </li>


<?php }?>


<?php
$arrstyle = array("order-1","order-2","order-3");
for($i=0;$i<count($indexs);$i++){
	
	showindex($arrstyle[$i % 3],$i); 
	
}

?>
        
        
        
        
</ul>
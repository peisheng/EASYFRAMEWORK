
<A href="<?php echo $rootroad ?>" <?php echo "class=cur"?>>Ê×Ò³</A> 
<?php

if(is_array($arrays) && Count($arrays)>0){
	for($i=0;$i<Count($arrays);$i++){
?>
¡¡<a href="<?php echo $arrays[$i]["url"];?>" ><?php echo $arrays[$i][0]?></a><?php
	}
}
?>
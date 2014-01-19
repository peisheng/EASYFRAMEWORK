


        <?php 
			function echolist($array,$name){
			global $weijingtai;
			global $win_daohang;
				if(is_array($array[$name])){
			?>
             <h3><?php echo strlen($array[$name]["typename"])>4?substr($array[$name]["typename"],0,4):$array[$name]["typename"]?></h3>
                <ul class="ul-1">
                    <?php
					$i=0;
					foreach($array[$name]["SubDaohangArr"] as $val){
	                    ?>
                    <li><a href="<?php echo $val[url];?>" target="<?php echo $val[target];?>" style="color:<?php echo $val[color];?>"><?php echo $val[typename];?></a></li>
                     <?php 
					 $i++;
					 if($i>=4) break;
                     } 
                     ?>
                </ul>
                <ul class="ul-2">
                    <?php
					$i=0;
					foreach($array[$name]["SubDaohangArr"] as $val){
						if($i>=4){
                    ?>
                    <li><a href="<?php echo $val[url];?>" target="<?php echo $val[target];?>" style="color:<?php echo $val[color];?>"><?php echo $val[typename];?></a></li>
                     <?php }
					 	$i++;

                     } 
                     ?>
                </ul>
			 <?php
				}
             }
		 ?>
         
         
<div class="categoryDH">
	<div class="categoryDH-skin">
	<div class="categoryDH-2">
         <?php
		 echolist($arraykeywords,"0");
		 ?>
	</div>
	<div class="categoryDH-4">
				<?php	 echolist($arraykeywords,"1"); ?>
	</div>
	<div class="categoryDH-3">
				<?php	 echolist($arraykeywords,"2"); ?>
	</div>
	<div class="categoryDH-1">
				<?php	 echolist($arraykeywords,"3"); ?>
	</div>
	<div class="categoryDH-5">
				<?php	 echolist($arraykeywords,"4"); ?>
	</div>
	</div>
</div>



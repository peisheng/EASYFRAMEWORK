<!--{eval if(!defined('VERSON')) exit('Access Denied'); }-->
<!--{if (false)}--><!--����ã�����dweamweaverʶ��-->
<link href="css/eaea_all.css" rel="stylesheet" type="text/css" />
<link href="css/eaea_index.css" rel="stylesheet" type="text/css" />
<link href="css/css.css" rel="stylesheet" type="text/css" />
<!--{/if}-->
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

<div id="list_topheadercoder">

<!--{ad/top}-->
<!-- ҳ�涥�� -->
<div class="top">
  <div class="topc">
	<div class="topl">
		<a onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $sitetitleurl ?>');" href="#">��Ϊ��ҳ</a><img src="<?php echo $templateroot;?>/img/eaea/top_ioc_index.gif" align="absmiddle" />
		<a href="javascript:;" onclick="javascript:addfavor('<?php echo $sitetitleurl ?>','<?php echo "$sitetitle" ?>');">�ղر�վ</a><img src="<?php echo $templateroot;?>/img/eaea/top_ioc_favorites.gif" align="absmiddle" />
        
		 ��<a href="<?php echo $rootroad ?>/sitemap.php">վ���ͼ</a>
	</div>
	<div class="topr">


        <?php



if(is_array($topdaohangarray) && Count($topdaohangarray)>0){

	for($i=0;$i<Count($topdaohangarray);$i++){


	if($i<Count($topdaohangarray)-1) {
?>

    <a href="$topdaohangarray[$i][url]" target="$topdaohangarray[$i][target]" style="color:$topdaohangarray[$i][color]"><?php echo $topdaohangarray[$i][0]?></a>

<?php
	} else { ?>
		
	<img src="<?php echo $templateroot;?>/img/eaea/top_ioc_top.gif" align="absmiddle"/><a href="$topdaohangarray[$i][url]" target="$topdaohangarray[$i][target]" style="color:$topdaohangarray[$i][color]"><?php echo $topdaohangarray[$i][0]?></a>

<?php	} 
	}?>


<?php } ?>
	</div>
  </div>
</div>

<!-- LOGO���� -->
<div class="toplogo">
	<!-- LOGOվ�� -->
	<div class="logo">
	  <div class="logof">
      <table border="0"> 
<tr> 
<td valign=middle height=60><a href="<?php echo $rootroad ?>/"><img src="<?php echo $logo?>"  alt="<?php echo $sitetitle ?>"></a></td> 
</tr> 
</table> 
      </div>
	</div>
	<!-- վ������ -->
                    <!--{if $CustomSetFieldValue[SetSearch]}-->
          <table width="376" height="90">
            <tr>
              <td valign="middle">$CustomSetFieldValue[SetSearch]</td>
            </tr>
          </table>
              <!--{else}-->
	<div class="search">
	  <div class="search_form">
      		<div>
	  	<div class="search_form_l"><b>����������</b></div>
		<div class="search_form_r">
		<form action="<?php echo $rootroad;?>/search.php" method="get" name="searchform" id="searchform" target="_blank">
        	<input type="text" name="qserach" id="qserach" style="width:300px;" class="input" value="$param[keyword]">
            <INPUT type="submit" class="submit" value="���Ա�" onClick="return tosearch(1)">
            <INPUT type="submit" class="submit" value="��վ��" onClick="return tosearch(2)">
            <INPUT type="submit" class="submit" value="������" onClick="return tosearch(3)">
		</form>
                      <script language="javascript">

			  	function tosearch(type){

					if(document.getElementById("qserach").value==""){

							return false;

					}

					if(type==1){

						document.getElementById("qserach").name = "taokeyword";

						document.getElementById("searchlist").submit();

					}	
					if(type==2){

						document.getElementById("qserach").name = "sharekeyword";

						document.getElementById("searchlist").submit();

					}	

					if(type==3){

						document.getElementById("qserach").name = "paikeyword";

						document.getElementById("searchlist").submit();

					}	

					return false;

				}

			  	

			  </script>

        
		</div>
        	</div>
	  <div class="search_hot">
	  	<ul>
			<li><b>����������</b></li>
<?php
			foreach($hotkeyword as $val){

			$kk++;

			

			?>

			<a href="<?php echo $val["url"];?>" target="<?php echo $val["target"];?>" style="color:<?php echo $val["color"];?>"><?php echo $val["typename"];?></a> 

			 <?php } 
?>
		</ul>
	  </div>    
      </div>
	</div>
              <!--{/if}-->
</div>

<!-- �����˵� -->
<div class="menu">
	<div class="menul"></div>
	<div class="menuc">
    	<ul >
        <li><a href="<?php echo $rootroad;?>/" style="padding-left:5px;">��ҳ</a></li>
    <?php

    

    if(is_array($arrays) && Count($arrays)>0){

        for($i=0;$i<Count($arrays);$i++){

    ?>

    <li><a href="$arrays[$i][url]" target="$arrays[$i][target]" style="color:$arrays[$i][color]"><?php echo $arrays[$i][0]?></a></li>

    <?php

        }

    }

    ?>
        </ul>
    </div>
    <div class="menur"></div>
</div>

<!-- ��Ŀ�Ƽ� -->
<div class="top_nav">
  <div class="nav_box">
	<div class="nav_box1">

        <?php 
			function echolist($array,$name){
			global $weijingtai;
			global $win_daohang;
				if(is_array($array[$name])){
			
			?>
             <dl><dt><a href="<?php echo $array[$name]["url"]?>" title="<?php echo $array[$name]["typename"]?>"></a></dt>
              
			<?php
            foreach($array[$name]["SubDaohangArr"] as $val){
            ?>
			<dd><a href="<?php echo $val[url];?>"<?php if($win_daohang=="1") echo(" target=_blank"); ?>><?php echo $val[typename];?></a></dd>
			 <?php 
			 }
			 ?>
			 </dl>
			 <?php
				}
             }
			 
			 
		 echolist($arraykeywords,"0");
		 ?>


       
    </div>
    <div class="nav_box2">
		<?php echolist($arraykeywords,"1"); ?>
    </div>
    <div class="nav_box3">
		<?php echolist($arraykeywords,"2"); ?>
    </div>
    <div class="nav_box4">
		<?php echolist($arraykeywords,"3"); ?>
    </div>
    <div class="nav_box5">
		<?php echolist($arraykeywords,"4"); ?>
    </div>
  </div>
</div>


<!-- ͨ����� -->
<div class="ad950">
<!-- �Զ�����λ001 -->
<!--{ad/tonglan}-->
</div>
</div>      <script language="javascript">seturl_LazyLoad('list_topheadercoder');</script>

<div class="info_fenlei">
		    <div class="titst"><strong>选择分类</strong></div>
			<div class="fl_box">
			    <dl class="flist">
					<dd class="dis" id="sub1">
                    
            <!--{eval $DaohangArr = GetArrDaohang("cidaohang");}--><!--这一行是用来调用主导航的-->
            <!--{loop $DaohangArr $k $v}-->
		    <img src="images/ja_13x13.png" />&nbsp;&nbsp;<a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a><br />
                <!--{loop $v[SubDaohangArr] $key2 $value2}-->
                &nbsp;&nbsp;<img src="images/r_j_ico.gif" />&nbsp;&nbsp;<a href="$value2[url]" target="$value2[target]" style="color:$v[color]">$value2[typename]</a><br />
                <!--{/loop}-->
            
            <!--{/loop}-->
                    

					</dd>
				</dl>
			</div>
		</div>
        
 
 
  <!-- 整合文章栏目 --> 
  <!--{if $newslist }--> 
  <div id="xx"> 
    <!--{loop $newslist $k $list}--> 
    <?php $listnews = $list["artlist"]; ?>
        <!--{if $k % 3 == 0}-->
        <div class="one">
          <div class="one1">
            <div class="one2">$list[typename]</div>
            <div class="one3"> <a href="$list[typedir]" target="_blank">>> 更多</a></div>
          </div>
          <div class="one4">
            <div class="one6"> 
              <!--{loop $listnews $knew $vnew}-->
              <div class="one7"><a href="$vnew[url]" target="_blank">{$vnew[title]}</a></div>
              <div class="one8"><a href="#">[<!--{eval echo date('m-d',strtotime($vnew['date']))}-->]</a></div>
              <!--{/loop}--> 
            </div>
          </div>
        </div>
        <!--{/if}--> 
        <!--{if $k % 3 == 1}-->
        <div class="one" style="width:312px; overflow: hidden;">
          <div class="one1"  style="width:312px;color:$v[color]">
            <div class="one2">$list[typename]</div>
            <div class="one3" style="width:138px;"> <a href="$list[typedir]" target="_blank">>> 更多</a></div>
          </div>
          <div class="one4" style="width:312px;">
            <div class="one10"> 
              <!--{loop $listnews $knew $vnew}-->
              <div class="one9"><a href="$vnew[url]" target="_blank">{$vnew[title]}</a></div>
              <div class="one8"><a href="#">[<!--{eval echo date('m-d',strtotime($vnew['date']))}-->]</a></div>
              <!--{/loop}--> 
            </div>
          </div>
        </div>
        <!--{/if}--> 
        <!--{if $k % 3 == 2}-->
        <div class="one" style="margin-right:0px;">
          <div class="one1">
            <div class="one2">$list[typename]</div>
            <div class="one3"> <a href="$list[typedir]" target="_blank">>> 更多</a></div>
          </div>
          <div class="one4">
            <div class="one6"> 
              <!--{loop $listnews $knew $vnew}-->
              <div class="one7"><a href="$vnew[url]" target="_blank">{$vnew[title]}</a></div>
              <div class="one8"><a href="#">[<!--{eval echo date('m-d',strtotime($vnew['date']))}-->]</a></div>
              <!--{/loop}--> 
            </div>
          </div>
        </div>
        <!--{/if}--> 
    
    <!--{/loop}-->
    <div class="clear"></div>
  </div>
  <!--{/if}--> 

<!--{if $TaoConfig[DB_OPEN] }-->

    <!--{if check_login() }-->
        document.write('<div class=\"one4\"> 您好,<span style=\"color:#F00\">$TaoConfig["UserData"]["name"]</span> 欢迎您！ <a href=\"$TaoConfig[rootroad]/usercenter.php\">会员中心</a> |     <a href="#" onClick="art.dialog.open(\'$TaoConfig[rootroad]/usercenter.php?ac=shareframe\', {title: \'分享\',id:\'add\'});">分享宝贝</a></div> <div class=\"one6\"><a href=\"$TaoConfig[rootroad]/usercenter.php?ac=loginout\"><img src="images/ico1.jpg\"  width=\"53\" height=\"22\"/></a></div>');
    <!--{else}-->
        document.write('<div class="one4" style="float:right;">您好，欢迎您来访本站。 <a href="$TaoConfig[rootroad]/usercenter.php" style="color:#fc0303;">登录|</a><a href="$TaoConfig[rootroad]/usercenter.php?ac=register" style="color:#fc0303;">免费注册</a></div>'); 
    <!--{/if}-->
<!--{/if}-->

<!--{if $TaoConfig[DB_OPEN] }-->

    <!--{if check_login() }-->
        document.write('<div class=\"one4\"> ����,<span style=\"color:#F00\">$TaoConfig["UserData"]["name"]</span> ��ӭ���� <a href=\"$TaoConfig[rootroad]/usercenter.php\">��Ա����</a> |     <a href="#" onClick="art.dialog.open(\'$TaoConfig[rootroad]/usercenter.php?ac=shareframe\', {title: \'����\',id:\'add\'});">������</a></div> <div class=\"one6\"><a href=\"$TaoConfig[rootroad]/usercenter.php?ac=loginout\"><img src="images/ico1.jpg\"  width=\"53\" height=\"22\"/></a></div>');
    <!--{else}-->
        document.write('<div class="one4" style="float:right;">���ã���ӭ�����ñ�վ�� <a href="$TaoConfig[rootroad]/usercenter.php" style="color:#fc0303;">��¼|</a><a href="$TaoConfig[rootroad]/usercenter.php?ac=register" style="color:#fc0303;">���ע��</a></div>'); 
    <!--{/if}-->
<!--{/if}-->

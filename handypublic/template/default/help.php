<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>$page_title</title>
<meta name="keywords" content="$page_keyword" />
<meta name="description" content="$page_discription" />
<link rel="Shortcut Icon" href="$sitetitleurl/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--{template headerjs}-->

</head>
<body>
<center>
<!--{template header}-->

	<div id="help_1"><img src="images/banner1.jpg" alt="banner"/></div>
    <div id="help_2">
        <div class="help_3">
            <div class="help_4">
            <div class="help_5">��������</div>
            <div class="help_6">
            <ul class="help_7">
            
            <!--{loop $all_cates $k $v}-->
                <li class="help_8">
                	<div class="help_9"><img src="images/help_icon.gif" alt="icon"/></div>
                	<div class="help_10"><a href="$v[url]">$v[name]</a></div>
                </li>
            <!--{/loop}-->

            </ul>
            </div>
            </div>
            <div class="help_11">
            <div class="help_12">���߿ͷ�</div>
            <div class="help_13">
            <div class="help_14"><img src="images/kfzx.png" alt="�ͷ�����"/></div>
            <div class="help_15">ͨ�����߽��ķ�ʽΪ���ṩ��ѯ����</div>
            </div>
            </div>
        </div>
        <div class="help_16">
        <form action="" method="get">
            <div class="help_17">
            <div class="help_18">�Ұ���</div>
            <div class="help_19"><input  name="keyword" id="ctl_19" value="$keyword"/></div>
            <div class="help_20"><input type="image" src="images/searchBtn.png" alt="����"/></div>
            <div class="help_21">������������ڲ�ѯ���</div>
            </div>
        </form>
            <div class="help_22">
            <div class="help_23">�û���������</div>
            <ul class="help_24">
            	
                <!--{loop $now_array $k $v}-->
                <li class="help_25">��<a href="#to$v[id]">$v[title]</a></li>
                <!--{/loop}-->
                
            </ul>
            </div>
            <div class="help_26">
            <ul class="help_27">
            
            
                <!--{loop $now_array $k $v}-->
                <li class="help_28">
                    <div class="help_29">
                    <div class="help_30"></div>
                    <div class="help_31"><a name="to$v[id]">$v[title]</a></div>
                    </div>
                    <div class="help_32">
                    <div class="help_33"></div>
                    <div class="help_34">$v[info]</div>
                    </div>
                </li>
                <!--{/loop}-->
                
                
            </ul>
            </div>
        </div>
    </div>
    
    
  <!--{template footer}-->
    
</center>
</body>
</html>

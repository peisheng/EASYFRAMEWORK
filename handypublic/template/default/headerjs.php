<script language="JavaScript" type="text/javascript" src="$rootroad/js/seturl.js?2"></script>
<script language="javascript" type="text/javascript" src="$rootroad/statics/js/artDialog.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jQuery.tbSwitching.js?332"></script>
<script language="JavaScript" type="text/javascript" src="js/index_js.js?43eff"></script>
<script language="javascript" type="text/javascript" src="$rootroad/statics/js/plugins/iframeTools.js"></script>
<link href="$rootroad/statics/js/skins/aero.css" rel="stylesheet" type="text/css" />
{$Global_headerCode} 



<!--�Խ����룬ת���ƹ�����ʱ�����á�-->
<script type="text/javascript">
    (function(win,doc){
        var s = doc.createElement("script"), h = doc.getElementsByTagName("head")[0];
        if (!win.alimamatk_show) {
            s.charset = "gbk";
            s.async = true;
            s.src = "http://a.alimama.cn/tkapi.js";
            h.insertBefore(s, h.firstChild);
        };
        var o = {
            pid: "<?php echo $userpid?>",/*�ƹ㵥ԪID���������ֲ�ͬ���ƹ�����*/
            appkey: "",/*ͨ��TOPƽ̨�����appkey�����ú������ɽ������appkey*/
            unid: "",/*�Զ���ͳ���ֶ�*/
			rd: 1
        };
        win.alimamatk_onload = win.alimamatk_onload || [];
        win.alimamatk_onload.push(o);
    })(window,document);
	
</script>

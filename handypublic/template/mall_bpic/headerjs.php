<script language="JavaScript" type="text/javascript" src="$rootroad/js/seturl.js"></script>
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
            unid: ""/*�Զ���ͳ���ֶ�*/
        };
        win.alimamatk_onload = win.alimamatk_onload || [];
        win.alimamatk_onload.push(o);
    })(window,document);
	
</script>

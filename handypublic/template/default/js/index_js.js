

//������Ŀ�л�
$(function(){
	$("#hd .one2").tbSwitching({ac:"on"});
	$("#top .one9").tbSwitching({ac:"on"});

	
});



//�������Ч��
$(function(){
	$("#top .two1").hover(function(){		
	$(this).addClass("ac");
	},function(){
		$(this).removeClass("ac");
	});
	
})


//���������˵�
				var timeout         = 500;
				var closetimer		= 0;
				var ddmenuitem      = 0;
				
				function jsddm_open()
				{	jsddm_canceltimer();
					jsddm_close();
					ddmenuitem = $(this).find('ul').eq(0).css('visibility', 'visible');}
				
				function jsddm_close()
				{	if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}
				
				function jsddm_timer()
				{	closetimer = window.setTimeout(jsddm_close, timeout);}
				
				function jsddm_canceltimer()
				{	if(closetimer)
					{	window.clearTimeout(closetimer);
						closetimer = null;}}
				
				$(document).ready(function()
				{	$('#cjsddm > li').bind('mouseover', jsddm_open);
					$('#cjsddm > li').bind('mouseout',  jsddm_timer);});
				
				document.onclick = jsddm_close;


//������������
	function scroll_news(){
        var firstNode = $('#message_list li'); 
        firstNode.eq(0).fadeOut('slow',function(){
         $(this).clone().appendTo($(this).parent()).show('slow');
         $(this).remove();
      });
    }
    setInterval('scroll_news()',5000);



//�����ͼ�л�����
                    $(function() {
                        var sWidth = $("#focus").width(); //��ȡ����ͼ�Ŀ�ȣ���ʾ�����
						var temp = $("#focus ul li");
                        var len = $("#focus ul li").length; //��ȡ����ͼ����
						
                        var index = 0;
                        var picTimer;
                        
                        //���´���������ְ�ť�Ͱ�ť��İ�͸������������һҳ����һҳ������ť
                        var btn = "<div class='btnBg'></div><div class='btn'>";
                        for(var i=0; i < len; i++) {
                            btn += "<span></span>";
                        }
                        btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
                        $("#focus").append(btn);
                        $("#focus .btnBg").css("opacity",0.5);
                    
                        //ΪС��ť�����껬���¼�������ʾ��Ӧ������
                        $("#focus .btn span").css("opacity",0.4).mouseenter(function() {
                            index = $("#focus .btn span").index(this);
                            showPics(index);
                        }).eq(0).trigger("mouseenter");
                    
                        //��һҳ����һҳ��ť͸���ȴ���
                        $("#focus .preNext").css("opacity",0.2).hover(function() {
                            $(this).stop(true,false).animate({"opacity":"0.5"},300);
                        },function() {
                            $(this).stop(true,false).animate({"opacity":"0.2"},300);
                        });
                    
                        //��һҳ��ť
                        $("#focus .pre").click(function() {
                            index -= 1;
                            if(index == -1) {index = len - 1;}
                            showPics(index);
                        });
                    
                        //��һҳ��ť
                        $("#focus .next").click(function() {
                            index += 1;
                            if(index == len) {index = 0;}
                            showPics(index);
                        });
                    
                        //����Ϊ���ҹ�����������liԪ�ض�����ͬһ�����󸡶�������������Ҫ�������ΧulԪ�صĿ��
                        $("#focus ul").css("width",sWidth * (len));
                        
                        //��껬�Ͻ���ͼʱֹͣ�Զ����ţ�����ʱ��ʼ�Զ�����
                        $("#focus").hover(function() {
                            clearInterval(picTimer);
                        },function() {
                            picTimer = setInterval(function() {
                                showPics(index);
                                index++;
                                if(index == len) {index = 0;}
                            },4000); //��4000�����Զ����ŵļ������λ������
                        }).trigger("mouseleave");
                        
                        //��ʾͼƬ���������ݽ��յ�indexֵ��ʾ��Ӧ������
                        function showPics(index) { //��ͨ�л�
                            var nowLeft = -index*sWidth; //����indexֵ����ulԪ�ص�leftֵ
                            $("#focus ul").stop(true,false).animate({"left":nowLeft},300); //ͨ��animate()����ulԪ�ع������������position
                            //$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //Ϊ��ǰ�İ�ť�л���ѡ�е�Ч��
                            $("#focus .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //Ϊ��ǰ�İ�ť�л���ѡ�е�Ч��
                        }
                    });

//�û�������������ʡ��ʾ
            $(function(){
                var scrtime;
                $("#UserDtCon").hover(function(){
                    clearInterval(scrtime);
                
                },function(){
                scrtime = setInterval(function(){
                    var ul = $("#UserDtCon ul");
                    var liHeight = ul.find("li:last").height();
                    ul.animate({marginTop : liHeight +"px"},1000,function(){
                    ul.find("li:last").prependTo(ul)
                    ul.find("li:first").hide();
                    ul.css({marginTop:0});
                    ul.find("li:first").fadeIn(1000);
                    });	 //��һ�и���������ᱨ��
                },5000);
                }).trigger("mouseleave");
                
            });


//�ۺ������Ŀ������ƶ�Ч��
        $(function(){
            $("#rm .one1").hover(function(){		
            $(this).addClass("ac");
            },function(){
                $(this).removeClass("ac");
            });
        })


function GetPingjia(){			
		$.ajax({
	        url: '$rootroad/index.php?mod=ajax&act=goods_comment',
		    type: "POST",
		    data:{'comment_url':commentUrl},
		    dataType: "json",
		    success: function(data){
			    if(data.rateListInfo.paginator.items>0){
			        var commentScore=parseFloat(data.scoreInfo.merchandisScore);  //���۵÷�
					var commentItems=parseInt(data.rateListInfo.paginator.items);  //��������
					var commentTotal=parseInt(data.scoreInfo.merchandisTotal);  //�����ܴ���
					
					num=commentScore*10;
					x2 = Math.floor(num%10); 
					num /= 10; 
                    x1 = Math.floor(num%10); 

					$('.pingjianum').html(commentItems); 
		            $('#pjdfnum').html(commentTotal);
		            $('.ajaxpjdf').html(commentScore);
		            var biaochi=parseInt(commentScore/5*380);
		            $('#biaochi').css('margin-left',biaochi+'px');
			        $('#getpling').hide();
			        $('#plcontent').show();
					$('.goodscomment .ov5hx').css('width',commentScore*20)
					
					jsonData=data.rateListInfo.rateList;
					c=jsonData.length;
					for(var i=0;i<c;i++){
						if(jsonData[i]['displayRatePic']=='') jsonData[i]['displayRatePic']='b_red_1.gif';
                        jsonLi='<li><div class="commnetleft">'+jsonData[i]['rateContent']+'<br><span>['+jsonData[i]['rateDate']+']</span></div><div class="commnetright">��ң�'+jsonData[i]['displayUserNick']+'<br><img src="images/'+jsonData[i]['displayRatePic']+'" /></div></li>';
						$('#comment').append(jsonLi+'<div style="clear:both"></div>');
                    }
			    }
			    else{
			        alert('���ۼ���ʧ��');
			    }
		     }
	    });    
}

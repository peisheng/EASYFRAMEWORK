

//搜索项目切换
$(function(){
	$("#hd .one2").tbSwitching({ac:"on"});
	$("#top .one9").tbSwitching({ac:"on"});

	
});



//导航鼠标效果
$(function(){
	$("#top .two1").hover(function(){		
	$(this).addClass("ac");
	},function(){
		$(this).removeClass("ac");
	});
	
})


//导航下拉菜单
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


//滚动公告新闻
	function scroll_news(){
        var firstNode = $('#message_list li'); 
        firstNode.eq(0).fadeOut('slow',function(){
         $(this).clone().appendTo($(this).parent()).show('slow');
         $(this).remove();
      });
    }
    setInterval('scroll_news()',5000);



//焦点大图切换代码
                    $(function() {
                        var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
						var temp = $("#focus ul li");
                        var len = $("#focus ul li").length; //获取焦点图个数
						
                        var index = 0;
                        var picTimer;
                        
                        //以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
                        var btn = "<div class='btnBg'></div><div class='btn'>";
                        for(var i=0; i < len; i++) {
                            btn += "<span></span>";
                        }
                        btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
                        $("#focus").append(btn);
                        $("#focus .btnBg").css("opacity",0.5);
                    
                        //为小按钮添加鼠标滑入事件，以显示相应的内容
                        $("#focus .btn span").css("opacity",0.4).mouseenter(function() {
                            index = $("#focus .btn span").index(this);
                            showPics(index);
                        }).eq(0).trigger("mouseenter");
                    
                        //上一页、下一页按钮透明度处理
                        $("#focus .preNext").css("opacity",0.2).hover(function() {
                            $(this).stop(true,false).animate({"opacity":"0.5"},300);
                        },function() {
                            $(this).stop(true,false).animate({"opacity":"0.2"},300);
                        });
                    
                        //上一页按钮
                        $("#focus .pre").click(function() {
                            index -= 1;
                            if(index == -1) {index = len - 1;}
                            showPics(index);
                        });
                    
                        //下一页按钮
                        $("#focus .next").click(function() {
                            index += 1;
                            if(index == len) {index = 0;}
                            showPics(index);
                        });
                    
                        //本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
                        $("#focus ul").css("width",sWidth * (len));
                        
                        //鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
                        $("#focus").hover(function() {
                            clearInterval(picTimer);
                        },function() {
                            picTimer = setInterval(function() {
                                showPics(index);
                                index++;
                                if(index == len) {index = 0;}
                            },4000); //此4000代表自动播放的间隔，单位：毫秒
                        }).trigger("mouseleave");
                        
                        //显示图片函数，根据接收的index值显示相应的内容
                        function showPics(index) { //普通切换
                            var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
                            $("#focus ul").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position
                            //$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
                            $("#focus .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果
                        }
                    });

//用户订单，滚动节省显示
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
                    });	 //这一行个别浏览器会报错
                },5000);
                }).trigger("mouseleave");
                
            });


//综合类别栏目的鼠标移动效果
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
			        var commentScore=parseFloat(data.scoreInfo.merchandisScore);  //评价得分
					var commentItems=parseInt(data.rateListInfo.paginator.items);  //评价数量
					var commentTotal=parseInt(data.scoreInfo.merchandisTotal);  //评价总次数
					
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
                        jsonLi='<li><div class="commnetleft">'+jsonData[i]['rateContent']+'<br><span>['+jsonData[i]['rateDate']+']</span></div><div class="commnetright">买家：'+jsonData[i]['displayUserNick']+'<br><img src="images/'+jsonData[i]['displayRatePic']+'" /></div></li>';
						$('#comment').append(jsonLi+'<div style="clear:both"></div>');
                    }
			    }
			    else{
			        alert('评论加载失败');
			    }
		     }
	    });    
}

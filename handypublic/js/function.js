// JavaScript Document
function setPic(pic,width,height,alt){
	
	pic =  decode64(pic);
	
	writestr = "<img src='"+pic+"' ";
	if(width!=0){
		writestr+=" width="+width;
	}
	if(height!=0){
		writestr+=" height="+height;
	}
	writestr = writestr+" alt='"+alt+"' />";
	
	document.write(writestr);
}

function getpic(thispic,pic){
	
	pic =  decode64(pic);
	thispic.src = pic;
}
function tihuan()
{
	str = decode64(str);
	document.getElementById("tb_content").innerHTML = str;

}
function clickurl(urlid,root){
	//urlid =  decode64(urlid);
	var win = window.open(root+"/gotourl.php?url="+urlid);
	if(win==null){
		location.href=root+"/gotourl.php?url="+urlid;
	}
}
function clickurl_old(urlid){
	urlid =  decode64(urlid);
	window.open(urlid);
	//location.href=root+"/gotourl.php?url="+urlid;
	
}
function widgetProductNumConvert(iid) {
  TOP.api('rest', 'post', {
	 method : 'taobao.taobaoke.widget.items.convert',
	 fields : 'volume,num_iid,click_url,iid,commission,commission_rate,commission_num,commission_volume',
	 num_iids  : iid
  }, function(response) {
	 if (response.taobaoke_items) {
		var urlstr = response.taobaoke_items.taobaoke_item[0].volume;
		document.getElementById("volume").innerHTML = urlstr;
	 } else {
	 }
  });
}

$(document).ready(function(){
	
	var lb = $("#limit-buy"),
		lb_cur = 1,
		lbp_w = lb.find(".products").width();
		lb_timer = null;
	t = 1;
	function showLimitBuyProducts(){
		if(lb_cur < 1){
			lb_cur = 3;
		} else if(lb_cur > 3){
			lb_cur = 1;
		}
		$("#J-lbcp").html(lb_cur);
		var products = $("#limit-buy .products").hide().eq(lb_cur-1).show(),
			ta = products.find("textarea");
			
		if(ta.length){
			products.html(ta.val());
		}
	}
	lb_timer = setInterval(function(){
		lb_cur++;
		showLimitBuyProducts();
	}, 4000);
	
	$("#J-lbn .prev, #J-lb .btn-prev").click(function(){
		lb_cur--;
		showLimitBuyProducts();
	});
	$("#J-lbn .next, #J-lb .btn-next").click(function(){
		lb_cur++;
		showLimitBuyProducts();
	});
	$("#J-lb").hover(function(){
			clearInterval(lb_timer);
			lb_timer = null;
			$("#J-lb .btn-prev, #J-lb .btn-next").show();
		}, function(){
			lb_timer = setInterval(function(){
				lb_cur++;
				showLimitBuyProducts();
			}, 10000);
			$("#J-lb .btn-prev, #J-lb .btn-next").hide();
	});
	
});
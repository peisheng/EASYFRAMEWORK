var base64EncodeChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
var base64DecodeChars = new Array(
    -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 62, -1, -1, -1, 63,
    52, 53, 54, 55, 56, 57, 58, 59, 60, 61, -1, -1, -1, -1, -1, -1,
    -1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14,
    15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, -1, -1, -1, -1, -1,
    -1, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40,
    41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, -1, -1, -1, -1, -1); 

function base64decode(str) {
    var c1, c2, c3, c4;
    var i, len, out;

    len = str.length;
    i = 0;
    out = "";
    while(i < len) {
    /* c1 */
    do {
        c1 = base64DecodeChars[str.charCodeAt(i++) & 0xff];
    } while(i < len && c1 == -1);
    if(c1 == -1)
        break;

    /* c2 */
    do {
        c2 = base64DecodeChars[str.charCodeAt(i++) & 0xff];
    } while(i < len && c2 == -1);
    if(c2 == -1)
        break;

    out += String.fromCharCode((c1 << 2) | ((c2 & 0x30) >> 4));

    /* c3 */
    do {
        c3 = str.charCodeAt(i++) & 0xff;
        if(c3 == 61)
        return out;
        c3 = base64DecodeChars[c3];
    } while(i < len && c3 == -1);
    if(c3 == -1)
        break;

    out += String.fromCharCode(((c2 & 0XF) << 4) | ((c3 & 0x3C) >> 2));

    /* c4 */
    do {
        c4 = str.charCodeAt(i++) & 0xff;
        if(c4 == 61)
        return out;
        c4 = base64DecodeChars[c4];
    } while(i < len && c4 == -1);
    if(c4 == -1)
        break;
    out += String.fromCharCode(((c3 & 0x03) << 6) | c4);
    }
    return out;
}
//

function linkForImg(){
	var images=document.getElementsByTagName("img");
	var imgLen=images.length;
	for(var i=0;i<imgLen;i++){
		images[i].onclick=function(){
			window.open(u);
		}
		images[i].title="去淘宝查看促销价";
		images[i].style.cursor="pointer";
		var this_src = images[i].src;
		var parter=/.*\/b\/timg([0-9]+)\/(.+)/g;
		images[i].src = this_src.replace(parter,"ht"+"tp"+":"+"/"+"/i"+"m"+"g"+"$1.ta"+"o"+"b"+"a"+"oc"+"dn."+"c"+"o"+"m/b"+"a"+"o"+"/$2");
	}
}
//
var $id = function(id) {
    return "string" == typeof id ? document.getElementById(id) : id;

};

function seturl_LazyLoad(b) {
	
    var c = $id(b).getElementsByTagName('a');
    for (var d = 0, j = c.length; d < j; d++) {
        lazyload_a(c[d])
    }
	
    c = $id(b).getElementsByTagName('img');
    for (var d = 0, j = c.length; d < j; d++) {
        lazyload(c[d])
    }
	
	
	
	
};


var addListener = function(b, c, d, e) {
    if (b.addEventListener) {
        b.addEventListener(c, d, e);
        return true
    } else if (b.attachEvent) {
        b['e' + c + d] = d;
        b[c + d] = function() {
            b['e' + c + d](window.event)
        };
        b.attachEvent('on' + c, b[c + d]);
        return true
    };
    return false
},
getObjPoint = function(b) {
    var c = y = 0;
    do {
        c += b.offsetLeft || 0;
        y += b.offsetTop || 0;
        b = b.offsetParent
    }
    while (b);
    return {
        'x': c,
        'y': y
    }
},
isIE = function() {
    if (/msie (\d+\.\d)/i.test(navigator.userAgent)) {
        return document.documentMode || parseFloat(RegExp.$1)
    };
    return 0
};


function lazyload(b) {
    if (!b.src) {
        return false
    };
	var this_src = b.src;
	
	
	var setload = 0;
	
	if(this_src.indexOf("/tbcdn-")>0){
		setload = 1;
		var parter=/.*\/tbcdn-([0-9]+)\/(.+)/g;
		this_src=this_src.replace(parter,"http://img$1.taobaocdn.com/bao/uploaded/$2");
	}
	if(this_src.indexOf("/tbsite-")>0){
		setload = 1;
		var parter=/.*\/tbsite-(.+)/g;
		this_src=this_src.replace(parter,"http://image.taobao.com/bao/uploaded/$1");
	}
	if(this_src.indexOf("/pai-")>0){
		setload = 1;
		var parter=/.*\/pai-([0-9]+)\/(.+)/g;
		this_src=this_src.replace(parter,"http://img$1.paipaiimg.com/$2");
	}
	if(this_src.indexOf("/59b2c-")>0){
		setload = 1;
		var parter=/.*\/59b2c-(.+)-toimg59\/(.+)/g;
		this_src=this_src.replace(parter,"http://$1.59miao.com/$2");
	}
	
	
	if(setload==0){
		return;	
	}
	b.src = this_src;
	return;
	
};
function lazyload_a(b) {
    if (!b.href) {
        return false
    };
	
	
	
	var this_src = b.href;
	
	if(this_src.indexOf("/topai.php")>0){
		var parter=/.*\/topai\.php(.+)/g;
		this_src=this_src.replace(parter,"http://te.paipai.com/tws/etgcl/click$1");
	}
	
	if(this_src.indexOf("/totbcdn.php")>0){
		
		var parter=/.*\/totbcdn\.php(.+)/g;
		this_src=this_src.replace(parter,"http://s.click.taobao.com/t$1");
	}
	if(this_src.indexOf("/to59b2c.php")>0){
		var parter=/.*\/to59b2c\.php(.+)/g;
		this_src=this_src.replace(parter,"http://r.59miao.com/$1");
	}
	
    b.href = this_src;
	
};
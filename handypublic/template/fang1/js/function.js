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
	writestr = writestr+" alt='"+alt+"' align=\"absmiddle\" />";
	
	document.write(writestr);
}

function getpic(thispic,pic){
	
	pic =  decode64(pic);
	thispic.src = pic;
}
function tihuan()
{
	str = decode64(str);
	document.getElementById("goods_desc").innerHTML = str;

}
function clickurl(urlid){
	urlid =  decode64(urlid);
	window.open(urlid);
	
}
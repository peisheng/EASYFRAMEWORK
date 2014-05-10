// JavaScript Document
function imeover(obj){
	document.getElementById(obj).src="images/arr1_a.gif";	
}
function imeout(obj){
	document.getElementById(obj).src="images/arr1.gif";	
}


function imeWin(file,w,h,r,s){
    window.open(file,'','resizable='+r+',width='+w+",height="+h+',scrollbars='+s+',left='+(screen.availWidth-w)/2+',top='+(screen.availHeight-h)/2);
}


var newsPrev;
var numPrev;
function newsBtn(obj,num){
	if(newsPrev==null){newsPrev=document.getElementById("news_bt_1");}
	if(numPrev==null){numPrev="1";}
	newsPrev.className="news_bt_"+numPrev;
	document.getElementById("news_"+numPrev).style.display="none";
	obj.className="news_bt_"+num+"_a";
	document.getElementById("news_"+num).style.display="block";
	newsPrev=obj;
	numPrev=num;
}


var hPrev;
var htbPrev;
function honor(time,obj){
	if(hPrev==null){
		hPrev=document.getElementById("hbt").getElementsByTagName("li")[0]
	}
	if(htbPrev==null){
		htbPrev=document.getElementById("htb").getElementsByTagName("table")[0]
	}
	hPrev.className="";	
	htbPrev.style.display="none";
	obj.className="hbt_a";
	document.getElementById(time).style.display="block";
	document.getElementById("year").innerHTML=time;
	hPrev=obj;
	htbPrev=document.getElementById(time);
}


function searcheck(){
	if(document.formSear.keys.value==""){
		alert("请输入关键词后再进行查询！");
		document.formSear.keys.focus();
		return false
	}
}
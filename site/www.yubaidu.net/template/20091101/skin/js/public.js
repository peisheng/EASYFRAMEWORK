//------------------------------------------------------------------------------------------------
//            JavaScript Document By Eshion Media(IME)
//            该脚本代码由亿新科技编写
//            亿新科技网址：www.eshion.cn    联系方式：0577-27802780
//------------------------------------------------------------------------------------------------

try{document.execCommand("BackgroundImageCache",false,true);}catch(e){}
var browser=navigator.appName;

window.onload=function(){
	if(document.getElementById("menu")!=null){
	for(var i=0;i<document.getElementById("menu").getElementsByTagName("a").length;i++){
		document.getElementById("menu").getElementsByTagName("a")[i].onfocus=function(){
			this.blur();
		}		
	}}
}

var mPrev;
var conPrev;
function m(obj,conobj){
	if(mPrev!=null){
		mPrev.className="";
		document.getElementById("idx"+conPrev).style.display="none";
	}
	obj.className="aA";
	document.getElementById("idx"+conobj).style.display="block";
	mPrev=obj;
	conPrev=conobj;
}
function menuStar(){
	mPrev=document.getElementById("menu").getElementsByTagName("a")[0];
	conPrev="1";
	for(var i=0;i<document.getElementById("menu").getElementsByTagName("a").length;i++){
		document.getElementById("menu").getElementsByTagName("a")[i].onmouseover=new Function("m(this,'"+(i+1)+"')");	
	}
}
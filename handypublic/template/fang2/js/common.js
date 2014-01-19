function setTab(m,n){
var menu=document.getElementById("tab"+m).getElementsByTagName("dd");
var div=document.getElementById("tablist"+m).getElementsByTagName("div");
var showdiv=[];
for (i=0; j=div[i]; i++){
if ((" "+div[i].className+" ").indexOf(" tablist ")!=-1){
showdiv.push(div[i]);
}
}
for(i=0;i<menu.length;i++)
{
menu[i].className=i==n?"now"+i:"";
showdiv[i].style.display=i==n?"block":"none";
}
}

function setTac(m,n){
var menu=document.getElementById("tac"+m).getElementsByTagName("dd");
var div=document.getElementById("tablist"+m).getElementsByTagName("div");
var showdiv=[];
for (i=0; j=div[i]; i++){
if ((" "+div[i].className+" ").indexOf(" tablist ")!=-1){
showdiv.push(div[i]);
}
}
for(i=0;i<menu.length;i++)
{
menu[i].className=i==n?"now":"";
showdiv[i].style.display=i==n?"block":"none";
}
}


function suckerfish(type, tag, parentId) {
if (window.attachEvent) {
   window.attachEvent("onload", function() {
    var sfEls = (parentId==null)?document.getElementsByTagName(tag):document.getElementById(parentId).getElementsByTagName(tag);
    type(sfEls);
   });
}
}


function addfavor(url,title) {
    if(confirm("网站名称："+title+"\n网址："+url+"\n确定添加收藏?")){
        var ua = navigator.userAgent.toLowerCase();
        if(ua.indexOf("msie 8")>-1){
            external.AddToFavoritesBar(url,title,'');//IE8
        }else{
            try {
                window.external.addFavorite(url, title);
            } catch(e) {
                try {
                    window.sidebar.addPanel(title, url, "");//firefox
                } catch(e) {
                    alert("加入收藏失败，请使用Ctrl+D进行添加");
                }
            }
        }
    }
    return false;
}


function suckerfish(type, tag, parentId) {
 if (window.attachEvent) {
  window.attachEvent("onload", function() {
   var sfEls = (parentId==null)?document.getElementsByTagName(tag):document.getElementById(parentId).getElementsByTagName(tag);
   type(sfEls);
  });
 }
}

hover = function(sfEls) {
 for (var i=0; i<sfEls.length; i++) {
  sfEls[i].onmouseover=function() {
   this.className+=" hover";
  }
  sfEls[i].onmouseout=function() {
   this.className=this.className.replace(new RegExp(" hover\\b"), "");
  }
 }
}
suckerfish(hover, "li");

function addfavor(url,title) {
    if(confirm("网站名称："+title+"\n网址："+url+"\n确定添加收藏?")){
        var ua = navigator.userAgent.toLowerCase();
        if(ua.indexOf("msie 8")>-1){
            external.AddToFavoritesBar(url,title,'');//IE8
        }else{
            try {
                window.external.addFavorite(url, title);
            } catch(e) {
                try {
                    window.sidebar.addPanel(title, url, "");//firefox
                } catch(e) {
                    alert("加入收藏失败，请使用Ctrl+D进行添加");
                }
            }
        }
    }
    return false;
}
function killErrors() {
return true;
}
window.onerror =killErrors;
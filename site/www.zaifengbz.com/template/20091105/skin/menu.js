//------------------------------------------------------------------------------------------------
//            JavaScript Document By Eshion Media(IME)
//            �ýű����������¿Ƽ���д
//             ���¿Ƽ���ַ��www.eshion.cn    ��ϵ��ʽ��0577-27802780
//------------------------------------------------------------------------------------------------

var mcontainm=document.getElementById("menu-main").getElementsByTagName("a");
var mcontains=document.getElementById("menu-side").getElementsByTagName("div");
for(var mi=0;mi<=mcontainm.length-1;mi++){
	mcontainm[mi].onmouseover=function(){mover(this.id.replace("mm",""));}
	mcontains[mi].onmouseover=function(){mover(this.id.replace("ms",""));	}
	mcontainm[mi].onmouseout=function(){mout(this.id.replace("mm",""));}
	mcontains[mi].onmouseout=function(){	mout(this.id.replace("ms",""));}
}
if(def!=null){document.getElementById("mm"+def).className="menuA";document.getElementById("ms"+def).style.display="block";}
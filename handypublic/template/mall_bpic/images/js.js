function doClick(o){
	 o.className="nav_current";
	 var j;
	 var id;
	 var e;
	 for(var i=1;i<=3;i++){ //����3 ��Ҫ���޸� ����������� ���Ƕ���
	   id ="nav"+i;	   
	   j = document.getElementById(id);
	   e = document.getElementById("sub"+i);
	   if(id != o.id){
	   	 j.className="nav_link";
	   	 e.style.display = "none";
	   }else{
			e.style.display = "block";
	   }
	 }
	 }
	 
	 
function doClicks(o){
	 o.className="nav_currents";
	 var j;
	 var id;
	 var e;
	 for(var i=1;i<=2;i++){
	   id ="navs"+i;	   
	   j = document.getElementById(id);
	   e = document.getElementById("subs"+i);
	   if(id != o.id){
	   	 j.className="nav_links";
	   	 e.style.display = "none";
	   }else{
			e.style.display = "block";
	   }
	 }
	 }
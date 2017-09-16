// JavaScript Document
function $(Objq){return document.getElementById(Objq);}//简化ID应用
  
function Hidemenuu(){//样式及内容隐藏
				var Mobj=$(Aid).getElementsByTagName(Tname);
				for(i=0;i<Mobj.length;i++){   
                 Mobj[i].className=Css1;
				 $(Cobj+i).style.display='none';
                }
				}
				
function Showmenuu(Objq,Obj2){//显示指定的样式和内容
				Hidemenuu();
				Objq.className=Css2;
				Obj2.style.display='';
				}
				
var Mobj=$(Aid).getElementsByTagName(Tname);//动态添加事件
				for(i=0;i<Mobj.length;i++){   
                 Mobj[i].attachEvent(Sev,new Function('Showmenuu('+Mobj[i].id+',C'+i+')'));
                }
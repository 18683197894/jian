function tabChange(obj,id)
{
 var arrayli = obj.parentNode.getElementsByTagName("li"); //获取li数组
 var arrayul = document.getElementById(id).getElementsByTagName("ul"); //获取ul数组
 for(i=0;i<arrayul.length;i++)
 {
  if(obj==arrayli[i])
  {
   arrayli[i].className = "zcli";
   arrayul[i].className = "";
  }
  else
  {
   arrayli[i].className = "";
   arrayul[i].className = "zf_hidden";
  }
 }
}

var Aid, Tname, Css1, Css2, Cobj, Sev

Aid = "qz_Menu"; //外层容器ID
Tname = "a"; //容器里面的HTML元素，菜单的索引对象
Css1 = "menu1"; //未选中样式文件
Css2 = "menu2"; //选中样式文件
Cobj = "C"; //显示内容的ID标识符，例如：C0 C1 C2 并须从0开始定义
Sev = "mouseover"
// JavaScript Document
function $(Obj) { return document.getElementById(Obj); } //简化ID应用

var Mobj = $(Aid).getElementsByTagName(Tname); //动态添加事件
for (i = 0; i < Mobj.length; i++) {
    addEvent(Mobj[i], Sev, new Function('Showmenu(' + Mobj[i].id + ',C' + i + ')'));
}

function Hidemenu() { //样式及内容隐藏
    var Mobj = $(Aid).getElementsByTagName(Tname);
    for (i = 0; i < Mobj.length; i++) {
        Mobj[i].className = Css1;
        $(Cobj + i).style.display = 'none';
    }
}

function Showmenu(Obj, Obj2) { //显示指定的样式和内容
    Hidemenu();
    Obj.className = Css2;
    Obj2.style.display = '';
}
function addEvent(obj, ev, fn) {　　 if (obj.attachEvent) {　　 //针对IE浏览器
        　　 obj.attachEvent('on' + ev, fn)　　 } else {　　 //针对FF与chrome
        　　 obj.addEventListener(ev, fn, false)　　 }

    　　 }
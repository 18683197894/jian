    <!--
    var speed=30; //数字越大速度越慢
    var tab4=document.getElementById("demo4");
    var tab5=document.getElementById("demo5");
    var tab6=document.getElementById("demo6");
    tab6.innerHTML=tab5.innerHTML;
    function Marquee(){
    if(tab6.offsetWidth-tab4.scrollLeft<=0)
    tab4.scrollLeft-=tab5.offsetWidth
    else{
    tab4.scrollLeft++;
    }
    }
    var MyMar=setInterval(Marquee,speed);
    tab4.onmouseover=function() {clearInterval(MyMar)};
    tab4.onmouseout=function() {MyMar=setInterval(Marquee,speed)};
    -->

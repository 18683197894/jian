// JavaScript Document
window.onerror = function()
	{
		return true;
	}
	if (!window._sT)
	var marTime = new Array();
	var marWay = new Array();
	var moveTime = new Array();
	moveTime[0] = 0;
	moveTime[1] = 0;
	var speed = 30;
	var fodTime = 0;
	var proFlog = 0;
	var proTime = 0;
function $$(o){ return (typeof o == "object")?o:document.getElementById(o);}
function getNames(obj,name,tij){var plist = $$(obj).getElementsByTagName(tij);var rlist = new Array();for(i=0;i<plist.length;i++){if(plist[i].getAttribute("name") == name){rlist[rlist.length] = plist[i];}}return rlist;}
function cplay(){var o,n,t,na,c1,c2;o = $$(arguments[0]);num=arguments[1];t=arguments[2];n=arguments[3];c1=arguments[4];c2=arguments[5];var f=getNames(o,n,t);for(i=0;i<f.length;i++){	if(i == num){f[i].className = c1;}else{f[i].className = c2;}}}
function newsPlay(){var o,n,t,na,c1,c2;o = $$(arguments[0]);num=arguments[1];t=arguments[2];n=arguments[3];c1=arguments[4];c2=arguments[5];var f=getNames(o,n,t);for(i=0;i<f.length;i++)		{if(i == num){if(f[i].className == "s0" || f[i].className == "s1"){f[i].className = "s1";}else{f[i].className = c1;$$("map").className = "undis";}}else{				if(f[i].className == "s0" || f[i].className == "s1"){f[i].className = "s0";	}else{f[i].className = c2;$$("map").className = "undis";}}}}
function fod(){var o1,o2,t1,t2,n1,n2,c1,c2,c3,c4,num;o1=$$(arguments[0]);o2=$$(arguments[1]);num=arguments[2];t1=arguments[3];n1=arguments[4];t2=arguments[5];n2=arguments[6];c1=arguments[7];c2=arguments[8];c3=arguments[9];c4=arguments[10];if(o1.id=="News"){newsPlay(o1,num,t1,n1,c1,c2);}else{cplay(o1,num,t1,n1,c1,c2);}cplay(o2,num,t2,n2,c3,c4);}
function _fod(o1,o2,t0,t1,n1,t2,n2,c1,c2,c3,c4)
	{return function(){fod(o1,o2,t0,t1,n1,t2,n2,c1,c2,c3,c4)}}
function formatArea()
	{var o1=$$(arguments[0]);var o2=$$(arguments[0]+"Info");var t1=arguments[1];var n1=arguments[2];var t2=arguments[3];var n2=arguments[4];var c1,c2,c3,c4;if(arguments.length>5){c1=arguments[5];c2=arguments[6];c3=arguments[7];c4=arguments[8];}else{c1="s";c2="";c3="dis";c4="undis"}var f=getNames(o1,n1,t1);		for(i=0;i<f.length;i++){f[i].value = i;f[i].onmouseover = function(){clearTimeout(fodTime);fodTime=0;fodTime = setTimeout(_fod(o1,o2,this.value,t1,n1,t2,n2,c1,c2,c3,c4),100);	}; f[i].onmouseout=function(){clearTimeout(fodTime);fodTime=0;}}}
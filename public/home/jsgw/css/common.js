// JavaScript Document

var Bruce = {};
Bruce.namespace = function(str){
	var arr = str.split('.'),o=Bruce;
	for(i=(arr[0]=='Bruce') ?　1 : 0; i<arr.length; i++){		
		o[arr[i]] = o[arr[i]] || {};
		o = o[arr[i]];
	}
}

Bruce.namespace('page.mainView');
Bruce.page.getQueryValue = function(url,key){
	var escapeReg = function(source) {
		return String(source)
				.replace(new RegExp("([.*+?^=!:\x24{}()|[\\]\/\\\\])", "g"), '\\\x241');
	};
    var reg = new RegExp(
                        "(^|&|\\?|#)" 
                        + escapeReg(key) 
                        + "=([^&]*)(&|\x24)", 
                    "");
    var match = url.match(reg);
    if (match) {
		var result=match[2].substring(match[2].length-1,match[2].length);
        return result=='#'?match[2].substring(0,match[2].length-1):match[2];
    }    
    return null;
}
Bruce.page.isIE6 = function(){
	var isIE = !+'\v1'; //IE浏览器
	var IE6 = isIE && /MSIE (\d)\./.test(navigator.userAgent) && parseInt(RegExp.$1) < 7;
	return IE6;	
}

Bruce.page.naviMenu = function(){
	var navi = parameter;
	if(navi){	
		if(navi.navi!=null){
			$('#navi .menu li[is="menuindex"]:eq('+navi.navi+') a:eq(0)').addClass('active'+navi.navi);
		}
	}else{
		var val = Bruce.page.getQueryValue(window.location.href,'navi');
		if(val){
			$('#navi .menu li[is="menuindex"]:eq('+val+') a:eq(0)').addClass('active'+val);
		}
	}
	var indexli;
	$('#navi .menu li[is="menuindex"]').hover(function(){
		indexli = $(this).index();
		$(this).find('div.downarrow').show();
		$(this).find('a:eq(0)').addClass('hover'+indexli);
		$(this).find('.menuitempanel').slideDown(500);		
	},function(){
		indexli = $(this).index();
		$('#navi .menu li .menuitempanel').stop(true,true);
		$('.menuitempanel div.menufillet_s,.menuitempanel div.menufillet_e,.menuitempanel div.menufillet_w,.menuitempanel div.menufillet_se,.menuitempanel div.menufillet_sw').stop(true,true);
		$(this).find('div.downarrow').hide();
		$(this).find('a:eq(0)').removeClass('hover'+indexli);
		$(this).find('.menuitempanel').hide();
	})
}

var parameter;
Bruce.page.onLoad = function(){
	//增加导航条默认选择某个，和整站搜索框默认文字、默认radio选中的方法，navi:主导航默认选中某个，数字从0开始,searchindex:整站搜索下拉框默认选中某个,searchtext:'产品检索'
	parameter = eval('('+$('#main').attr('parameter')+')');
	//主导航初始化的方法
	Bruce.page.naviMenu();
}

// JavaScript Document
$(function(){
	Bruce.page.onLoad();
})

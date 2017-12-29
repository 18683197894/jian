//开始总价赋值
$(document).ready(function(){
	tail();
})

//计算选中的总价
function tail()
{
	var aa =0;
	var num =0;
	$("input[name='checkbox']:checked:checked").each(function(i,n){
		num ++;
		aa += parseInt($(this).siblings('.shopping1_con_litotai').html());
	})
	
	$('.numnum').html(num);
	$('.shopping_tailli2 > em').html(aa);
}
//计算单个物品的总价
function dantail(li,num){
	var dan = parseInt(li.parent('.shopping1_con_linum').prev('.shopping1_con_lispan').html());
	li.parent('.shopping1_con_linum').siblings('.shopping1_con_litotai').html(dan*num+'元');
}

//物品数量加减写入数据库
function numajax(id,st,num)
{	
	
	$.ajax('/home/shoppingcart/numajax',{
		type : 'get',
		'async' : 'false',
		data : {id:id,st:st,num:num}
	})

}

//全选
$('#checkbox_aa').on('click',function(){

	$("input[name='checkbox']").attr('checked',true);
	tail();
})

//单个物品选中或取消 
$("input[name='checkbox']").on('click',function(){
	$('#checkbox_aa').removeAttr('checked');
	tail();
})

$('.num1').on('click',function(){
	var id = $(this).parent('.shopping1_con_linum').attr('index');
	var num = $(this).siblings('span').html();

	if(num <=1)
	{
		return false ;
	}

	 numajax(id,'-',num);
	 var num2 = num -1;
	
	$(this).siblings('span').html(num2);
	dantail($(this),num2);
	tail();
})

$('.num2').on('click',function(){
	var id = $(this).parent('.shopping1_con_linum').attr('index');
	var num = $(this).prev('span').html();
	if(num >= 10)
	{
		return false ;
	}
	numajax(id,'+',num);
	var num2 = Number(num) +1;

	$(this).prev('span').html(num2);
	dantail($(this),num2);
	tail();
})

$('.shopping1_con_libutton').on('click',function(){
	var id = $(this).prevAll('.shopping1_con_linum').attr('index');
	var tr = $(this).parent('li');
	var count = $('.shopping_tailli1').find('em').eq(0).html();

	$.ajax('/home/shoppingcart/del',{
		type : 'post',
		async : false,
		dateType : 'json',
		data : {id:id,_token:$("meta[name='csrf-token']").attr('content')},
		success : function(data)
		{
			if(data == 1)
			{
				// alert('删除成功！');
				tr.slideUp(300);
				tr.find('input').attr('checked',false);
				$('.shopping_tailli1').find('em').eq(0).html(count -1 );
				tail();
			}else
			{
				alert('删除失败！')
				return false;
			}
		},
		error : function(data)
		{
			alert('删除失败！');
		}
	})
})
var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9+/=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/rn/g,"n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}} 
//结算
$('.shopping_tailli3').on('click',function(){
	var url = "";
	$("input[name='checkbox']:checked:checked").each(function(){
		var id = $(this).siblings('.shopping1_con_linum').attr('index');
		url += id + '_';
	})
	 if( url =="" )
	 {
	 	alert('请先选择商品!');
	 	return false;
	 }
	url =md5('jslmjswl') +'zlss6fj9edolxsweesaz'+ Base64.encode(url+'jswladmin121442206718683197894');
	window.location.href= '/home/shoppingcart/payment?data='+url;

})

// $(window).scroll(function(){
// 	var trtop = $('.shopping1').offset().top + $('.shopping1').height() - 50;
	
// 	//窗口的高
// 	var winheight = $(window).height();
	
// 	//文档高度
// 	var wintop = $(document).height();

// 	//隐藏部分高度
// 	var a =$(document).scrollTop()

// 	var b = winheight + a - 50;
// 	if(b >= trtop)
// 	{
// 		b =trtop;
// 	}
// 	$('.offset').offset({top:b});
// 	console.log(b);
	
// })
/**
 * Created by Administrator on 2018\1\27 0027.
 */

$(".auto a").click(function(){

    $(".auto a").removeClass("avtive");
    $(this).addClass('avtive');
    $('.contact .Choice').removeClass("avtive").eq($(this).index()).addClass("avtive");
});


	$('.dians').on('click',function(){
    		var id =$(this).html();

    		if(id =='完整案例')
    		{
    			id = 1;
    		}
    		if( id=='在建案例')
    		{
    			id = 2;
    		}

    		$.ajax('/newpro/case/setajax',{
    			type : 'GET',
    			data : {id:id}
    		})
    	})


var color = $(".contact #wan .Choice_type .Choice_type1 .type_right a");
var color1 = $(".contact #wan .Choice_type .Choice_type2 .type_right a");
var color2 = $(".contact #wan .Choice_type .Choice_type3 .type_right a");
color.click(function(){
    color.removeClass("avtive").eq($(this).index()).addClass("avtive");
    color1.removeClass("avtive");
    color2.removeClass("avtive");
	wanajax($(this));

});
color1.click(function(){
    color1.removeClass("avtive").eq($(this).index()).addClass("avtive");
    color.removeClass("avtive");
    color2.removeClass("avtive");
	wanajax($(this));
});
color2.click(function(){
    color2.removeClass("avtive").eq($(this).index()).addClass("avtive");
    color.removeClass("avtive");
    color1.removeClass("avtive");
	wanajax($(this));

});

var color3 = $(".contact .NO2 .Choice_type .Choice_type1 .type_right a");
var color4 = $(".contact .NO2 .Choice_type .Choice_type2 .type_right a");
var color5 = $(".contact .NO2 .Choice_type .Choice_type3 .type_right a");
color3.click(function(){
    color3.removeClass("avtive").eq($(this).index()).addClass("avtive");
    color4.removeClass("avtive");
    color5.removeClass("avtive");
	zaiajax($(this));
});

color4.click(function(){
    color4.removeClass("avtive").eq($(this).index()).addClass("avtive");
    color3.removeClass("avtive");
    color5.removeClass("avtive");
	zaiajax($(this));
});

color5.click(function(){
    color5.removeClass("avtive").eq($(this).index()).addClass("avtive");
    color3.removeClass("avtive");
    color4.removeClass("avtive");
	zaiajax($(this));
});

	function zaiajax(th)
	{
		var huxing = $('.zai1 > .type_right > .avtive').html();
		var fengge = $('.zai2 > .type_right > .avtive').html();
		var yusuan = $('.zai3 > .type_right > .avtive').html();
	
		$.ajax('/newpro/case/zaiajax',{
			type : 'POST',
			dataType: 'json',
			data:{huxing:huxing,fengge:fengge,yusuan:yusuan,_token:$("meta[name='csrf-token']").attr('content')},
			success: function(data)
			{
				if(data)
				{	
					var str = "";
					$.each(data,function(i,n){
					var zai = $('#zai > .show > a').eq(0).clone(true);
						zai.find('.show_name_title').html(n['title']);
						zai.find('.con_span > span').eq(0).html(n['huxing']);
						zai.find('.con_span > span').eq(1).html(n['fengge']);
						zai.find('.con_span > span').eq(2).html(n['yusuan']);
						zai.find('.show_auto > img').attr('src','/uploads/case/img/'+n['img'])
						zai.attr('href','/newpro/case/zaiplay/'+n['id']);
						str +=zai[0].outerHTML;
					})
					$('#zai > .show > a').remove();
					$('#zai > .show').append(str);
					if(data[0]['ors'] ==1)
					{	
						$('.zaitui').css('display','none');
						$('.zaicount').html(data[0]['count']);
						if( data[0]['count'] > data[0]['num'])
						{	

							$('.dian').css('display','block');
							$('.dian').attr('count',data[0]['count']);
							$('.dian').attr('num',data[0]['num']);
							$('.dian > .button1').css('display','block');
							$('.dian > .button2').css('display','none');
						}else
						{
							$('.dian').css('display','none');
						}
					}else
					{	
						$('.zaicount').html(0);
						$('.zaitui').css('display','block');
						$('.dian').css('display','none');

					}
				}else
				{
					alert('查询失败！');
					return false;
				}
			},
			error:function(data)
			{
				alert('加载失败！');
				return false;
			}
		})
	}

function wanajax(th)
{
		var huxing = $('.wan1 > .type_right > .avtive').html();
		var fengge = $('.wan2 > .type_right > .avtive').html();
		var yusuan = $('.wan3 > .type_right > .avtive').html();
		
		$.ajax('/newpro/case/wanajax',{
			type : 'POST',
			dataType: 'json',
			data:{huxing:huxing,fengge:fengge,yusuan:yusuan,_token:$("meta[name='csrf-token']").attr('content')},
			success: function(data)
			{

				if(data)
				{	
					var str = "";
					$.each(data,function(i,n){
					var zai = $('#wan > .show > a').eq(0).clone(true);
						zai.find('.name').html(n['title']);
						zai.find('.norms > span').eq(0).html(n['huxing']);
						zai.find('.norms > span').eq(1).html(n['fengge']);
						zai.find('.norms > span').eq(2).html(n['yusuan']);
						zai.find('.show_auto > img').attr('src','/uploads/case/img/'+n['img'])
						zai.attr('href','/newpro/case/play/'+n['id']);

						str +=zai[0].outerHTML;
					})
					console.log(str);
					$('#wan > .show > a').remove();
					$('#wan > .show').append(str);
					if(data[0]['ors'] == 1)
					{	
						$('.wantui').css('display','none');
						$('.wancount').html(data[0]['count']);
						if(data[0]['url'])
						{
							$('.page').css('display','block');
							$('.page').html(data[0]['url']);
						}else
						{	

							$('.page').css('display','none');
						}
					}else
					{
						$('.wantui').css('display','block');
						$('.wancount').html('0');
						$('.page').css('display','none');

					}
					
				}else
				{
					alert('查询失败！');
					return false;
				}
			},
			error:function(data)
			{
				alert('加载失败！');
				return false;
			}
		})
}

$(document).on("click",'.pagination > li > a',function(){
	
  	var huxing = $('.wan1 > .type_right > .avtive').html();
	var fengge = $('.wan2 > .type_right > .avtive').html();
	var yusuan = $('.wan3 > .type_right > .avtive').html();
	var page = $(this).attr('href');

	if(!page)
	{
		return false; 
	}
	var pa = page.substr(56,2);
	if(!pa)
	{
		return false;
	}
	$.ajax('/newpro/case/pagemoreajax',{
				type : 'POST',
				dataType: 'json',
				data:{page:pa,huxing:huxing,fengge:fengge,yusuan:yusuan,_token:$("meta[name='csrf-token']").attr('content')},
				success: function(data)
				{
					if(!data)
					{	
						alert('加载失败！');
						return false;
					}
					var str = "";
					$.each(data['data'],function(i,n){
						var wan = $('#wan > .show > a').eq(0).clone(true);
							wan.find('.name').html(n['title']);
							wan.find('.norms > span').eq(0).html(n['huxing']);
							wan.find('.norms > span').eq(1).html(n['fengge']);
							wan.find('.norms > span').eq(2).html(n['yusuan']);
							wan.find('.show_auto > img').attr('src','/uploads/case/img/'+n['img'])
							wan.attr('href','/newpro/case/play/'+n['id']);

						str += wan[0].outerHTML;
					})
					$('#wan > .show > a').remove();
					$('#wan > .show').append(str);
					$('.page').html(data['url']);
				},
				error:function(data)
				{
					alert('加载失败！');
					return false;
				}
			})
	return false;
});

$('.dian > .button1').on('click',function(){
			var count = $(this).parent('.dian').attr('count');
			var num = $(this).parent('.dian').attr('num');
			
			var huxing = $('.zai1 > .type_right > .avtive').html();
			var fengge = $('.zai2 > .type_right > .avtive').html();
			var yusuan = $('.zai3 > .type_right > .avtive').html();
			if(Number(count) <= Number(num) )
			{	
				$('.dian').css('display','none');
				return false;
			}
			
			if(!huxing || !fengge || !yusuan)
			{
				return false;
			}
			$.ajax('/newpro/case/getmoreajax',{
				type : 'POST',
				dataType: 'json',
				data:{count:count,num:num,huxing:huxing,fengge:fengge,yusuan:yusuan,_token:$("meta[name='csrf-token']").attr('content')},
				success: function(data)
				{
					if(data == 2)
					{	
						alert('没有更多数据');
						$('.dian').css('display','none');
						return false;
					}

					var str = "";
					$.each(data,function(i,n){
					var zai = $('#zai > .show > a').eq(0).clone(true);
						zai.find('.show_name_title').html(n['title']);
						zai.find('.con_span > span').eq(0).html(n['huxing']);
						zai.find('.con_span > span').eq(1).html(n['fengge']);
						zai.find('.con_span > span').eq(2).html(n['yusuan']);
						zai.find('.show_auto > img').attr('src','/uploads/case/img/'+n['img'])
						zai.attr('href','/newpro/case/zaiplay/'+n['id']);

						str +=zai[0].outerHTML;
					})
					$('#zai > .show').append(str);
					$('.dian').attr('num',data[0]['num']);
					if(data[0]['num'] >= count)
					{
						$('.dian > button').eq(0).css('display','none');
						$('.dian > button').eq(1).css('display','block');
					}
				},
				error:function(data)
				{
					alert('加载失败！');
				}
			})
			
		})

		
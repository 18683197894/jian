 $(function(){
		   	$('.ztabmenu7 > ul li').on('click',function(){

		   		var index = $(this).index();
		   		$('.ztabmenu7 > ul > .zcli').attr('class','');
		   		$(this).attr('class','zcli');
		   		$('#ztabcontent1 > .ztb').css('display','none');
		   		$('#ztabcontent1 > .ztb').eq(index).css('display','block');
		   	})

		   	$('.ztabmenu8 > ul li').on('click',function(){
		   		var index = $(this).index();
		   		$('.ztabmenu8 > ul > .zcli').attr('class','');
		   		$(this).attr('class','zcli');
		   		$('#ztabcontent2 > .ztb').css('display','none');
		   		$('#ztabcontent2 >.ztb').eq(index).css('display','block');
		   	})
		   	$('.ztabmenu9 > ul li').on('click',function(){
		   		var index = $(this).index();
		   		$('.ztabmenu9 > ul > .zcli').attr('class','');
		   		$(this).attr('class','zcli');
		   		$('#ztabcontent3 > .ztb').css('display','none');
		   		$('#ztabcontent3 >.ztb').eq(index).css('display','block');
		   	})

		   	$(".taocannei > span > a").on('click',function(){
		   		$(this).parent("span").find('a').css('color','#666');
		   		$(this).css('color','red');
		   		var id = $(this).attr('index');
		   		var div = $(this).parents('.ztb').find('.c0-con');
		   		var p = $(this).parents('.ztb').find('.c0-con').find('p').eq(0);
		   		var tit = $(this).html();
		   		var da = "";
		   		
		   		$(this).parents('.ztb').find('#C0').find(".c0-tit-1").html(tit+'包含项目');
			    
		   		
			     $.ajax('/home/package/subclass/ajax/',{
			     	type : 'get',
			     	data : {id:id},
			     	success : function(data)
			     	{
			     		if(data ==1)
			     		{
			     		 div.removeChild("p");
			     		 da = "<p style='text-align:center;font-size:16px;'>加载失败！</p>";
			     		 div.append(da);
			     		 return false;	
			     		}
			     		
			     		div.html('');
			     		$.each(data,function(i,n){

			     			p.find('.c0-tit-51').html(n['title']);
			     			p.find('.c0-tit-52').html(n['specations']);
			     			p.find('.c0-tit-53').html(n['brand']);
			     			p.find('.c0-tit-54').html(n['num']);
			     			da += p[0].outerHTML;
			     		})
			     		div.append(da);
			     		
			     	},
			     	error : function()
			     	{
	
			     		
			     	},
			     	dateType : 'json'
			     })
		   	})
		   })
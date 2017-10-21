$('.dian > .button1').on('click',function(){
		var count = Number($('.dian').attr('count'));
		var num = Number($('.dian').attr('num'));
		var str ="";
		var div = $('.case3con').eq(0).clone(true);
		if(num >= count)
		{
			return false;
		}
		
		$.ajax({
			url : '/home/case/jiaajax',
			type : 'post',
			dataType : 'json',
			data : {count:count,num:num,_token:$('meta[name="csrf-token"]').attr('content')},
			success : function(data)
			{
				if(data == 2){
					return false;
				}
				$('.dian').attr('num',num+5);
				
				$.each(data,function(i,n){
					
					div.find('img').attr('src','/uploads/case/img/'+n.effect2);
					div.find('title').html(n.title);
					div.find('.conspan1').html(n.huxing);
					div.find('.conspan2').eq(0).html(n.fengge);
					div.find('.conspan2').eq(1).html(n.yusuan);
					div.find('.con_con > li > em').css('border','2px solid #ccc');
					div.find('.con_con > li > span').css('color','#333');
					if(n.or >= 1)
					{
						div.find('#con_li1').find('em').css('border','2px solid #00AF62');
						div.find('#con_li1').find('span').css('color','#00AF62');
					}
					if(n.or >=2)
					{
						div.find('#con_li2').find('em').css('border','2px solid #00AF62');
						div.find('#con_li2').find('span').css('color','#00AF62');
					}
					if(n.or >=3)
					{
						div.find('#con_li3').find('em').css('border','2px solid #00AF62');
						div.find('#con_li3').find('span').css('color','#00AF62');
					}
					if(n.or >=4)
					{
						div.find('#con_li4').find('em').css('border','2px solid #00AF62');
						div.find('#con_li4').find('span').css('color','#00AF62');
					}
					if(n.or >=5)
					{
						div.find('#con_li5').find('em').css('border','2px solid #00AF62');
						div.find('#con_li5').find('span').css('color','#00AF62');
					}
					str +=div[0].outerHTML;

				})
				if(num + 5 >= count)
					{
						$('.dian > .button1').css('display','none');
						$('.dian > .button2').css('display','block');
						
					}
				$('.divdiv').append(str);
			},
			error : function(data)
			{
				alert('加载失败!');
			}
			
			
			})
	})

	$('.right > ul li').on('click',function(){
		var index = $(this).attr('index');
		if( index == 1 )
		{
			return false;
		}
		
		var value = $(this).html();
		var ip = $(this).parent('ul').attr('index');

		$.ajax('/home/case/zaiajax/',{
			type : 'get',
			data:{ip:ip,value:value},
			success : function(data)
			{
				if(data == 1)
				{
					
					location.reload([true]);
				}else
				{
					alert('条件查询失败！请重试');
				}
			},
			error : function(data)
			{
				alert('条件查询失败！请重试');
			},
			dataType : 'json'
		})

	})
$(function(){
		yan = true;
		yans = false;
		time = 60;
		but = $('#button1');
		bot = $('#button3');
		
		$('#button1').on('click',function(){
			yan = true;
			border();
			yanss();
			if(yan == true)
			{	
				var phone = $('#label_4 > input').val();
				zendcode(phone);
			}
			
		})

		$('#button2').on('click',function(){
			border();
			if(yans && $('#label_5 > input').val() != '')
			{	
				yan = true;
				yanss();
				if(yan)
				{
					$.ajax('/newpro/register/yan',{
					type : 'get',
					data :　{phone:$("input[name='phone']").val(),yan:$("input[name='yan']").val()},
					success : function(data)
					{
						if(data == 1){
							$('form').submit();
						}
						if(data == 2)
						{
							alert('验证码错误！');
							return false;
						}
						if(data == 3)
						{
							alert('当前手机号未发送短信验证！');
							return false;
						}
					},
					error : function(data)
					{
						alert('验证码验证失败！');
						return false;
					}
				})
				}else
				{
					return false;
				}
				
			}else
			{
				$('#label_5').addClass('active');
				return false;
			}
		})

		function yanss()
		{
			var name = $('#label_2 > input').val();
			var password = $('#label_3 > input').val();
			var phone = $('#label_4 > input').val();
			$.each($('.yans'),function(i,n){
				if($(this).val() == false)
				{	
					$(this).parent('label').addClass('active');
					yan = false;
					return false;
				}
				if($(this).attr('name') == 'name')
				{
					var res1 = pern(name,/^[a-zA-z]\w{5,15}$/);
					if(!res1)
					{
						$(this).parent('label').addClass('active');
						$(this).parent('label').find('span').eq(0).css('display','block');
						yan = false;
						return false;
					}
					var chong = chongajax('name',name);
					if(chong == false)
					{
						$('#label_2').addClass('active');
						$('#label_2').find('span').eq(1).css('display','block');
						yan = false;
						return false;
					}
				}
				if($(this).attr('name') == 'password')
				{
					var res2 = pern(password,/^(\w){8,20}$/);
					if(!res2)
					{
						$(this).parent('label').addClass('active');
						$(this).parent('label').find('span').eq(0).css('display','block');
						yan = false;
						
						return false;
					}
				}
				if($(this).attr('name') == 'phone')
				{
					var res3 = pern(phone,/^[1][3,4,5,7,8][0-9]{9}$/);
					if(!res3)
					{
						$(this).parent('label').addClass('active');
						$(this).parent('label').find('span').eq(0).css('display','block');
						yan = false;
						return false;
					}
					var chong2 = chongajax('phone',phone);
					if(chong2 == false)
					{
						$('#label_4').addClass('active');
						$('#label_4').find('span').eq(1).css('display','block');
						yan = false;
						return false;
					}
				}

			})	
		}

		function zendcode(phone)
		{	
			$.ajax('/newpro/register/zendcode',{
				type : 'POST',
				data:{phone:phone,_token:$("meta[name='csrf-token']").attr('content')},
				success : function(data)
				{
					if(data == 'OK' || data == 'ok')
					{
						but.css('display','none');
						bot.css('display','block');
						bot.html(time+'秒后重试');
						clock = setInterval(doloop,1000);
						yans = true;
					}else
					{
						alert('短信发送失败！');
						return false;
					}
				},
				error : function(data)
				{
					alert('短信发送失败！');
					return false;
				}
			})
			
		}

		function doloop()
		{
			time --;
			if(time > 0)
			{
				bot.html(time+'秒后重试');
				return false;
			}else
			{
				clearInterval(clock);
				bot.css('display','none');
				but.css('display','block');
				time = 60;
			}
		}

		function chongajax(ors,init)
		{	
			var ini = false;
			$.ajax('/newpro/register/chongajax',{
				type : 'GET',
				async : false,
				data : {ors:ors,init:init},
				success :function(data)
				{
					if(data == 1)
					{
						ini = true;
					}else
					{
						ini = false;
					}
				},
				error :function(data)
				{
					alert('数据异常！');
				}
			})
			return ini;
		}

		function border()
		{
			$('label').removeClass('active');
			$('label').find('span').css('display','none');
		}
		function pern(str,per)
		{
			var re = per;
			  if(re.test(str))
			  {
			  	return true;
			  }else
			  {
			  	return false;
			  }
		}
})

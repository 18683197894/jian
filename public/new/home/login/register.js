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
						alert(yan);
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

		// init1 = null;
		// init2 = null;
		// init3 = null;
		// init4 = null;


		// $('#button2').on('click',function(){
			
		// 	if( init4 == true )
		// 	{	
		// 		var name = $('#label_2 > input').val();
		// 		var password = $('#label_3 > input').val();
		// 		var phone = $('#label_4 > input').val();
		// 		var init5 = true;
		// 		var res1 = pern(name,/^[a-zA-z]\w{5,15}$/);
		// 		var res2 = pern(password,/^(\w){8,20}$/);
		// 		var res3 = pern(phone,/^[1][3,4,5,7,8][0-9]{9}$/);

		// 		if(res1 == false)
		// 		{
		// 			$('#label_2 > input').css('border','1px solid red');
		// 			$('#label_2_1').css('display','block');
		// 			$('#label_2_2').css('display','none');
		// 			init5 = false;
		// 		}else
		// 		{
		// 			$('#label_2 > input').css('border','1px solid #ccc');
		// 			$('#label_2_1').css('display','none');
		// 			$('#label_2_2').css('display','none');

		// 			var nameper = ajax('/home/register/nameajax',name);
		// 			if( !nameper )
		// 			{	
		// 				init5 = false;
		// 				$('#label_2 > input').css('border','1px solid red');
		// 				$('#label_2_2').css('display','block');
		// 			}

		// 		}

		// 		if( res2 == false )
		// 		{	
		// 				init5 = false;
		// 				$('#label_3_1').css('display','block');
		// 				$('#label_3 > input').css('border','1px solid red');
		// 		}else
		// 		{

		// 				$('#label_3_1').css('display','none');
		// 				$('#label_3 > input').css('border','1px solid #ccc');
		// 		}

		// 		if( res3 == false )
		// 		{	
		// 			init5 = false;
		// 			$('#label_4 > input').css('border','1px solid red');
		// 			$('#label_4_1').css('display','block');
		// 			$('#label_4_2').css('display','none');

		// 		}else
		// 		{
		// 			$('#label_4_1').css('display','none');
		// 			$('#label_4_2').css('display','none');
		// 			$('#label_4 > input').css('border','1px solid #ccc');
		// 		}

		// 		if( init5 == true )
		// 		{
		// 			var yan = $('#label_5 > input').val();
		// 			if( yan != null )
		// 			{	
		// 				$('#label_5 > input').css('border','1px solid #ccc');
					
		// 				var res = yanajax(phone,yan);
		// 				if( res == 1)
		// 				{
		// 					$('#from').submit();
		// 				}else if( res ==2 )
		// 				{
		// 					alert('验证码有误!');
		// 				}else if( res == 3 )
		// 				{
		// 					alert('请先验证手机号');
		// 				}
		// 			}else if( yan == '' || yan == false )
		// 			{	
		// 				$('#label_5 > input').css('border','1px solid red');
		// 				return false;
		// 			}
		// 		}else
		// 		{
		// 			return false;
		// 		}

		// 	}else
		// 	{
		// 		$('#label_5 > input').css('border','1px solid red');
		// 		return false;
		// 	}
		// })
	
		// function yanajax(phone,yan)
		// {	
		// 	var res = false;
		// 	$.ajax('/home/register/yanajax',{
		// 		type:'post',
		// 	    data:{phone:phone,yan:yan,_token:$('meta[name="csrf-token"]').attr('content')},
		// 	    async: false,
		// 	    success : function(data)
		// 	    {
		// 	    	res = data
		// 	    },
		// 	    error : function(data)
		// 	    {
		// 	    	res = false;
		// 	    }
		// 	})

		// 	return res;
		// }
		// $('#button1').one('click',aaa);
		// function aaa(){
		// 	$('#label_5 > input').css('border','1px solid #ccc');
		// 	var name = $('#label_2 > input').val();
		// 	var password = $('#label_3 > input').val();
		// 	var phone = $('#label_4 > input').val();
		// 	btn = $(this);
		// 	bon = $("#button3");
		// 	var inputname = $('#label_2 > input');
		// 	var inputpassword = $('#label_3 > input');
		// 	var inputphone = $('#label_4 > input');
		// 	var clock = '';
		// 	var nums = 60;

		// 	if(name == null || name == '')
		// 	{
		// 		inputname.css('border','1px solid red');
		// 		$('#label_2_1').css('display','none');
		// 		$('#label_2_2').css('display','none')
		// 		init1 = null;
		// 	}else
		// 	{
		// 		var per = pern(name,/^[a-zA-z]\w{5,15}$/);
		// 		if(per)
		// 		{
		// 		inputname.css('border','1px solid #ccc');
		// 		$('#label_2_1').css('display','none');

		// 		var res = ajax('/home/register/nameajax',name);
		// 		if(res)
		// 		{
		// 			inputname.css('border','1px solid #ccc');
		// 			$('#label_2_1').css('display','none');
		// 			$('#label_2_2').css('display','none')
		// 			init1 = true;
		// 		}else
		// 		{
		// 			inputname.css('border','1px solid red');
		// 			$('#label_2_2').css('display','block')
		// 			init1 = null;

		// 		}

		// 		}else
		// 		{
		// 			inputname.css('border','1px solid red');
		// 			$('#label_2_1').css('display','block');
		// 			$('#label_2_2').css('display','none');
		// 		init1 = null;
		// 		}
		// 	}
				
		// 		if(password == null || password == '')
		// 		{	
		// 			init2 = null;
		// 			inputpassword.css('border','1px solid red');
		// 			$('#label_3_1').css('display','none');
		// 		}else
		// 		{
		// 			var per = pern(password,/^(\w){8,20}$/);
		// 			if(per)
		// 			{	
		// 				init2 = true;
		// 				$('#label_3_1').css('display','none');
		// 				inputpassword.css('border','1px solid #ccc');


		// 			}else
		// 			{
		// 				init2 = null;
		// 				$('#label_3_1').css('display','block');
		// 				inputpassword.css('border','1px solid red');

		// 			}
		// 		}

		// 		if( phone == null || phone == '' )
		// 		{	
		// 			init3 = null;
		// 			$('#label_4_1').css('display','none');
		// 			$('#label_4_2').css('display','none');
		// 			$('#label_4 > input').css('border','1px solid red');
		// 			$('#button1').one('click',aaa);
		// 			return false;
		// 		}else
		// 		{
		// 			var per = pern(phone,/^[1][3,4,5,7,8][0-9]{9}$/);
		// 			if(per)
		// 			{	
		// 				$('#label_4_1').css('display','none');
		// 				var res = ajax('/home/register/phoneajax',phone);
		// 				if(res)
		// 				{	
		// 					inputphone.css('border','1px solid #ccc');
		// 					$('#label_4_2').css('display','none');
		// 					init3 = true;
		// 				}else
		// 				{

		// 					inputphone.css('border','1px solid red');
		// 					$('#label_4_2').css('display','block');
		// 					init3 = null;
		// 					$('#button1').one('click',aaa);
		// 					return false;
		// 				}

		// 			}else
		// 			{
		// 				init3 = null;
		// 				inputphone.css('border','1px solid red');
		// 				$('#label_4_1').css('display','block');
		// 				$('#label_4_2').css('display','none');
		// 				$('#button1').one('click',aaa);
		// 				return false;
		// 			}
		// 		}
		// 		if( init1 == true && init2 == true && init3 == true)
		// 		{	
		// 	     $.ajax('/home/register/zendcode',{
		// 	     	type:'post',
		// 	     	data:{phone:phone,_token:$("meta[name='csrf-token']").attr('content')},
		// 	     	async: false,
		// 	     	success:function(data)
		// 	     	{	
		// 	     		if( data == 'OK' || data == 'ok' )
		// 	     		{
		// 					btn.css('display','none');	
		// 		 			bon.css('display','block');
		// 	     			sendCode();
		// 	     			init4 = true;
		// 	     		}else
		// 	     		{
		// 	     			alert('短信发送失败！'+data);
		// 	     			$('#button1').one('click',aaa);
		// 	     			init4 = null;
		// 	     		}
			     		
		// 	     	},
		// 	     	error:function(data)
		// 	     	{	
		// 	     		init4 = null;
		// 	     		$('#button1').one('click',aaa);
		// 	     		alert('发送失败!数据异常。');
		// 	     	},
		// 	     	dateType :'json'
		// 	     })
		// 		}else
		// 		{	
		// 			$('#button1').one('click',aaa);
		// 	     	init4 = false;
		// 			return false;
		// 		}

		// 		 function sendCode()
		// 		 { 
		// 		 
		// 		//  bon.disabled = true; //将按钮置为不可点击
		// 		 bon.html(nums+'秒后重试') ;
		// 		//  btn.css('background-color','#ccc');
		// 		 clock = setInterval(doLoop, 1000); //一秒执行一次
		// 		 }
		// 		 function doLoop()
		// 		 {
		// 		 nums--;
		// 		 if(nums > 0){
		// 		  bon.html(nums+'秒后重试');
		// 		 }else{
		// 		  clearInterval(clock); //清除js定时器
		// 		//   bon.disabled = false;
		// 		//   btn.css('background-color','#247652');
		// 		  btn.css('display','block');
		// 		  bon.css('display','none');
		// 		  $('#button1').one('click',aaa);
		// 		  nums = 10; //重置时间
				  
		// 		 }
		// 		 }
				
		// }
		// function pern(str,per)
		// {
		// 	var re = per;
		// 	  if(re.test(str))
		// 	  {
		// 	  	return true;
		// 	  }else
		// 	  {
		// 	  	return false;
		// 	  }
		// }

		// function ajax(url,str,){
		// 	var res = null
		// 	$.ajax(url,{
		//     	type : 'post',
		//     	async: false,
		//     	data:{str:str,_token:$('meta[name="csrf-token"]').attr('content')},
		//     	success:function(data)
		//     	{	
		//     		if(data == 1)
		//     		{
		// 				res = true;
		//     		}else if(data == 2)
		//     		{	
		   				
		//     			// $(span).css('display','block');
		//     			res = false;
		//     		}else
		//     		{	
		//     			res = true;
		//     			alert('数据异常');
		//     		}
		    		
		//     	},
		//     	error:function(data)
		//     	{	
		//     		res = false;
		//     		alert('数据异常');
		//     	}
		// 	})
		// 	return res;
		// }
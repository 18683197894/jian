<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}@if(!empty($title))  - {{$title}}@endif</title>
<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
<link href="{{ asset('home/images/images/common.css') }}" rel="stylesheet" type="text/css" />
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
	<style>
	#hade-a{
			width:100%;
			height:36px;
			background-color: #f5f5f5;
		}
		#hade-b{
			width:1200px;
			height:36px;
			margin:0 auto;
		}
		#login{
			width:294px;
			height:36px;
			float:right;

		}
		#login ul{
			width:294px;
			height:36px;
			overflow: hidden;
		}
		#login ul li a{
			color:#a6a6a6;

		}
		#loginli1{
			font-size: 16px;
			float:left;
			line-height: 36px;
			font-weight: normal;
			color:#a6a6a6;
			font-family: 'Hiragino Sans GB', 'Microsoft Yahei', '微软雅黑', Arial, sans-serif;
			/*cursor:pointer;*/
		}
		#loginli2{
			width:10px;
			height:17px;
			float:left;
			margin-right: 10px;
			margin-top: 10px;
			border-right:1px solid #ccc;
		}
		#hade-con{
			width:100%;
		}
		#con1{
			width:1200px;
			height:100px;
			margin:10px auto;
		}
		#con1img1{
			width:170px;
			height:57px;
			float:left;
			margin-top: 20px;
		}
		#con1 ul{
			float:left;
			width:500px;
			height:40px;
			margin-top:30px;
		}
		#con1 ul li {
			float:left;
		}
		#con1li1,#con1li3{
			width:17px;
			height:17px;
			float:left;
			margin-top:16px;
			margin-left:20px;
		}
		#con1li2,#con1li4{
			font-weight: normal;
			font-size: 16px;
			color:#E12E32;
			margin-top: 13px;
			margin-left: 10px;
		}
		#con1li5{
			width:20px;
			height:30px;
			margin-right: 10px;
			float:left;
			margin-top: 10px;
			border-right:1px solid #ccc;
		}
		#con1li6{
			font-weight: normal;
			font-size: 16px;
			color:#666;
			    font-family:"微软雅黑","黑体","宋体";
			margin-top: 13px;
			margin-left: 10px;
		}
		#con2{
			width:1200px;
			height:500px;
			margin:20px auto;

		}
		#con2-a{
			width:623px;
			height:415px;
			float:left;
			margin-left:50px; 
		}
		#con2-b{
			width:340px;
			height:340px;
			float:left;
			margin-top: 40px;
			margin-left: 100px;
			border:1px solid #ccc;
		}
		#con2-b-1{
			width:260px;
			height:340px;
			margin:0 auto;
		}
		#con2-b-1 label {
			width:260px;
			height:50px;
			display: block;
			margin:0 auto;
			position: relative;

		}
		#label_1{
			padding-top: 5px;
			text-align: center;
			margin-bottom: 10px;
		}
		#label_1 span{
			line-height: 50px;
			font-weight: 600;
			font-size: 20px;
			color:#E12E32;
		}
		#label_3,#label_4{
			margin-top:4px;
		}

		#label_2 input,#label_3 input,#label_4 input{
			width:260px;
			height:33px;
			border:1px solid #ccc;
			margin-top: 8px;
			color:#333;
			font-size: 16px;
			position: relative;
			text-indent: 10px;
			border-radius: 3px 3px 3px 3px;
		}
		#label_2_1,#label_2_2{
			/*display:none;*/
			font-weight: normal;
			font-size: 15px;
			color:red;
			left:150px;
			top:15px;
			display: none;
			position:absolute;
		}
		#label_3_1,#label_4_1,#label_4_2{
			font-weight: normal;
			font-size: 15px;
			color:red;
			left:150px;
			top:15px;
			display: none;
			position:absolute;
		}
		#label_6{
			padding-top: 8px;
		}
		#label_5 input{
			width:140px;
			height:32px;
			border:1px solid #ccc;
			margin-top: 8px;
			color:#333;
			font-size: 16px;
			text-indent: 10px;
			border-radius: 3px 3px 3px 3px;
			float:left;
		}
		#label_5 #button1{
			width:100px;
			height:32px;
			float:right;
			text-align:center;
			border-radius: 3px 3px 3px 3px;
			background-color:#529B7C;
			color:#fff;
			cursor:pointer;
			margin-top: 9px;
			font-weight: normal;
			line-height: 34px;
			font-size: 15px;
			border:none;
		}
		#label_5 #button3{
			width:100px;
			height:32px;
			display:block;
			float:right;
			text-align:center;
			border-radius: 3px 3px 3px 3px;
			background-color:#ccc;
			color:#fff;
			display: none;
			cursor:pointer;
			margin-top: 9px;
			font-weight: normal;
			line-height: 34px;
			font-size: 15px;
			border:none;
		}
		#label_5 #button1:active{
			background-color:#247652;

		}
		#label_6 button{
			width:260px;
			height:35px;
			text-align:center;
			background-color:#E12E32;
			color:#fff;
			border-radius: 3px 3px 3px 3px;
			cursor:pointer;
			font-weight: normal;
			font-size: 17px;
			border:none;
		}
		#label_6 button:active{
			background-color:#B71212;
		}
		#label_7 #label_7_a1{
			font-weight: normal;
			font-size:15px;
			color:red;
			float:left;
			margin-top: -4px;

		}
		#label_7 #label_7_a2{
			font-weight: normal;
			font-size:15px;
			color:#333;
			float:right;
		}
	</style>
<body>
	<div id="hade-a"> 
		<div id="hade-b">
			<div id="login">
				<ul>
					<li id="loginli1"><a href="{{ asset('/home/login') }}">登入</a></li>
					<li id="loginli2"></li>
					<li id="loginli1"><a href="{{ asset('/home/register') }}">注册</a></li>
					<li id="loginli2"></li>
					<li id="loginli1">热线电话：400-188-6585</li>
				</ul>
			</div>
		</div>
	</div>
	<div id="hade-con">
		<div id="con1">
			<a href="{{ asset('/') }}"><img id="con1img1" src="{{ asset('/home/images/logo.png') }}" alt=""></a>
			<ul>
				<li id="con1li1"><img src="{{ asset('/home/images/hade_2.png') }}" alt=""></li>
				<li id="con1li2">免费量房与报价</li>
				<li id="con1li3"><img src="{{ asset('/home/images/hade_1.png') }}" alt=""></li>
				<li id="con1li4">装修公司实力认证</li>
				<li id="con1li5"> </li>
				<li id="con1li6">欢迎登入</li>
			</ul>
		</div>
		<div id="con2">
			<div id="con2-a">
				<img src="{{ asset('home/images/logo/1.png') }}" alt="">
			</div>
			<div id="con2-b">
				<div id="con2-b-1">
				<form id="from" action="{{ url('/home/register/doreg') }}" method="POST">
				{{ csrf_field() }}
				<label id="label_1" for="">
					<span>新用户注册</span>
				</label>
				<label id="label_2">
					<input type="text" name="name" placeholder="用户名">
					<span id="label_2_1">用户名格式错误</span>
					<span id="label_2_2">该用户名已存在</span>
				</label>
				<label id="label_3">
					<input type="password" name="password" placeholder="密码">
					<span id="label_3_1">密码格式错误</span>
				</label>
				
				<label id="label_4">
					<input type="text" name="phone" placeholder="手机号">
					<span id="label_4_1">手机号格式错误</span>
					<span id="label_4_2">手机号已被注册</span>
				</label>
				<label id="label_5">
					<input type="text" name="yan" placeholder="验证码">
					<button id="button1" onClick="return false;">获取验证码</button>
					<button id="button3" onClick="return false;">获取验证码</button>
				</label>
				<label id="label_6">
					<button id="button2" onClick="return false;">立即注册</button>
				</label>
				<label id="label_7">
					<a id="label_7_a1" href="{{ url('/home/login') }}">已有账号？ 登入</a>
					<!-- <a id="label_5_a2" href="">忘记密码？</a> -->
				</label>
				</form>
				</div>
				
			</div>
		</div>
	</div>
	<script>
		init1 = null;
		init2 = null;
		init3 = null;
		init4 = null;


		$('#button2').on('click',function(){
			
			if( init4 == true )
			{	
				var name = $('#label_2 > input').val();
				var password = $('#label_3 > input').val();
				var phone = $('#label_4 > input').val();
				var init5 = true;
				var res1 = pern(name,/^[a-zA-z]\w{5,15}$/);
				var res2 = pern(password,/^(\w){8,20}$/);
				var res3 = pern(phone,/^[1][3,4,5,7,8][0-9]{9}$/);

				if(res1 == false)
				{
					$('#label_2 > input').css('border','1px solid red');
					$('#label_2_1').css('display','block');
					$('#label_2_2').css('display','none');
					init5 = false;
				}else
				{
					$('#label_2 > input').css('border','1px solid #ccc');
					$('#label_2_1').css('display','none');
					$('#label_2_2').css('display','none');

					var nameper = ajax('/home/register/nameajax',name);
					if( !nameper )
					{	
						init5 = false;
						$('#label_2 > input').css('border','1px solid red');
						$('#label_2_2').css('display','block');
					}

				}

				if( res2 == false )
				{	
						init5 = false;
						$('#label_3_1').css('display','block');
						$('#label_3 > input').css('border','1px solid red');
				}else
				{

						$('#label_3_1').css('display','none');
						$('#label_3 > input').css('border','1px solid #ccc');
				}

				if( res3 == false )
				{	
					init5 = false;
					$('#label_4 > input').css('border','1px solid red');
					$('#label_4_1').css('display','block');
					$('#label_4_2').css('display','none');

				}else
				{
					$('#label_4_1').css('display','none');
					$('#label_4_2').css('display','none');
					$('#label_4 > input').css('border','1px solid #ccc');
				}

				if( init5 == true )
				{
					var yan = $('#label_5 > input').val();
					if( yan != null )
					{	
						$('#label_5 > input').css('border','1px solid #ccc');
					
						var res = yanajax(phone,yan);
						if( res == 1)
						{
							$('#from').submit();
						}else if( res ==2 )
						{
							alert('验证码有误!');
						}else if( res == 3 )
						{
							alert('请先验证手机号');
						}
					}else if( yan == '' || yan == false )
					{	
						$('#label_5 > input').css('border','1px solid red');
						return false;
					}
				}else
				{
					return false;
				}

			}else
			{
				$('#label_5 > input').css('border','1px solid red');
				return false;
			}
		})
	
		function yanajax(phone,yan)
		{	
			var res = false;
			$.ajax('/home/register/yanajax',{
				type:'post',
			    data:{phone:phone,yan:yan,_token:$('meta[name="csrf-token"]').attr('content')},
			    async: false,
			    success : function(data)
			    {
			    	res = data
			    },
			    error : function(data)
			    {
			    	res = false;
			    }
			})

			return res;
		}
		$('#button1').one('click',aaa);
		function aaa(){
			$('#label_5 > input').css('border','1px solid #ccc');
			var name = $('#label_2 > input').val();
			var password = $('#label_3 > input').val();
			var phone = $('#label_4 > input').val();
			btn = $(this);
			bon = $("#button3");
			var inputname = $('#label_2 > input');
			var inputpassword = $('#label_3 > input');
			var inputphone = $('#label_4 > input');
			var clock = '';
			var nums = 60;

			if(name == null || name == '')
			{
				inputname.css('border','1px solid red');
				$('#label_2_1').css('display','none');
				$('#label_2_2').css('display','none')
				init1 = null;
			}else
			{
				var per = pern(name,/^[a-zA-z]\w{5,15}$/);
				if(per)
				{
				inputname.css('border','1px solid #ccc');
				$('#label_2_1').css('display','none');

				var res = ajax('/home/register/nameajax',name);
				if(res)
				{
					inputname.css('border','1px solid #ccc');
					$('#label_2_1').css('display','none');
					$('#label_2_2').css('display','none')
					init1 = true;
				}else
				{
					inputname.css('border','1px solid red');
					$('#label_2_2').css('display','block')
					init1 = null;

				}

				}else
				{
					inputname.css('border','1px solid red');
					$('#label_2_1').css('display','block');
					$('#label_2_2').css('display','none');
				init1 = null;
				}
			}
				
				if(password == null || password == '')
				{	
					init2 = null;
					inputpassword.css('border','1px solid red');
					$('#label_3_1').css('display','none');
				}else
				{
					var per = pern(password,/^(\w){8,20}$/);
					if(per)
					{	
						init2 = true;
						$('#label_3_1').css('display','none');
						inputpassword.css('border','1px solid #ccc');


					}else
					{
						init2 = null;
						$('#label_3_1').css('display','block');
						inputpassword.css('border','1px solid red');

					}
				}

				if( phone == null || phone == '' )
				{	
					init3 = null;
					$('#label_4_1').css('display','none');
					$('#label_4_2').css('display','none');
					$('#label_4 > input').css('border','1px solid red');
					$('#button1').one('click',aaa);
					return false;
				}else
				{
					var per = pern(phone,/^[1][3,4,5,7,8][0-9]{9}$/);
					if(per)
					{	
						$('#label_4_1').css('display','none');
						var res = ajax('/home/register/phoneajax',phone);
						if(res)
						{	
							inputphone.css('border','1px solid #ccc');
							$('#label_4_2').css('display','none');
							init3 = true;
						}else
						{

							inputphone.css('border','1px solid red');
							$('#label_4_2').css('display','block');
							init3 = null;
							$('#button1').one('click',aaa);
							return false;
						}

					}else
					{
						init3 = null;
						inputphone.css('border','1px solid red');
						$('#label_4_1').css('display','block');
						$('#label_4_2').css('display','none');
						$('#button1').one('click',aaa);
						return false;
					}
				}
				if( init1 == true && init2 == true && init3 == true)
				{	
					
			     $.ajax('/home/register/zendcode',{
			     	type:'post',
			     	data:{phone:phone,_token:$('meta[name="csrf-token"]').attr('content')},
			     	async: false,
			     	success:function(data)
			     	{	
			     		if( data == 'OK' )
			     		{
							btn.css('display','none');	
				 			bon.css('display','block');
			     			sendCode();
			     			init4 = true;
			     		}else
			     		{
			     			alert('短信发送失败！'+data);
			     			$('#button1').one('click',aaa);
			     			init4 = null;
			     		}
			     		
			     	},
			     	error:function(data)
			     	{	
			     		init4 = null;
			     		$('#button1').one('click',aaa);
			     		alert('发送失败!数据异常。');
			     	},
			     	dateType :'json'
			     })
				}else
				{	
					$('#button1').one('click',aaa);
			     	init4 = false;
					return false;
				}

				 function sendCode()
				 { 
				 
				//  bon.disabled = true; //将按钮置为不可点击
				 bon.html(nums+'秒后重试') ;
				//  btn.css('background-color','#ccc');
				 clock = setInterval(doLoop, 1000); //一秒执行一次
				 }
				 function doLoop()
				 {
				 nums--;
				 if(nums > 0){
				  bon.html(nums+'秒后重试');
				 }else{
				  clearInterval(clock); //清除js定时器
				//   bon.disabled = false;
				//   btn.css('background-color','#247652');
				  btn.css('display','block');
				  bon.css('display','none');
				  $('#button1').one('click',aaa);
				  nums = 10; //重置时间
				  
				 }
				 }
				
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

		function ajax(url,str,){
			var res = null
			$.ajax(url,{
		    	type : 'post',
		    	async: false,
		    	data:{str:str,_token:$('meta[name="csrf-token"]').attr('content')},
		    	success:function(data)
		    	{	
		    		if(data == 1)
		    		{
						res = true;
		    		}else if(data == 2)
		    		{	
		   				
		    			// $(span).css('display','block');
		    			res = false;
		    		}else
		    		{	
		    			res = true;
		    			alert('数据异常');
		    		}
		    		
		    	},
		    	error:function(data)
		    	{	
		    		res = false;
		    		alert('数据异常');
		    	}
			})
			return res;
		}


		// $('#label_4 > input').blur(function(){

		// 	if( init1 == null  )
		// 	{
		// 		$('#label_2 > input').css('border','1px solid red');
		// 	}
		// 	if( init2 == null  )
		// 	{
		// 		$('#label_3 > input').css('border','1px solid red');
		// 	}

		// 	var phone = $(this).val();
		// 	if( phone == '' || phone ==null)
		// 	{	
		// 		init3 = null;
		// 		$('#label_4_1').css('display','none');
		// 		$('#label_4_2').css('display','none');

		// 		$(this).css('border','1px solid red')
		// 		return false;
		// 	}
		// 	var myreg =  /^[1][3,4,5,7,8][0-9]{9}$/;  
		// 	if (myreg.test(phone)) 
		// 	{  
		// 		var inputphone = $(this);  		
		// 	  	$.ajax('/home/register/phoneajax',{
		// 	    	type : 'post',
		// 	    	// async: false,
		// 	    	data:{phone:phone,_token:$('meta[name="csrf-token"]').attr('content')},
		// 	    	success:function(data)
		// 	    	{	
		// 	    		if(data == 1)
		// 	    		{
			
		// 	   				inputphone.css('border','1px solid #ccc')
		// 	    			$('#label_4_1').css('display','none');
		// 	    			$('#label_4_2').css('display','none');

		// 	    		}else if(data == 2)
		// 	    		{	
		// 	    			init3 = null;
		// 	   				inputphone.css('border','1px solid red')
		// 	    			$('#label_4_1').css('display','none');
		// 	    			$('#label_4_2').css('display','block');
		// 	    		}else
		// 	    		{	
		// 	    			init3 = null;
		// 	    			alert('数据异常');
		// 	    		}
			    		
		// 	    	},
		// 	    	error:function(data)
		// 	    	{	
		// 	    		init3 = null;
		// 	    		alert('数据异常');
		// 	    	}
		// 	    })

		// 	}else
		// 	{  
		// 		$(this).css('border','1px solid red')
		// 		$('#label_4_1').css('display','block');
		// 		$('#label_4_2').css('display','none');
			     
		// 	}  
		// })

		// $('#label_3 > input').blur(function(){

		// 	if(init1 == null)
		// 	{	
		// 		$('#label_2 > input').css('border','1px solid red');
		// 		// return false;
		// 	}
		// 	var password = $(this).val();
		// 	if( password == '' || password ==null)
		// 	{	
		// 		init2 = null;
		// 		$(this).css('border','1px solid red')
		// 		return false;
		// 	}
			
		// 	var reg = new RegExp(/^(\w){8,20}$/);
			// }
			// }
			// }
  // 		  	if (reg.test(password))
  // 		  	{	
  // 		  		init2 = true;
		// 		$('#label_3_1').css('display','none');
		// 		$('#label_3 > input').css('border','1px solid #ccc');
  // 		  	}else
		// 	{	
		// 		init2 = null
		// 		$('#label_3 > input').css('border','1px solid red');
		// 		$('#label_3_1').css('display','block');
		// 	}
		// })



		// $('#label_2 > input').blur(function(){
		// 	var name = $(this).val();
		// 	var inputname = $(this);
		// 	$('#label_2_1').css('display','none');
		// 	$('#label_2_2').css('display','none');
		// 	if( name == '' || name ==null)
		// 	{	
		// 		init1 = null;
		// 		$(this).css('border','1px solid red')
		// 		return false;
		// 	}
		// 	  var re = /^[a-zA-z]\w{5,15}$/;
		// 	  if(re.test(name)){
			    

		// 	     $.ajax('/home/register/nameajax',{
		// 	    	type : 'post',
		// 	    	// async: false,
		// 	    	data:{name:name,_token:$('meta[name="csrf-token"]').attr('content')},
		// 	    	success:function(data)
		// 	    	{	
		// 	    		if(data == 1)
		// 	    		{
		// 	    			init1 = true;
		// 	   				inputname.css('border','1px solid #ccc')
		// 	    			$('#label_2_1').css('display','none');
		// 	    			$('#label_2_2').css('display','none');

		// 	    		}else if(data == 2)
		// 	    		{	
		// 	    			init1 = null;
		// 	   				inputname.css('border','1px solid red')
		// 	    			$('#label_2_1').css('display','none');
		// 	    			$('#label_2_2').css('display','block');
		// 	    		}else
		// 	    		{	
		// 	    			init1 = null;
		// 	    			alert('数据异常');
		// 	    		}
			    		
		// 	    	},
		// 	    	error:function(data)
		// 	    	{	
		// 	    		init1 = null;
		// 	    		alert('数据异常');
		// 	    	}
		// 	    })
		// 	  }else{
		// 		$(this).css('border','1px solid red')
		// 	    $('#label_2_1').css('display','block');
		// 	    return false;
		// 	  }  

			
		// })
	</script>
<div class="z-bot">
    <div class="z-bot1">
	    <ul>
		    <li class="z-li2">关于建商</li>
			<li><a href="{{ url('/jsgw/aboutus') }}">建商介绍</a></li>
			<li><a href="{{ url('/jsgw/tuandui') }}">建商团队</a></li>
			<li><a href="{{ url('/jsgw/zhanlui') }}">发展战略</a></li>
		</ul>
		<ul>
		   <li class="z-li2">建商服务</li>
		  <li><a href="{{ url('/jsgw/contact') }}">联系方式</a></li>
		</ul>
		<ul>
		   <li class="z-li2">建商标准</li>
		  <!--  <li><a href="">客厅验收标准</a></li>
		   <li><a href="">客厅验收标准</a></li>
		   <li><a href="">客厅验收标准</a></li>
		   <li><a href="">客厅验收标准</a></li> -->
		</ul>
		<div class="z-li3">
		   <b>联系我们</b>
		   <p class="z-p1 z-p0">服务热线：400-188-6585</p>
		   <p class="z-p1">邮箱：market@jianshanglianmeng.com</p>
		   <p class="z-p2">总部地址：</p><p class="z-p3">四川省宜宾市临港经济开发区西南互联网产业基地522</p>
		</div>
		<div class="z-li4"><b>关注我们</b></div>
	</div>
	<div class="z-bot2">
	    <div class="z-bot2-1">CopyRight 2017-2020建商联盟版权所有   ICP备案：蜀ICP备17010220号 </div>
	</div>
</div>
</body>
</html>
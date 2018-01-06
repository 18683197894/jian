
$(function(){
	var id = $('.payments_1ul2').attr('index');
	 a = setInterval(function(){

		payget(id,a);

	},3000);
	
})
// <img class="paymentspayok" src='/home/images/payment/payments/1.png' alt="">
// 			<span class="paymentspayok_span">订单支付成功！</span>
// 			<span class="paymentspayok_div"><em>30</em> 秒后自动返回 <a href="/">首页</a></span>
	
	function payget(id,a)
	{
		// alert(id);
		$.ajax('/payments/pay/paymentsget',{
			type : 'get',
			data : {id:id},
			success : function(data)
			{	
				
				
				if(data == 4)
				{
					alert('订单异常！请重新下单');
					clearInterval(a);
					window.location.href='/home/shoppingcart'
					return false;
				}
				if(data == 3)
				{
					alert('订单已失效！请重新下单');
					clearInterval(a);
					window.location.href='/'
				}
				if(data == 2)
				{
					console.log('false');
				}
				if(data == 1)
				{
					clearInterval(a);
					var div = $('.payments_2');
					div.find('ul').empty();
					div.append("<img class='paymentspayok' src='/home/images/payment/payments/1.png' alt=''>")
					div.append("<span class='paymentspayok_span'>订单支付成功！</span>")
					div.append("<span class='paymentspayok_div'><em>30</em> 秒后自动返回 <a href='/''>首页</a></span>")
					payok(30);
				}
			},
			error : function(data)
			{
				console.log('拉取失败！');
			}
			
		})
	}

	function payok(time)
	{	
		time = time -1;
		if(time <= 0)
		{
			clearInterval(b);
			window.location.href = '/';
		}
		var b = setInterval(function(){

			$('.paymentspayok_div > em').html(time);
			clearInterval(b);
			payok(time);
		},1000)
	}
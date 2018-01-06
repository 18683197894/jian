
$(function(){
	var id = $('.payments_1ul2').attr('index');
	 a = setInterval(function(){

		payget(id,a);

	},3000);
	
})
	
	function payget(id)
	{
		// alert(id);
		$.ajax('/payments/pay/paymentsget',{
			type : 'get',
			data : {id:id},
			success : function(data,a)
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
					window.location.href='/home/shoppingcart'
				}
				if(data == 2)
				{
					console.log('false');
				}
				if(data == 1)
				{
					alert('付款成功！将自动跳转自首页');
					clearInterval(a);
					window.location.href='/home/shoppingcart'
				}
			},
			error : function(data)
			{
				console.log('拉取失败！');
			}
			
		})
	}
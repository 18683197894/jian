
$(function(){
	var id = $('.Order').attr('index');
	 a = setInterval(function(){

		payget(id,a);

	},3000);
	
})

	function payget(id,a)
	{
		// alert(id);
		$.ajax('/newpro/payments/paymentsget',{
			type : 'get',
			data : {id:id},
			success : function(data)
			{	
				
				
				if(data == 4)
				{
					alert('订单异常！请重新下单');
					clearInterval(a);
					window.location.href='/newpro/shoppingcart'
					return false;
				}
				if(data == 2)
				{
					console.log('false');
				}
				if(data == 1)
				{
					clearInterval(a);
					$('.platform').css('display','none');
					$('.paid').css('display','block');
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
			window.location.href = '/newpro/center/my_orders';
		}
		var b = setInterval(function(){

			$('.paid > span').html(time);
			clearInterval(b);
			payok(time);
		},1000)
	}
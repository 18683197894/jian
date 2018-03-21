$(function(){
	var id = $('.information').attr('index');
	var a = setInterval(function(){
		getpay(id,a);
	},3000);

	function getpay(id,a)
	{
		$.ajax('/payments/pay/paymentsdiyget',{
			'type' : 'get',
			data : {id:id},
			success : function(data)
			{
				if(data == 1)
				{
					$('.Success').addClass('avtive')
					$('.yinc').addClass('avtive')
					console.log('true');
					clearInterval(a);
					return false;

				}else
				{
					console.log('false');
				}
			} 
		})
	}
})
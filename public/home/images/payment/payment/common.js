	
	$('.payment_hader > ul > li > div').on('click',function(){
		$('.payment_hader_defult').removeClass('payment_hader_defult');
		$(this).attr('class','payment_hader_defult');

		// $('.payment_hader_butdel').removeClass('payment_hader_butdel');
		$("button[name='del']").css('display','block');
		$(this).find("button[name='del']").css('display','none');
		return false;
	})
	$('.payment_hader_but > button').on('click',function(){
		alert(2)
		return false;
	})
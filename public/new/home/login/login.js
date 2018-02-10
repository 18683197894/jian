$('#label_4 > span').on('click',function(){
		var name = $('#label_2 > input').val();
		var password = $('#label_3 > input').val();
		$('#label_2 ').css('border','1px solid #ccc');
		$('#label_3 ').css('border','1px solid #ccc');
		
		if( name == null || name == '')
		{
			$('#label_2 ').css('border','1px solid red');
		}

		if(password == null || password == '')
		{
			$('#label_3 ').css('border','1px solid red');
			return false;
		}

		$('form').submit();
	})
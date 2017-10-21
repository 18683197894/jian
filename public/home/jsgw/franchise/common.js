$(".button").on('click',function(){
		$('.fran_5_1').find('input').css('border','1px solid #999');
		var name = $('.fran_5_1').find('input').eq(0).val();
		var email = $('.fran_5_1').find('input').eq(1).val();
		var phone = $('.fran_5_1').find('input').eq(2).val();
		var info = true;
		var regName =/^[\u4e00-\u9fa5]{2,4}$/;
		if(!regName.test(name)){
			$('.fran_5_1').find('input').eq(0).css('border','1px solid red');
			info = false;
		}
	    var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	    if(!myreg.test(email))
	    {
			$('.fran_5_1').find('input').eq(1).css('border','1px solid red');
			info = false;
	  	}
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
	    if(!myreg.test(phone)) 
       { 
			$('.fran_5_1').find('input').eq(2).css('border','1px solid red');
			info = false;
       }

       if(info == false)
       {
       	return false;
       }

         $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          
          })

         $.ajax('/jsgw/franchise/zmajax',{
         	type:'post',
         	data:{name:name,email:email,phone:phone},
         	success:function(data)
         	{
         		if(data ==1)
         		{	
         			$('.fran_5_1').find('input').val('');
         			alert('报名成功！稍后工作人员会与您联系。');
         		}else if(data ==2)
         		{	
         			alert('报名失败！请稍后再试。');
         		}else if(data ==3)
         		{	
         			$('.fran_5_1').find('input').val('');
         			alert('报名失败！你已预约过报名。');
         		}
         	},
         	error:function(data)
         	{
         			alert('报名失败！请稍后再试。');
         			
         	},
         	dataType:'json'
         })
         return false;
	})
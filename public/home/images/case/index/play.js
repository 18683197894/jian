$(function(){
	var nu = $(".win").attr('index');
	var win=$(".win");
	var divs=$(".box div");
	var num1=0;  //ǰݵ±
	var num2=0;
	$(".leftB").click(function(){

		divs.stop(true,true);
		var temp=num1;
		num1--;
		if(num1==-1){
			num1=nu -1 ;
		}
		var index = divs.eq(num1).attr('index')
		$('.con1_leftul > li').css('display','none');
		$('#index'+index).css('display','block');
		divs.eq(num1).css("left",904).animate({left:0});
		divs.eq(temp).animate({left:-904});
	});
	$(".rightB").click(function(){
	
		divs.stop(true,true);
		// divs.finish();
		var temp=num1;
		num1++;
		if(num1==nu){
			num1=0;
		}
		var index = divs.eq(num1).attr('index')
		$('.con1_leftul > li').css('display','none');
		$('#index'+index).css('display','block');
		// alert(divs.eq(num1).attr('index'))
		divs.eq(num1).css("left",-904).animate({left:0});
		divs.eq(temp).animate({left:904});
	});
});
		$('.con1_right button').on('click',function(){
			var uid = $(this).parent('.con1_right_con1').attr('index');
			var name = $(this).prevAll('label').eq(1).find('input').val();
			var phone = $(this).prevAll('label').eq(0).find('input').val();
			$(this).prevAll('label').eq(1).find('input').css('border','1px solid #dfdfdf');
			$(this).prevAll('label').eq(1).find('span').css('display','none');
			$(this).prevAll('label').eq(0).find('input').css('border','1px solid #dfdfdf');
			$(this).prevAll('label').eq(0).find('span').css('display','none');
			
			var regName =/^[\u4e00-\u9fa5]{2,4}$/;
			if(!regName.test(name))
			{
				$(this).prevAll('label').eq(1).find('input').css('border','1px solid red');
				$(this).prevAll('label').eq(1).find('span').css('display','block');
				return false;
			}
			var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
		    if(!myreg.test(phone)) 
	       { 
				$(this).prevAll('label').eq(0).find('input').css('border','1px solid red');
				$(this).prevAll('label').eq(0).find('span').css('display','block');
				return false;
	       }
	       var inp1 = $(this).prevAll('label').eq(1).find('input');
	       var inp2 = $(this).prevAll('label').eq(0).find('input');
	       $.ajax({
	       	url : '/home/case/play/ajax',
	       	type : 'post',
	       	data : {uid:uid,name:name,phone:phone,_token:$('meta[name="csrf-token"]').attr('content')},
	       	success : function(data)
	       	{
	       		if(data == 3)
	       		{
	       			inp1.val('');
	       			inp2.val('');
	       			alert('你已提交！ 无须再次提交');
	       		}
	       		if(data == 1)
	       		{
	       			inp1.val('');
	       			inp2.val('');
	       			alert('提交成功！ 工作人员会尽快与你联系');
	       		}
	       		if(data == 2)
	       		{
	       			
	       			alert('提交失败！ 请重试');
	       		}
	       	},
	       	error : function(data)
	       	{
	       		alert('提交失败！请重试');
	       	}

	       })

		})
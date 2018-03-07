$('.tijiao').on('click',function(){
		qing();
		$.each($('input'),function(){
			if($(this).val() == '')
			{
				$(this).css('border','1px solid red');
				return false;
			}
		})
		var yuan = $("input[name='yuan']").val();
		var newp = $("input[name='new']").val();
		var newp_s = $("input[name='news']").val();
		if(!/^[0-9A-Za-z]{8,16}$/.test(yuan))
		{
			$("input[name='yuan']").css('border','1px solid red');
			return false;
			
		}
		if(!/^[0-9A-Za-z]{8,16}$/.test(newp))
		{
			$("input[name='new']").css('border','1px solid red');
			return false;

		}
		if(!/^[0-9A-Za-z]{8,16}$/.test(newp_s))
		{
			$("input[name='news']").css('border','1px solid red');
			return false;
		}
		if(newp !== newp_s)
		{
			$('.used_mm').addClass('avtive');
			return false;
		}
		$.ajax('/newpro/center/my_modify/passajax',{
			type : 'POST',
			data : {yuan:yuan,newp:newp,newp_s:newp_s,_token:$("meta[name='csrf-token']").attr('content')},
			success : function(data)
			{
				if(data == 1)
				{
					alert('密码更新成功！');
					qing();
					return false;
				}else if(data == 2)
				{
					alert('密码错误');
					$('.used_cw').addClass('avtive');
				}else if(data == 3)
				{
					alert('原密码新密码不能一致！');
					return false;
				}else if(data == 4)
				{
					alert('用户不存在！');
					return false;
				}else if(data ==5)
				{
					alert('密码更新失败！');
					return false;
				}
			},
			error :　function(data)
			{
				alert('密码更新失败！');
				qing();
				return false;
			}
		})
	})

	function qing(){
		$("input").css('border','1px solid #DADADA');
		$('.used_mm').removeClass('avtive');
		$('.used_cw').removeClass('avtive');
	}
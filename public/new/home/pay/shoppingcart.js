
	$(document).ready(function(){
		zong();
	})
	$(".quan").click(function(){
        if(this.checked){
            $(".con :checkbox").prop("checked", true);
        	zong();

        }else{
            $(".con :checkbox").prop("checked", false);
            zong();
        }
    });
    $("input[index='xuan']").on('click',function(){ zong() });
	$('.cz i').on('click',function(){
		var id = $(this).parents('.con').find("input[type='checkbox']").attr('id');
		var con = $(this).parents('.con');
		$.ajax('/newpro/shoppingcart/ajax',{
			type : 'get',
			data :　{ors:'del','id':id},
			success :　function(data)
			{
				if(data)
				{
					con.remove();
					alert('删除成功！');
					zong();
				}else
				{
					alert('删除失败！');
					return fasle;
				}
			},
			error : function(data)
			{
				alert('删除失败！');
				return fasle;
			}
		})
	})

	$(".jian").on('click',function(){
		var num = $(this).siblings('span').html();
		var dan = parseFloat($(this).parents('.con').find('.jiage').html());
		var id = $(this).parents('.con').find("input[type='checkbox']").attr('id');
		var con = $(this).parents('.con');

		if(num <= 1 ) return false;
		if($(this).parents('.num').attr('index') == 'qing' && num <= 10) return false;
		$.ajax('/newpro/shoppingcart/ajax',{
			type : 'get',
			data :　{ors:'jian',id:id},
			success : function(data)
			{
				if(data)
				{
					con.find('.box').html(data);
					con.find('.jie').html((dan * data).toFixed(2));
					zong();

				}else
				{
					return false;
				}
			},
			error : function(data)
			{
				alert('操作失败！');
				return false;
			}
		})
	})
	$(".jia").on('click',function(){
		var num = $(this).prev('span').html();
		var dan = parseFloat($(this).parents('.con').find('.jiage').html());
		var id = $(this).parents('.con').find("input[type='checkbox']").attr('id');
		var con = $(this).parents('.con');

		if(num >= 10 && $(this).parents('.num').attr('index') != 'qing' && num < 999)
		{ 
			alert('超出限制!');
			return false
		};
		if($(this).parents('.num').attr('index') == 'qing')
		{
			var ors = 'jias';
		}else
		{
			var ors = 'jia';
		}
		$.ajax('/newpro/shoppingcart/ajax',{
			type : 'get',
			data :　{ors:ors,id:id},
			success : function(data)
			{
				if(data)
				{
					con.find('.box').html(data);
					con.find('.jie').html((dan * data).toFixed(2));
					zong();
				}else
				{
					return false;
				}
			},
			error : function(data)
			{
				alert('操作失败！');
				return false;
			}
		})
	})

	function zong()
	{	
		var zongjia = 0;
		var tail = $("input[index='xuan']").length;
		var num = 0;
		$.each($(" input[index='xuan']:checked "),function(){
			num ++;
			zongjia += parseFloat( $(this).parents('.con').find('.jie').html());
		})
		$('.shop').find('span').eq(0).html(tail);
		$('.shop').find('span').eq(1).html(num);
		$('.Total').find('span').eq(0).html(zongjia.toFixed(2));
	}
	$(".num > .divse span").one('click',aaa);
	function aaa(){
		var index = $(this).parents('.num').attr('index');
		if(index == 'qing')
		{	
			var dan = parseFloat($(this).parents('.con').find('.jiage').html());
			var num = $(this).html();
			var ss = $(this).parents('.num');
			var inp = $("<input type='text' class='inp'  value='"+num+"' style='text-align:center; font-size:18px;color:#010101;margin-left:36px;margin-top:47px;width:108px;height:28px;border:1px solid #ccc;'>");
			var num_r = $(this).parent('.divse').clone(true);
			var jie = $(this).parents('.con').find('.jie');
			$(this).parent('.divse').html(inp);
			inp.focus();
			inp.on('blur',function(){
				var reg = /^[\d]{1,3}$/;
				
				if(reg.test(inp.val()))
				{	
					
					if(num !== inp.val() && inp.val() >= 10)
					{
					var id = $(this).parents('.con').find("input[type='checkbox']").attr('id');
					$.ajax('/newpro/shoppingcart/ajax',{
						type : 'get',
						data :　{ors:'qing',id:id,num:inp.val()},
						success : function(data)
						{
							if(data)
							{
								num_r.find('span').html(data);
								ss.html(num_r);
								jie.html(data * dan);
								zong();
							}else
							{
								alert('数量修改失败！');
								num_r.find('span').html(num);
								ss.html(num_r);
								jie.html(num * dan);
								zong();
							}
						},
						error : function(data)
						{	
							alert('数量修改失败！');
							num_r.find('span').html(num);
							ss.html(num_r);
							jie.html(num * dan);
							zong();
						}
					})

				}else
				{
					num_r.find('span').html(num);
					$(this).parent('.divse').remove();
					ss.append(num_r);
					jie.html(num * dan);
					zong();

				}
				}else
				{
					alert('输入错误！');
					num_r.find('span').html(num);
					$(this).parent('.divse').remove();
					ss.append(num_r);
					jie.html(num * dan);
					zong();

				}
			})
		}else
		{
			return false;
		}
		num_r.find('span').one('click',aaa);
}	
		

	var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9+/=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/rn/g,"n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}} 
	$(document).ready(function(){
		zong();
	})
	$('.money > button').on('click',function(){
		var data,url;
		var id = '';
		$.each($(" input[index='xuan']:checked "),function(){
			id += $(this).attr('id')+',';
		});
		var rom = $('.Total input[name="rom"]').val();
		var reg = /^[\d]{1,3}$/;
				
		if(!reg.test(rom) || rom < 10)
		{
			alert('请输入正确的房屋面积 10~999');
			return false;
		}
		if(id == undefined || id == '')
		{
			alert('请选中商品');
			return false;
		}
		data = Base64.encode(id);
		rom = Base64.encode(rom);
		url = '/newpro/payment?data='+data+'&rom='+rom;
		window.location.href = url;
	})
	
	// $(".quan").click(function(){
 //        if(this.checked){
 //            $(".con :checkbox").prop("checked", true);
 //        	zong();

 //        }else{
 //            $(".con :checkbox").prop("checked", false);
 //            zong();
 //        }
 //    });


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
		

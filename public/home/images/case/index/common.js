
	$('.right > ul li').one('click',tiao);
		
	function tiao()
	{	
		var li = $(this);
		var index = $(this).attr('index');
		if( index == 1 )
		{
			return false;
		}
		var value = $(this).html();
		var ip = $(this).parent('ul').attr('index');

		$.ajax('/home/case/tiaoajax/',{
			type : 'get',
			async : false,
			data:{ip:ip,value:value},
			success : function(data)
			{
				if(data == 1)
				{
					
					location.reload([true]);
				}else
				{	
					li.one('click',tiao);
					// alert('条件查询失败！请重试');
				}
			},
			error : function(data)
			{	
					li.one('click',tiao);

				// alert('条件查询失败！请重试');
			},
			dateType : 'json'
		})
	}
$.fn.selectDate = function(){
			var minYear = 1950;
			var maxYear = (new Date).getFullYear();
			var yearSel = document.getElementById('year');
			var monthSel = document.getElementById('month');
			var daySel = document.getElementById('days');
	
			for(var y = maxYear;y >= minYear;y--){
				var yearOpt = document.createElement('option');
				yearOpt.value = y;
				yearOpt.innerHTML = y+'年';
				yearSel.appendChild(yearOpt)
			}

			$("#year").click(function(event){
				if(!$("#year option:selected").val()) return;
				removeOption(monthSel);
				addOption(12,'月',monthSel);
				removeOption(daySel)
			});

			$("#month").click(function(){
				removeOption(daySel);
				var year = $("#year option:selected").val();
				var month = $("#month option:selected").val();
				if(month==1 || month==3 || month==5 || month==7 || month==8 || month==10 || month==12){
					addOption(31,'日',daySel)
				}else if(month==4 || month==6 || month==9 || month==11){
					addOption(30,'日',daySel)
				}else if(month==2){
					if((year%4 == 0 && year%100 != 0 ) || (year%400 == 0)){
						addOption(29,'日',daySel)
					}else{	
						addOption(28,'日',daySel)
					}
				}
			});

			function addOption(num,unit,parent){
				//num：选项个数
				//unit：单位（年/月/日）
				//parent：父对象
				for(var index=1;index <= num;index++){
					var opt =document.createElement('option');
					$(opt).attr('value',index);
					if(index<10){index = '0'+index}
					$(opt).html(index+unit);
					$(parent).append(opt)
				}
			}
			
			function removeOption(parent){
				//parent：父对象
				var options = $(parent).find('option');
				for(var index = 1;index < options.length;index++){
					parent.removeChild(options[index])
				}
			}
		};

		$(function(){
        $("#date").selectDate();

        $("#days").focusout(function(){
            var year = $("#year option:selected").html();
            var month = $("#month option:selected").html();
            var day = $("#days option:selected").html();
            // console.log(year+month+day)
        })

    })

	$('.click_Ok > a').eq(1).on('click',function(){
    		$(".Basics").removeClass("avtive");

	})
	$('.click_Ok > a').eq(0).on('click',function(){
    		var names = $("input[type='text']").val();
    		if(!/^[\u4e00-\u9fa5]{2,6}$/.test(names))
    		{
    			alert('请输入中文姓名！');
    			return false;
    		}
    		var nian = $('#year').val();
    		var yue = $('#month').val();
    		var ri = $('#days').val();
    		if(!nian || !yue || !ri)
    		{
    			alert('请选择你的生日！');
    			return false;
    		}

    		var date = nian+'-'+yue+'-'+ri;
    		var sex = $('.sex_a').val();
    		$.ajax('/newpro/center/my_metion/ajax',{
    			type : 'post',
    			data : {names:names,date:date,sex:sex,_token:$("meta[name='csrf-token']").attr('content')},
    			success : function(data)
    			{
    				if(data == 1)
    				{
						$('.names').html('姓名：'+names);    					
						$('.dates').html('生日：'+date);    					
						$('.sexs').html('性别：'+sex);  
        				$(".Basics").removeClass("avtive");

    				}else 
    				{
    					alert('个人信息更新失败！');
    					return false;
    				}
    			},
    			error : function(data)
    			{
    				alert('个人信息更新失败！');
    				return false;
    			}
    		})

	})
		
	$('button').on('click',function(){
		if(!$("input[type='file']").val())
		{
			alert('请先选择上传的图片！');
			return fasle;
		}else
		{
			$('form').submit();
		}
	})

	$(".modify .jichu").click(function(){
       $(".Basics").addClass("avtive");
    });
    // $(".Basics .OK").click(function(){
    //     $(".Basics").removeClass("avtive");
    // });
    // $(".modify .gex").click(function(){
    //     $(".gaoji").addClass("avtive");
    // });
    // $(".gaoji a").click(function(){
    //     $(".gaoji").removeClass("avtive");
    // });
$(function(){
	$(".select").each(function(){
		var s=$(this);
		var z=parseInt(s.css("z-index"));
		var dt=$(this).children("dt");
		var dd=$(this).children("dd");
		var _show=function(){dd.slideDown(200);dt.addClass("cur");s.css("z-index",z+1);};   //展开效果
		var _hide=function(){dd.slideUp(200);dt.removeClass("cur");s.css("z-index",z);};    //关闭效果
		dt.click(function(){dd.is(":hidden")?_show():_hide();});
		dd.find("a").click(function(){dt.html($(this).html());_hide();});     
		//选择效果（如需要传值，可自定义参数，在此处返回对应的“value”值 ）

		$("body").click(function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});
	})
})
	$(".button").on('click',function(){
		var text = $(".text");
		var dt1 = $(".dt1").html();
		var dt2 = $(".dt2").html();
		var dt3 = $(".dt3").html();
		alert(dt1);
		alert(dt2);
		alert(dt3);
		var textreg =/^\d{1,3}$/;
		if (!textreg.test(text.val())) {
		$(".text").attr('placeholder','');
		$(".text").val('');
		$('.label1span1').css('display','block');
		return false;
		}
		var phone = $('.phone').val();
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
	    if(!myreg.test(phone)) 
       { 
				$(".phone").attr('placeholder','');
		 		$(".phone").val('');
				$('.label3span1').css('display','block');
            return false; 
       }

	})
	$('.label1span1').on('click',function(){
		$(".text").attr('placeholder','输入你的房屋面积');
		$(this).css('display','none');
		$(".text").val("").focus(); 
	})
	$(".text").focus(function(){
		$('.label1span1').css('display','none');

		$(".text").attr('placeholder','输入你的房屋面积');
	});

	$('.label3span1').on('click',function(){
		$(".phone").attr('placeholder','输入你的电话号码');
		$(this).css('display','none');
		$(".phone").val("").focus(); 
	})
	$(".phone").focus(function(){
		$('.label3span1').css('display','none');

		$(".phone").attr('placeholder','输入你的电话号码');
	});
$(".am4_left_ul > li").on('click',function(i,n){
		var index = $(this).index();
		$(".am4_left_ul >li").css('color','#939393');
		$(".am4_left_ul >li").css('font-size','17px');
		$(this).css('color','#444');
		$(this).css('font-size','18px');
		$(".am4_right>ul").css('display','none');
		$(".am4_right>ul").eq(index).css('display','block');

	})

	$(".am2_ul1 > li").hover(function () {
		$(this).find('div').css('display','block');
	},function () {
		$(this).find('div').css('display','none');
	});
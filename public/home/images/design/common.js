$(".desnvaul>li").on('click',function(i,n){
			$(".desnvaul>li").attr('class','');
			$(this).attr('class','color');
			var index = $(this).attr('index');
			$(".des3con").css('display','none');
			$("#dessj"+index).css('display','block');
		})
		$(".des3con> ul > li").hover(
		  function () {
		    var span = $(this).find("span");
		    var div = $(this).find("div");
		    span.css('display','block');
		    $(this).find('img').css('-webkit-transform','scale(1.5)');
		    $(this).find('img').css('-webkit-transition','1s'); 
		  
		    $(this).find('img').css('transform','scale(1.5)');
		    $(this).find('img').css('transition','1s');
		    
		     $(this).find('img').css('-moz-transform','scale(1.5)');
		    $(this).find('img').css('-moz-transition','1s');

		     $(this).find('img').css('-ms-transform','scale(1.5)');
		    $(this).find('img').css('-ms-transition','1s');

		    $(this).find('img').css('-o-transform','scale(1.5)');
		    $(this).find('img').css('-o-transition','1s');
		    // div.css('display','block');
		},
		  function () {
		    var span = $(this).find("span");
		    var div = $(this).find("div");
		   	span.css('display','none');
		    $(this).find('img').css('-webkit-transform','scale(1)');
		    $(this).find('img').css('-webkit-transition','1s'); 
		  
		    $(this).find('img').css('transform','scale(1)');
		    $(this).find('img').css('transition','1s');
		    
		     $(this).find('img').css('-moz-transform','scale(1)');
		    $(this).find('img').css('-moz-transition','1s');

		     $(this).find('img').css('-ms-transform','scale(1)');
		    $(this).find('img').css('-ms-transition','1s');

		    $(this).find('img').css('-o-transform','scale(1)');
		    $(this).find('img').css('-o-transition','1s');
		  }
		);
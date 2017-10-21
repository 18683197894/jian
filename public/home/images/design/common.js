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
		    div.css('display','block');
		},
		  function () {
		    var span = $(this).find("span");
		    var div = $(this).find("div");
		   	span.css('display','none');
		    div.css('display','none');
		  }
		);
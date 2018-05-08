	$(".Sort a").click(function(){
        $(".Sort a").removeClass("avtive").eq($(this).index()).addClass("avtive");
        $(".content .Loop").removeClass("avtive").eq($(this).index()).addClass("avtive");
    });

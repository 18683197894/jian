 $(".img_click a").click(function(){
        $(".img_click a").removeClass("avtive").eq($(this).index()).addClass("avtive");
        $(".img_top a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    })
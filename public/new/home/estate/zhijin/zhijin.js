
$(".img_click a").click(function(){
        $(".img_click a").removeClass("avtive").eq($(this).index()).addClass("avtive");
        $(".img_top a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    });
    $(".tab a").click(function(){
        $(".tab a").removeClass("avtive").eq($(this).index()).addClass("avtive");
        var a = $(this).index();
        if(a === 0){
            $(".dontai .mask").css("margin-left","0");
        }else{
            if(a ===1){
                $(".dontai .mask").css("margin-left","-100%");
            }else{
                $(".dontai .mask").css("margin-left","-200%");
            }
        }
    });
$(".img_click a").click(function(){
        $(".img_click a").removeClass("avtive").eq($(this).index()).addClass("avtive");
        $(".img_top a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    });
    var dianji = 0;
    $(".dianji").click(function(){
        dianji++;
        if(dianji%2 == 0){
            $(".dianji").removeClass("avtive");
            $(".content_con .con_right").removeClass("avtive");
        }else{
            $(".dianji").addClass("avtive");
            $(".content_con .con_right").addClass("avtive");
        }

    });
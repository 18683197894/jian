$(".logistics a").click(function(){
    $(".logistics a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    $(".con .loop").removeClass("avtive").eq($(this).index()).addClass("avtive");
});
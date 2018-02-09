$(" .one1 .contact .Style a").click(function(){
    $(".one1 .contact .Style a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    $('.one1 .detailed .detailed_img').removeClass("avtive").eq($(this).index()).addClass("avtive");
});
$(".one2 .contact .Style a").click(function(){
    $(".one2 .contact .Style a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    $('.one2 .detailed .detailed_img').removeClass("avtive").eq($(this).index()).addClass("avtive");
});
$(".one3 .contact .Style a").click(function(){
    $(".one3 .contact .Style a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    $('.one3 .detailed .detailed_img').removeClass("avtive").eq($(this).index()).addClass("avtive");
});


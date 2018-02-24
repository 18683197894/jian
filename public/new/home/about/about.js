/**
 * Created by Administrator on 2018\2\22 0022.
 */


$(".Choice .Choice_a a").click(function(){
    $(".Choice .Choice_a a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    $('.Sorts .Sorts_lower').removeClass("avtive").eq($(this).index()).addClass("avtive");
});
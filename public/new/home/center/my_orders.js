/**
 * Created by Administrator on 2018\3\2 0002.
 */

$(".My_order a").click(function(){
    $(".My_order a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    $(".goods .goods_loop").removeClass("avtive").eq($(this).index()).addClass("avtive");
});

var num = 0;
$(".goods_loop .goods_loop_a .shop .right a").click(function(){
    num++;
    if(num%2 == 0){
        $(this).parent().parent().parent().parent().removeClass("avtive");
    }else{
        $(this).parent().parent().parent().parent().addClass("avtive");
    }

});

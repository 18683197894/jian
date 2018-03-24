/**
 * Created by Administrator on 2018\3\21 0021.
 */

$(".nav a").click(function(){
    $(".nav a").removeClass("avtive").eq($(this).index()).addClass("avtive")
})
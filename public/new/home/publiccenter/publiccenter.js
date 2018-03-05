/**
 * Created by Administrator on 2018\3\2 0002.
 */


var num = 0 ;
$(".snajiao").click(function(){
    num++;
    if(num%2 == 0){
        $(".contact_left").removeClass("avtive");
        $(".snajiao").removeClass("avtive");
    }else{
        $(".contact_left").addClass("avtive");
        $(".snajiao").addClass("avtive");
    }
});
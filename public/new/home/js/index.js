/**
 * Created by Administrator on 2018\1\9 0009.
 */



function nav(){
    var nav_nmu = 0;
    var bottin = $(".header_atou .botton");
    var nav = $(".header_atou .nav");
    bottin.click(function(){
        nav_nmu++;
        if(nav_nmu%2 == 0){
            nav.removeClass("avtive");
        }else{
            nav.addClass("avtive");
        }
    })
}nav();
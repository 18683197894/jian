/**
 * Created by Administrator on 2018\2\1 0001.
 */

$('input').click(function(event){
   $(".bg").addClass("active")
});

$("input").blur(function(){
    $(".bg").removeClass("active")
});
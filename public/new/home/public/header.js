/**
 * Created by Administrator on 2018\3\21 0021.
 */

$(".nav a").click(function(){
    $(".nav a").removeClass("avtive").eq($(this).index()).addClass("avtive")
});


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

$('.click > a').on('click',function()
{
    var val = $(this).parents('form').find('input').val();
    if(val == '' || val == undefined)
    {
        return false;
    }else
    {
        $(this).parents('form').submit();
    }
})
$('input[name="sou"]').keydown(function(event)
{
    var code = event.keyCode;
    var val = $(this).val();

    if(code == 13)
    {
        if(val == '' || val == undefined)
        {
            return false;
        }else
        {
            $(this).parents('form').submit();
        }
    }
    
})
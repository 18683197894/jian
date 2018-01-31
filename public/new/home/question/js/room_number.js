/**
 * Created by Administrator on 2018\1\31 0031.
 */




$(".Next a").click(function(){
    if(!($('.number').val()=='')){
       $('form').submit();
    }else{
        $(".room").addClass("active")
    }
});
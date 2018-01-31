/**
 * Created by Administrator on 2018\1\31 0031.
 */


$(".Next a").click(function(){
    

    var reg= /^[\u4e00-\u9fa5]+$/;
    if(!($('.name').val()=='')){
        if(reg.test($("input[type=text]").val())){
            
            $('form').submit()//验证成功跳转
        }else{
          
            $(".hanzi").addClass("active")
        }
    }else{
     
        $(".tishi").addClass("active")
    }
});
/**
 * Created by Administrator on 2018\1\31 0031.
 */


$(".Next_a").click(function(){
    var reg= /^[\u4e00-\u9fa5]+$/;
    var name = $('.name').val();
    var str   =   name.replace(/^\s+|\s+$/g,"");
    if(!(str=='')){
        if(reg.test(str)){
            var yanz=$('input:radio[name="sex"]:checked').val();
            if(yanz==null){
                $(".xuanz").addClass("active")
            }else{
                $('form').submit();//验证成功跳转
            }
        }else{
            $(".hanzi").addClass("active")
        }
    }else{
        $(".tishi").addClass("active")
    }
});
$(document).keydown(function(event) {
    if (event.keyCode == 13) {
        var reg= /^[\u4e00-\u9fa5\s]+$/;
        if(!($('.name').val()=='')){
            if(reg.test($("input[type=text]").val())){
                var yanz=$('input:radio[name="sex"]:checked').val();
                if(yanz==null){
                    $(".xuanz").addClass("active")
                    return false;
                }else{
                    
                    $('form').submit();//验证成功跳转
                }
            }else{
                    

                $(".hanzi").addClass("active")
                 return false;
            }
        }else{
                   

            $(".tishi").addClass("active")
             return false;
        }
    };
  
});
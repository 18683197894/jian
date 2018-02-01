/**
 * Created by Administrator on 2018\1\31 0031.
 */

$(".Next_a").click(function(){
    var RegCellPhone = /^(1)([0-9]{10})?$/;
    var str   =   $("input[type=text]").val().replace(/^\s+|\s+$/g,"");
    if(RegCellPhone.test(str)){
                $('form').submit();//验证成功跳转
        
    }else{
        $(".Ok").addClass("active")
    }
});

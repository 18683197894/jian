/**
 * Created by Administrator on 2018\1\31 0031.
 */

$(".Next a").click(function(){
    var RegCellPhone = /^(1)([0-9]{10})?$/;
    if(RegCellPhone.test($("input[type=text]").val())){
        $('form').submit();
    }else{
        $(".Ok").addClass("active")
    }
});

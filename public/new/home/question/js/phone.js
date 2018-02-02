/**
 * Created by Administrator on 2018\1\31 0031.
 */

$(".Next_a").click(function(){
    var RegCellPhone = /^(1)([0-9]{10})?$/;
    var str   =   $("input[type=text]").val().replace(/^\s+|\s+$/g,"");
    if(RegCellPhone.test(str)){
                $('form').submit();//ÑéÖ¤³É¹¦Ìø×ª
        
    }else{
        $(".Ok").addClass("active")
    }
});
$(document).keydown(function(event) {
	
    if (event.keyCode == 13) {
    	
        var RegCellPhone1 = /^(1)([0-9]{10})?$/;
        if(RegCellPhone1.test($("input[type=text]").val())){
            $('form').submit();//ÑéÖ¤³É¹¦Ìø×ª
        }else{
            $(".Ok").addClass("active");
            return false;
        }
        }
        
});
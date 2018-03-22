function isfloat(oNum){

 if(!oNum) return false;

 var strP=/^\d+(\.\d+)?$/;

 if(!strP.test(oNum)) return false;

 try{

  if(parseFloat(oNum)!=oNum) return false;

 }catch(ex){

   return false;

 }

 return true;

}
    $(".bott a").click(function(){
        var RegCellPhone = /^(1)([0-9]{10})?$/;
        var reg= /^[\u4E00-\u9FA5]{2,4}$/;
        if(($('.D_input .contract').val()=='')){
            $(".bott .Prompt").html("请输入合同编号！")
        }else{
            if(($('.D_input .name').val()=='')){
                $(".bott .Prompt").html("请输入您的姓名！")
            }else{
                if(reg.test($(".D_input .name[type=text]").val())){
                    if(($('.D_input .room').val()=='')){
                        $(".bott .Prompt").html("请输入您的房号！")
                    }else{
                        var to = isfloat($('.D_input .Money').val())

                        if( !to || $('.D_input .Money').val() ==0 || $('.D_input .Money').val() =='0'){
                            $(".bott .Prompt").html("请输入您的订单金额！")
                        }else{
                            if(($('.D_input .Phone').val()=='')){
                                $(".bott .Prompt").html("请输入您的手机号码！")
                            }else{
                                if(RegCellPhone.test($(".D_input .Phone[type=text]").val())){
                                    $('form').submit();
                                    $(".method").addClass("avtive");
                                }else{
                                    $(".bott .Prompt").html("请输入正确的11位手机号！")
                                }
                            }
                        }
                    }
                }else{
                    $(".bott .Prompt").html("请输入您的中文姓名！");
                }
            }
        }
    });
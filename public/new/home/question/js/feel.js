/**
 * Created by Administrator on 2018\2\1 0001.
 */
$(".Next_a").click(function(){
    var yanz=$('input:radio[name="feel1"]:checked').val();
    if(yanz==null){
        $(".xuanz").html("请选择房屋设计效果满意度");
        $(".xuanz").addClass("active")
    }else{
        var VR=$('input:radio[name="feel2"]:checked').val();
        if(VR==null){
            $(".xuanz").html("请选择VR体验感受满意度");
            $(".xuanz").addClass("active")
        }else{
            var taocan=$('input:radio[name="feel3"]:checked').val();
            if(taocan==null){
                $(".xuanz").html("请选择套餐内容满意度");
                $(".xuanz").addClass("active")
            }else{
                var jiage=$('input:radio[name="feel4"]:checked').val();
                if(jiage==null){
                    $(".xuanz").html("请选择套餐价格满意度");
                    $(".xuanz").addClass("active")
                }else{
                    var chanp=$('input:radio[name="feel5"]:checked').val();
                    if(chanp==null){
                        $(".xuanz").html("请选择智能产品满意度");
                        $(".xuanz").addClass("active")
                    }else{
                        $('form').submit();
                    }
                }
            }
        }
    }
});
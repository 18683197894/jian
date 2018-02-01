/**
 * Created by Administrator on 2018\2\1 0001.
 */
$(".Next_a").click(function(){
    var yanz=$('input:radio[name="money"]:checked').val();
    if(yanz==null){
        $(".xuanz").addClass("active")
    }else{
        $('form').submit();
    }
});
/**
 * Created by Administrator on 2018\1\31 0031.
 */


//$(".Next a").click(function(){
//    if (confirm("问卷调查完成即将关闭页面")){
//        window.opener=null;
//        window.open('','_self');
//        window.close();
//    }
//    else{}
//});
$(".Next_a").click(function(){
    var yanz=$('input:radio[name="style"]:checked').val();
    if(yanz==null){
        $(".xuanz").addClass("active")
    }else{
        $('form').submit();
    }
});
$(document).ready(function(){
//    nav-li hover e
    var num;
    $('.nav-main>li[id]').hover(function(){
       // /*图标向上旋转*/
       //  $(this).children().removeClass().addClass('hover-up');
        /*下拉框出现*/
        var Obj = $(this).attr('id');
        num = Obj.substring(3, Obj.length);
        $('#li-'+num).css('color','#E12E32');
        $('#box-'+num).slideDown(300);
    },function(){
        // /*图标向下旋转*/
        // $(this).children().removeClass().addClass('hover-down');
        /*下拉框消失*/
         $('#li-'+num).css('color','#000');
        $('#box-'+num).hide();
    });
//    hidden-box hover e
    $('.hidden-box').hover(function(){
        /*保持图标向上*/
        $('#li-'+num).children().removeClass().addClass('hover-up');
        $('#li-'+num).css('color','#E12E32');
        $(this).show();

    },function(){
        $(this).slideUp(200);
        $('#li-'+num).children().removeClass().addClass('hover-down');
         $('#li-'+num).css('color','#000');
    });
});

    $('#hade_1_2_3 > form > button').on('click',function(){
        var con = $('#hade_1_2_3 > form > input').val();
        var conn = $.trim(con);
        if(conn == null || conn == '' )
        {
            return false;
        }
    })
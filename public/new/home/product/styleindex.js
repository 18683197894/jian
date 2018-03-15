$(" .one1 .contact .Style a").click(function(){
    $(".one1 .contact .Style a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    $('.one1 .detailed .detailed_img').removeClass("avtive").eq($(this).index()).addClass("avtive");
});
$(".one2 .contact .Style a").click(function(){
    $(".one2 .contact .Style a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    $('.one2 .detailed .detailed_img').removeClass("avtive").eq($(this).index()).addClass("avtive");
});
$(".one3 .contact .Style a").click(function(){
    $(".one3 .contact .Style a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    $('.one3 .detailed .detailed_img').removeClass("avtive").eq($(this).index()).addClass("avtive");
});

$(document).ready(function(){
                $("input[type='radio']").removeAttr('checked');
            })
            $("input[type='radio']").on('click',function(){
                var money = $(this).attr('feel');
                
                $(this).parents('.detailed_img').find('.auto > span ').eq(1).html(money);
                if($(this).attr('index') == 'qing')
                {
                    $(this).parents('.fashion').find('.auto > input').css('display','block');
                }else
                {
                    $(this).parents('.fashion').find('.auto > input').css('display','none');
                }
            });
                $('.paygou').on('click',function(){
                    var id = $(this).parents('.fashion').find("input[type='radio']:checked").val();
                    var ors = $(this).parents('.fashion').find("input[type='radio']:checked").attr('index');
                    
                    if(id == null || ors == null)
                    {
                        alert('请先选择产品!');
                        return false;
                    }
                    if(ors == 'qing')
                    {
                        var num = $(this).parents('.detailed_img').find("input[type='text']").val();
                        var pre =/^[\d]{1,3}$/;
                        if(!pre.test(num) || num < 10)
                        {
                            alert('输入错误(最小单位为10)');
                            return false;
                        }
                    }
                    $.ajax('/newpro/style/paygouajax',{
                        type : 'post',
                        data : {id:id,num:num,ors:ors,_token:$("meta[name='csrf-token']").attr('content')},
                        success : function(data)
                        {   
                            if(data == 1 )
                            {
                                alert('加入购物车成功！');
                            }
                            if(data == 2)
                            {
                                alert('加入购物车失败!');
                            }
                            if(data == 3)
                            {
                                alert('未登入!');
                                window.location.href="/newpro/login?path=/newpro/style";
                            }
                        },
                        error : function(data)
                        {
                            alert('购物车加入失败！');
                            return false;
                        }
                    })
                })
/**
 * Created by Administrator on 2018\2\26 0026.
 */
//地址添加
$('.determines').on('click',function(){
    var data = preaddress();
    if(data != false)
    {   

        $.ajax('/newpro/shoppingcart/addressadd',{
            type : 'post',
            data : {ors:'add',data:data,_token:$("meta[name='csrf-token']").attr('content')},
            success : function(data)
            {
                if(data != false)
                {
                    var address = $('.addressspan').clone(true);
                        address.attr('index',data['id']);
                        address.find('.name').html(data['name']+' （'+data['phone']+'）' );
                        address.find('.con').html(data['shen']+data['shi']+' '+data['tails']);
                        address.css('display','block');
                        address.removeClass('addressspan');
                        $('.dizhi').append(address);
                        $(".New .add").removeClass("avtive");
                        addressformdel();
                }else
                {
                    alert('添加失败！');
                    return false;
                }
            },
            error : function(dtta)
            {
                alert('添加失败！');
                return false;
            },
            dataTpye : 'json'
        })
    }
})

$('.addressedit').on('click',function(){

    var span = $(this).parents('span');
    var id = span.attr('index');
    var data = edit(id);
    var id = span.attr('index');
    $('.add').attr('index',id);
    if(data)
    {    
        var span = $('.modal_title > span').clone(true);
        var lis = $('.shi > .down > li').eq(0).clone(true);
        $('.shi > .down > li').remove();
        $('.shi > .down').append(lis);
        var liss = $('.qu > .down > li').eq(0).clone(true);
        $('.qu > .down > li').remove();
        $('.qu > .down').append(liss);
        $('.modal_title').html("更新收货地址");
        $('.modal_title').append(span);
        $('.determines').css('display','none');
        $('.determine').css('display','block');
        $('.addresors').css('display','none');
        $(".New .add").removeClass("avtive").eq($(this).index()).addClass("avtive");
        $("input[name='name']").val(data['name']);
        $("input[name='phone']").val(data['phone']);
        $("input[name='tails']").val(data['tails']);
        $("input[name='zipcode']").val(data['zipcode']);
        $("input[name='lebel']").val(data['lebel']);

        $('.shen > .selected').html(data['shen']);
        $('.shi > .selected').html(data['shi']);
        $('.qu > .selected').html(data['qu']);
        $('.shen > .selected').attr('index',data['addressid'][0]);
        $('.shi > .selected').attr('index',data['addressid'][1]);
        $('.qu > .selected').attr('index',data['addressid'][2]);

        $.each(data['shis'],function(i,n){
                var li = $('.shi > .down > li').eq(0).clone(true);
                li.find('a').attr('index',n['id']);
                li.find('a').html(n['name']);
                $('.shi > .down').append(li);

            })
        $.each(data['qus'],function(i,n){
                var li = $('.qu > .down > li').eq(0).clone(true);
                li.find('a').attr('index',n['id']);
                li.find('a').html(n['name']);
                $('.qu > .down').append(li);

            })
    }else
    {
        return false;
    }
    
    return false;
})
function edit(id)
{   
    var da;

    $.ajax('/newpro/payment/addressgetedit',{
        type : 'get',
        data : {id:id},
        async : false,
        success : function(data)
        {
            da = data;
        },
        error : function(data)
        {
            da = false;
        },
        dataType:'json'
    })
    return da;
}

$('.determine').on('click',function(){
    var data = preaddress();

    if(data != false)
    {   
        data['id'] = $('.add').attr('index');
        
        $.ajax('/newpro/shoppingcart/addressadd',{
            type : 'post',
            data : {ors:'edit',data:data,_token:$("meta[name='csrf-token']").attr('content')},
            success : function(data)
            {
                if(data != false)
                {       
                        var address = $(".dizhi > span[index='"+data['id']+"']");
                        address.find('.name').html(data['name']+' （'+data['phone']+'）' );
                        address.find('.con').html(data['shen']+data['shi']+' '+data['tails']);
                        $(".New .add").removeClass("avtive");
                        addressformdel();
                }else
                {
                    alert('更新失败！');
                    return false;
                }
            },
            error : function(dtta)
            {
                alert('更新失败！');
                return false;
            },
            dataTpye : 'json'
        })
    }

})


function addressformdel()
{   
    $('.addresors').css('display','block');
    var span = $('.modal_title > span').clone(true);
    $('.modal_title').html("使用新地址");
    $('.modal_title').append(span);
    $('.determines').css('display','block');
    $('.determine').css('display','none');
    $('.fill > input').val('');
    $('.shen > .selected').attr('index','00');
    $('.shen > .selected').html('选择省');
    $('.shi > .selected').attr('index','00');
    $('.shi > .selected').html('选择市');
    $('.qu > .selected').attr('index','00');
    $('.qu > .selected').html('选择区');
    var shi = $('.shi > .down >li').eq(0);
    $('.shi > .down').html(shi);
    var qu = $('.qu > .down >li').eq(0);
    $('.qu > .down').html(shi);
}
function preaddress()
{
    $('.linkage ').css('border','1px solid #ededed');
    $('.fill > input').css('border','1px solid #ededed');
    var name,phone,tails,lebel,zipcode,shen,shi,qu,
    name = $(".fill > input[name='name']").val();
    phone = $(".fill > input[name='phone']").val();
    tails = $(".fill > input[name='tails']").val();
    lebel = $(".fill > input[name='lebel']").val();
    zipcode = $(".fill > input[name='zipcode']").val();
    shen = $('.shen > .selected').html();
    shi = $('.shi > .selected').html();
    qu = $('.qu > .selected').html();
    
    var nameper = /^[\u4e00-\u9fa5]{2,6}$/.test(name);
    if( !nameper )
    {   
        $(".fill > input[name='name']").css('border','1px solid red');
        return false;
    }

    var phoneper = /^[1][3,4,5,7,8][0-9]{9}$/.test(phone);
    if( !phoneper )
    {   
        $(".fill > input[name='phone']").css('border','1px solid red');
        return false;
    }
    if(shen == '选择省')
    {
        $('.shen').css('border','1px solid red');
        return false;

    }
    if(shi == '选择市')
    {
        $('.shi').css('border','1px solid red');
        return false;
        
    }
    if(qu == '选择区')
    {
        $('.qu').css('border','1px solid red');
        return false;
    }
    var tailsper = /^.{2,33}$/.test(tails);
    if(!tailsper)
    {
        $(".fill > input[name='tails']").css('border','1px solid red');
        return false;
    }

    var zipcodeper = /^\d{6}$/.test(zipcode);
    if(!zipcodeper)
    {
        $(".fill > input[name='zipcode']").css('border','1px solid red');
        return false;
    }
    var arr = new Object();
    arr['name'] = name;
    arr['phone'] = phone;
    arr['shen'] = shen;
    arr['shi'] = shi;
    arr['qu'] = qu;
    arr['tails'] = tails;
    arr['zipcode'] = zipcode;
    arr['lebel'] = lebel;
    arr['dizhis'] = $('.shen > .selected').attr('index')+','+$('.shi > .selected').attr('index')+','+$('.qu > .selected').attr('index');
    return arr;
}

$(".dizhi span").click(function(){
    var id = $(this).attr('index');
    var th = $(this).index();
    var name = $(this).find('.name').html();
    var dizhi = $(this).find('.con').html();
    $(".payment_buttom_sub_2").eq(0).find('span').html(dizhi);
    $(".payment_buttom_sub_2").eq(1).find('span').html(name);
    $('.payment_buttom_sub_3').attr('index',id);
    $.ajax('/newpro/payment/addressstatus',{
        type : 'get',
        data : {id:id},
        success :function(data)
        {
          
                $(".dizhi span").removeClass("avtive").eq(th).addClass("avtive");
                return false;
        },
        error:function(data)
        {
                $(".dizhi span").removeClass("avtive").eq(th).addClass("avtive");
                return false;
        }
    })
});

$('.delete').on('click',function(){
    var id = $(this).parents('span').attr('index');
    var span = $(this).parents('span');
    $.ajax('/newpro/payment/addressdel',{
        type :　'get',
        data : {id:id},
        success : function(data)
        {
            if(data != false)
            {   
                alert('删除成功！');
                span.remove();
                $('.addresors').css('display','block');
                $(".New .add").removeClass("avtive");
                 
            }else
            {   
                alert('删除失败！')
                
            }
        },
        error: function(data)
        {   
            alert('删除失败！')
           
              
        }
    })    
    return false;
})
$('.cancel').on('click',function(){
    $(".New .add").removeClass("avtive");
    addressformdel();
})

$(".New .addresors").click(function(){
    $('.determine').css('display','none');
    $('.determines').css('display','block');
    $('.addresors').css('display','none');
    $(".New .add").removeClass("avtive").eq($(this).index()).addClass("avtive");
});
$(".New .add .modal_title span").click(function(){
    $(".New .add").removeClass("avtive");
    addressformdel();
});


$(".xiangxi").keyup(function(){
        var str = $(this).val();

        if( str.length > 33)
        {
            var res = str.substr(0,33);
            $(this).val(res);
            // alert('字数超出限制');

        }
    })
$('.right').keyup(function(){
        var str = $(this).val();
        if( str.length > 12)
        {
            var res = str.substr(0,12);
            $(this).val(res);
            // alert('字数超出限制');

        }
    })
$(".linkage .selected").click(function(){
    // $('.linkage .down').slideUp(300);
    // if($(this).siblings(".down").css('display') !== 'block' )
    // {
    // $(this).siblings(".down").slideDown(300);
    // }
    var a  = $(this).parents('.linkage').attr('class');
         $.each($(".linkage .selected"),function(){
            if($(this).parents('.linkage').attr('class') !== a)
            {
                $(this).siblings(".down").removeClass("avtive");
            }
         })

        if($(this).siblings(".down").css('display') !== 'block' )
        {
            $(this).siblings(".down").addClass("avtive");
        }else
        {
            $(this).siblings(".down").removeClass("avtive");
        }
});

$(".shen .down li a").click(function(){
    var id = $(this).attr('index');
    var name = $(this).html();
    $(this).parents('.shen').find('.selected').html(name);
    $(this).parents('.shen').find('.selected').attr('index',id);
    $(this).parents('.down').removeClass("avtive");
    
    var lis = $('.shi > .down > li').eq(0).clone(true);
    $('.shi > .down > li').remove();
    $('.shi > .down').append(lis);
    var liss = $('.qu > .down > li').eq(0).clone(true);
    $('.qu > .down > li').remove();
    $('.qu > .down').append(liss);

    $('.shi > .selected').attr('index','00');
    $('.shi > .selected').html('选择市');
    $('.qu > .selected').attr('index','00');
    $('.qu > .selected').html('选择区');    
    var th = $(this);
    
    var str = '';
    $.ajax('/newpro/payment/addressajax',{
        data : 'get',
        data : {id:id,ors:'shen'},
        success : function(data)
        {       
            if(data != false)
            {   

                $.each(data,function(i,n){
                var li = $('.shi > .down > li').eq(0).clone(true);
                li.find('a').attr('index',n['id']);
                li.find('a').html(n['name']);
                $('.shi > .down').append(li);

            })
            }
            
        },
        error : function(data)
        {
            alert('地址载入失败！');
        },
        dataTpye : 'json'
    })
});

$(".shi .down li a").click(function(){
    var id = $(this).attr('index');
    var name = $(this).html();
    $(this).parents('.shi').find('.selected').html(name);
    $(this).parents('.shi').find('.selected').attr('index',id);
    $(this).parents('.down').removeClass("avtive");
    var lis = $('.qu > .down > li').eq(0).clone(true);
    $('.qu > .down > li').remove();
    $('.qu > .down').append(lis);
    $('.qu > .selected').attr('index','00');
    $('.qu > .selected').html('选择区');

    if(id == '00')
    {
        var lis = $('.qu > .down > li').eq(0).clone(true);
        $('.qu > .down > li').remove();
        $('.qu > .down').append(lis);
        return false;
    }
    $.ajax('/newpro/payment/addressajax',{
        data : 'get',
        data : {id:id,ors:'shi'},
        success : function(data)
        {       
            if(data != false || data != null)
            {   
                
                $.each(data,function(i,n){
                var li = $('.qu > .down > li').eq(0).clone(true);
                li.find('a').attr('index',n['id']);
                li.find('a').html(n['name']);
                $('.qu > .down').append(li);

            })
            }
            
        },
        error : function(data)
        {
            alert('地址载入失败！');
        },
        dataType : 'json'
    })
});

$('.qu > .down > li > a').on('click',function(){
    var id = $(this).attr('index');
    var name = $(this).html();
    $(this).parents('.qu').find('.selected').html(name);
    $(this).parents('.qu').find('.selected').attr('index',id);
    $(this).parents('.down').removeClass("avtive");
})




$(".fapiao span .shanchu").click(function(){
    $(this).parent().parent().remove();
});

$(".fapiao span").click(function(){
    $(".fapiao span").addClass("avtive");
});

$(".in_click input").click(function(){
    var ifchecked=$(".in_click input").attr("checked");
    if(ifchecked=="checked"){
        $(".fapiao .input").addClass("avtive");
        $(".fapiao span").addClass("avtive");
    }else{
        $(".fapiao .input").removeClass("avtive");
        $(".fapiao span").removeClass("avtive");
    }
});

$(function(){
    $("input[name='invoice']").removeAttr('checked');
})


$("input[name='remarks']").keyup(function(){
        var str = $(this).val();

        if( str.length > 20)
        {
            var res = str.substr(0,20);
            $(this).val(res);
            // alert('字数超出限制');

        }
    })
$("input[name='invoice_tou']").keyup(function(){
        var str = $(this).val();

        if( str.length > 12)
        {
            var res = str.substr(0,12);
            $(this).val(res);
            // alert('字数超出限制');

        }
    })
$("input[name='invoice_ors']").keyup(function(){
        var str = $(this).val();

        if( str.length > 20)
        {
            var res = str.substr(0,20);
            $(this).val(res);
            // alert('字数超出限制');

        }
    })

$('.payment_buttom_sub_3 > button').on('click',function(){
    
    var dizhi = $(".payment_buttom_sub_3").attr('index');
    var payid = '';
    $.each($('.details > .con.payid'),function(){
        payid += $(this).attr('index')+',';
    })
    
    if(dizhi == '')
    {
        alert('未选择收货地址！');
        return false;
    }
    if(payid == '')
    {
        alert('没有商品');
        return false;
    }
    var a = "<input type='hidden' name='dizhiid' value='"+dizhi+"'>";
    var b= "<input type='hidden' name='payid' value='"+payid+"'>";
    var inp = $(a);
    var inps = $(b);
    
    $('form').append(inp);
    $('form').append(inps);
    $('form').submit();
})

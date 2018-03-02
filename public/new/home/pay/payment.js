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
                        address.find('name').html(data['name']);
                        address.find('con').html(data['shen']+data['shi']+'（'+data['name']+'）');
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
function addressformdel()
{
    $('.fill > input').val('');
    $('.shen > .selected').attr('index','00');
    $('.shen > .selected').html('选择省');
    $('.shi > .selected').attr('index','00');
    $('.shi > .selected').html('选择市');
    $('.qu > .selected').attr('index','00');
    $('.qu > .selected').html('选择区');
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
})

$(".New a").click(function(){
    $(".New .add").removeClass("avtive").eq($(this).index()).addClass("avtive");
});
$(".New .add .modal_title span").click(function(){
    $(".New .add").removeClass("avtive");
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
    $('.linkage .down').slideUp(300);
    if($(this).siblings(".down").css('display') !== 'block' )
    {
    $(this).siblings(".down").slideDown(300);
    }
});

$(".shen .down li a").click(function(){
    var id = $(this).attr('index');
    var name = $(this).html();
    $(this).parents('.shen').find('.selected').html(name);
    $(this).parents('.shen').find('.selected').attr('index',id);
    $(this).parents('.down').slideUp(300);
    
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
    $(this).parents('.down').slideUp(300);
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
        dataTpye : 'json'
    })
});

$('.qu > .down > li > a').on('click',function(){
    var id = $(this).attr('index');
    var name = $(this).html();
    $(this).parents('.qu').find('.selected').html(name);
    $(this).parents('.qu').find('.selected').attr('index',id);
    $(this).parents('.down').slideUp(300);
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

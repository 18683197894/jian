    //添加
    $(".address .add").click(function(){

        $('.bott > button').eq(1).css('display','none');
        $('.bott > button').eq(0).css('display','block');
        addressformdel();
        $(".contact_right .fill").addClass("avtive")
    });
    
    $('.bott > button').eq(0).on('click',function(){
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
                        address.find('.name').html(data['name']);
                        address.find('.Telephone').html(data['phone']);
                        address.find('.dizhi').html(data['shen']+data['shi']+' '+data['tails']);
                        address.css('display','block');
                        address.removeClass('addressspan');
                        $('.address > .add').before(address);
                        $(".contact_right .fill").removeClass("avtive")
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

    //编辑
$(".shanc .bianji").click(function(){
        addressformdel();

    $('.bott > button').eq(0).css('display','none');
    $('.bott > button').eq(1).css('display','block');
    $(".contact_right .fill").addClass("avtive")
    var span = $(this).parents('.loop');
    var id = span.attr('index');
    var data = edit(id);
    var id = span.attr('index');
    $('.add').attr('index',id);
    if(data)
    {    
        var span = $('.modal_title > span').clone(true);

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
$('.bott > button').eq(1).on('click',function(){
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
                        var address = $(".address > .loop[index='"+data['id']+"']");
                        address.find('.name').html(data['name']);
                        address.find('.Telephone').html(data['phone']);
                        address.find('.dizhi').html(data['shen']+data['shi']+' '+data['tails']);
                        $(".contact_right .fill").removeClass("avtive")
                        
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

    $('.shanc > a').eq(0).on('click',function(){
        var id = $(this).parents('.loop').attr('index');
        var span = $(this).parents('.loop');
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

    function preaddress()
{
    $('.linkage ').css('border','1px solid #ededed');
    $('.fill > .loop > input').css('border','1px solid #ededed');
    var name,phone,tails,lebel,zipcode,shen,shi,qu,
    name = $(".fill > .loop >  input[name='name']").val();
    phone = $(".fill > .loop >  input[name='phone']").val();
    tails = $(".fill > .loop > input[name='tails']").val();
    zipcode = $(".fill > .loop >  input[name='zipcode']").val();
    shen = $('.shen > .selected').html();
    shi = $('.shi > .selected').html();
    qu = $('.qu > .selected').html();
    
    var nameper = /^[\u4e00-\u9fa5]{2,6}$/.test(name);
    if( !nameper )
    {   
        $(".fill > .loop >  input[name='name']").css('border','1px solid red');
        return false;
    }

    var phoneper = /^[1][3,4,5,7,8][0-9]{9}$/.test(phone);
    if( !phoneper )
    {   
        $(".fill > .loop >  input[name='phone']").css('border','1px solid red');
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
        $(".fill > .loop >  input[name='tails']").css('border','1px solid red');
        return false;
    }

    var zipcodeper = /^\d{6}$/.test(zipcode);
    if(!zipcodeper)
    {
        $(".fill > .loop >  input[name='zipcode']").css('border','1px solid red');
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
    arr['dizhis'] = $('.shen > .selected').attr('index')+','+$('.shi > .selected').attr('index')+','+$('.qu > .selected').attr('index');
    return arr;
}

   //清空
   function addressformdel(){

        $('.loop > input').val('');
        $('.shen > .selected').attr('index','00');
        $('.shen > .selected').html('选择省');
        $('.shi > .selected').attr('index','00');
        $('.shi > .selected').html('选择市');
        $('.qu > .selected').attr('index','00');
        $('.qu > .selected').html('选择区');
         var lis = $('.shi > .down > li').eq(0).clone(true);
        $('.shi > .down > li').remove();
        $('.shi > .down').append(lis);
        var liss = $('.qu > .down > li').eq(0).clone(true);
        $('.qu > .down > li').remove();
        $('.qu > .down').append(liss);
   }

     $(".fill .cancel").click(function(){
        addressformdel();
        $(".contact_right .fill").removeClass("avtive")
    });

    $(".linkage .selected").click(function(){
        
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

    $(".shen > .down > li > a").on('click',function(){
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
            $(this).parents('.down').removeClass("avtive");
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

$("input[name='tails']").keyup(function(){
        var str = $(this).val();

        if( str.length > 33)
        {
            var res = str.substr(0,33);
            $(this).val(res);
            // alert('字数超出限制');

        }
    })

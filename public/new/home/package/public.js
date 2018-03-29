    $(".jizhuang .Style_Bot a").live('click',function(){
        var a = $(".jizhuang .Style_Bot a")[0].outerHTML;
        var y =$(".My_Choice .Choice_Bot a");
        if((y).hasClass('jz')){
            $(".My_Choice .Choice_Bot a.jz").remove();
            $(".My_Choice .Choice_Bot").append(a);
        }else{
            $(".My_Choice .Choice_Bot").append(a);
        }
    });
    $(".Style .Style_Bot a").live('click',function(){
        var r = $(".Style .Style_Bot a").eq($(this).index())[0].outerHTML;
        var fg =$(".My_Choice .Choice_Bot a");
        if((fg).hasClass('fg')){
            $(".My_Choice .Choice_Bot a.fg").remove();
            $(".My_Choice .Choice_Bot").append(r);
        }else{
            $(".My_Choice .Choice_Bot").append(r);
        }
    });
    $(".Ai .Style_Bot a").click(function(){
        var z = $(".Ai .Style_Bot a").eq($(this).index())[0].outerHTML;
        var AI =$(".My_Choice .Choice_Bot a");
        if((AI).hasClass('zhin')){
            $(".My_Choice .Choice_Bot a.zhin").remove();
            $(".My_Choice .Choice_Bot").append(z);
        }else{
            $(".My_Choice .Choice_Bot").append(z);
        }
    });

    function fengge(){
        $(".Style .Style_Bot a").click(function(){
            $(".Style .Style_Bot a").removeClass("avtive").eq($(this).index()).addClass("avtive")
        })
    }fengge();

    function bao(){
        $(".Ai .Style_Bot a").click(function(){
            $(".Ai .Style_Bot a").removeClass("avtive").eq($(this).index()).addClass("avtive")
        })
    }bao();

    function bao1(){
        $(".jizhuang .Style_Bot a").click(function(){
            $(".jizhuang .Style_Bot a").removeClass("avtive").eq($(this).index()).addClass("avtive")
        })
    }bao1();


    $(".Show .Loop").click(function(){
        $(".Show .Loop a").removeClass("avtive").eq($(this).index()).addClass("avtive");
         var eq_i = ($(this).index());
        if(eq_i == 0){
            $(".jizhuang").addClass("avtive");
            $(".Style").removeClass("avtive");
            $(".Ai").removeClass("avtive");
        }else if(eq_i == 1){
            $(".Style").addClass("avtive");
            $(".Ai").removeClass("avtive");
            $(".jizhuang").removeClass("avtive");
        }else{
            $(".Style").removeClass("avtive");
            $(".Ai").addClass("avtive");
            $(".jizhuang").removeClass("avtive");
        }
    });
$(".My_Choice .Choice_Bot a").live('click',function(){
    if($(this).hasClass('zhin')){
        $(this).remove();
        $(".Ai .Style_Bot a").removeClass("avtive");
    };
    if($(this).hasClass('fg')){
        $(this).remove();
        $(".Ai .Style_Bot a").removeClass("avtive");
    };
});

$('.playgou').on('click',function(){
    var jizhuang = $('.Choice_Bot > .jz').attr('index');
    var ruanzhuang = $('.Choice_Bot > .fg').attr('index');
    var zhineng = $('.Choice_Bot > .zhin').attr('index');
    init = false;
    if(jizhuang == undefined)
    {   
        $.ajax('/newpro/package/playgouors',{
        type : 'post',
        async : false,
        data : {_token:$("meta[name='csrf-token']").attr('content')},
        success : function(data)
        {
            if(data == false)
            {   
                idit = false;
                alert('加入失败！请选择基装包');
                return false;
            }else
            {
                init = true;
            }
        },
        error : function(data)
        {
            alert('添加失败！');
        }
    })
        
    }else
    {
        init = true;
    }
    if(!init)
    {
        return false;
    }
    $.ajax('/newpro/package/playgou',{
        type : 'post',
        data : {jid:jizhuang,rid:ruanzhuang,zid:zhineng,_token:$("meta[name='csrf-token']").attr('content')},
        success : function(data)
        {
            if(data == 1)
            {
                alert('加入购物车成功！');
            }else
            {
                alert(data);
            }
        },
        error : function(data)
        {
            alert('添加失败！');
        }
    })
})


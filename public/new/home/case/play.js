$(function(){
        var nu = $(".win").attr('index');
        var win=$(".win");
        var divs=$(".box div");
        var num1=$('.num1').attr('index');
        var num2=0;

        $(".leftB").click(function(){

            divs.stop(true,true);
            var temp=num1;
            num1--;
            if(num1==-1){
                num1=nu -1 ;
            }
            var index = divs.eq(num1).attr('index')

            $('.con1_leftul > li').css('display','none');
            $('#index'+index).css('display','block');
            divs.eq(num1).css("left",904).animate({left:0});
            divs.eq(temp).animate({left:-904});
        });
        $(".rightB").click(function(){

            divs.stop(true,true);
            // divs.finish();
            var temp=num1;
            num1++;
            if(num1==nu){
                num1=0;
            }
            var index = divs.eq(num1).attr('index')
            $('.con1_leftul > li').css('display','none');
            $('#index'+index).css('display','block');
            // alert(divs.eq(num1).attr('index'))
            divs.eq(num1).css("left",-904).animate({left:0});
            divs.eq(temp).animate({left:904});
        });
    });
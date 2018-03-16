/**
 * Created by Administrator on 2018\3\12 0012.
 */

//boex1
$(".Next_a").click(function(){
    if($(".container-box .content").hasClass("avtive")){
        var num=$(".content.avtive").index();
        if(num == 0){
            var reg= /^[\u4E00-\u9FA5]{2,4}$/;
            if(!($('.name').val()=='')){
                if(reg.test($("input[type=text]").val())){
                    var yanz=$('input:radio[name="Sex"]:checked').val();
                    if(yanz==null){
                        $(".box1 .Ok").html("请选择您的性别！").addClass("active");
                        setTimeout(function(){
                            $(".Ok").removeClass("active");
                        }, 3000);
                    }else{
                        $(".container-box .content.box1").removeClass("avtive");
                        $(".container-box .content.box2").addClass("avtive");
                        $(".Upper_a").removeClass("active");
                        $(".Next_a").removeClass("active");
                    }
                }else{
                    $(".box1 .Ok").html("请输入您的中文姓名！").addClass("active");
                    setTimeout(function(){
                        $(".Ok").removeClass("active");
                    }, 3000);
                }
            }else{
                $(".box1 .Ok").html("请输入您的中文姓名！").addClass("active");
                setTimeout(function(){
                    $(".Ok").removeClass("active");
                }, 3000);
            }
            $(document).keydown(function(e) {
                if (e.keyCode == "13") {
                    var reg= /^[\u4e00-\u9fa5\s]+$/;
                    if(!($('.name').val()=='')){
                        if(reg.test($("input[type=text]").val())){
                            var yanz=$('input:radio[name="Sex"]:checked').val();
                            if(yanz==null){
                                $(".box1 .Ok").html("请输入您的中文姓名！").addClass("active");
                                setTimeout(function(){
                                    $(".Ok").removeClass("active");
                                }, 3000);
                            }else{
                                $(".container-box .content.box1").removeClass("avtive");
                                $(".container-box .content.box2").addClass("avtive");
                                $(".Upper_a").removeClass("active");
                                $(".Next_a").removeClass("active");
                            }
                        }else{
                            $(".box1 .Ok").html("请输入您的中文姓名！").addClass("active");
                            setTimeout(function(){
                                $(".Ok").removeClass("active");
                            }, 3000);
                        }
                    }else{
                        $(".box1 .Ok").html("请输入您的中文姓名！").addClass("active");
                        setTimeout(function(){
                            $(".Ok").removeClass("active");
                        }, 3000);
                    }
                }
            });//box2
        }else if(num == 1){
            var box2_r=$('input:radio[name="box2_r"]:checked').val();
            if(box2_r==null){
                $(".box2 .Ok").html("请选择您接触过智能控制系统吗?").addClass("active");
                setTimeout(function(){
                    $(".Ok").removeClass("active");
                }, 3000);
            }else{
                $(".container-box .content.box2").removeClass("avtive");
                $(".container-box .content.box3").addClass("avtive");
            }//box3
        }else if(num == 2){
            var box3_r=$('input:checkbox[name="box3"]:checked').val();
            if(box3_r==null){
                $(".box3 .Ok").html("请选择您眼中的智能家居系统?").addClass("active");
                setTimeout(function(){
                    $(".Ok").removeClass("active");
                }, 3000);
            }else{
                $(".container-box .content.box3").removeClass("avtive");
                $(".container-box .content.box4").addClass("avtive");
            }//box4
        }else if(num == 3){
            var box4=$('input:radio[name="box4"]:checked').val();
            if(box4==null){
                $(".box4 .Ok").html("请选择您是否对智能家居感兴趣？").addClass("active");
                setTimeout(function(){
                    $(".Ok").removeClass("active");
                }, 3000);
            }else{
                $(".container-box .content.box4").removeClass("avtive");
                $(".container-box .content.box5").addClass("avtive");
            }//box5
        }else if(num == 4){
            var box5_r=$('input:checkbox[name="box5"]:checked').val();
            if(box5_r==null){
                $(".box5 .Ok").html("请选择您购买的原因是什么？").addClass("active");
                setTimeout(function(){
                    $(".Ok").removeClass("active");
                }, 3000);
            }else{
                $(".container-box .content.box5").removeClass("avtive");
                $(".container-box .content.box6").addClass("avtive");
            }//box6
        }else if(num == 5){
            var box6_r=$('input:checkbox[name="box6"]:checked').val();
            if(box6_r==null){
                $(".box6 .Ok").html("请选择您不购买的原因是什么？").addClass("active");
                setTimeout(function(){
                    $(".Ok").removeClass("active");
                }, 3000);
            }else{
                $(".container-box .content.box6").removeClass("avtive");
                $(".container-box .content.box7").addClass("avtive");
            }//box7
        }else if(num == 6){
            var box7=$('input:checkbox[name="box7"]:checked').val();
            if(box7==null){
                $(".box7 .Ok").html("请选择您选购智能家居产品更注重哪种因素？").addClass("active");
                setTimeout(function(){
                    $(".Ok").removeClass("active");
                }, 3000);
            }else{
                $(".container-box .content.box7").removeClass("avtive");
                $(".container-box .content.box8").addClass("avtive");
            }//box8
        }else if(num == 7){
            var box8_r=$('input:checkbox[name="box8"]:checked').val();
            if(box8_r==null){
                $(".box8 .Ok").html("请选择您最感兴趣的智能家居功能？").addClass("active");
                setTimeout(function(){
                    $(".Ok").removeClass("active");
                }, 3000);
            }else{
                $(".container-box .content.box8").removeClass("avtive");
                $(".container-box .content.box9").addClass("avtive");
            }//box9
        }else if(num == 8){
            var box9_r=$('input:checkbox[name="box9"]:checked').val();
            if(box9_r==null){
                $(".box9 .Ok").html("请选择您通过什么渠道了解到智能家居？").addClass("active");
                setTimeout(function(){
                    $(".Ok").removeClass("active");
                }, 3000);
            }else{
                $(".container-box .content.box9").removeClass("avtive");
                $(".container-box .content.box10").addClass("avtive");
            }//box10
        }else if(num == 9){
            var box10_r=$('input:radio[name="box10"]:checked').val();
            if(box10_r==null){
                $(".box10 .Ok").html("请选择您的家庭月收入?").addClass("active");
                setTimeout(function(){
                    $(".Ok").removeClass("active");
                }, 3000);
            }else{
                $(".container-box .content.box10").removeClass("avtive");
                $(".container-box .content.box11").addClass("avtive");
            }//box11
        }else if(num == 10){
            var box11_r=$('input:radio[name="box11"]:checked').val();
            if(box11_r==null){
                $(".box11 .Ok").html("请选择您认为一套智能家居系统的合理价位？").addClass("active");
                setTimeout(function(){
                    $(".Ok").removeClass("active");
                }, 3000);
            }else{
                $(".container-box .content.box11").removeClass("avtive");
                $(".container-box .content.box12").addClass("avtive");
            }//box12
        }else if(num == 11){
            var box12_r=$('input:radio[name="box12"]:checked').val();
            if(box12_r==null){
                $(".box12 .Ok").html("请选择您认为当今家用电器的操作性方便吗？").addClass("active");
                setTimeout(function(){
                    $(".Ok").removeClass("active");
                }, 3000);
            }else{
                $(".container-box .content.box12").removeClass("avtive");
                $(".container-box .content.box13").addClass("avtive");
            }//box13
        }else if(num == 12){
            var box13_r=$('input:radio[name="box13"]:checked').val();
            if(box13_r==null){
                $(".box13 .Ok").html("请选择您的年龄！").addClass("active");
                setTimeout(function(){
                    $(".Ok").removeClass("active");
                }, 3000);
            }else{
                datas = new Array();
                datas['name'] = $('.content.box1 input[type="text"]').val();
                datas['sex'] = $('.content.box1 input[name="Sex"]').val();
                datas['contact'] = $(".box2_xuan input[type='radio']").val();
                
                var describe = '';
                $.each($(".box3_xuan input[type='checkbox']:checked"),function(){
                    describe += $(this).val()+',';
                })
                datas['describe'] = describe.substr(0,describe.length-1);
                
                datas['interest'] = $(".box4_xuan input[type='radio']").val();

                var purchase = '';
                $.each($(".box5_xuan input[type='checkbox']:checked"),function(){
                    purchase += $(this).val()+',';
                })
                datas['purchase'] = purchase.substr(0,purchase.length-1);

                var nopurchase = '';
                $.each($(".box6_xuan input[type='checkbox']:checked"),function(){
                    nopurchase += $(this).val()+',';
                })
                datas['nopurchase'] = nopurchase.substr(0,nopurchase.length-1);

                var careabout = '';
                $.each($(".box7_xuan input[type='checkbox']:checked"),function(){
                    careabout += $(this).val()+',';
                })
                datas['careabout'] = careabout.substr(0,careabout.length-1);
                                
                var functions = '';
                $.each($(".box8_xuan input[type='checkbox']:checked"),function(){
                    functions += $(this).val()+',';
                })
                datas['functions'] = functions.substr(0,functions.length-1);

                var channel = '';
                $.each($(".box9_xuan input[type='checkbox']:checked"),function(){
                    channel += $(this).val()+',';
                })
                datas['channel'] = channel.substr(0,channel.length-1);
                
                datas['income'] = $(".box10_xuan input[type='radio']").val();

                datas['reasonableprice'] = $(".box11_xuan input[type='radio']").val();

                datas['operation'] = $(".box12_xuan input[type='radio']").val();
                datas['age'] = $(".box13_xuan input[type='radio']").val();

                $.ajax('/newpro/defu/smartquestionnaire/home/ajax',{
                    type : 'post',
                    data : {'name':datas['name'],'sex':datas['sex'],'contact':datas['contact'],'describe':datas['describe'],'interest':datas['interest'],'purchase':datas['purchase'],'nopurchase':datas['nopurchase'],'careabout':datas['careabout'],'functions':datas['functions'],'channel':datas['channel'],'income':datas['income'],'reasonableprice':datas['reasonableprice'],'operation':datas['operation'],'age':datas['age'],_token:$('meta[name="csrf-token"]').attr('content')},
                    success : function(data)
                    {   
                       if(data == 1)
                       {
                        $(".Ok_oder").html("感谢您的参与！").addClass("active");
                        $(".Next").addClass("active");
                        $(".container-box").addClass("active");
                       }else
                       {
                        alert('提交失败！');
                        return false; 
                       }
                    },
                    error : function(data)
                    {
                     alert('提交失败！');
                     return false;   
                    }
                    // datetype : 'json'
                })
                // $(".Ok_oder").html("感谢您的参与！").addClass("active");
                // $(".Next").addClass("active");
                // $(".container-box").addClass("active");
            }
        }
    }

});


$(".Upper_a").click(function(){
    if($(".container-box .content").hasClass("avtive")){
        var num=$(".content.avtive").index();
        if(num == 0){
            window.location.href = "index.html";
        } else if(num == 1){
            $(".container-box .content.box2").removeClass("avtive");
            $(".container-box .content.box1").addClass("avtive");
            $(".Upper_a").addClass("active");
            $(".Next_a").addClass("active")
        }else if(num == 2){
            $(".container-box .content.box3").removeClass("avtive");
            $(".container-box .content.box2").addClass("avtive");
        }else if(num == 3){
            $(".container-box .content.box4").removeClass("avtive");
            $(".container-box .content.box3").addClass("avtive");
        }else if(num == 4){
            $(".container-box .content.box5").removeClass("avtive");
            $(".container-box .content.box4").addClass("avtive");
        }else if(num == 5){
            $(".container-box .content.box6").removeClass("avtive");
            $(".container-box .content.box5").addClass("avtive");
        }else if(num == 6){
            $(".container-box .content.box7").removeClass("avtive");
            $(".container-box .content.box6").addClass("avtive");
        }else if(num == 7){
            $(".container-box .content.box8").removeClass("avtive");
            $(".container-box .content.box7").addClass("avtive");
        }else if(num == 8){
            $(".container-box .content.box9").removeClass("avtive");
            $(".container-box .content.box8").addClass("avtive");
        }else if(num == 9){
            $(".container-box .content.box10").removeClass("avtive");
            $(".container-box .content.box9").addClass("avtive");
        }else if(num == 10){
            $(".container-box .content.box11").removeClass("avtive");
            $(".container-box .content.box10").addClass("avtive");
        }else if(num == 11){
            $(".container-box .content.box12").removeClass("avtive");
            $(".container-box .content.box11").addClass("avtive");
        }else if(num == 12){
            $(".container-box .content.box13").removeClass("avtive");
            $(".container-box .content.box12").addClass("avtive");
        }
    }
});

if($(".container-box .content").hasClass("avtive")){
    var i=$(".content.avtive").index();
    if(i == 0){
        $(".Upper_a").addClass("active");
        $(".Next_a").addClass("active")
    }
}
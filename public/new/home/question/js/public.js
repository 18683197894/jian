/**
 * Created by Administrator on 2018\2\1 0001.
 */

// $('input').click(function(event){
//    $(".bg").addClass("active")
// });

// $("input").blur(function(){
//     $(".bg").removeClass("active")
// });

var winHeight = $(window).height(); //获取当前页面高度  
          $(window).resize(function() {  
              var thisHeight = $(this).height();  
              if (winHeight - thisHeight > 50) {  
                  //当软键盘弹出，在这里面操作  
                  //alert('aaa');  
                  $('body').css('height', winHeight + 'px');  
              } else {  
                  //alert('bbb');  
                  //当软键盘收起，在此处操作  
                  $('body').css('height', '100%');  
              }  
          });  
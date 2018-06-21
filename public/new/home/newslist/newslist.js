$(".title .auto a").click(function(){
        $(".title .auto a").removeClass("avtive").eq($(this).index()).addClass("avtive");
        $(".data .xuanx").removeClass("avtive").eq($(this).index()).addClass("avtive");
    });
    //滑动
    function getScrollTop()
    {
        var scrollTop = 0;
        if (document.documentElement && document.documentElement.scrollTop) {
            scrollTop = document.documentElement.scrollTop;
        }else if (document.body) {
            scrollTop = document.body.scrollTop;
        }
        return scrollTop;
    }
    //获取当前可视范围的高度
    function getClientHeight()
    {
        var clientHeight = 0;
        if (document.body.clientHeight && document.documentElement.clientHeight) {
            clientHeight = Math.min(document.body.clientHeight, document.documentElement.clientHeight);
        }else {
            clientHeight = Math.max(document.body.clientHeight, document.documentElement.clientHeight);
        }
        return clientHeight;
    }
    //获取文档完整的高度
    function getScrollHeight()
    {
        return Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
    }

function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this, args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate & !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };
    var myEfficientFn = debounce(function() {
        // 滚动中的真正的操作
        var jian = 700;
        if (getScrollTop() + getClientHeight() + jian >= getScrollHeight()){
//            //dosomething
            aaa();
        }
    }, 200);

    // 绑定监听
    window.addEventListener('scroll', myEfficientFn);
    function aaa()
    {   
        var tr = $('.xuanx.avtive');
        var pid = tr.attr('pid');
        var index = tr.attr('index');
    	var init = tr.attr('init');

        console.log(init);
        if(init == 'false')
        {
            return false;
        }
        if(pid == 'inter')
        {   
            $.ajax('/newpro/newslistget',{
            type:'post',
            data:{pid:pid,index:index,_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data)
            {   

                if(data != false)
                {
                    tr.attr('index',data[0].index);
                    if(data[0].init == false)
                    {   
                        tr.attr('init','false');
                        tr.find('.more').css('display','block');
                    }
                    var str = "";
                    $.each(data,function(i,n){
                        var a = tr.find('.wenda').eq(0).clone(true);
                    
                        a.find('.wen').html(n.title+"<span class='add'>+</span>");
                        a.find('.wen').attr('id',n.id);
                        a.find('.da').html(n.content);
                        str += a[0].outerHTML;
                    })
                    tr.find('.more').before(str);
                    
                }
            },
            error:function(data)
            {
                alert('加载失败！');
            },
            'dataType':'json'
        })
            
            return false;
        }

        $.ajax('/newpro/newslistget',{
            type:'post',
            data:{pid:pid,index:index,_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data)
            {
                if(data != false)
                {
                    tr.attr('index',data[0].index);
                    if(data[0].init == false)
                    {
                        tr.attr('init','false');
                        tr.find('.more').css('display','block');
                    }
                    var str = "";
                    $.each(data,function(i,n){
                        var a = tr.find('.loop').eq(0).clone(true);
                        a.attr('href','/newpro/newslist/play/'+n.id);
                        if(n.titleimg[0] == 'h')
                        {
                            a.find('img').attr('src',n.titleimg);
                        }else
                        {
                            a.find('img').attr('src','/uploads/news/titleimg/'+n.titleimg);
                        }
                        a.find('img').attr('alt',n.title);
                        a.find('.name').html(n.title);
                        a.find('.content').html(n.leicon);
                        a.find('.time > span').eq(0).html('浏览数：'+n.click);
                        a.find('.time > span').eq(2).html(n.date);
                        str += a[0].outerHTML;
                    })
                    tr.find('.more').before(str);
                    
                }
            },
            error:function(data)
            {
                alert('新闻加载失败！');
            },
            'dataType':'json'
        })
    }



    $(".xuanx .wenda .wen").live('click',function(){
    var $this = $(this).next();
    var id = $(this).attr('id');
    if(!$this.attr('clicked') || $this.attr('clicked') === "no") { // 未点击
        $(this).parent().addClass("avtive");
        $this.attr('clicked', "yes"); // 重置属性
        $(this).find("span").html("-");
        $(this).next().addClass("avtive")
        click_set(id);
    } else if($this.attr('clicked') === "yes"){ // 被点击过
        $(this).parent().removeClass("avtive");
        $this.attr('clicked', "no");  // 重置属性
        $(this).find("span").html("+");
        $(this).next().removeClass("avtive")
    }
});
function click_set(id)
{
    if(!id)
    {
        return false;
    }

    $.ajax('/newpro/newslist/interlocution/interclick_set',{
        type:'get',
        data:{id:id}
    })
}
// $(function(){
// 	var curr = 0;
// 	$("#jsNav a.trigger").each(function(i){
// 		$(this).click(function(){
// 			curr = i;
// 			$("#js .banner1").eq(i).fadeIn("fast").siblings(".banner1").fadeOut("fast");
// 			$(this).addClass("imgSelected").siblings().removeClass("imgSelected");
// 		});
// 	});
// 	var timer = setInterval(function(){
// 		var go = (curr + 1) % 5;
// 		$("#jsNav a.trigger").eq(go).click();
// 	},3000);
// 	$("#js,#next,#prev").hover(function(){
// 		clearInterval(timer);
// 	},function(){
// 		timer = setInterval(function(){
// 		var go = (curr + 1) % 5;
// 		$("#jsNav a.trigger").eq(go).click();
// 	},3000);
// 	});
// 	$("#next").click(function(){
// 		if(curr == 4){
// 			var go = 0;
// 		}else{
// 			var go = (curr + 1) % 5;
// 		}
// 		$("#jsNav a.trigger").eq(go).click();
// 	});
// 	$("#prev").click(function(){
// 		if(curr == 0){
// 			var go = 4;
// 		}else{
// 			var go = (curr - 1) % 5;
// 		}
// 		$("#jsNav a.trigger").eq(go).click();
// 	});
// });
// $(".inf_a a").click(function(){
//     $(".inf_a a").removeClass("avtive").eq($(this).index()).addClass("avtive");
// });
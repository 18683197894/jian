window.onload = function(){
        wes();
    }
    function wes()
    {
        var src = $('#cnzz_stat_icon_1273388296 > a > img').attr('src');
        var rpl = src.substr(0,5);
        if(rpl == 'https') return false;
        src = src.replace('http','https');
        $('#cnzz_stat_icon_1273388296 > a > img').attr('src',src);
    }

    (function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
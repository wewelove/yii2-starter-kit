$(function () {
    $(".sidebar").slimScroll({
        width: '100%',  // 可滚动区域宽度
        height: '100%', // 可滚动区域高度
        size: '0',      // 滚动条宽度，即组件宽度
        railClass: 'slim-scroll-rail',      // 轨道div类名 
        barClass: 'slim-scroll-bar',        // 滚动条div类名
        wrapperClass: 'slim-scroll-box',    // 外包div类名
    });

    // 设置 Fancybox 弹框滚动条
    function setFancyboxSlimscroll() {
        var height = $(window).height() - 65 + 'px';

        $(".fancybox-slim-scroll").slimScroll({
            width: '100%',  // 可滚动区域宽度
            height: height, // 可滚动区域高度
            size: '0',      // 滚动条宽度，即组件宽度
        });  
    }

    // 窗口变化时重置 Fancybox 弹框滚动条
    $(window).on('resize', setFancyboxSlimscroll);

    // 初始化设置 Fancybox 弹框滚动条
    setFancyboxSlimscroll();
});
$(function() {
    $(".sidebar").slimScroll({
        width: '100%', //可滚动区域宽度
        height: '100%', //可滚动区域高度
        size: '5px', //滚动条宽度，即组件宽度
        color: '#000', //滚动条颜色
        position: 'right', //组件位置：left/right
        distance: '0px', //组件与侧边之间的距离
        start: 'top', //默认滚动位置：top/bottom
        opacity: .5, //滚动条透明度
        alwaysVisible: false, //是否 始终显示组件
        disableFadeOut: false, //是否 鼠标经过可滚动区域时显示组件，离开时隐藏组件
        railVisible: true, //是否 显示轨道
        railColor: '#333', //轨道颜色
        railOpacity: .2, //轨道透明度
        railDraggable: true, //是否 滚动条可拖动
        railClass: 'slim-scroll-rail', //轨道div类名 
        barClass: 'slim-scroll-bar', //滚动条div类名
        wrapperClass: 'slim-scroll-box', //外包div类名
        allowPageScroll: false, //是否 使用滚轮到达顶端/底端时，滚动窗口
        wheelStep: 10, //滚轮滚动量
        touchScrollStep: 200, //滚动量当用户使用手势
        borderRadius: '5px', //滚动条圆角
        railBorderRadius: '5px' //轨道圆角
    });
});
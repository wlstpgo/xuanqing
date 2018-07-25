@extends('web.layouts.main')
@section('after.js')
    @if($_system_config->is_alert_on == 0)
        <div id="modal-tit" class="modal modal-login">
            <div class="modal-content" style="width: 650px;height: 414px;padding: 0">
                <a href="" class="close bg-icon" style="top: 0;right: -20px;opacity: 1;background-color: #ccc"></a>
                <a href="javascript:;">
                    <img src="{{ $_system_config->alert_img }}" alt="">
                </a>
            </div>
        </div>
        <script>
            (function($){
                $(function(){
                    $('#modal-tit').modal();
                })
            })(jQuery);
        </script>
    @endif
@endsection
@section('content')
    <div id="page-container">
        <div>
            <img src="{{ asset('/web/images/111.jpg') }}" alt="">
        </div>
        <div class="first-game-wrap">

            <style>
                .ele-firstgame {
                    position: relative;
                }

                .ele-firstgame-1 {
                    width: 240px;
                    height: 230px;
                    float: left;
                    _display: inline;
                    position: relative;
                    overflow: hidden;
                    background: url(https://cdn.wsfsy.com/tpl/1552/892088/images/151729720482.png?713272) -240px bottom no-repeat;
                }

                .ele-firstgame-1 span {
                    width: 240px;
                    height: 230px;
                    background: url(https://cdn.wsfsy.com/tpl/1552/892088/images/151729720294.png?713272) left top no-repeat;
                    position: absolute;
                    top: 0;
                    left: 0;
                    cursor: pointer;
                }

                .ele-firstgame-2 {
                    width: 240px;
                    height: 230px;
                    float: left;
                    _display: inline;
                    position: relative;
                    overflow: hidden;
                    background: url(https://cdn.wsfsy.com/tpl/1552/892088/images/151729731940.png?713272) -240px bottom no-repeat;
                }

                .ele-firstgame-2 span {
                    width: 240px;
                    height: 230px;
                    background: url(https://cdn.wsfsy.com/tpl/1552/892088/images/151729731737.png?713272) left top no-repeat;
                    position: absolute;
                    top: 0;
                    left: 0;
                    cursor: pointer;
                }

                .ele-firstgame-3 {
                    width: 240px;
                    height: 230px;
                    float: left;
                    _display: inline;
                    position: relative;
                    overflow: hidden;
                    background: url(https://cdn.wsfsy.com/tpl/1552/892088/images/151729741566.png?713272) -240px bottom no-repeat;
                }

                .ele-firstgame-3 span {
                    width: 240px;
                    height: 230px;
                    background: url(https://cdn.wsfsy.com/tpl/1552/892088/images/151729741411.png?713272) left top no-repeat;
                    position: absolute;
                    top: 0;
                    left: 0;
                    cursor: pointer;
                }

                .ele-firstgame-4 {
                    width: 240px;
                    height: 230px;
                    float: left;
                    _display: inline;
                    position: relative;
                    overflow: hidden;
                    background: url(https://cdn.wsfsy.com/tpl/1552/892088/images/151729748276.png?713272) -240px bottom no-repeat;
                }

                .ele-firstgame-4 span {
                    width: 240px;
                    height: 230px;
                    background: url(https://cdn.wsfsy.com/tpl/1552/892088/images/151729748122.png?713272) left top no-repeat;
                    position: absolute;
                    top: 0;
                    left: 0;
                    cursor: pointer;
                }

                .ele-firstgame-5 {
                    width: 240px;
                    height: 230px;
                    float: left;
                    _display: inline;
                    position: relative;
                    overflow: hidden;
                    background: url(https://cdn.wsfsy.com/tpl/1552/892088/images/151729759775.png?713272) -240px bottom no-repeat;
                }

                .ele-firstgame-5 span {
                    width: 240px;
                    height: 230px;
                    background: url(https://cdn.wsfsy.com/tpl/1552/892088/images/151729759620.png?713272) left top no-repeat;
                    position: absolute;
                    top: 0;
                    left: 0;
                    cursor: pointer;
                }

                .ele-firstgame-6 {
                    width: 240px;
                    height: 230px;
                    float: left;
                    _display: inline;
                    position: relative;
                    overflow: hidden;
                    background: url(https://cdn.wsfsy.com/tpl/1552/892088/images/151729765077.png?713272) -240px bottom no-repeat;
                }

                .ele-firstgame-6 span {
                    width: 240px;
                    height: 230px;
                    background: url(https://cdn.wsfsy.com/tpl/1552/892088/images/151729764884.png?713272) left top no-repeat;
                    position: absolute;
                    top: 0;
                    left: 0;
                    cursor: pointer;
                }
            </style>

            <div class="ele-firstgame-wrap">
                <div class="clearfix ele-firstgame" id="js-firstgame-slider">
                    <a href="javascript:;" target="_blank" class="ele-firstgame-1 js-ele-firstgame-fade">
                        <span></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="ele-firstgame-2 js-ele-firstgame-fade">
                        <span></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="ele-firstgame-3 js-ele-firstgame-fade">
                        <span></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="ele-firstgame-4 js-ele-firstgame-fade">
                        <span></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="ele-firstgame-5 js-ele-firstgame-fade">
                        <span></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="ele-firstgame-6 js-ele-firstgame-fade">
                        <span></span>
                    </a>
                </div>
                <div class="first-jp-wrap">
                    <style>
                        /*超級彩金*/
                        .ele-jackpot-wrap {
                            position: relative;
                            width: 260px;
                            height: 45px;
                            line-height: 45px;
                            color: #FEEF00;
                            text-align: right;
                            font-size: 25px;
                            font-weight: bold;
                            cursor: pointer;
                        }
                    </style>
                    <div class="ele-jackpot-wrap">
                        <!-- BB彩金 -->
                        <div class="ele-jackpot ele-jackpot-explain" data-hall="bbin">
                            <span class="js-ele-JP1">15,412,019.75</span>
                        </div>
                        <script>
                            // 判斷機率大廳頁，若此DOM已存在則不執行
                            if (window.UPDATE_JP == undefined) {
                                (function () {
                                    var jpJs = document.createElement("script");
                                    jpJs.type = "text/javascript";
                                    jpJs.src = '/ipl/app/flash/publicbmw/EjpRemote.js';
                                    document.body.appendChild(jpJs);
                                })();

                                function UPDATE_JP(o) {
                                    o.JP1 = formatMoney(o.JP1);
                                    //o.JP2 = formatMoney(o.JP2);
                                    // Grand
                                    $('span.js-ele-JP1').html(o.JP1 || 0);
                                    // Major
                                    //$('#js-ele-JP2').html( o.JP2 || 0);
                                }
                            }

                            function formatMoney(s, type) {
                                // 數字驗證
                                // if (/[^0-9\.]/.test(s) || (s == null || s == "") ) return "0";
                                // 小數點取二位後四捨五入
                                s = (Math.round(s * 100) / 100).toString().replace(/^(\d*)$/, "$1.");
                                // 只取小數點下二位
                                s = (s + "00").replace(/(\d*\.\d{2})\d*/, "$1");
                                // 將小數點暫換逗號
                                s = s.replace(".", ",");
                                var re = /(\d)(\d{3},)/;
                                // 當首逗號前尚有四位數, 遞迴繼續
                                while (re.test(s)) {
                                    s = s.replace(re, "$1,$2");
                                }
                                // 將最末逗號換回小數點
                                s = s.replace(/,(\d{2})$/, ".$1");
                                /*if (type == 0) {// 不带小数位(默认是有小数位)
                                 var a = s.split(".");
                                 if (a[1] == "00") {
                                 s = a[0];
                                 }
                                 }*/
                                return s;
                            }
                        </script>
                    </div>

                    {{--<script>--}}
                    {{--$(function () {--}}
                    {{--var jp_info = {},--}}
                    {{--jpHall = '',--}}
                    {{--elsJpIframe = top.mem_index.document,--}}
                    {{--eleJpIsTpl = top.mem_index.topFrame,--}}
                    {{--eleJpDocHeight = $(elsJpIframe).height(),--}}
                    {{--eleJpOffsetLeft = +'0',--}}
                    {{--eleJpOffsetTop = +'0';--}}

                    {{--if ($('#js-ele-jp-info-css').length === 0) {--}}
                    {{--$('head', elsJpIframe).append('<link id="js-ele-jp-info-css" href="/cl/tpl/template/style/element/ele_jp_info.css" rel="stylesheet">');--}}
                    {{--}--}}

                    {{--//JP說明--}}
                    {{--$('.ele-jackpot-explain').click(function (e) {--}}
                    {{--//停止事件向上傳遞--}}
                    {{--e.stopPropagation();--}}

                    {{--var target_offset = $(this).offset();--}}

                    {{--jp_info = {--}}
                    {{--top: target_offset.top,--}}
                    {{--left: target_offset.left,--}}
                    {{--height: $(this).height()--}}
                    {{--},--}}
                    {{--jpHall = $(this).data('hall');--}}

                    {{--//無彩金將彩金說明塞到 iframe 下方--}}
                    {{--if ($('.ele-jp-info-' + jpHall).length === 0) {--}}
                    {{--var $jpInfoWrap = $('<div class="ele-jp-info-wrap ele-jp-info-' + jpHall + '"><div class="ele-jp-info-top"><span class="ele-jp-info-close"></span></div><div class="ele-jp-info-text"></div><div class="ele-jp-info-bot"></div></div>');--}}

                    {{--if (jpHall == 'bbin') {--}}
                    {{--$jpInfoWrap.find('.ele-jp-info-text').text("游戏提供四层神秘彩金(GRAND-BBIN连线超级彩金、MAJOR-争霸彩金、MINOR-双龙彩金、MINI-独赢彩金)，不定时送出高额大奖。其中MINI-独赢彩金以1:1派发，其余GRAND-BBIN连线超级彩金、MAJOR-争霸彩金、MINOR-双龙彩金则由系统随机决定比例派发。 彩金金额统一以人民币显示，派发时将依照玩家所属币别自动做换算。");--}}
                    {{--} else if (jpHall == '3d') {--}}
                    {{--$jpInfoWrap.find('.ele-jp-info-text').text("游戏提供四层神秘彩金(GRAND-BBIN连线超级彩金、MAJOR-争霸彩金、MINOR-双龙彩金、MINI-独赢彩金)，不定时送出高额大奖。其中MINI-独赢彩金以1:1派发，其余GRAND-BBIN连线超级彩金、MAJOR-争霸彩金、MINOR-双龙彩金则由系统随机决定比例派发。 彩金金额统一以人民币显示，派发时将依照玩家所属币别自动做换算。");--}}
                    {{--} else if (jpHall == 'mg') {--}}
                    {{--$jpInfoWrap.find('.ele-jp-info-text').text(jpHall);--}}
                    {{--}--}}

                    {{--$('body', elsJpIframe).prepend($jpInfoWrap);--}}
                    {{--}--}}

                    {{--//執行彩金說明定位--}}
                    {{--eleJpGetPos();--}}

                    {{--//有彩金，點擊出現--}}
                    {{--$('.ele-jp-info-wrap.ele-jp-info-' + jpHall, elsJpIframe)--}}
                    {{--.siblings('.ele-jp-info-wrap').hide().end()--}}
                    {{--.show();--}}
                    {{--});--}}

                    {{--//彩金說明定位--}}
                    {{--function eleJpGetPos() {--}}
                    {{--var eleJpInfoWrap = $('.ele-jp-info-wrap', elsJpIframe),--}}
                    {{--eleJpDocWidth = $(elsJpIframe).width(),--}}
                    {{--eleJpTopFrameWidth = (eleJpIsTpl ? $(top.mem_index.topFrame.document).width() : ''),--}}
                    {{--eleJpDifWidth = (eleJpDocWidth - eleJpTopFrameWidth) / 2,--}}
                    {{--eleJpTop = jp_info.top,--}}
                    {{--eleJpLeft = (eleJpIsTpl ? jp_info.left + eleJpDifWidth : jp_info.left),--}}
                    {{--elejpWidthResult = eleJpLeft + eleJpInfoWrap.width(),--}}
                    {{--elejpHeightResult = eleJpTop + eleJpInfoWrap.height();--}}

                    {{--//檢查是否有彩金說明，若沒有就 return--}}
                    {{--if (!(jp_info.top && jp_info.left && jp_info.height) || eleJpInfoWrap.length == 0) return;--}}

                    {{--eleJpInfoWrap.css({--}}
                    {{--'top': eleJpTop + jp_info.height - 30 + eleJpOffsetTop,--}}
                    {{--'left': eleJpLeft - 95 + eleJpOffsetLeft--}}
                    {{--});--}}

                    {{--//彩金說明出現時超過最小寬度，調整定位 left--}}
                    {{--if (elejpWidthResult > eleJpDocWidth) {--}}
                    {{--eleJpInfoWrap.css({--}}
                    {{--'left': eleJpLeft - (elejpWidthResult - eleJpDocWidth) - 50--}}
                    {{--});--}}
                    {{--}--}}

                    {{--//彩金說明超過文件內容高度時，向上移動--}}
                    {{--if (elejpHeightResult > eleJpDocHeight) {--}}
                    {{--eleJpInfoWrap.css({--}}
                    {{--'top': eleJpTop - (elejpHeightResult - eleJpDocHeight)--}}
                    {{--});--}}
                    {{--}--}}
                    {{--}--}}

                    {{--//隱藏彩金--}}
                    {{--function eleJpHide() {--}}
                    {{--$('.ele-jp-info-wrap', elsJpIframe).hide();--}}
                    {{--}--}}

                    {{--$(top.mem_index).on({--}}
                    {{--resize: function () {--}}
                    {{--eleJpHide();--}}
                    {{--},--}}
                    {{--click: function () {--}}
                    {{--eleJpHide();--}}
                    {{--}--}}
                    {{--});--}}

                    {{--$(top.mem_index).on('click', '.ele-jp-info-close', function () {--}}
                    {{--eleJpHide();--}}
                    {{--});--}}

                    {{--//停止點擊彩金說明時向上觸發--}}
                    {{--$(top.mem_index).on('click', '.ele-jp-info-wrap', function (e) {--}}
                    {{--e.stopPropagation();--}}
                    {{--});--}}

                    {{--//彩金說明觸發--}}
                    {{--$('#js-ele-jp-rule', elsJpIframe).click(function (e) {--}}
                    {{--e.stopPropagation();--}}
                    {{--$('.ele-jackpot-explain', elsJpIframe).trigger('click');--}}
                    {{--});--}}
                    {{--});--}}
                    {{--</script>--}}
                </div>
            </div>
            <script>
                $('.js-ele-firstgame-fade > span').hover(
                        function () {
                            $(this).css("background-position-x", "-240px")
                                    .parent()
                                    .css("background-position-x", "0");
                        }, function () {
                            $(this).css("background-position-x", "0")
                                    .parent()
                                    .css("background-position-x", "-240px");
                        }
                );
            </script>

        </div>
        <div class="first-body-link clearfix">
            <div class="live-link-wrap clearfix">
                <a href="/ag/playGame" class="live-link btn-live-link01"></a>
                <a href="/ag/playGame" class="live-link btn-live-link02"></a>
                <a href="/ag/playGame" class="live-link btn-live-link03"></a>
            </div>
            <div class="middle-link-wrap">
                <a href="/eg/playGame" class="btn-sports-link"></a>
                <a href="javascript:void(0)" onClick="alert(&#39;暂未开通！&#39;)" class="btn-lottery-link"></a>
            </div>
            <a href="/sj/mobe.html" target="_blank" class="btn-mobile"></a></div>
    </div>
@endsection

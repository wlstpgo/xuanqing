@extends('web.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('/web/css/9388/live.css') }}">

    <!--banner-->
    <div class="banner" style="height: 355px;">
        <div class="bd">
            <ul>
                <li>
                    <img src="{{ asset('/web/images/poker/banner.jpg') }}" alt="">
                </li>
            </ul>
        </div>
    </div>

    <!--notice-->


    <!--notice-->
    <div class="notice-row">
        <div class="noticeBox">
            <div class="w">
                <div class="title">
                    最新公告：
                </div>
                <div class="bd2">
                    <div id="memberLatestAnnouncement" style="cursor:pointer;color:#fff;">
                        <marquee id="mar0" scrollamount="3" scrolldelay="100" direction="left"
                                 onmouseover="this.stop();" onmouseout="this.start();">
                            @foreach($_system_notices as $v)
                                <span>~{{ $v->title }}~</span>
                                <span>{{ $v->content }}</span>
                            @endforeach
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="zhenrenPage">
        <div class="zhenren w">
            <ul>
                @if(in_array('MW', $_api_list))
                    <li>
                        <div class="xx4">
                            <span>MW棋牌厅</span>
                            <a href="javascript:void(0);" title="MW"
                               @if($_member) onclick="javascript:window.open('{{ route('mw.playGame') }}','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
                        </div>
                        <div class="xx5"><img src="{{ asset('/web/images/poker/mw.png') }}"></div>
                    </li>
                @endif
                @if(in_array('KG', $_api_list))
                    <li>
                        <div class="xx4">
                            <span>KG棋牌厅</span>
                            <a href="javascript:void(0);" title="KG"
                               @if($_member) onclick="javascript:window.open('{{ route('kg.playGame') }}','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
                        </div>
                        <div class="xx5"><img src="{{ asset('/web/images/poker/kg.png') }}"></div>
                    </li>
                @endif
                @if(in_array('KY', $_api_list))
                    <li>
                        <div class="xx4">
                            <span>开元棋牌厅</span>
                            <a href="javascript:void(0);" title="KY"
                               @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=ky&playType=5','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
                        </div>
                        <div class="xx5"><img src="{{ asset('/web/images/poker/ky.png') }}"></div>
                    </li>
                @endif

                <li class="more">

                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>

    <div class="notice_layer">
        <h3>公告详情 <span class="close"></span></h3>
        <div class="notice_con">
            @foreach($_system_notices as $v)
                <div class="module">
                    <h4>{{ $v->title }}</h4>
                    <p>✿{{ $v->content }}</p>
                </div>
            @endforeach
            {{--<div class="module">--}}
            {{--<h4>波音游戏</h4>--}}
            {{--<p>✿尊敬的腾博会会员， 由于波音平台电子游戏本身不具备记忆功能，如果您在游戏中由于网络连接服务器不稳定导致意外断线，重新登陆将无法继续完成上一局断开的游戏进程；很抱歉的告知您此类情况BBIN平台一律不予赔付，恕与本网站无关！ 建议您可以尝试PT、TTG、BSG或者MG平台游戏，种类更多，更有高达1.7%的洗码优惠！！！</p>--}}
            {{--</div>--}}
            {{--<div class="module">--}}
            {{--<h4>郑重声明</h4>--}}
            {{--<p>✿尊敬的会员，近期有很多私人QQ账号、QQ群和微信公众号冒充腾博会/腾博会代理的名义，四处招摇撞骗。在此腾博会提醒各位会员，请妥善保管好私人信息。网站所有优惠，充值方式，都以官网为准，请不要相信其他任何信息，以免造成不必要的损失！</p>--}}
            {{--</div>--}}
            {{--<div class="module">--}}
            {{--<h4>通知</h4>--}}
            {{--<p>✿ 最近波音平台检测到个别玩家有异常下注行为，影响到游戏的公平公正。根据波音平台处理意见，一旦波音平台查实，公司有权在毫无警告或通知下取消此会员所有的注单并冻结帐户，不予提款处理！对于不听劝告的玩家，后果自负！</p>--}}
            {{--</div>--}}
        </div>
    </div>
    <script>


        (function ($) {
            $(function () {

                //公告
                $('#mar0').on('click', function () {
                    var notice_index = layer.open({
                        type: 1,
                        title: false,
                        closeBtn: 0,
                        area: ['680px'],
                        skin: 'layui-layer-nobg', //没有背景色
                        shadeClose: true,
                        content: $('.notice_layer')
                    });

                    $('.notice_layer').on('click', '.close', function () {
                        layer.close(notice_index)
                    })
                })

            })
        })(jQuery)
    </script>
@endsection
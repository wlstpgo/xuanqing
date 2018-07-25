@extends('wap.layouts.main')
@section('after.css')

    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/css/main.css') }}">
@endsection
@section('content')

    @include('wap.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="m_banner">
                <div id="slide" class="container-fluid slide">
                    <ul class="bd">
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner1.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner2.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner3.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner4.jpg') }}"></a>
                        </li>
                    </ul>
                    <ul class="hd"></ul>
                </div>
            </div>

            <div class="m_notice">
                <span class="notice_logo"></span>
                <div class="pull-left notice_title">
                    系统公告:
                </div>
                <div class="pull-left notice_content">
                    <marquee id="mar0" behavior="scroll" direction="left" scrollamount="4">
                        @foreach($_system_notices as $v)
                            <div class="module" style="display: inline;word-break: keep-all;white-space: nowrap;">
                                <span>~{{ $v->title }}~</span>
                                <span>{{ $v->content }}</span>
                            </div>
                        @endforeach
                    </marquee>
                </div>
            </div>

            {{--视讯--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    视讯直播
                </div>
                @if(in_array('AG', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=ag&playType=2" target="_blank" >
                            <img src="{{ asset('/wap/images/m_box-live1.png') }}" alt="">
                          <span class="m_box-name">
                            AG视讯
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('SA', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=sa&playType=2" target="_blank" >
                            <img src="{{ asset('/wap/images/m_box-live4.jpg') }}" alt="">
                      <span class="m_box-name">
                        SA视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=bbin&playType=2" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-live7.jpg') }}" alt="">
                        <span class="m_box-name">
                        BB视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=bg&playType=2" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-live5.jpg') }}" alt="">
                        <span class="m_box-name">
                        BG视讯
                      </span>
                        </a>
                    </div>
                @endif
                 @if(in_array('GD', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=gd&playType=2" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-live4.jpg') }}" alt="">
                        <span class="m_box-name">
                        GD视讯
                      </span>
                        </a>
                    </div>
                @endif

                @if(in_array('SUNBET', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=sunbet&playType=2" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-live2.png') }}" alt="">
                        <span class="m_box-name">
                        SUNBET视讯
                      </span>
                        </a>
                    </div>
                @endif
				@if(in_array('DG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=dg&playType=2" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-live3.png') }}" alt="">
                        <span class="m_box-name">
                        DG视讯
                      </span>
                        </a>
                    </div>
                @endif

                 @if(in_array('ALLBET', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=allbet&playType=2" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-live3.png') }}" alt="">
                        <span class="m_box-name">
                        ALLBET视讯
                      </span>
                        </a>
                    </div>
                @endif

                 @if(in_array('LEBO', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=lebo&playType=2" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-live5.jpg') }}" alt="">
                        <span class="m_box-name">
                        LEBO视讯
                      </span>
                        </a>
                    </div>
                @endif
				
				
				
	            @if(in_array('OG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=og&playType=2" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-live2.png') }}" alt="">
                        <span class="m_box-name">
                        OG视讯
                      </span>
                        </a>
                    </div>
                @endif
				
            </div>

            {{--电子--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    电子游艺
                </div>
                @if(in_array('AG', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=ag&playType=1" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-game5.png') }}" alt="">
                          <span class="m_box-name">
                            AG电子
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('MG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=mg&playType=1" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-game2.png') }}" alt="">
                          <span class="m_box-name">
                            MG电子
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('PT', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=pt&playType=1" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-game3.png') }}" alt="">
                      <span class="m_box-name">
                        PT电子
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=bbin&playType=1" target="_blank">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-game4.png') }}" alt="">
                      <span class="m_box-name">
                        BB电子
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('TTG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=ttg&playType=1" target="_blank">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-game5.png') }}" alt="">
                          <span class="m_box-name">
                            TTG电子
                          </span>
                        </a>
                    </div>
                @endif
                 @if(in_array('GPI', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=gpi&playType=1" target="_blank">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-game6.png') }}" alt="">
                          <span class="m_box-name">
                            GPI电子
                          </span>
                        </a>
                    </div>
                @endif
                 @if(in_array('SG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=sg&playType=1" target="_blank">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-game7.png') }}" alt="">
                          <span class="m_box-name">
                            SG电子
                          </span>
                        </a>
                    </div>
                @endif
                 @if(in_array('PP', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=pp&playType=1" target="_blank">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-game8.png') }}" alt="">
                          <span class="m_box-name">
                            PP电子
                          </span>
                        </a>
                    </div>
                @endif
                 @if(in_array('QT', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=qt&playType=1" target="_blank">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-game9.png') }}" alt="">
                          <span class="m_box-name">
                            QT电子
                          </span>
                        </a>
                    </div>
                @endif

            </div>
            @if(in_array('AG', $_api_list))
                {{--捕鱼--}}
                <div class="m_wrapper clear" style="display: none;">
                    <div class="m_category">
                        捕鱼游戏
                    </div>
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=8" target="_blank">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-buyu1.png') }}" alt="">
                          <span class="m_box-name">
                            AG捕鱼
                          </span>
                        </a>
                    </div>
                </div>
            @endif

            {{--彩票--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    彩票游戏
                </div>
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=bbin&playType=3" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-lottory1.png') }}" alt="">
                          <span class="m_box-name">
                            BB彩票
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=bg&playType=3" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-lottory2.png') }}" alt="">
                          <span class="m_box-name">
                            BG彩票
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('YC', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('yc.playGame') }}?devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-lottory2.png') }}" alt="">
                        <span class="m_box-name">
                        YC彩票
                      </span>
                        </a>
                    </div>
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('yc.playGame') }}?gametype=Cash&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-lottory3.png') }}" alt="">
                        <span class="m_box-name">
                        YC国彩
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('EG', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('eg.playGame') }}?device=1">
                            <img src="{{ asset('/wap/images/m_box-lottory4.jpg') }}" alt="">
                            <span class="m_box-name">
                            EG彩票
                          </span>
                        </a>
                    </div>
                @endif
            </div>

            {{--体育--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    体育赛事
                </div>
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=bbin&playType=4" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-esports2.jpg') }}" alt="">
                          <span class="m_box-name">
                            BB体育
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('IBC', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=ibc&playType=4" target="_blank">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-esports3.png') }}" alt="">
                        <span class="m_box-name">
                        沙巴体育
                      </span>
                        </a>
                    </div>
                @endif

                 @if(in_array('SS', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=ss&playType=4" target="_blank">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-esports4.png') }}" alt="">
                        <span class="m_box-name">
                        皇冠体育
                      </span>
                        </a>
                    </div>
                @endif
            </div>
            {{--棋牌游戏--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    棋牌游戏
                </div>
				 @if(in_array('KY', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('ng.playGame') }}?gametype=ky&playType=5" target="_blank">
                            <img src="{{ asset('/wap/images/m_box-game5.png') }}" alt="">
                          <span class="m_box-name">
                            开元棋牌
                          </span>
                        </a>
                    </div>
                @endif
            </div>
            {{--优惠--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    优惠活动
                </div>
                <div class="m_box m_box-full">
                    <a class="m_box-link" href="{{ route('wap.activity_list') }}">
                        <img src="{{ asset('/wap/images/m_box-act2.png') }}" alt="">
                          <span class="m_box-name">
                            优惠活动
                          </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function ($) {
            $(function () {
                $('.disabled').on('click', function () {
                    alert('暂未开放，敬请期待！');
                });
            })
        })(jQuery)
    </script>

@endsection
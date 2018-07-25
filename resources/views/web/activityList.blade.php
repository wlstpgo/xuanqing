@extends('web.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('/web/css/activityList.css') }}">
    <div class="activityTab">
        <div class="tab_title">
            <ul>
                <li class="active"><a href="javascript:;">全部活动</a></li>
                <li><a href="javascript:;">老虎机</a></li>
                <li><a href="javascript:;">真人娱乐场</a></li>
                <li><a href="javascript:;">其他活动</a></li>
            </ul>
        </div>

        <div class="tab_content">
            <div class="content_box active">
                <ul style="">
                    @foreach($data as $item)
                        <li>
                            <img src="{{ $item->title_img }}" alt="">
                            <div class="more_info promo" >
                                <h3 class="more_title t1">{{ $item->title }}</h3>
                                <div>{!! $item->title_content !!}</div>
                                <h3 class="more_title t2">活动说明</h3>
                                <div>{!! $item->content !!}</div>
                                <h3 class="more_title t3">活动规则</h3>
                                <div>{!! $item->rule_content !!}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="content_box">
                <ul>
                    @foreach($data as $item)
                        @if($item->type == 5)
                            <li>
                                <img src="{{ $item->title_img }}" alt="">
                                <div class="more_info promo" >
                                    <h3 class="more_title t1">{{ $item->title }}</h3>
                                    <div>{!! $item->title_content !!}</div>
                                    <h3 class="more_title t2">活动说明</h3>
                                    <div>{!! $item->content !!}</div>
                                    <h3 class="more_title t3">活动规则</h3>
                                    <div>{!! $item->rule_content !!}</div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="content_box">
                <ul>
                    @foreach($data as $item)
                        @if($item->type == 6)
                            <li>
                                <img src="{{ $item->title_img }}" alt="">
                                <div class="more_info promo" >
                                    <h3 class="more_title t1">{{ $item->title }}</h3>
                                    <div>{!! $item->title_content !!}</div>
                                    <h3 class="more_title t2">活动说明</h3>
                                    <div>{!! $item->content !!}</div>
                                    <h3 class="more_title t3">活动规则</h3>
                                    <div>{!! $item->rule_content !!}</div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="content_box">
                <ul>
                    @foreach($data as $item)
                        @if($item->type == 7)
                            <li>
                                <img src="{{ $item->title_img }}" alt="">
                                <div class="more_info promo" >
                                    <h3 class="more_title t1">{{ $item->title }}</h3>
                                    <div>{!! $item->title_content !!}</div>
                                    <h3 class="more_title t2">活动说明</h3>
                                    <div>{!! $item->content !!}</div>
                                    <h3 class="more_title t3">活动规则</h3>
                                    <div>{!! $item->rule_content !!}</div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script>
        (function($){
            $(function () {

                navObj=5;
                var $content_box=$('.content_box');
                $('.content_box>ul>li>img').on('click',function () {
                    var $li=$(this).closest('li');
                    if(!$li.hasClass('active')){
                        $content_box.find('li.active').removeClass('active').find('.more_info').slideUp();
                        $li.addClass('active');
                        $li.find('.more_info').slideDown();
                    }else{
                        $li.find('.more_info').slideUp('slow',function(){
                            $li.removeClass('active');
                        });
                    }
                    return false;
                });

                $('.tab_title').on('click','li',function () {
                    $(this).addClass('active').siblings('li').removeClass('active');
                    var index=$(this).index();
                    $content_box.removeClass('active').eq(index).addClass('active');
                })
            })
        })(jQuery)
    </script>
@endsection
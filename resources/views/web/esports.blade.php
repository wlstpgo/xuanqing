@extends('web.layouts.main')
@section('content')

    <div class="body"
         style="background: url('{{ asset('/web/images/egame-banner-esports.jpg') }}') no-repeat;padding: 350px 0 100px">
        <div class="pages">
            <div class="sports w1000">
                <div class="sports_content">
                    {{--<a href="javascript:;"><img src="{{ asset('/web/images/sport1.png') }}"></a>--}}
                    @if(in_array('BBIN', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=bbin&playType=4','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif ><img
                                    src="{{ asset('/web/images/sport3.png') }}"></a>
                    @endif
                    @if(in_array('IBC', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=ibc&playType=4','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif><img
                                    src="{{ asset('/web/images/sport2.png') }}"></a>
                    @endif
                    @if(in_array('SS', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=ss&playType=4','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif><img
                                    src="{{ asset('/web/images/hgty.png') }}"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        (function ($) {
            $(function () {
                $('.live-ul li').on('mouseenter', function () {
                    $(this).addClass('on').siblings('li').removeClass('on');
                });

                $('.egameslide').on('click', '.disabled', function () {
                    layer.msg('暂未开通，敬请期待！', {icon: 6});
                    return false;
                });
                jQuery(".egameslide").slide({trigger: "click", mainCell: ".bd"});


                $("img.lazy").lazyload({
                    placeholder: "{{ asset('/web/images/egame-loading.gif') }}",
                    effect: "fadeIn",
                    skip_invisible: false  //解决滚动才显示的问题
                });

                $('.hot_recommond li').on('mouseenter', function () {
                    $(this).addClass('on').siblings('li').removeClass('on');
                })

            });


        })(jQuery)
    </script>
@endsection
@extends('web.layouts.main')
@section('content')
    <div class="body">
        <div class="by-bg">
            <div class="container by-nr">
                <div class="pullLeft ag-by-bg">
                    <a class="pullLeft @if(in_array('AG', $_api_list)) @else disabled @endif" href="javascript:;"
                       @if(in_array('AG', $_api_list))
                       @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=ag&playType=1','','width=1024,height=768')"
                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            @endif></a>
                </div>
                <div class="pullLeft pt-by-bg">
                    <a class="pullLeft @if(in_array('PT', $_api_list)) @else disabled @endif" href="javascript:;"
                       @if(in_array('PT', $_api_list))
                       @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=pt&playType=1','','width=1024,height=768')"
                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            @endif></a>
                </div>
                <div class="pullLeft mw-by-bg">
                    <a class="pullLeft @if(in_array('MW', $_api_list)) @else disabled @endif" href="javascript:;"
                       @if(in_array('MW', $_api_list))
                       @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=mw&playType=1','','width=1024,height=768')"
                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            @endif></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            navObj=5;
            $('.disabled').on('click', function () {
                layer.msg('暂未开放，敬请期待', {icon: 6});
            });
        })
    </script>

@endsection
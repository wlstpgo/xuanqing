<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
    <h1>电子类</h1>
@if(in_array('AG', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=ag&type=0" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif
@if(in_array('BBIN', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
       
        <iframe src="{{ route('ng.game_record') }}?gametype=bbin&type=0" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif

@if(in_array('MG', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=mg&type=0" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif

@if(in_array('PT', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=pt&type=0" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif


<!-- @if(in_array('SA', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=sa&type=0" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif -->

@if(in_array('TTG', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=ttg&type=0" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif

@if(in_array('GPI', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=gpi&type=0" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif

@if(in_array('SG', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=sg&type=0" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif


@if(in_array('PP', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=pp&type=0" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif


@if(in_array('QT', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=qt&type=0" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif


<h1>真人类</h1>

@if(in_array('AG', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=ag&type=1" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif


@if(in_array('BBIN', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=bbin&type=1" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif


@if(in_array('BG', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=bg&type=1" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif


@if(in_array('SA', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=sa&type=1" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif


@if(in_array('GD', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=gd&type=1" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif

@if(in_array('DG', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=dg&type=1" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif

@if(in_array('OG', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=og&type=1" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif



@if(in_array('SUNBET', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=sunbet&type=1" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif


@if(in_array('ALLBET', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=allbet&type=1" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif

@if(in_array('LEBO', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=lebo&type=1" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif


<h1>彩票类</h1>

@if(in_array('BBIN', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=bbin&type=2" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif


@if(in_array('BG', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=bg&type=2" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif

<h1>体育竞猜</h1>


@if(in_array('BBIN', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=bbin&type=3" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif
@if(in_array('IBC', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=ibc&type=3" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif

@if(in_array('SS', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=ss&type=3" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif

<h1>棋牌类</h1>

@if(in_array('KY', $_api_list))
    <div style="width: 100%;height:100px;margin: auto">
        <iframe src="{{ route('ng.game_record') }}?gametype=ky&type=4" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
@endif






</body>
</html>

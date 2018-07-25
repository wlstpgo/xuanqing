@extends('web.layouts.main')
@section('content')
  <link rel="stylesheet" href="{{ asset('/web/css/9388/live.css') }}">

  <!--banner-->
  <div class="banner" style="height: 355px;margin-top: 0;">
    <div class="bd">
      <ul>
        <li>
          <img src="{{ asset('/web/images/zhenren/banner.jpg') }}" alt="">
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
        @if(in_array('NAG', $_api_list))
          <li>
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logo2.png') }}" alt=""></div>
            <div class="xx2">日本AV荷官女郎<br>为您发牌</div>
            <div class="xx4">
              <span>AG 女优厅</span>
              <a href="javascript:void(0);" title="AG"
                 @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/2.png') }}"></div>
          </li>
        @endif
        @if(in_array('AG', $_api_list))
          <li>
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logo2.png') }}" alt=""></div>
            <div class="xx2">日本AV荷官女郎<br>为您发牌</div>
            <div class="xx4">
              <span>AG 女优厅</span>
              <a href="javascript:void(0);" title="AG"
                 @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=ag&playType=2','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/2.png') }}"></div>
          </li>
        @endif
        @if(in_array('BBIN', $_api_list))
          <li>
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logo3.png') }}" alt=""></div>
            <div class="xx2">亚洲最流行的<br>真人娱乐</div>
            <div class="xx4">
              <span>BBIN 旗舰厅</span>
              <a href="javascript:void(0);" title="BBIN"
                 @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=bbin&playType=2','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/3.png') }}"></div>
          </li>
        @endif
        @if(in_array('AB', $_api_list))
          <li>
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logo4.png') }}" alt=""></div>
            <div class="xx2">最专业的完善<br>的娱乐平台</div>
            <div class="xx4">
              <span>AB 视讯厅</span>
              <a href="javascript:void(0);" title="AB"
                 @if($_member) onclick="javascript:window.open('{{ route('ab.playGame') }}','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/4.png') }}"></div>
          </li>
        @endif
       <!--  @if(in_array('MG', $_api_list))
          <li>
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logo6.png') }}" alt=""></div>
            <div class="xx2">最专业的完善<br>的娱乐平台</div>
            <div class="xx4">
              <span>MG 视讯厅</span>
              <a href="javascript:void(0);" title="MG"
                 @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=4','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/6.png') }}"></div>
          </li>
        @endif -->
        @if(in_array('BG', $_api_list))
          <li>
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logo10.png') }}" alt=""></div>
            <div class="xx2">体验英式赌场的<br>视觉冲击</div>
            <div class="xx4">
              <span>BG 旗舰厅</span>
              <a href="javascript:void(0);" title="BG"
                 @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=bg&playType=2','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/7.png') }}"></div>
          </li>
        @endif
        @if(in_array('PT', $_api_list))
          <li style="display: none;">
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logo11.png') }}" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>PT 视讯厅</span>
              <a href="javascript:void(0);" title="PT"
                 @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=pt&playType=2','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/8.png') }}"></div>
          </li>
        @endif
        @if(in_array('CG', $_api_list))
          <li>
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logo12.png') }}" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>CG 视讯厅</span>
              <a href="javascript:void(0);" title="CG"
                 @if($_member) onclick="javascript:window.open('{{ route('cg.playGame') }}','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/9.png') }}"></div>
          </li>
        @endif
        @if(in_array('SA', $_api_list))
          <li>
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logosa.png') }}" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>SA 视讯厅</span>
              <a href="javascript:void(0);" title="SA"
                 @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=sa&playType=2','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/5.png') }}"></div>
          </li>
        @endif
        @if(in_array('GD', $_api_list))
          <li style="">
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logogd.png') }}" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>GD 视讯厅</span>
              <a href="javascript:void(0);" title="GD"
                 @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=gd&playType=2','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/11.png') }}"></div>
          </li>
        @endif
         @if(in_array('DG', $_api_list))
          <li style="">
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logodg.png') }}" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>DG 视讯厅</span>
              <a href="javascript:void(0);" title="DG"
                 @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=dg&playType=2','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/8.png') }}"></div>
          </li>
        @endif
        @if(in_array('OG', $_api_list))
          <li>
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logo7.png') }}" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>OG 视讯厅</span>
              <a href="javascript:void(0);" title="OG"
                 @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=og&playType=2','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/12.png') }}"></div>
          </li>
        @endif
        @if(in_array('SUNBET', $_api_list))
          <li>
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logosb.png') }}" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>申博视讯厅</span>
              <a href="javascript:void(0);" title="SUNBET"
                 @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=sunbet&playType=2','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/1.png') }}"></div>
          </li>
        @endif
        @if(in_array('EBET', $_api_list))
          <li>
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logoebet.png') }}" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>EBET视讯厅</span>
              <a href="javascript:void(0);" title="EBET"
                 @if($_member) onclick="javascript:window.open('{{ route('ebet.playGame') }}','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/10.png') }}"></div>
          </li>
        @endif
        @if(in_array('ALLBET', $_api_list))
          <li>
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logo4.png') }}" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>ALLBET </span>
              <a href="javascript:void(0);" title="ALLBET"
                 @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=allbet&playType=2','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/9.png') }}"></div>
          </li>
        @endif
          @if(in_array('LEBO', $_api_list))
          <li>
            <div class="xx1"><img src="{{ asset('/web/images/zhenren/logo1.png') }}" alt=""></div>
            <div class="xx2">最专业的完善的<br>娱乐平台</div>
            <div class="xx4">
              <span>LEBO </span>
              <a href="javascript:void(0);" title="LEBO"
                 @if($_member) onclick="javascript:window.open('{{ route('ng.playGame') }}?gametype=lebo&playType=2','','width=1024,height=768')"
                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>进入游戏</a>
            </div>
            <div class="xx5"><img src="{{ asset('/web/images/zhenren/4.png') }}"></div>
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
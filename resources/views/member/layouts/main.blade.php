<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $_system_config->site_title  or 'motoo' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/web/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/fonts/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/rendezvous.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/index1.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/cornucopia.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/fonts/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/yk_modal.css') }}">
    <script src="{{ asset('/web/js/jquery-2.1.3.min.js') }}"></script>
</head>
<body>

@include('web.layouts.header')

<div class="container user_con" style="margin-top: 50px;">
    <div class="user_left fl">
        <ul>
            <li @if(in_array($web_route, ['member.userCenter', 'member.account_load', 'member.bank_load', 'member.update_bank_info','member.message_list'])) class="active" @endif>
                <a href="{{ route('member.userCenter') }}">个人资料</a>
            </li>
            <li @if(in_array($web_route, ['member.safe_psw', 'member.login_psw'])) class="active" @endif>
                <a href="{{ route('member.safe_psw') }}">安全管理</a>
            </li>
            <li @if(in_array($web_route, ['member.finance_center', 'member.member_drawing', 'member.indoor_transfer', 'member.weixin_pay', 'member.ali_pay', 'member.bank_pay'])) class="active" @endif>
                <a href="{{ route('member.finance_center') }}">财务中心</a>
            </li>
            <li @if(in_array($web_route, ['member.customer_report'])) class="active" @endif>
                <a href="{{ route('member.customer_report') }}">客户报表</a>
            </li>
            <li @if(in_array($web_route, ['member.service_center', 'member.complaint_proposal'])) class="active" @endif>
                <a href="{{ route('member.service_center') }}">服务中心</a>
            </li>
            {{--<li>--}}
                {{--<a href="{{ route('member.safe_psw') }}"><i class="iconfont">&#xe60b;</i>自助优惠</a>--}}
            {{--</li>--}}
        </ul>
    </div>
    <div class="user_right ">
        @yield('content')
    </div>
</div>
@include('web.layouts.aside')
@include('web.layouts.footer')

<script src="{{ asset('/web/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('/web/js/index1.js') }}"></script>
<script src="{{ asset('/web/js/common.js') }}"></script>
<script src="{{ asset('/web/js/yk_modal.js') }}"></script>
<script src="{{ asset('/web/js/jquery.SuperSlide.2.1.1.js') }}"></script>
<script src="{{ asset('/web/layer/layer.js') }}"></script>
<script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>
<script src="{{ asset('/web/js/rendezvous.js') }}"></script><!--日历-->
<script src="{{ asset('/web/js/jquery.page.js') }}"></script><!--翻页-->
<script src="{{ asset('/web/My97DatePicker/WdatePicker.js') }}"></script><!--起止时间日历 My97DatePicker-->
@yield('after.js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
</script>
</body>
</html>
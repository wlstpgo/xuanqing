@extends('web.layouts.main')
@section('content')
    <div class="top_margin" style="margin-top: 30px;">
        <div class="container">
            <div class="register_con">
                <div class="top">
                    <a href="javascript:;" class="active" style="width: 100%">填写账户信息</a>
                    {{--<a href="javascript:;"><span class="num">②</span>填写详细资料</a>--}}
                    {{--<a href="javascript:;"><span class="num">③</span>注册成功</a>--}}
                </div>
                <div class="register_left">
                    <div class="bank_tips">温馨提示： 标志*为必填项目 注意：如发现客户拥有多个账户，其帐户将会被冻结并且取消所有胜出的投注，恕不另行通知。</div>
                    <div class="line_form">
                        <form method="POST" action="{{ route('web.post_register_one') }}">
                            <input type="hidden" name="i_code" value="{{ $i_code }}">
                            <div class="line">
                                <span class="tit">推荐人账号</span>
                                <input class="inp" name="t_name" value="">
                            </div>
                            <div class="line">
                                <span class="tit">登录账号</span>
                                {{--<div class="add_form">--}}
                                    {{--<span class="front">tb</span>--}}
                                    <input class="inp" name="name" value="{{ $register_name }}" maxlength="9">
                                {{--</div>--}}
                                <span class="tips"><span class="themeCr">*</span>必须是6-9个字符，只能使用字母、数字</span>
                            </div>
                            <div class="line">
                                <span class="tit">登录密码</span>
                                <input type="password" class="inp" name="password" placeholder="" maxlength="12">
                                <span class="tips"><span class="themeCr">*</span>6-12位字符</span>
                            </div>
                            <div class="line">
                                <span class="tit">确认密码</span>
                                <input type="password" class="inp" name="password_confirmation" maxlength="12">
                                <span class="tips"><span class="themeCr">*</span>必须与登录密码一致</span>
                            </div>
                            <div class="line">
                                <span class="tit">提款密码</span>
                                <input type="password" class="inp" name="qk_pwd" maxlength="6">
                                <span class="tips"><span class="themeCr">*</span>必填，6位纯数</span>
                            </div>
                            <div class="line">
                                <span class="tit">验证码</span>
                                <input type="text" class="inp" name="captcha" maxlength="4">
                                <span class="tips"><span class="themeCr">*</span></span>
                                <div class="yzm-img"><a onclick="javascript:re_captcha_re();" ><img src="{{ URL('kit/captcha/1') }}" id="c2c98f0de5a04167a9e427d883690ff67"></a></div>
                                <script>
                                    function re_captcha_re() {
                                        $url = "{{ URL('kit/captcha') }}";
                                        $url = $url + "/" + Math.random();
                                        document.getElementById('c2c98f0de5a04167a9e427d883690ff67').src=$url;
                                    }
                                </script>
                            </div>
                            <div class="line minline">
                                <span class="tit"></span>
                                <input type="checkbox" class="checkbox" checked="checked" name="check1" value="1">
                                提呈申请的同时，本人已超过合法年龄以及本人在此网站的所有活动幷没有抵触本人所身在的国家所管辖的法律。
                            </div>
                            <div class="line minline">
                                <span class="tit"></span>
                                <input type="checkbox" class="checkbox" checked="checked" name="check2" value="2">
                                本人也接受在此项申请下有关的所有规则与条例以及隐私声明。
                            </div>
                            <div class="line">
                                <span class="tit"></span>
                                <a href="javascript:;" class="ajax-submit-without-confirm-btn account_save">确定</a>
                                <a href="javascript:void(0)" class="account_save">重新填写</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="register_links">
                    <img src="{{ asset('/web/images/n-reg-bg3a.png') }}">
                </div>
            </div>

            @include('web.layouts.hot_act')
        </div>
    </div>
@endsection
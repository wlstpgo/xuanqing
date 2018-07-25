@extends('wap.layouts.main')
@section('content')
    @extends('wap.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="m_login">
                <img src="{{ asset('/wap/images/bg_welcome.png') }}" alt="">
                <div class="m_login-form">
                    <form id="loginForm"  action="{{ route('wap.login.post') }}" method="post">
                        <div class="m_login-field">
                            <input type="text" placeholder="账号"  id="username" name="name">
                        </div>
                        <div class="m_login-field">
                            <input type="password" placeholder="密码"  id="passwd" name="password">
                        </div>
                        <div class="m_login-field textRight">
                            <a href="javascript:;" class="m_forget-pwd">忘记密码</a>
                        </div>
                        <div class="m_login-field">
                            <input type="hidden" name="act" value="login">
                            <button type="submit" class="m_login-submit ajax-submit-btn">登入</button>
                        </div>
                        <div class="m_addUs">
                            <a href="{{ route('wap.register') }}" class="m_btn-join">免费加入</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
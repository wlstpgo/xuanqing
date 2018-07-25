<!--登录模态框-->
<div id="login" class="modal modal-login">
    <div class="modal-content">
        <form method="POST" action="{{ route('member.login.post') }}">
            <a href="" class="close bg-icon"></a>
            <div class="modal-login_form">
                <h2>用户登录</h2>
                <div class="modal-login_line">
                    <input class="username" type="text" placeholder="请输入用户名" required name="name">
                </div>
                <div class="modal-login_line">
                    <input class="psw" type="password" placeholder="请输入密码" required name="password">
                </div>
                <!-- <div class="modal-login_line code">
                    <input type="text" placeholder="请输入验证码" required name="code">
                    <img src="" alt="" width="100">
                </div> -->
                <div class="modal-login_line">
                    <button class="modal-login_submit ajax-submit-btn" type="button">登录</button>
                </div>
                <div class="modal-login_link clear">
                    <p class="pullRight">
                        还没有账号？
                        <a href="{{ route('web.register_one') }}">点击注册</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

{{--手机投注模态框--}}
<div id="mobileBet" class="modal modal-mobileBet">
    <div class="modal-content">
        <a href="" class="close bg-icon"></a>
        111
    </div>
</div>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?38de67e8eb5fe11e77912770f1dc32a5";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--半透明遮罩层-->
<div class="backdrop"></div>


<div id="page-header">
    <div id="navfixed" class="mainnav-placeholder">
        <div class="header">
            <div class="header-wrap"><!-- LOGO -->
                <div class="header-logo">
                    <img src="{{ $_system_config->site_logo }}" width="180" height="158">
                    {{--<script>var ms = 600;--}}
                    {{--$('#ele-logo-wrap > a').hover(function () {--}}
                    {{--$(this).stop().animate({'opacity': 0}, ms);--}}
                    {{--}, function () {--}}
                    {{--$(this).stop().animate({'opacity': 1}, ms);--}}
                    {{--});</script>--}}
                </div>
                <div class="header-top-wrap">
                    <div class="header-top clearfix"><!-- 自訂連結 -->
                        <div class="top-link-wrap">
                            <a href="javascript:;" target="mem_index" data-color="#29C74C|#F50520"
                               class="js-article-color top-custom-link"
                               style="color: rgb(41, 199, 76);">电子游戏
                            </a>
                            <span>|</span>
                            <a href="javascript:;" data-color="#2E6DEA|#F50520"
                               class="js-article-color top-custom-link daili_apply"
                               style="color: rgb(46, 109, 234);">代理申请
                            </a>
                            <span>|</span>
                            <a href="{{ route('web.catchFish') }}" data-color="#FFFF00"
                               class="js-article-color top-custom-link"
                               style="color: #FFFF00">AG捕鱼机
                            </a>
                            <span>|</span>
                            <a href="{{ route('member.finance_center') }}"
                               data-color="#412EEA|#ea2eb2" class="js-article-color top-custom-link"
                               style="color: rgb(65, 46, 234);">
                                微信、支付宝快捷支付</a>
                            <span>|</span>
                            <a href="{{ route('web.activityList') }}" data-color="#EA2E32|#32EA2E"
                               class="js-article-color top-custom-link"
                               style="color: rgb(234, 46, 50);">
                                ❤优惠大厅自助申请❤
                            </a>
                            <span>|</span>
                            <a href="{{ route('web.activityList') }}" data-color="#EA2EC7|#2E45EA"
                               class="js-article-color top-custom-link"
                               style="color: rgb(234, 46, 199);">
                                →电子游戏优惠专题←
                            </a>
                        </div>
                        {{--<span class="lang-wrap">--}}
                        {{--<span class="ele-lang-wrap">--}}
                        {{--<a href="#" target="mem_index" class="ele-lang-option ele-lang-zh-tw" title="繁體中文"></a>--}}
                        {{--<a href="#" target="mem_index" class="ele-lang-option ele-lang-zh-cn" title="简体中文"></a>--}}
                        {{--<a href="#" target="mem_index" class="ele-lang-option ele-lang-en" title="English"></a>--}}
                        {{--</span>--}}
                        {{--</span>--}}
                    </div>
                    <div class="mainnav-wrap clear">
                        <!-- 導覽列元件 -->
                        <style>/* 主選單 */
                            .ele-navbar-wrap, .ele-navbar-wrap li {
                                position: relative;
                            }

                            .ele-navbar-wrap .ele-nav-title, .ele-navbar-wrap .ele-nav-subtitle {
                                text-overflow: ellipsis;
                                overflow: hidden;
                                white-space: nowrap;
                            }

                            .ele-navbar-wrap .ele-nav-hot {
                                position: absolute;
                                z-index: 1;
                                display: block;
                            }

                            .ele-subnav-group a, .ele-more-wrap a {
                                text-overflow: ellipsis;
                                overflow: hidden;
                                white-space: nowrap;
                            }

                            .ele-more-wrap .ele-nav-subtitle, .ele-more-wrap .ele-nav-hot {
                                display: none;
                            }
                        </style>
                        <div id="js-ele-navbar" class="ele-navbar-wrap">
                            <ul class="clearfix">
                                <li id="js-ele-nav-first" class="ele-nav-first ele-navnum-1">
                                    <a class="ele-navlink @if($web_route == 'web.index') current @endif" data-tag="first" href="{{ route('web.index') }}"
                                       title="首页">
                                        <span class="js-flashing ele-nav-title" data-color="#EDEDED"
                                              style="color: rgb(237, 237, 237);">
                                            首页
                                        </span>
                                        <span class="js-flashing ele-nav-subtitle" data-color="#434343"
                                              style="color: rgb(67, 67, 67);">
                                            HOME
                                        </span>
                                    </a>
                                </li>
                                <li id="js-ele-nav-game" class="ele-nav-game ele-navnum-2">
                                    <a class="ele-navlink drop-menu @if($web_route == 'web.eGame') current @endif" data-tag="game"
                                       href="{{ route('web.eGame') }}" title="电子游艺">
                                        <img class="ele-nav-hot" src="{{ asset('/web/images') }}/151729676257.gif">
                                        <span class="js-flashing ele-nav-title" data-color="#EDEDED"
                                              style="color: rgb(237, 237, 237);">
                                            电子游艺
                                        </span>
                                        <span class="js-flashing ele-nav-subtitle" data-color="#f7e43b|#F02428"
                                              style="color: rgb(247, 228, 59);">
                                            CASINO
                                        </span>
                                    </a>
                                </li>
                                <li id="js-ele-nav-live" class="ele-nav-live ele-navnum-3">
                                    <a class="ele-navlink drop-menu @if($web_route == 'web.liveCasino') current @endif" data-tag="live"
                                       href="{{ route('web.liveCasino') }}"
                                       title="视讯直播">
                                        <span class="js-flashing ele-nav-title"
                                              data-color="#EDEDED" style="color: rgb(237, 237, 237);">
                                            视讯直播
                                        </span>
                                        <span class="js-flashing ele-nav-subtitle" data-color="#fdfdfc"
                                              style="color: rgb(253, 253, 252);">
                                            LIVE CASINO
                                        </span>
                                    </a>
                                </li>
                                <li id="js-ele-nav-ball" class="ele-nav-ball ele-navnum-4">
                                    <a class="ele-navlink drop-menu @if($web_route == 'web.lottory') current @endif"
                                       data-tag="ball" href="{{ route('web.lottory') }}" title="彩票游戏">
                                        <img class="ele-nav-hot" src="{{ asset('/web/images') }}/151729676257.gif">
                                        <span class="js-flashing ele-nav-title" data-color="#EDEDED"
                                              style="color: rgb(237, 237, 237);">
                                            彩票游戏
                                        </span>
                                        <span class="js-flashing ele-nav-subtitle" data-color="#f7e43b|#F02428"
                                              style="color: rgb(247, 228, 59);">
                                            LOTTERY
                                        </span>
                                    </a>
                                </li>
                                <li id="js-ele-nav-ltlottery" class="ele-nav-ltlottery ele-navnum-5">
                                    <a class="ele-navlink @if($web_route == 'web.catchFish') current @endif"
                                       data-tag="ltlottery" href="{{ route('web.catchFish') }}" title="捕鱼游戏">
                                        <span class="js-flashing ele-nav-title" data-color="#EDEDED"
                                              style="color: rgb(237, 237, 237);">
                                            捕鱼游戏
                                        </span>
                                        <span class="js-flashing ele-nav-subtitle" data-color="#FDFDFC"
                                              style="color: rgb(253, 253, 252);">
                                            CATCHFISH
                                        </span>
                                    </a>
                                </li>
                                <li id="js-ele-nav-customize2" class="ele-nav-customize2 ele-navnum-7">
                                    <a class="ele-navlink @if($web_route == 'web.poker') current @endif" data-tag="customize2"
                                       href="{{ route('web.poker') }}" title="棋牌游戏">
                                        <span class="js-flashing ele-nav-title" data-color="#EDEDED"
                                              style="color: rgb(237, 237, 237);">
                                            棋牌游戏
                                        </span>
                                        <span class="js-flashing ele-nav-subtitle" data-color="#FDFDFC"
                                              style="color: rgb(253, 253, 252);">
                                            MOBILE BET
                                        </span>
                                    </a>
                                </li>
                                <li id="js-ele-nav-customize1" class="ele-nav-customize1 ele-navnum-6">
                                    <a class="ele-navlink @if($web_route == 'web.activityList') current @endif" data-tag="customize1"
                                       href="{{ route('web.activityList') }}"
                                       title="优惠活动">
                                        <img class="ele-nav-hot" src="{{ asset('/web/images') }}/151729695382.gif">
                                        <span class="js-flashing ele-nav-title" data-color="#EEEEEE|#FF0000"
                                              style="color: rgb(238, 238, 238);">
                                            优惠活动
                                        </span>
                                        <span class="js-flashing ele-nav-subtitle" data-color="#EEEEEE|#FF0000"
                                              style="color: rgb(238, 238, 238);">
                                            PROMOTIONS
                                        </span>
                                    </a>
                                </li>
                                <li id="js-ele-nav-customize3" class="ele-nav-customize3 ele-navnum-8">
                                    <a class="ele-navlink  " data-tag="customize3" href="javascript:;" title="在線客服"
                                       onclick="window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                                        <span class="js-flashing ele-nav-title" data-color="#EDEDED"
                                              style="color: rgb(237, 237, 237);">
                                            在線客服
                                        </span>
                                        <span class="js-flashing ele-nav-subtitle" data-color="#FDFDFC"
                                              style="color: rgb(253, 253, 252);">
                                            ONLINE SERVICE
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- 置頂登入 -->
                    <div id="loginfixed" class="loginFixed-wrap">
                        @if (Auth::guard('member')->guest())
                            <form name="LoginFormFixed" class="clearfix" action="{{ route('member.login.post') }}"
                                  id='aciii' method="POST">
                                <input type="hidden" name="uid2" value="guest">
                                <input type="hidden" name="SS" value="">
                                <input type="hidden" name="SR" value="">
                                <input type="hidden" name="TS" value="">
                                <p class="login-unit login-unit-user">
                                    <input name="name" id="name" type="text" placeholder="账号"
                                           maxlength="9" class="login-input login-acc" required="">
                                </p>
                                <p class="login-unit login-unit-pwd">
                                    <input name="password" id="password" type="password" autocomplete="off"
                                           size="13" placeholder="密码" maxlength="13"
                                           class="js-pw-input login-input" required="">
                                    <a class="forget-pw" href="#" onClick="alert('忘记密码，请联系客服！')">忘记?</a>
                                </p>
                                <p class="login-unit login-unit-chk">
                                    <input id='captcha' name="captcha" type="text" size="7" maxlength="4"
                                           placeholder="验证码" class="js-chk-input login-input" required="">
                                    <a onClick="re_captcha();">
                                        <img class="vertifyCode" src="{{ URL('kit/captcha/1') }}"
                                             id="c2c98f0de5a04167a9e427d883690ff5"
                                             width="70" height="34">
                                    </a>
                                    <script>
                                        function re_captcha() {
                                            $url = "{{ URL('kit/captcha') }}";
                                            $url = $url + "/" + Math.random();
                                            document.getElementById('c2c98f0de5a04167a9e427d883690ff5').src = $url;
                                        }
                                    </script>
                                </p>
                                <input id='ccctb' class="login-submit ajax-submit-btn" type="button" value="立即登入">
                                <a class="header-join" href="{{ route('web.register_one') }}">立即开户</a>
                            </form>
                        @else
                            <div>
                                <span class="name">会员帐号：<strong>{{ $_member->name }}</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="balance">余额：<strong>{{ $_member->money }}</strong></span>
                            </div>
                            <a title="额度转换" href="{{ route('member.indoor_transfer') }}">额度转换</a>&nbsp;&nbsp;|&nbsp;
                            &nbsp;
                            <a title="我要存款" href="{{ route('member.finance_center') }}">我要存款</a>&nbsp;&nbsp;|&nbsp;
                            &nbsp;
                            <a title="我要取款" href="{{ route('member.member_drawing') }}">我要取款</a>&nbsp;&nbsp;|&nbsp;
                            &nbsp;
                            <a title="账户记录" href="{{ route('member.customer_report') }}">账户记录</a>&nbsp;&nbsp;|&nbsp;
                            &nbsp;
                            <a title="账户管理" href="{{ route('member.userCenter') }}">账户管理</a>&nbsp;&nbsp;|&nbsp;
                            <a class="logoutbtn quit_btn" href="{{ route('member.logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出</a>
                            <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($web_route == 'web.index')
        <div class="login-position">
            <div class="login-container clearfix">
                <div class="login-wrap">
                    <div class="login-title"></div>
                    @if (Auth::guard('member')->guest())
                        <form name="LoginForm" action="{{ route('member.login.post') }}" id='aciii1' method="POST">

                            <input type="hidden" name="uid2" value="guest">
                            <input type="hidden" name="SS" value="">
                            <input type="hidden" name="SR" value="">
                            <input type="hidden" name="TS" value="">
                            <p class="login-unit login-unit-user">
                                <label for="username" class="login-placeholder STYLE1" style="opacity: 1;"></label>
                                <input name="name" id="name1" type="text" placeholder="输入账号" size="12"
                                       title="请填写 4-15 位大小写英数字" maxlength="16" class="login-input login-acc"
                                       tabindex="1" pattern="[a-zA-Z0-9]{4,15}" required="">
                            </p>
                            <p class="login-unit login-unit-pwd">
                                <label for="passwd" class="login-placeholder" style="opacity: 1;"></label>
                                <input name="password" id="password1" type="password" placeholder="输入密码"
                                       autocomplete="off" size="13" title="请填写 6-12 位大小写英数字" maxlength="13"
                                       class="login-input" tabindex="2" pattern="[a-zA-Z0-9]{6,13}" required="">
                            </p>
                            <p class="login-unit login-unit-chk">
                                <label for="rmNum" class="login-placeholder" style="opacity: 1;"></label>
                                <input name="captcha" type="text" placeholder="输入验证码" class="login-input" id="captcha1"
                                       tabindex="3" title="( 点选此处产生新验证码 )">
                                <a onClick="re_captchaa();">
                                    <img class="vertifyCode" src="{{ URL('kit/captcha/1') }}"
                                         id="c2c98f0de5a04167a9e427d883690ff6" width="70" height="34">
                                </a>
                                <script>
                                    function re_captchaa() {
                                        $url = "{{ URL('kit/captcha') }}";
                                        $url = $url + "/" + Math.random();
                                        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                                    }
                                </script>

                            </p>
                            <div class="btn-wrap clearfix">
                                <input id='ccctb1' class="login-submit ajax-submit-btn" type="button" value="会员登入"
                                       tabindex="4">
                                <a class="header-join" href="{{ route('web.register_one') }}">立即开户</a></div>
                            <div class="forget-pw-wrap">
                                <a class="forget-pw" href="javascript:;" onClick="alert('忘记密码，请联系客服！')">忘记密码</a></div>
                        </form>
                    @else
                        <div class="is-login-wrap">
                            <div class="is-login-title"></div>
                            <div class="mem-info">
                                <style>
                                    .ele-accinfo {
                                        display: inline-block;
                                        padding-right: 5px;
                                    }

                                    .ele-accinfo .fa {
                                        padding: 0 2px;
                                        font-size: 14px;
                                    }

                                    .ele-first-balance {
                                        display: inline-block;
                                    }

                                    .ele-acc-unit {
                                        display: inline-block;
                                    }

                                    .ele-obalance-wrap {
                                        position: relative;
                                        display: inline-block;
                                    }

                                    .ele-other-balance {
                                        cursor: pointer;
                                    }
                                </style>

                                <div class="ele-accinfo ele-acc-name">
                                    <span>帐号：</span><strong>{{ $_member->name }}</strong></div>
                                <div class="ele-acc-unit">
                                    <div id="_bbsportBalance" class="ele-accinfo ele-first-balance">
                                        <span>余额：</span>
                                        <strong>{{ $_member->money }}</strong>
                                    </div>
                                    <div id="js-ele-obalance-wrap1" class="ele-obalance-wrap">
                                        <div class="ele-accinfo ele-other-balance">
                                            <i class="fa fa-plus-square"></i>
                                        </div>

                                    </div>
                                </div>
                            </div><!--  sub  -->
                            <div class="SU-Menual">
                                <ul class="login-Menual clearfix">
                                    <li>
                                        <a id="su-macenter" href="{{ route('member.userCenter') }}"
                                           title="会员中心">会员中心</a></li>
                                    <li>
                                        ｜<a id="su-deposite" href="{{ route('member.finance_center') }}"
                                            title="线上存款">线上存款</a>
                                    </li>
                                    <li>
                                        ｜<a id="su-withdraw" href="{{ route('member.member_drawing') }}"
                                            title="线上取款">线上取款</a>
                                    </li>
                                    <li>
                                        <a id="su-switch" href="{{ route('member.indoor_transfer') }}"
                                           title="额度转换">额度转换</a>
                                    </li>
                                    <li>
                                        ｜<a id="su-msg" href="{{ route('member.userCenter') }}" title="账户管理">账户管理</a>
                                    </li>
                                    <li>
                                        ｜<a id="su-msg" href="{{ route('member.logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出登录
                                        </a>
                                        <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                    <li></li>
                                </ul>
                                <p>
                                    <a class="logoutbtn quit_btn" href="{{ route('member.logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><img
                                                src=".{{ asset('/web/images') }}/loginout-btn.png" alt=""></a>
                                <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div><!-- 最新消息 -->
    @endif
    <div class="news-wrap-bg">
        <div class="news-wrap clearfix">
            <div class="news-title">最新公告&nbsp;:</div>
            <div class="news-item ele-msg-cp">
                <div class="ele-news-txt"
                     style="display: inline-block; height: 40px; overflow: hidden; word-break: break-all; word-wrap: break-word; width: 900px;">
                    <div style="float: left; padding: 0px 900px; white-space: nowrap;"></div>
                    <marquee scrollamount="3" scrolldelay="100" direction="left" onMouseOver="this.stop();"
                             onMouseOut="this.start();" style="cursor: pointer;">澳门金沙娱乐城 天天反水 优惠活动天天有诚招代理详情联系在线客服.
                    </marquee>
                </div>

                <style>
                    .ele-msg-cp {
                        cursor: pointer;
                    }
                </style>
            </div>
        </div>
    </div>
</div>
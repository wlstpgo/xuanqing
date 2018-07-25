@extends('member.layouts.main')
@section('content')
    <div class="userbasic_head">
        <a href="{{ route('member.userCenter') }}">基本信息</a>
        <a href="{{ route('member.bank_load') }}" class="active">银行资料</a>
        <a href="{{ route('member.message_list') }}">站内消息</a>
    </div>
    <div class="userbasic_body ">
        <div class="bank_tips">温馨提示：一个手机只能绑定一个账号</div>
        <div class="line_form complaint_form ">
            <form action="{{ route('member.post_update_bank_info') }}" method="post">
                <div class="line">
                    <span class="tit">收款银行</span>
                    <select class="select" name="bank_name" style="margin-right: 0">
                        <option value="">--请选择--</option>
                        @foreach(\App\Models\Base::$BANK_TYPE as $v)
                            <option value="{{ $v }}" @if($_member->bank_name == $v) selected @endif>{{ $v }}</option>
                        @endforeach
                    </select>
                    <span class="tips"><span class="themeCr">*</span><span class="red">请选择收款银行</span></span>
                </div>
                {{--<div class="line">--}}
                    {{--<span class="tit">开户地址</span>--}}
                    {{--<input class="inp" placeholder="" name="bank_address" value="{{ $_member->bank_address }}">--}}
                    {{--<span class="tips"><span class="themeCr">*</span><span class="red">XXX省XXX市</span></span>--}}
                {{--</div>--}}
                <div class="line">
                    <span class="tit">开户行网点</span>
                    <input type="text" class="inp" name="bank_branch_name" value="{{ $_member->bank_branch_name }}">
                    <span class="tips"><span class="themeCr">*</span><span class="red">XX分行XX支行</span></span>
                </div>
                <div class="line">
                    <span class="tit">开户姓名</span>
                    <input type="text" class="inp" name="bank_username" value="{{ $_member->bank_username }}">
                    <span class="tips"><span class="themeCr">*</span><span class="red">收款姓名</span></span>
                </div>
                <div class="line">
                    <span class="tit">银行账号</span>
                    <input type="text" class="inp" name="bank_card" value="{{ $_member->bank_card }}">
                    <span class="tips"><span class="themeCr">*</span><span class="red">收款账号</span></span>
                </div>
                @if ($_system_config->is_sms_on == 0)
                <div class="line">
                    <span class="tit">输入手机号码</span>
                    <input type="text" class="inp" placeholder="手机号码" id="v_phone" maxlength="11" name="phone">
                    <a href="javascript:;" class="sendMsg">点击发送验证码</a>
                    <span class="tips"><span class="themeCr">*</span><span class="red">输入您的手机号码</span></span>
                </div>
                <div class="line line_ercode">
                    <span class="tit">输入验证码</span>
                    <input type="text" class="inp" placeholder="验证码" name="v_code">
                    <span class="tips"><span class="themeCr">*</span><span class="red">必填</span></span>
                </div>
                @endif

                <div class="line">
                    <span class="tit"></span>
                    <button type="button" class="ajax-submit-without-confirm-btn account_save">确定</button> <a href="{{ route('member.bank_load') }}" class="account_save">返回</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        var v_phone_url = "{{ route('sendSms') }}";
        (function($){
            $(function(){
                $('.sendMsg').on('click',function(){
                    var btn = $(this);
                    var phone = $('#v_phone').val();
                    var myreg = /^1[34578]\d{9}$/;
                    if(!myreg.test(phone))
                    {
                        layer.confirm('请输入有效的手机号码', {
                            btn: ['确定'] //按钮
                        });
                        return false;
                    }

                    $.ajax({
                        type: 'get',
                        url: v_phone_url,
                        data: {phone:phone},
                        dataType: "json",
                        success: function(data){
                            //layer.close(detailLoad);
                            btn.attr('disabled', false);

                            var html = '';
                            var obj = JSON.parse (data.status.msg);

                            for ( var p in obj )
                            {
                                if (typeof (obj[p]) == 'string')
                                {
                                    html+= '<p><b>'+ obj[p] + '</b></p>';
                                } else if(obj[p] instanceof Array)
                                {
                                    for (var i=0;i<obj[p].length;i++)
                                    {
                                        html+= '<p><b>'+ obj[p][i] + '</b></p>';
                                    }

                                }
                            }
                            //
                            if (data.status.errorCode == 0)
                            {
                                commomModule.codeCountDown(btn,60);
                                btn.attr('disabled', true);
                            }

                            layer.confirm(html, {
                                btn: ['确定'] //按钮
                            });

                        }
                    });
                });
            })
        })(jQuery)
    </script>

@endsection
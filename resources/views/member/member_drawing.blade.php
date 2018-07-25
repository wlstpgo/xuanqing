@extends('member.layouts.main')
@section('content')
<div class="userbasic_head">
    <a href="{{ route('member.finance_center') }}">会员存款</a>
    <a href="{{ route('member.member_drawing') }}"  class="active">会员提款</a>
    <a href="{{ route('member.indoor_transfer') }}">户内转账</a>
    {{--<a href="{{ route('member.finance_center') }}">自助入账</a>--}}
</div>
<div class="userbasic_body">
    <div class="bank_tips">温馨提示：每天提款次数不限 (当天北京时间00:00:00-次日23:59:59)</div>
    <div class="line_form">
        <form action="{{ route('member.drawing') }}" method="post">
            <div class="line">
                <span class="tit">开户姓名</span>
                {{ $_member->bank_username }}
            </div>
            <div class="line">
                <span class="tit">收款银行</span>
                {{ $_member->bank_name }}
            </div>
            <div class="line">
                <span class="tit">银行账号</span>
                {{ $_member->bank_card }}
            </div>
            {{--<div class="line">--}}
                {{--<span class="tit">开户地址</span>--}}
                {{--{{ $_member->bank_address }}--}}
            {{--</div>--}}
            <div class="line">
                <span class="tit">开户行网点</span>
                {{ $_member->bank_branch_name }}
            </div>
            <!-- <div class="line">
              <span class="tit">提款金额</span>
              <input type="text" class="inp" placeholder="输入提款金额(最低100)">
              <span class="tips"><span class="themeCr">*</span>提款金额不能少于100元</span>
            </div> -->
            <div class="line">
                <span class="tit">提款金额</span>
                <input type="text" class="inp" name="money" placeholder="输入提款金额(最低100)">
                <span class="tips error-tips"><i class="iconfont">&#xe743;</i>提款金额不能少于100元</span>
            </div>
            <div class="line">
                <span class="tit">取款密码</span>
                <input type="password" class="inp" name="qk_pwd" maxlength="6">
                {{--<i class="iconfont success-icon">&#xe88f;</i>--}}
            </div>
            <div class="line">
                <span class="tit"></span>
                <button type="button" class="ajax-submit-without-confirm-btn account_save">确定</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(function(){
        $('#drawing_submit_btn').click(function(){
            var btn = $(this);
            var go = false;

            layer.confirm('首次充值需20倍流水，否则需扣除提款金额60%的手续费,非首次需1倍流水，否则需扣除提款金额20%的手续费', {
                btn: ['确定', '取消'] //可以无限个按钮
            }, function(index, layero){
                go = true;
                if (go == true)
                {
                    btn.attr('disabled', true);
                    var form = btn.parents('form');

                    var url = form.attr('action');
                    var method = form.attr('method');

                    var rest_method = form.find("input[name='_method']");
                    var method_s = rest_method.length > 0 ? rest_method.val() : method;
                    var detailLoad = layer.load(2, {
                        shade: [0.2, '#ccc'], //遮罩层背景色、透明度,
                        //shade:false
                    });

                    $.ajax({
                        type: method_s,
                        url: url,
                        data: form.serialize(),
                        dataType: "json",
                        success: function(data){
                            layer.close(detailLoad);
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
                            layer.confirm(html, {
                                btn: ['确定'] //按钮
                            });
                            if (data.url)
                                location.href=data.url;
                            //else
                            //    layer.confirm(html, {
                            //        btn: ['确定'] //按钮
                            //    });

                        }
                    });
                }
            }, function(index){
                layer.close(index);
                return false;
            });


        })

    })
</script>
    @endsection

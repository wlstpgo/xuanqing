<div id="page-footer">
    {{--<div class="footer-top">--}}
        {{--<div class="footer-top-bg">--}}
            {{--<a class="footer-online-service"--}}
               {{--href="{{ $_system_config->service_link }}" target="_blank"></a>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="footer-center">--}}
        {{--<div class="footer-support-wrap">--}}
            {{--<a id="bblogo" href="{{ $_system_config->service_link }}" target="_blank"><img--}}
                        {{--src="{{ asset('/web/images/red.png') }}" border="0" width="73"></a>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="footer-bottom">
        <div class="article-menu"><a href="{{ $_system_config->service_link }}" target="mem_index" data-color=""
                                     class="js-article-color">關於我們</a><span>｜</span><a
                    href="{{ $_system_config->service_link }}" target="mem_index" data-color=""
                    class="js-article-color">聯絡我們</a><span>｜</span><a href="{{ $_system_config->service_link }}"
                                                                      target="mem_index" data-color="#0FF515|#EA1A1A"
                                                                      class="js-article-color"
                                                                      style="color: rgb(15, 245, 21);">合作夥伴</a><span>｜</span><a
                    href="{{ $_system_config->service_link }}" target="mem_index" data-color=""
                    class="js-article-color">存款幫助</a><span>｜</span><a href="{{ $_system_config->service_link }}"
                                                                      target="mem_index" data-color=""
                                                                      class="js-article-color">取款幫助</a><span>｜</span><a
                    href="{{ $_system_config->service_link }}" target="mem_index" data-color=""
                    class="js-article-color">常見問題</a></div>
        <div class="copyright">Copyright © 澳门金沙赌场Sands MACAO Reserved</div>
        {{--<div class="footer-info">拥有澳门政府颁发的博彩牌照，于2004年5月18日开幕</div>--}}
    </div>
</div>

<div id="dailiModal" class="modal modal-login modal-daili">
    <div class="modal-content">
        <form method="POST" action="{{ route('member.post_agent_apply') }}">
            <a href="" class="close bg-icon"></a>
            <div class="modal-login_form">
                <h2>代理申请</h2>
                <div class="modal-login_line">
                    <input type="text" placeholder="QQ" required name="qq">
                </div>
                <div class="modal-login_line">
                    <input type="text" placeholder="联系电话" required name="phone">
                </div>
                <div class="modal-login_line" style="height: auto;margin-bottom: 15px">
                    <textarea name="about" placeholder="填写申请"></textarea>
                </div>
                <div class="modal-login_line">
                    <button class="modal-login_submit ajax-submit-btn" type="button">确定</button>
                </div>
            </div>
        </form>
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
<script>
    var m = "{{ $_member }}";
    var u = "{{ route('web.login') }}";
    (function($){
        $(function(){
            $('.daili_apply').on('click',function(){
                if (!m)
                {
                    location.href=u
                }else{
                    $('#dailiModal').modal();
                }
            })
        })
    })(jQuery)
</script>

<div id="aboutUs" class="yk_modal">
    <div class="yk_modal-container">
        <a data-close="close" href="javascript:;" class="yk_modal-close"></a>
        <div class="yk_modal-hd"></div>
        <div class="yk_modal-content"></div>
        <div class="yk_modal-ft">
            <a href="javascript:;" class="yk_btn-sure">确定</a>
        </div>
    </div>
</div>
<div id="cunkuanHelp" class="yk_modal">
    <div class="yk_modal-container">
        <a data-close="close" href="javascript:;" class="yk_modal-close"></a>
        <div class="yk_modal-hd"></div>
        <div class="yk_modal-content"></div>
        <div class="yk_modal-ft">
            <a href="javascript:;" class="yk_btn-sure">确定</a>
        </div>
    </div>
</div>
<div id="qukuanHelp" class="yk_modal">
    <div class="yk_modal-container">
        <a data-close="close" href="javascript:;" class="yk_modal-close"></a>
        <div class="yk_modal-hd"></div>
        <div class="yk_modal-content"></div>
        <div class="yk_modal-ft">
            <a href="javascript:;" class="yk_btn-sure">确定</a>
        </div>
    </div>
</div>
<div id="normalQues" class="yk_modal">
    <div class="yk_modal-container">
        <a data-close="close" href="javascript:;" class="yk_modal-close"></a>
        <div class="yk_modal-hd"></div>
        <div class="yk_modal-content"></div>
        <div class="yk_modal-ft">
            <a href="javascript:;" class="yk_btn-sure">确定</a>
        </div>
    </div>
</div>
<div class="yk_backdrop"></div>

<script>
    (function($){
        $(function(){
            $('.aboutUs_modal').on('click',function(){
                $('#aboutUs').yk_modal({
                    animate:'slide',
                    width:'800px',
                    height:'500px',
                    title:'关于我们',
                    content:'{!! $about1->content !!}'
                });
            });
            $('.cunkuanHelp_modal').on('click',function(){
                $('#cunkuanHelp').yk_modal({
                    animate:'slide',
                    width:'800px',
                    height:'500px',
                    title:'存款帮助',
                    content:'{!! $about2->content !!}'
                });
            });
            $('.qukuanHelp_modal').on('click',function(){
                $('#qukuanHelp').yk_modal({
                    animate:'slide',
                    width:'800px',
                    height:'500px',
                    title:'取款帮助',
                    content:'{!! $about3->content !!}'
                });
            });
            $('.normalQues_modal').on('click',function(){
                $('#normalQues').yk_modal({
                    animate:'slide',
                    width:'800px',
                    height:'500px',
                    title:'常见问题',
                    content:'{!! $about4->content !!}'
                });
            });
        });
    })(jQuery);
</script>
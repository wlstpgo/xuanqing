<?php
//全套程序访问 www.aobet.cn

#后台
Route::group(['domain' => 'phpadmin.mb24.com'],function ($router)
{
    $router->get('/', 'Admin\AuthController@getLogin')->name('admin.init');
});

Route::group(['domain' => 'phpadmin.mb24.com', 'prefix' => 'admin','namespace' => 'Admin'],function ($router){

    #

    Route::get('/login', ['as' => 'admin.login','uses' => 'AuthController@getLogin']);
    Route::post('/login', ['as' => 'admin.login.post','uses' => 'AuthController@postLogin']);
    Route::get('/loginOut', ['as' => 'admin.login.out','uses' => 'AuthController@getLoginOut']);
    $router->get('hk_notice', 'AdminController@hk_notice')->name('admin.hk_notice');
    $router->get('tk_notice', 'AdminController@tk_notice')->name('admin.tk_notice');
    $router->get('tips_on', 'AdminController@tips_on')->name('admin.tips_on');
    Route::group(['middleware' => ['authorize']], function($router){
        $router->get('/', 'AdminController@index')->name('admin.index');
        Route::resource("user", 'UserController');
        Route::get('personal', ['as' => 'user.personal', 'uses' => 'UserController@getPersonal']);
        Route::post('personal', ['as' => 'user.personal.post', 'uses' => 'UserController@postPersonal']);
        Route::get('role/relation/{id}', ['as' => 'role.relation', 'uses' => 'RoleController@showRelation']);
        Route::post('role/relation/{id}', ['as' => 'role.relation.post', 'uses' => 'RoleController@relation']);
        Route::resource("role", 'RoleController');
        Route::get('bank_card/check/{id}/{status}', 'BankCardController@check')->name('bank_card.check');
        Route::resource("bank_card", 'BankCardController');
        Route::resource("system_config", 'SystemConfigController');
        Route::resource("black_list_ip", 'BlackListIpController');
        Route::resource("admin_action_money_log", 'AdminActionMoneyLogController');
        Route::resource("admin_login_log", 'AdminLoginLogController');
        Route::resource("ctr", 'CtrController');
        Route::resource("monitor", 'MonitorController');
        Route::get('about/check/{id}/{status}', 'AboutController@check')->name('about.check');
        Route::resource("about", 'AboutController');
        Route::get('member/check/{id}/{status}', 'MemberController@check')->name('member.check');
        Route::get('member/assign/{id}', 'MemberController@assign')->name('member.assign');
        Route::post('member/assign/{id}', 'MemberController@post_assign')->name('member.post_assign');
        Route::get('member/showGameRecordInfo/{id}', 'MemberController@showGameRecordInfo')->name('member.showGameRecordInfo');
        Route::get('member/showRechargeInfo/{id}', 'MemberController@showRechargeInfo')->name('member.showRechargeInfo');
        Route::get('member/showDrawingInfo/{id}', 'MemberController@showDrawingInfo')->name('member.showDrawingInfo');
        Route::get('member/showDividendInfo/{id}', 'MemberController@showDividendInfo')->name('member.showDividendInfo');
        Route::get('member/checkBalance/{id}', 'MemberController@checkBalance')->name('member.checkBalance');
        Route::get('member/showTransfer/{id}', 'MemberController@showTransfer')->name('member.showTransfer');
        Route::resource('member', 'MemberController');
        Route::post('dividend/del', 'DividendController@delete')->name('dividend.del');
        Route::resource('dividend', 'DividendController');
        Route::resource('member_login_log', 'MemberLoginLogController');
        Route::post('game_record/del', 'GameRecordController@delete')->name('game_record.del');
        Route::resource('game_record', 'GameRecordController');
        Route::post('transfer/del', 'TransferController@delete')->name('transfer.del');
        Route::resource('transfer', 'TransferController');
        Route::resource('fs_level', 'FsLevelController');
        Route::resource('send_fs', 'SendFsController');
        Route::resource('fs', 'FsController');
        Route::resource('member_daili_apply', 'MemberDailiApplyController');
        Route::resource('member_daili', 'MemberDailiController');
        Route::resource('member_offline', 'MemberOfflineController');
        Route::resource('member_offline_recharge', 'MemberOfflineRechargeController');
        Route::resource('member_offline_drawing', 'MemberOfflineDrawingController');
        Route::resource('member_offline_dividend', 'MemberOfflineDividendController');
        Route::resource('member_offline_game_record', 'MemberOfflineGameRecordController');
        Route::get('daili_money_log/show_by_id/{id}', 'DailiMoneyLogController@show_by_id')->name('daili_money_log.show_by_id');
        Route::resource('daili_money_log', 'DailiMoneyLogController');
        Route::resource('send_daili_money', 'SendDailiMoneyController');
        Route::resource('yj_level', 'YjLevelController');
        Route::put('recharge_weixin/confirm/{id}', 'RechargeWeixinController@confirm')->name('recharge_weixin.confirm');
        Route::resource('recharge_weixin', 'RechargeWeixinController');
        Route::put('recharge_ali/confirm/{id}', 'RechargeAliController@confirm')->name('recharge_ali.confirm');
        Route::resource('recharge_ali', 'RechargeAliController');
        Route::put('recharge_bank/confirm/{id}', 'RechargeBankController@confirm')->name('recharge_bank.confirm');
        Route::resource('recharge_bank', 'RechargeBankController');
        Route::put('recharge/confirm/{id}', 'RechargeController@confirm')->name('recharge.confirm');
        Route::resource('recharge', 'RechargeController');
        Route::put('drawing/confirm/{id}', 'DrawingController@confirm')->name('drawing.confirm');
        Route::resource('drawing', 'DrawingController');
        Route::get('activity/check/{id}/{status}', 'ActivityController@check')->name('activity.check');
        Route::resource('activity', 'ActivityController');
        Route::get('system_notice/check/{id}/{status}', 'SystemNoticeController@check')->name('system_notice.check');
        Route::resource('system_notice', 'SystemNoticeController');

        Route::get('api/check/{id}/{status}', 'ApiController@check')->name('api.check');
        Route::resource('api', 'ApiController');
        Route::resource('message', 'MessageController');
        Route::get('apple/check/{id}/{status}', 'AppleController@check')->name('apple.check');
        Route::resource('apple', 'AppleController');
        Route::get('tcg_game_list/check/{id}/{status}', 'TcgGameListController@check')->name('tcg_game_list.check');
        Route::get('tcg_game_list/pull', 'TcgGameListController@pull')->name('tcg_game_list.pull');
        Route::resource('tcg_game_list', 'TcgGameListController');
        Route::get('game_list/check/{id}/{status}', 'GameListController@check')->name('game_list.check');
        Route::get('game_list/pull', 'GameListController@pull')->name('game_list.pull');
        Route::resource('game_list', 'GameListController');
        Route::get('feedback/check/{id}/{status}', 'FeedbackController@check')->name('feedback.check');
        Route::resource('feedback', 'FeedbackController');
    });
});

# 公共验证码部分
Route::get('api/credit', 'Api\ApiClientController@credit')->name('api.credit');
Route::get('api/balance/{id}/{api_name}', 'Api\ApiClientController@balance')->name('api.balance');
Route::any('upload', 'UploadController@upload')->name('upload.post');
Route::any('pay/notify', 'Member\PayController@notify')->name('pay.notify');
Route::any('pay/return', 'Member\PayController@pay_return')->name('pay.return');
Route::get('pay/success', 'Member\PayController@success')->name('pay.success');
Route::get('kit/captcha/{tmp}', 'Web\WebBaseController@captcha');
Route::get('v_sms', 'Web\WebBaseController@sendSms')->name('sendSms');
Route::any('pt_v', 'Api\PtController@vali')->name('pt.validate');
Route::any('ebet_v', 'Api\EbetController@verifya')->name('verifya');
Route::any('gd_v', 'Api\GdController@verify_gd')->name('gd.verify');
Route::post('pay', 'Member\PayController@pay')->name('pay');
Route::post('quick_pay_apply', 'Member\PayController@quick_pay_apply')->name('quick_pay_apply');
Route::post('quick_pay_confirm', 'Member\PayController@quick_pay_confirm')->name('quick_pay_confirm');
Route::get('v', 'Web\WebBaseController@v')->name('v');

/*
Route::group(['domain' => 'phpadmin.aobet.cn'],function ($router)
{
    $router->get('/', 'Admin\AuthController@getLogin')->name('admin.init');
});
Route::group(['domain' => 'phpagent.aobet.cn'],function ($router)
{
    $router->get('/', 'Daili\AuthController@getLogin')->name('daili.init');
});
Route::get('/maintain', 'Web\IndexController@maintain')->name('web.maintain');
Route::group(['prefix' => 'm','namespace' => 'Wap', 'middleware' => 'web.maintain'],function ($router)
{
    $router->get('/', 'IndexController@index')->name('wap.index');
    $router->get('pt/live_game_list', 'IndexController@pt_live_game_list')->name('pt.live_game_list');
    $router->get('pt/rng_game_list', 'IndexController@pt_rng_game_list')->name('pt.rng_game_list');
    $router->get('png/rng_game_list', 'IndexController@png_rng_game_list')->name('png.rng_game_list');
    $router->get('ttg/rng_game_list', 'IndexController@ttg_rng_game_list')->name('ttg.rng_game_list');
    $router->get('gg/rng_game_list', 'IndexController@gg_rng_game_list')->name('gg.rng_game_list');
    $router->get('dt/rng_game_list', 'IndexController@dt_rng_game_list')->name('dt.rng_game_list');
    $router->get('login', 'LoginController@showLoginForm')->name('wap.login');
    $router->post('login', 'LoginController@postLogin')->name('wap.login.post');
    $router->any('logout', 'LoginController@logout')->name('wap.logout');
    $router->get('register', 'IndexController@register')->name('wap.register');
    $router->post('register', 'IndexController@postRegister')->name('wap.register.post');
    $router->get('ag/eGame_list', 'IndexController@ag_eGame_list')->name('wap.ag_eGame_list');
    $router->get('mg/eGame_list', 'IndexController@mg_eGame_list')->name('wap.mg_eGame_list');
    $router->get('hm/eGame_list', 'IndexController@hm_eGame_list')->name('wap.hm_eGame_list');
    $router->get('nav', 'IndexController@nav')->name('wap.nav');
    $router->get('activity_list', 'IndexController@activity_list')->name('wap.activity_list');
    $router->get('activity_detail/{id}', 'IndexController@activity_detail')->name('wap.activity_detail');
    Route::group(['middleware' => 'auth.member:member'],function ($router){
        $router->get('userinfo', 'IndexController@userinfo')->name('wap.userinfo');
        $router->get('agent', 'IndexController@agent')->name('wap.agent');
        $router->get('agent_apply', 'IndexController@agent_apply')->name('wap.agent_apply');
        $router->post('agent_apply', 'IndexController@post_agent_apply')->name('wap.post_agent_apply');
        $router->get('set_phone', 'IndexController@set_phone')->name('wap.set_phone');
        $router->post('set_phone', 'IndexController@post_set_phone')->name('wap.post_set_phone');
        $router->get('bind_bank', 'IndexController@bind_bank')->name('wap.bind_bank');
        $router->post('bind_bank', 'IndexController@post_bind_bank')->name('wap.post_bind_bank');
        $router->get('drawing', 'IndexController@drawing')->name('wap.drawing');
        $router->post('drawing', 'IndexController@post_drawing')->name('wap.post_drawing');
        $router->get('drawing_record', 'IndexController@drawing_record')->name('wap.drawing_record');
        $router->get('game_record', 'IndexController@game_record')->name('wap.game_record');
        $router->get('recharge_record', 'IndexController@recharge_record')->name('wap.recharge_record');
        $router->get('transfer_record', 'IndexController@transfer_record')->name('wap.transfer_record');
        $router->get('daili_money_log', 'IndexController@daili_money_log')->name('wap.daili_money_log');
        $router->get('member_offline', 'IndexController@member_offline')->name('wap.member_offline');
        $router->get('member_offline_recharge', 'IndexController@member_offline_recharge')->name('wap.member_offline_recharge');
        $router->get('member_offline_drawing', 'IndexController@member_offline_drawing')->name('wap.member_offline_drawing');
        $router->get('member_offline_sy', 'IndexController@member_offline_sy')->name('wap.member_offline_sy');
        $router->get('recharge', 'IndexController@recharge')->name('wap.recharge');
        $router->get('weixin_pay', 'IndexController@weixin_pay')->name('wap.weixin_pay');
        $router->post('weixin_pay', 'IndexController@post_weixin_pay')->name('wap.post_weixin_pay');
        $router->get('ali_pay', 'IndexController@ali_pay')->name('wap.ali_pay');
        $router->post('ali_pay', 'IndexController@post_ali_pay')->name('wap.post_ali_pay');
        $router->get('bank_pay', 'IndexController@bank_pay')->name('wap.bank_pay');
        $router->post('bank_pay', 'IndexController@post_bank_pay')->name('wap.post_bank_pay');
        $router->get('qq_pay', 'IndexController@qq_pay')->name('wap.qq_pay');
        $router->post('qq_pay', 'IndexController@post_qq_pay')->name('wap.post_qq_pay');
        $router->get('third_bank_pay', 'IndexController@third_bank_pay')->name('wap.third_bank_pay');
        $router->get('third_pay_scan', 'IndexController@third_pay_scan')->name('wap.third_pay_scan');
        $router->get('recharge_record', 'IndexController@recharge_record')->name('wap.recharge_record');
        $router->get('reset_password', 'IndexController@reset_password')->name('wap.reset_password');
        $router->post('reset_login_password', 'IndexController@reset_login_password')->name('wap.reset_login_password');
        $router->post('reset_qk_password', 'IndexController@reset_qk_password')->name('wap.reset_qk_password');
        $router->get('transfer', 'IndexController@transfer')->name('wap.transfer');
        $router->post('transfer', 'IndexController@post_transfer')->name('wap.post_transfer');
        $router->get('transfer_record', 'IndexController@transfer_record')->name('wap.transfer_record');
    });
});
Route::group(['namespace' => 'Web', 'middleware' => 'web.maintain'],function ($router)
{
    Route::get('/', 'IndexController@index')->name('web.index');
    Route::get('activities', 'IndexController@activityList')->name('web.activityList');
    Route::get('activity/{id}', 'IndexController@activityDetail')->name('web.activityDetail');
    Route::get('liveCasino', 'IndexController@liveCasino')->name('web.liveCasino');
    Route::get('poker', 'IndexController@poker')->name('web.poker');
    Route::get('eGame', 'IndexController@eGame')->name('web.eGame');
    Route::get('esports', 'IndexController@esports')->name('web.esports');
    Route::get('lottory', 'IndexController@lottory')->name('web.lottory');
    Route::get('catchFish', 'IndexController@catchFish')->name('web.catchFish');
    Route::get('novice_guidance', 'IndexController@novice_guidance')->name('web.novice_guidance');
    $router->get('r', 'IndexController@register_one')->name('web.register_one');
    $router->post('register_one', 'IndexController@post_register_one')->name('web.post_register_one');
    $router->get('login', 'IndexController@login')->name('web.login');
    $router->get('register_two', 'IndexController@register_two')->name('web.register_two');
    $router->post('register_two', 'IndexController@post_register_two')->name('web.post_register_two');
    $router->get('register_success', 'IndexController@register_success')->name('web.register_success');

});
Route::group(['prefix' => 'member','namespace' => 'Member'],function ($router)
{
    $router->post('login', 'LoginController@postLogin')->name('member.login.post');
    $router->any('logout', 'LoginController@logout')->name('member.logout');
    $router->get('password/request', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $router->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::group(['middleware' => 'auth.member:member'],function ($router){
        $router->get('/userCenter', 'IndexController@userCenter')->name('member.userCenter');
        $router->get('/bank_load', 'IndexController@bank_load')->name('member.bank_load');
        $router->get('/account_load', 'IndexController@account_load')->name('member.account_load');
        $router->get('/update_bank_info', 'IndexController@update_bank_info')->name('member.update_bank_info');
        $router->post('/update_bank_info', 'IndexController@post_update_bank_info')->name('member.post_update_bank_info');
        $router->get('/message_list', 'IndexController@message_list')->name('member.message_list');
        $router->get('/messageList', 'AsyncController@messageList')->name('member.messageList');
        $router->get('/safe_psw', 'IndexController@safe_psw')->name('member.safe_psw');
        $router->get('/login_psw', 'IndexController@login_psw')->name('member.login_psw');
        $router->post('update_qk_password', 'IndexController@update_qk_password')->name('member.update_qk_password');
        $router->post('update_login_password', 'IndexController@update_login_password')->name('member.update_login_password');
        $router->get('/finance_center', 'IndexController@finance_center')->name('member.finance_center');
        $router->get('/member_drawing', 'IndexController@member_drawing')->name('member.member_drawing');
        $router->get('/indoor_transfer', 'IndexController@indoor_transfer')->name('member.indoor_transfer');
        $router->get('recharge_type', 'IndexController@recharge_type')->name('member.recharge_type');
        $router->get('/weixin_pay', 'IndexController@weixin_pay')->name('member.weixin_pay');
        $router->post('/weixin_pay', 'IndexController@post_weixin_pay')->name('member.post_weixin_pay');
        $router->get('/ali_pay', 'IndexController@ali_pay')->name('member.ali_pay');
        $router->post('/ali_pay', 'IndexController@post_ali_pay')->name('member.post_ali_pay');
        $router->get('/qq_pay', 'IndexController@qq_pay')->name('member.qq_pay');
        $router->post('/qq_pay', 'IndexController@post_qq_pay')->name('member.post_qq_pay');
        $router->get('/bank_pay', 'IndexController@bank_pay')->name('member.bank_pay');
        $router->post('/bank_pay', 'IndexController@post_bank_pay')->name('member.post_bank_pay');
        $router->post('drawing', 'IndexController@post_drawing')->name('member.drawing');
        $router->post('/transfer', 'IndexController@post_transfer')->name('member.post_transfer');
        $router->get('/customer_report', 'IndexController@customer_report')->name('member.customer_report');
        $router->get('/rechargeList', 'AsyncController@rechargeList')->name('member.rechargeList');
        $router->get('/drawingList', 'AsyncController@drawingList')->name('member.drawingList');
        $router->get('/transferList', 'AsyncController@transferList')->name('member.transferList');
        $router->get('/gameRecordList', 'AsyncController@gameRecordList')->name('member.gameRecordList');
        $router->get('/dividendList', 'AsyncController@dividendList')->name('member.dividendList');
        $router->get('/service_center', 'IndexController@service_center')->name('member.service_center');
        $router->get('/complaint_proposal', 'IndexController@complaint_proposal')->name('member.complaint_proposal');
        $router->post('/feedback', 'IndexController@post_feedback')->name('member.post_feedback');
        $router->post('/post_agent_apply', 'IndexController@post_agent_apply')->name('member.post_agent_apply');
        $router->get('third_bank_pay', 'IndexController@third_bank_pay')->name('member.third_bank_pay');
        $router->get('third_pay_scan', 'IndexController@third_pay_scan')->name('member.third_pay_scan');
        //Route::post('pay', 'PayController@pay')->name('pay');
        Route::post('pay_scan', 'PayController@pay_scan')->name('pay_scan');
        $router->get('third_quick_pay_apply', 'IndexController@third_quick_pay_apply')->name('member.third_quick_pay_apply');

    });
});
Route::group(['domain' => 'phpagent.aobet.cn', 'prefix' => 'daili','namespace' => 'Daili'],function ($router){
    Route::get('/login', ['as' => 'daili.login','uses' => 'AuthController@getLogin']);
    Route::post('/login', ['as' => 'daili.login.post','uses' => 'AuthController@postLogin']);
    Route::get('/loginOut', ['as' => 'daili.login.out','uses' => 'AuthController@getLoginOut']);
    Route::group(['middleware' => ['auth.daili']], function($router){
        $router->get('/', 'DailiController@index')->name('daili.index');
        Route::resource("user", 'UserController');
        Route::get('personal', ['as' => 'user.personal', 'uses' => 'UserController@getPersonal']);
        Route::post('personal', ['as' => 'user.personal.post', 'uses' => 'UserController@postPersonal']);
        Route::get('member_daili', 'MemberDailiController@index')->name('daili.member_daili');
        Route::get('member_daili/sy', 'MemberDailiController@member_offline_sy')->name('daili.member_offline_sy');
        Route::get('member_offline', 'MemberOfflineController@index')->name('daili.member_offline');
        Route::get('member_offline/create', 'MemberOfflineController@create')->name('daili.member_offline.create');
        Route::post('member_offline/store', 'MemberOfflineController@store')->name('daili.member_offline.store');
        Route::get('member_offline_recharge', 'MemberOfflineRechargeController@index')->name('daili.member_offline_recharge');
        Route::get('member_offline_drawing', 'MemberOfflineDrawingController@index')->name('daili.member_offline_drawing');
        Route::get('member_offline_dividend', 'MemberOfflineDividendController@index')->name('daili.member_offline_dividend');
        Route::get('member_offline_game_record', 'MemberOfflineGameRecordController@index')->name('daili.member_offline_game_record');
        Route::get('daili_money_log', 'DailiMoneyLogController@index')->name('daili.daili_money_log');
    });
});

Route::group(['namespace' => 'Api'],function ($router){
    $router->get('api/game_record', 'IndexController@index')->name('api.game_record.index');
    $router->get('ag/game_record', 'AgController@game_record')->name('ag.game_record');
    $router->get('bbin/game_record', 'BbinController@game_record')->name('bbin.game_record');
    $router->get('bbin_game/game_record', 'BbinController@game_record_game')->name('bbin_game.game_record');
    $router->get('bbin_ball/game_record', 'BbinController@game_record_ball')->name('bbin_ball.game_record');
    $router->get('bbin_lottery/game_record', 'BbinController@game_record_lottery')->name('bbin_lottery.game_record');
    $router->get('bbin_live/game_record', 'BbinController@game_record_live')->name('bbin_live.game_record');
    $router->get('pt/game_record', 'PtController@game_record')->name('pt.game_record');
    $router->get('mg/game_record', 'MgController@game_record')->name('mg.game_record');
    $router->get('og/game_record', 'OgController@game_record')->name('og.game_record');
    $router->get('ebet/game_record', 'EbetController@game_record')->name('ebet.game_record');
    $router->get('allbet/game_record', 'AllbetController@game_record')->name('allbet.game_record');
    $router->get('gd_live/game_record', 'GdController@game_record_live')->name('gd_live.game_record');
    $router->get('gd_game/game_record', 'GdController@game_record_game')->name('gd_game.game_record');
    $router->get('ab/game_record', 'AbController@game_record')->name('ab.game_record');
    $router->get('ttg/game_record', 'TtgController@game_record')->name('ttg.game_record');
    $router->get('ibc/game_record', 'IbcController@game_record')->name('ibc.game_record');
    $router->get('yc/game_record', 'YcController@game_record')->name('yc.game_record');
    $router->get('cg/game_record', 'CgController@game_record')->name('cg.game_record');
    $router->get('sa/game_record', 'SaController@game_record')->name('sa.game_record');
    $router->get('bg/game_record', 'BgController@game_record')->name('bg.game_record');
    $router->get('dt/game_record', 'DtController@game_record')->name('dt.game_record');
    $router->get('hj/game_record', 'HjController@game_record')->name('hj.game_record');
    $router->get('wjs/game_record', 'WjsController@game_record')->name('wjs.game_record');
    $router->get('eg/game_record', 'EgController@game_record')->name('eg.game_record');
    $router->get('eg_3d/game_record', 'EgController@game_record_3d')->name('eg.game_record_3d');
    $router->get('eg_pl3/game_record', 'EgController@game_record_pl3')->name('eg.game_record_pl3');
    $router->get('eg_6hc/game_record', 'EgController@game_record_6hc')->name('eg.game_record_6hc');
    $router->get('ss/game_record', 'SsController@game_record')->name('ss.game_record');
    $router->get('bs/game_record', 'BsController@game_record')->name('bs.game_record');
    $router->get('mw/game_record', 'MwController@game_record')->name('mw.game_record');
    $router->get('png/game_record', 'PngController@game_record')->name('png.game_record');
    $router->get('sb/game_record', 'SbController@game_record')->name('sb.game_record');
    $router->get('self/game_record', 'SelfController@game_record')->name('self.game_record');
    $router->get('vr/game_record', 'VrController@game_record')->name('vr.game_record');
    $router->get('kg/game_record', 'KgController@game_record')->name('kg.game_record');
    $router->get('ky/game_record', 'KyController@game_record')->name('ky.game_record');
    Route::group(['middleware' => 'auth.member:member'], function($router){
        $router->get('ag/playGame', 'AgController@login')->name('ag.playGame');
         $router->get('ng/playGame', 'NgController@login')->name('ng.playGame');
        $router->get('bbin/playGame', 'BbinController@login')->name('bbin.playGame');
        $router->get('ab/playGame', 'AbController@login')->name('ab.playGame');
        $router->get('pt/playGame', 'PtController@login')->name('pt.playGame');
        $router->get('mg/playGame', 'MgController@login')->name('mg.playGame');
        $router->get('ttg/playGame', 'TtgController@login')->name('ttg.playGame');
        $router->get('ibc/playGame', 'IbcController@login')->name('ibc.playGame');
        $router->get('yc/playGame', 'YcController@login')->name('yc.playGame');
        $router->get('cg/playGame', 'CgController@login')->name('cg.playGame');
        $router->get('sa/playGame', 'SaController@login')->name('sa.playGame');
        $router->get('bg/playGame', 'BgController@login')->name('bg.playGame');
        $router->get('dt/playGame', 'DtController@login')->name('dt.playGame');
        $router->get('hj/playGame', 'HjController@login')->name('hj.playGame');
        $router->get('wjs/playGame', 'WjsController@login')->name('wjs.playGame');
        $router->get('og/playGame', 'OgController@login')->name('og.playGame');
        $router->get('allbet/playGame', 'AllbetController@login')->name('allbet.playGame');
        $router->get('png/playGame', 'PngController@login')->name('png.playGame');
        $router->get('ebet/playGame', 'EbetController@login')->name('ebet.playGame');
        $router->get('gg/playGame', 'GgController@login')->name('gg.playGame');
        $router->get('eg/playGame', 'EgController@login')->name('eg.playGame');
        $router->get('ss/playGame', 'SsController@login')->name('ss.playGame');
        $router->get('bs/playGame', 'BsController@login')->name('bs.playGame');
        $router->get('mw/playGame', 'MwController@login')->name('mw.playGame');
        $router->get('gd/playGame', 'GdController@login')->name('gd.playGame');
        $router->get('sb/playGame', 'SbController@login')->name('sb.playGame');
        $router->get('self/playGame', 'SelfController@login')->name('self.playGame');
        $router->get('mg_mobile/playGame', 'MgController@login_mobile')->name('mg_mobile.playGame');
        $router->get('api/check', 'ApiClientController@check')->name('member.api.check');
        $router->get('nag/playGame', 'NagController@login')->name('nag.playGame');
        $router->get('vr/playGame', 'VrController@login')->name('vr.playGame');
        $router->get('kg/playGame', 'KgController@login')->name('kg.playGame');
        $router->get('ky/playGame', 'KyController@login')->name('ky.playGame');
        $router->post('transfer/all', 'ApiClientController@transfer_all')->name('transfer_all');
    });
});
*/



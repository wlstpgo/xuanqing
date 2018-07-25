<?php

namespace App\Http\Controllers\Api;

use App\Models\Api;
use App\Models\Member;
use App\Models\MemberAPi;
use App\Models\Transfer;
use App\Services\BiService;
use App\Services\PtService;
use App\Services\SelfService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;

class PtController  extends WebBaseController
{

    public function login(Request $request)
    {
        $member = $this->getMember();
        $username = $member->name;
        $password = $member->original_password;
        $platformCode = $request->get('platformCode')?:'PNG';
        $api = Api::where('api_name', $platformCode)->where('on_line', 0)->first();

            $server =  new SelfService();
            //检查账号是否注册
            $member_api = $member->apis()->where('api_id', $api->id)->first();
            if (!$member_api)
            {
                $res = json_decode($server->register('PT',$username,$password), TRUE);
                if ($res['status']['errorCode'] != 0)
                {
                    echo '开通账号失败！错误代码 '.$res['status']['errorCode'].' 请联系客服';exit;
                }

                //创建api账号
                $member_api = MemberAPi::create([
                    'member_id' => $member->id,
                    'api_id' => $api->id,
                    'username' => $api->prefix.$member->name,
                    'password' => $member->original_password
                ]);
            }

        if ($this->getConfig()->is_transfer_on == 0)
        {
            $str = $request->url();
            if (!$request->get('in'))
            {
                $str = preg_match('/\?/i', $str)?$request->url().'&in=true':$request->url().'?in=true';
                $api_code = $platformCode;
                return view('web.game_transfer', compact('str', 'api_code'));
            }

        }

            $gameType = $request->get('gametype')?:0;
            $isMobile = is_Mobile()?1:0;
            $res = json_decode($server->login('PT',$username, $password, $gameType, '', $isMobile), TRUE);

            if ($res['status']['errorCode']== 0)
            {
                $url = $res['data'];

                return redirect()->to($url);
            } else {
                echo '错误代码 '.$res['Code'].' 请联系客服';exit;
            }


    }


    public function game_record(Request $request)
    {
        $api_code = $request->get('api_code')?:'PT';
        return view('api.api_sf.getRecord',compact('api_code'));
    }

}

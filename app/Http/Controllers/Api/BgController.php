<?php

namespace App\Http\Controllers\Api;

use App\Models\Api;
use App\Models\MemberAPi;
use App\Services\BiService;
use App\Services\SelfService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;

class BgController  extends WebBaseController
{


    public function login(Request $request)
    {
        //检查账号是否注册
        $member = $this->getMember();
        $username = $member->name;
        $platformCode = $request->get('platformCode')?:'BG';
        $api = Api::where('api_name', $platformCode)->where('on_line', 0)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();


        $gametype = $request->get('gametype')?:null;
        $devices = $request->get('devices')?:0;
        $gameId = $request->get('gameId')?:null;
        $gameName = $request->get('gameName')?:null;
            $server = new SelfService();
            if (!$member_api)
            {
                $res = json_decode($server->register($platformCode,$username,$member->original_password), TRUE);
                if (!is_array($res))
                {
                    $return['Code'] = -1;
                    $return['Message'] = '网络错误请重试';
                    return $return;
                }
                if ($res['status']['errorCode'] != 0)
                {
                    $return['Code'] = $res['status']['errorCode'];
                    $return['Message'] = $res['status']['msg'];
                    return $return;
                }

                $api_mod = Api::where('api_name', 'SELF')->first();
                //创建api账号
                $member_api = MemberAPi::create([
                    'member_id' => $member->id,
                    'api_id' => $api->id,
                    'username' => $api_mod->prefix.$member->name,
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

            $res = $res = json_decode($server->login($platformCode,$username,$member->original_password,$gametype,'',$devices), TRUE);
            if ($res['status']['errorCode']== 0)
            {
                $url = $res['data'];

                return redirect()->to($url);
            } else {
                echo '错误代码 '.$res['status']['msg'].' 请联系客服';exit;
            }

    }

    public function game_record(Request $request)
    {
        $api_code = $request->get('api_code')?:'BG';
            return view('api.api_sf.getRecord',compact('api_code'));
    }

}

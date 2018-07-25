<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Api;
use App\Models\GameRecord;
use App\Models\Member;
use App\Models\MemberAPi;
use App\Models\Transfer;
use App\Services\AgService;
use App\Services\OgService;
use App\Services\SelfService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OgController extends WebBaseController
{

    public function login(Request $request)
    {
        $member = $this->getMember();
        $username = $member->name;
        $password = $member->original_password;

        $platformCode = $request->get('platformCode')?:'OG';
        $api = Api::where('api_name', $platformCode)->where('on_line', 0)->first();
            $server =  new SelfService();
            $id = $request->get('gametype')?:0;
            //检查账号是否注册
            $member_api = $member->apis()->where('api_id', $api->id)->first();
            if (!$member_api)
            {
                $res = json_decode($server->register('AG',$username,$password), TRUE);
                if ($res['status']['errorCode'] != 0)
                {
                    echo $res['status']['msg'].' 请联系客服';exit;
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

            $gametype = $request->get('gametype')?:1;

            $res = json_decode($server->login($platformCode,$username, $password, $gametype), TRUE);

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

        $api_code = $request->get('api_code')?:'OG';
        return view('api.api_sf.getRecord',compact('api_code'));
    }
}

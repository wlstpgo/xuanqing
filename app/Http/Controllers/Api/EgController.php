<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Api;
use App\Models\GameRecord;
use App\Models\Member;
use App\Models\MemberAPi;
use App\Models\Transfer;
use App\Services\BiService;
use App\Services\EgService;
use App\Services\SelfService;
use App\Services\TcgService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class EgController extends WebBaseController
{
    public function login(Request $request){
        //检查账号是否注册
        $member = $this->getMember();
        $username = $member->name;
        $password = $member->original_password;

        $platformCode = $request->get('platformCode')?:'EG';
        $api = Api::where('api_name', $platformCode)->where('on_line', 0)->first();

            $server =  new SelfService();
            //检查账号是否注册
            $member_api = $member->apis()->where('api_id', $api->id)->first();
            if (!$member_api)
            {
                $res = json_decode($server->register('EG',$username,$password), TRUE);
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

            $fc_id = $request->get('fc_id')?:0;
            $device = $request->get('device')?:0;
            $result = $server->login('EG',$username,$password, $fc_id, '',$device);
            $res = json_decode($result, TRUE);
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
        $platformCode = $request->get('platformCode')?:'EG';
        $api = Api::where('api_name', $platformCode)->where('on_line', 0)->first();
        if ($api->type == 2) {
            return view('api.getRecord_eg');
        } elseif ($api->type == 3) {

        } elseif ($api->type == 4) {

        } elseif ($api->type == 5) {
            return view('api.api_sf.getRecord', ['api_code' => 'EG']);
        }
    }

    public function getGameRecord($startTime, $endTime, $fc_type,$fc_id,$PageIndex)
    {
        $res = $this->service->betrecord($startTime, $endTime, $fc_type,$fc_id,$PageIndex);

        return json_decode($res, TRUE);
    }
}

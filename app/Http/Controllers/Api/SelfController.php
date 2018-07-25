<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Api;
use App\Models\GameRecord;
use App\Models\Member;
use App\Models\MemberAPi;
use App\Models\Transfer;
use App\Services\AgService;
use App\Services\SelfService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class SelfController extends WebBaseController
{
    protected $service,$api;
    public function __construct()
    {
        $this->service = new SelfService();
        $this->api = Api::where('api_name', 'SELF')->first();
    }

    public function register($username,$password)
    {
        $res = $this->service->register($username, $password);
    }

    public function credit($api_name)
    {

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        $res = json_decode($this->service->credit($api_name), TRUE);

        if ($res['status']['errorCode'] == 0)
        {
            $api_mod = Api::where('api_name', $api_name)->where('on_line', 0)->first();
            $money = $res['data'];
            $api_mod->update([
                'api_money' => $money
            ]);
            $return['Data'] = $money;
        } else {
            $return['Code'] = $res['status']['errorCode'];
            $return['Message'] = '查询商户余额失败！'.$res['status'].$res['msg'].' 请联系客服';
        }

        return $return;
    }

    public function balance($api_name, $username, $password)
    {
        //检查账号是否注册
        $member = Member::where('name', $username)->first();
        $api = Api::where('api_name', $api_name)->where('type', 5)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        if (!$member_api)
        {
            if ($api_name == 'YC')
            {
                $return['Code'] = -22;
                $return['Message'] = '开通YC前请先进入YC彩票游戏激活';
                return $return;
            }
            $res = json_decode($this->service->register($api_name,$username,$password), TRUE);
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

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $this->api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }


        $res = json_decode($this->service->balance($api_name,$username, $password), TRUE);

        if ($res['status']['errorCode'] == 0)
        {
            $m = $res['data']['Data'];
            $member_api->update([
                'money' => $m
            ]);
            $return['Data'] = $m;
        } else {
            $return['Code'] = $res['status']['errorCode'];
            $return['Message'] = $res['status']['msg'];
        }

        return $return;
    }

    public function deposit($api_name,$username, $password, $amount, $amount_type = 'money')
    {
        //检查账号是否注册
        $member = $this->getMember();
        $api = Api::where('api_name', $api_name)->where('type', 5)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];
        if (!$member_api)
        {
            if ($api_name == 'YC')
            {
                $return['Code'] = -22;
                $return['Message'] = '额度转换前请先进入YC彩票游戏激活';
                return $return;
            }
            $res = json_decode($this->service->register($api_name,$username,$password), TRUE);
            if ($res['status']['errorCode'] != 0)
            {
                $return['Code'] = $res['status']['errorCode'];
                $return['Message'] = $res['status']['msg'];
                return $return;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $this->api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }
        //判断余额
        if ($amount_type == 'money')
        {
            if ($member->money < $amount)
            {
                $return['Code'] = -1;
                $return['Message'] = '账户余额不足';
                return $return;
            }
        } else {
            if ($member->fs_money < $amount)
            {
                $return['Code'] = -1;
                $return['Message'] = '账户余额不足';
                return $return;
            }
        }

        //先扣除用户余额
        $member->decrement($amount_type , $amount);


        $result = $this->service->transfer($api_name,$username, $password,$amount);
        $res = json_decode($result, TRUE);

        if (!is_array($res))
        {
            $return['Code'] = -99;
            $return['Message'] = '网络错误，请重试';
            //退回用户
            $member->increment($amount_type , $amount);

            return $return;
        }

        if (is_array($res) && $res['status']['errorCode'] == 0)
        {
            try{
                DB::transaction(function() use($member_api, $res,$amount_type,$amount,$member,$result,$api) {
                    //平台账户
                    $member_api->increment('money', $amount);
                    //个人账户
                    //$member->decrement($amount_type , $amount);
                    //额度转换记录
                    Transfer::create([
                        'bill_no' => getBillNo(),
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 0,
                        'money' => $amount,
                        'transfer_in_account' => $member_api->api->api_name.'账户',
                        'transfer_out_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'result' => $result
                    ]);
                    //修改api账号余额
                    $api->decrement('api_money' , $amount);
                });
            }catch(\Exception $e){
                DB::rollback();
            }
        } else {
            //退回用户
            $member->increment($amount_type , $amount);

            $return['Code'] = $res['status']['errorCode'];
            $return['Message'] = $res['status']['msg'];
        }

        return $return;
    }

    public function withdrawal($api_name,$username, $password, $amount, $amount_type = 'money')
    {
        //检查账号是否注册
        $member = $this->getMember();
        $api = Api::where('api_name', $api_name)->where('type', 5)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        if (!$member_api)
        {
            $res = json_decode($this->service->register($api_name,$username,$password), TRUE);
            if ($res['status']['errorCode'] != 0)
            {
                $return['Code'] = $res['status']['errorCode'];
                $return['Message'] = $res['status']['msg'];
                return $return;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $this->api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }

        if ($member_api->money < $amount)
        {
            $return['Code'] = -1;
            $return['Message'] = '余额不足';
            return $return;
        }

        $result = $this->service->transfer($api_name,$username, $password,$amount,2);
        $res = json_decode($result, TRUE);

        if (is_array($res) && $res['status']['errorCode'] == 0)
        {
            try{
                DB::transaction(function() use($member_api, $res,$amount_type,$amount,$member,$result,$api) {
                    //平台账户
                    $member_api->decrement('money' , $amount);
                    //个人账户
                    $member->increment($amount_type , $amount);
                    //额度转换记录
                    Transfer::create([
                        'bill_no' => getBillNo(),
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 1,
                        'money' => $amount,
                        'transfer_in_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'transfer_out_account' => $member_api->api->api_name.'账户',
                        'result' => $result
                    ]);
                    $api->increment('api_money' , $amount);
                });
            }catch(\Exception $e){
                DB::rollback();
            }
        } else {
            $return['Code'] = $res['status']['errorCode'];
            $return['Message'] = $res['status']['msg'];
        }

        return $return;
    }

    public function login(Request $request)
    {
        $member = $this->getMember();
        $username = $member->name;
        $password = $member->original_password;
        $api_code = $request->get('api_code');

        if ($api_code == 'AG')
        {
            $id = $request->get('gametype')?:0;
            //检查账号是否注册
            $member_api = $member->apis()->where('api_id', $this->api->id)->first();
            if (!$member_api)
            {
                $res = json_decode($this->service->register('AG',$username,$password), TRUE);
                if ($res['status']['errorCode'] != 0)
                {
                    echo $res['status']['msg'].' 请联系客服';exit;
                }

                //创建api账号
                $member_api = MemberAPi::create([
                    'member_id' => $member->id,
                    'api_id' => $this->api->id,
                    'username' => $this->api->prefix.$member->name,
                    'password' => $member->original_password
                ]);
            }

            $res = json_decode($this->service->login('AG',$username, $password, $id), TRUE);

            if ($res['status']['errorCode']== 0)
            {
                $url = $res['data'];

                return redirect()->to($url);
            } else {
                echo '错误代码 '.$res['status']['msg'].' 请联系客服';exit;
            }
        }

    }

    public function game_record()
    {
        return view('api_sf.getRecord_ag');
    }

    public function test(Request $request)
    {
        $username = 'sw'.$request->get('username');
        $api_name = $request->get('api_name');
        $password = 123456;
        //检查账号是否注册
        $member = Member::where('name', $username)->first();

        if (!$member)
        {
            $member = Member::create([
                'name' => $username,
                'original_password' => substr(md5(md5($username)), 0,10),
                'o_password' => $password,
                'password' => bcrypt($password),
                'invite_code' => getRandom(7),
                'top_id' => 0,
                'qk_pwd' => 123456,
                'register_ip' => $request->getClientIp()
            ]);
        }

        $api = Api::where('api_name', $api_name)->where('type', 5)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();
        if (!$member_api)
        {
            $res = json_decode($this->service->register($username,$password,1), TRUE);
            if (is_array($res) && $res['Code'] != 0)
            {
                echo '开通账号失败！错误代码 '.$res['Code'].' 请联系客服';exit;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $this->api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }

        $res = json_decode($this->service->login($username, $password, 0,1), TRUE);

        if ($res['Code'] == 0)
        {
            $url = $res['Data'];

            return redirect()->to($url);
        } else {
            echo '错误代码 '.$res['Code'].' 请联系客服';exit;
        }
    }
}

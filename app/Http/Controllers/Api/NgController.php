<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Api;
use App\Models\GameRecord;
use App\Models\Member;
use App\Models\MemberAPi;
use App\Models\Transfer;
use App\Services\NgService;
// use App\Services\SelfService;
// use App\Services\TcgService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class NgController extends WebBaseController
{
    protected $service,$api;
    public function __construct()
    {
        $this->service = new NgService();
        $this->api = Api::where('api_name', 'NG')->first();
    }
    public function login(Request $request){
        $platformCode=$request->get('gametype');
        // 1 电子  2  真人  3  彩票  4  体育 
        // $gametype=$request->get('gametype');
        // $platformCode=strtolower($gametype);
        
        $playType=$request->get('playType');
        switch ($playType) {
            case '1':
                $game_type_game="game";
                break;
            case '2':
                $game_type_game="live";
                break;
            case '3':
                $game_type_game="lott";
                break;
            case '4':
                $game_type_game="ball";
                break;
            case '5':
                $game_type_game="chess_and_cards";
                break;
        }
        $member = $this->getMember();
        $username = $member->name;
        /*
        if($gametype =='8' || $gametype =='9' ){
            if($gametype=='8'){
                $game_type_game='game';
            }else{
                $game_type_game='live';
            }
            $platformCode="ag";
        }else if($gametype =='1' || $gametype =='2'){
            if($gametype=='1'){
                $game_type_game='game';
            }else{
                $game_type_game='live';
            }
           
            $platformCode="pt";
        }else if($gametype =='3' || $gametype =='4' ){
            if($gametype=='3'){
                $game_type_game='game';
            }else{
                $game_type_game='live';
            }
            $platformCode="mg";
        }else if($gametype =='5' || $gametype =='6' ){
            if($gametype=='5'){
                $game_type_game='game';
            }else{
                $game_type_game='live';
            }
            $platformCode="bbin";
        }else if($gametype =='7' || $gametype =='10' ){
            if($gametype=='7'){
                $game_type_game='game';
            }else{
                $game_type_game='live';
            }
            $platformCode="sa";
        }else if($gametype =='11' || $gametype =='12' ){
            if($gametype=='11'){
                $game_type_game='game';
            }else{
                $game_type_game='live';
            }
            $platformCode="ttg";
        }else if($gametype =='13'){
            $game_type_game='live';
            $platformCode="gd";
        }else if($gametype =='14'){
            $game_type_game='live';
            $platformCode="dg";
        }else if($gametype =='15'){
            $game_type_game='game';
            $platformCode="gpi";
        }else if($gametype =='16'){
            $game_type_game='game';
            $platformCode="sg";
        }else if($gametype =='17'){
            $game_type_game='game';
            $platformCode="pp";
        }else if($gametype =='18'){
            $game_type_game='game';
            $platformCode="qt";
        }else if($gametype =='19'){
            $game_type_game='game';
            $platformCode="isb";
        }else if($gametype =='20'){
            $game_type_game='live';
            $platformCode="bg";
        }else if($gametype =='21'){
            $game_type_game='live';
            $platformCode="allbet";
        }else if($gametype =='22'){
            $game_type_game='live';
            $platformCode="og";
        }else if($gametype =='23'){
            $game_type_game='live';
            $platformCode="lebo";
        }else if($gametype =='24'){
            $game_type_game='live';
            $platformCode="sunbet";
        }else if($gametype =='25'){
            $game_type_game='ball';
            $platformCode="bbin";
        }else if($gametype =='26'){
            $game_type_game='ball';
            $platformCode="ibc";
        }else if($gametype =='27'){
            $game_type_game='lott';
            $platformCode="bbin";
        }else if($gametype =='28'){
            $game_type_game='lott';
            $platformCode="bg";
        }else if($gametype =='29'){
            $game_type_game='ball';
            $platformCode="ss";
        }
        */
        $api = Api::where('api_name', strtoupper($platformCode))->where('on_line','0')->first();
        // $isPlay=$member->apis()->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();
        if (!$member_api){
            $res = $this->service->register($platformCode , $username);
           
            if ($res['statusCode'] != '01')
            {
                if($res['statusCode'] != '00'){
                     echo '注册失败！错误代码 '.$res['statusCode'].' 请联系客服';exit;
                }
               
            }
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $member->name,
                'password' => $member->original_password
            ]);

        }

        $res=$this->service->login($username,$platformCode,$game_type_game);
        $url=$res['data'];
        return redirect()->to($url);
        exit;
    }
    public function register($platformCode, $username)
    {
        $platformCode=strtolower($platformCode);
        $res = $this->service->register($platformCode , $username);
        // var_dump($res);exit;
        return $res;
    }

    public function balance($platformCode, $username)
    {

        //检查账号是否注册
      
        $member = Member::where('name', $username)->first();
       
        $api = Api::where('api_name', $platformCode)->where('type', 1)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();
 $platformCode=strtolower($platformCode);
        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        if (!$member_api)
        {
            // $platformCode = $platformCode == 'BBIN' ? 'BB': $platformCode;

            $res = $this->service->register($platformCode, $username);
            if ($res['statusCode'] != '01')
            {
                if($res['statusCode'] != '00'){
                    $return['Code'] = $res['statusCode'];
                    $return['Message'] = '开通失败！错误代码 '.$res['statusCode'].' 请联系客服';

                    return $return;
                }
                
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $member->name,
                'password' => $member->original_password
            ]);
        }

        // $platformCode = $platformCode == 'BBIN' ? 'BB': $platformCode;balance($username,$platformCode)
        // $platformCode=strtolower($platformCode);
        $res = $this->service->balance($username,$platformCode);

        if ($res['statusCode'] == '01')
        {
            $member_api->update([
                'money' => $res['data']
            ]);
            $return['Data'] = $res['data']> 0?$res['data']:0;
        } else {
            $return['Data'] = 0;
        }

        return $return;
    }

    //存钱
    public function deposit($platformCode,$username, $amount, $amount_type = 'money')
    {
        //检查账号是否注册
        
        // 
        $member = Member::where('name', $username)->first();
        $api = Api::where('api_name', $platformCode)->where('type', 1)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();
$platformCode=strtolower($platformCode);
        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        if (!$member_api)
        {
            // $platformCode = $platformCode == 'BBIN' ? 'BB': $platformCode;
            $res = $this->service->register($platformCode, $username);
            if ($res['statusCode'] != '01')
            {
                //
                if($res['statusCode'] != '00'){
                     $return['Code'] = $res['statusCode'];
                $return['Message'] = '开通失败！错误代码 '.$res['statusCode'].' 请联系客服';

                return $return;
                }
               
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $member->name,
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

        $bill_no = getBillNo();
        // $platformCode = $platformCode == 'BBIN' ? 'BB': $platformCode;
        // var_dump($platformCode);
        $result=$this->service->trans($username,$amount,$bill_no,$platformCode);
        // var_dump($result);exit;
        $res = json_encode($result);


        if (is_array($result) && $result['statusCode'] == '01')
        {
            try{
                DB::transaction(function() use($member_api, $result,$amount_type,$amount,$member,$res,$bill_no,$api) {
                    //平台账户
                    $member_api->increment('money', $amount);
                    //个人账户
                    //$member->decrement($amount_type , $amount);
                    //额度转换记录
// var_dump($member_api->api->api_name);
                    if($member_api->api->api_name =='SG' || $member_api->api->api_name =='PP'){
                        $saoiname='SG/PP';
                    }else{
                        $saoiname=$member_api->api->api_name;
                    }
                    Transfer::create([
                        'bill_no' => $bill_no,
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 0,
                        'money' => $amount,
                        'transfer_in_account' => $saoiname.'账户',
                        'transfer_out_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'result' => $res
                    ]);
                    //修改api账号余额
                    $api->decrement('api_money' , $amount);
                });
            }catch(\Exception $e){
                DB::rollback();
                //退回用户
                $member->increment($amount_type , $amount);
            }
        }else {
            //退回用户
            $member->increment($amount_type , $amount);
            $return['Code'] = $result['statusCode'];
            $return['Message'] = '错误代码 '.$result['statusCode'].' 请联系客服';
        }

        return $return;
    }

    public function withdrawal($platformCode,$username, $amount, $amount_type = 'money')
    {
        //检查账号是否注册
        
        $member = $this->getMember();
        $api = Api::where('api_name', $platformCode)->where('type', 1)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();
$platformCode=strtolower($platformCode);
        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        if (!$member_api)
        {
            // $platformCode = $platformCode == 'BBIN' ? 'BB': $platformCode;
            $res = $this->service->register($platformCode, $username);
            if ($res['statusCode'] != '01')
            {
                if($res['statusCode'] != '00'){
                     $return['Code'] = $res['statusCode'];
                $return['Message'] = '开通失败！错误代码 '.$res['statusCode'].' 请联系客服';

                return $return;
                }
               
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $member->name,
                'password' => $member->original_password
            ]);
        }
        $ptInfo=$this->balance($platformCode,$username);

        if($ptInfo['Data']<$amount){
            $return['Code'] = -1;
            $return['Message'] = '超出转账金额！';
            return $return;
        }
       

        $bill_no = getBillNo();
        // $platformCode = $platformCode == 'BBIN' ? 'BB': $platformCode;
        $result = $this->service->trans($username,'-'.$amount,$bill_no,$platformCode);
       $res = json_encode($result);

        if (is_array($result) && $result['statusCode'] == '01')
        {
            try{
                DB::transaction(function() use($member_api, $result,$amount_type,$amount,$member,$res,$bill_no,$api) {
                    //平台账户
                    $member_api->decrement('money' , $amount);
                    //个人账户
                    $member->increment($amount_type , $amount);
                    //额度转换记录
                    if($member_api->api->api_name =='SG' || $member_api->api->api_name =='PP'){
                        $saoiname='SG/PP';
                    }else{
                        $saoiname=$member_api->api->api_name;
                    }
                    Transfer::create([
                        'bill_no' => $bill_no,
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 1,
                        'money' => $amount,
                        'transfer_in_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'transfer_out_account' => $saoiname.'账户',
                        'result' => json_encode($result)
                    ]);
                    //修改api账号余额
                    $api->increment('api_money' , $amount);
                });
            }catch(\Exception $e){
                DB::rollback();
            }
        }else {
            $return['Code'] = $result['statusCode'];
            $return['Message'] = '错误代码 '.$result['statusCode'].' 请联系客服';
        }

        return $return;
    }

    public function credit($api_name)
    {
       
        $api = Api::where('api_name', $api_name)->first();

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        if ($api->type == 1) { 
            // $platformCode=strtolower($api_name);
            $res = $this->service->credit($api_name);

            //暂时只接YC接口
            if ($res['statusCode'] == '01')
            {
                // $api_name = $api_name == 'BBIN'?'BB':$api_name;
                $money = $res['data'];
                $api->update([
                    'api_money' => $money
                ]);
                $return['Data'] = $money;
            } else {
                $return['Code'] = $res['statusCode'];
                $return['Message'] = '查询商户余额失败！错误代码 '.$res['statusCode'].' 请联系客服';
            }

            return $return;
        } elseif ($api->type == 5) {
            /*
            $server = new SelfService();
            $res = json_decode($server->credit($api_name), TRUE);

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

            return $return;*/
        }




    }
  
      public function game_record(Request $request)
    {
        $game_code=$request->get('gametype');
        // var_dump($game_code);exit;
        // $game=strtolower($game_code);
        $type=$request->get('type');
        return view('api.getRecord_ng',compact('game_code','type'));
    }
    public function getGameRecord($platformCode, $startTime, $endTime, $PageIndex, $limit, $time,$game_type_game){
        // $platformCode = $platformCode == 'BBIN'?'BB':$platformCode;
        // $res = $this->service->GetMerchantReport($platformCode, $startTime, $endTime, $PageIndex, $limit, $time);
        $platformCode=strtolower($platformCode);
        $res=$this->service->record($startTime,$endTime,$PageIndex,$limit,$username = '',$platformCode,$game_type_game);

        return $res;
    }
}

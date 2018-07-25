<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Api;
use App\Models\Member;
use App\Services\CurlService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\Api\BiController;
use App\Http\Controllers\Api\NgController;

class ApiClientController extends WebBaseController
{

    //查询余额
    public function check(Request $request)
    {
        $api_name = strtoupper($request->get('api_name'));
        // var_dump($api_name);
        $member = $this->getMember();
        $api_mod = Api::where('api_name', $api_name)->where('on_line', 0)->first();
        $type = $api_mod->type;
        $res = '';
        if ($type == 1)
        {
            if (in_array($api_name, [
                'AG',
                'BBIN',
                'ALLBET',
                'PT',
                'MG',
                'TTG',
                'IBC',
                'LEBO',
                'GD',
                'SA',
                'BG',
                'DG',
                'OG',
                'SG',
                'ISB',
                'GPI',
                'PP',
                'QT',
                'SUNBET',
                'SS',
                'KY'
            ]))
            {
                $mod = new NgController();
                // $api_name = $api_name == 'SUNBET'? 'SunBet' : $api_name;

                $res =  $mod->balance($api_name,$member->name);
                // var_dump($res);exit;
                return $res;
            }
        } elseif ($type == 2) {
            /*
            switch ($api_name){
                case 'AG':
                    $mod = new AgController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'MG':
                    $mod = new MgController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'BBIN':
                    $mod = new BbinController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'PT':
                    $mod = new PtController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'EBET':
                    $mod = new EbetController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'OG':
                    $mod = new OgController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'EG':
                    $mod = new EgController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'GD':
                    $mod = new GdController();
                    $res =  $mod->balance($member->name);
                    break;

            }
            */
        } elseif ($type == 3) {
            /*
            switch ($api_name){
                case 'AG':
                    $mod = new TgameController();
                    $res =  $mod->balance($member->name,$member->original_password,$api_name);
                    break;
                case 'NAG':
                    $mod = new TgameController();
                    $res =  $mod->balance($member->name,$member->original_password,$api_name);
                    break;

            }
            */
        } elseif ($type == 4) {

        } elseif ($type == 5) {
            /*
            if (in_array($api_name, [
                'AG',
                'BBIN',
                'MG',
                'PT',
                'AB',
                'TTG',
                'IBC',
                'YC',
                'CG',
                'SA',
                'BG',
                'DT',
                'HJ',
                'WJS',
                'PNG',
                'SS',
                'BS',
                'MW',
                'SUNBET',
                'EG',
                'OG',
                'VR',
                'NAG'
            ]))
            {
                $mod = new SelfController();
                $res =  $mod->balance($api_name,$member->name, $member->original_password);
                return $res;
            }
            */
        }

        return $res;
    }

    //转入游戏
    public function deposit($api_name,$username,$password,$amount,$amount_type)
    {
        $api_name = strtoupper($api_name);
        $api_mod = Api::where('api_name', $api_name)->where('on_line', 0)->first();
        $type = $api_mod->type;
        $res = '';

        if ($type == 1) {

            if (in_array($api_name, [
                'AG',
                'BBIN',
                'ALLBET',
                'PT',
                'MG',
                'TTG',
                'IBC',
                'LEBO',
                'GD',
                'SA',
                'BG',
                'DG',
                'OG',
                'SG',
                'ISB',
                'GPI',
                'PP',
                'QT',
                'SUNBET',
                'SS',
                'KY'
            ]))
            {
                $mod = new NgController();
                // $api_name = strtolower($api_name);
                // $api_name = $api_name == 'SUNBET'? 'SunBet' : $api_name;
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                
                return $res;
            }
        } elseif ($type == 2) {
/*
            switch ($api_name){
                case 'AG':
                    $mod = new AgController();
                    $res = $mod->deposit($username, $password, $amount, $amount_type);
                    break;
                case 'MG':
                    $mod = new MgController();
                    $res = $mod->deposit($username, $password, $amount, $amount_type);
                    break;
                case 'BBIN':
                    $mod = new BbinController();
                    $res = $mod->deposit($username, $password, $amount, $amount_type);
                    break;
                case 'PT':
                    $mod = new PtController();
                    $res =  $mod->deposit($username, $password, $amount, $amount_type);
                    break;
                case 'EBET':
                    $mod = new EbetController();
                    $res =  $mod->deposit($username, $password, $amount, $amount_type);
                    break;
                case 'OG':
                    $mod = new OgController();
                    $res =  $mod->deposit($username, $password, $amount, $amount_type);
                    break;
                case 'EG':
                    $mod = new EgController();
                    $res =  $mod->deposit($username, $password, $amount, $amount_type);
                    break;
                case 'GD':
                    $mod = new GdController();
                    $res =  $mod->deposit($username, $amount, $amount_type);
                    break;
            }
            */
        } elseif ($type == 3) {
/*
            switch ($api_name){
                case 'AG':
                    $mod = new TgameController();
                    $res =  $mod->deposit($api_name,$username,$password, $amount, $amount_type);
                    break;
                case 'NAG':
                    $mod = new TgameController();
                    $res =  $mod->deposit($api_name,$username,$password, $amount, $amount_type);
                    break;
            }
            */
        } elseif ($type == 4) {

        } elseif ($type == 5) {
            /*
            if (in_array($api_name, [
                'AG',
                'BBIN',
                'MG',
                'PT',
                'AB',
                'TTG',
                'IBC',
                'YC',
                'CG',
                'SA',
                'BG',
                'DT',
                'HJ',
                'WJS',
                'PNG',
                'SS',
                'BS',
                'MW',
                'SUNBET',
                'EG',
                'OG',
                'VR',
                'NAG'
            ]))
            {
                $mod = new SelfController();
                $res = $mod->deposit($api_name,$username, $password, $amount, $amount_type);
                return $res;
            }
            */
        }


        return $res;
    }

    //转出游戏
    public function withdrawal($api_name,$username,$password,$amount,$amount_type)
    {
        $api_name = strtoupper($api_name);

        $res = '';
        $api_mod = Api::where('api_name', $api_name)->where('on_line', 0)->first();
        $type = $api_mod->type;

        if ($type == 1) {

            if (in_array($api_name, [
                'AG',
                'BBIN',
                'ALLBET',
                'PT',
                'MG',
                'TTG',
                'IBC',
                'LEBO',
                'GD',
                'SA',
                'BG',
                'DG',
                'OG',
                'SG',
                'ISB',
                'GPI',
                'PP',
                'QT',
                'SUNBET',
                'SS',
                'KY'
            ]))
            {
                $mod = new NgController();
                // $api_name = $api_name == 'SUNBET'? 'SunBet' : $api_name;
                // $api_name=strtolower($api_name);
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);
                return $res;
            }
        } elseif ($type == 2) {
            /*
            switch ($api_name){
                case 'AG':
                    $mod = new AgController();
                    $res = $mod->withdrawal($username, $password, $amount, $amount_type);
                    break;
                case 'MG':
                    $mod = new MgController();
                    $res = $mod->withdrawal($username, $password, $amount, $amount_type);
                    break;
                case 'BBIN':
                    $mod = new BbinController();
                    $res = $mod->withdrawal($username, $password, $amount, $amount_type);
                    break;
                case 'PT':
                    $mod = new PtController();
                    $res =  $mod->withdrawal($username, $password, $amount, $amount_type);
                    break;
                case 'EBET':
                    $mod = new EbetController();
                    $res =  $mod->withdrawal($username, $password, $amount, $amount_type);
                    break;
                case 'OG':
                    $mod = new OgController();
                    $res =  $mod->withdrawal($username, $password, $amount, $amount_type);
                    break;
                case 'EG':
                    $mod = new EgController();
                    $res =  $mod->withdrawal($username, $password, $amount, $amount_type);
                    break;
                case 'GD':
                    $mod = new GdController();
                    $res =  $mod->withdrawal($username, $amount, $amount_type);
                    break;
            }*/
        } elseif ($type == 3) {
            /*
            switch ($api_name){
                case 'AG':
                    $mod = new TgameController();
                    $res =  $mod->withdrawal($api_name,$username, $password,$amount, $amount_type);
                    break;
                case 'NAG':
                    $mod = new TgameController();
                    $res =  $mod->withdrawal($api_name,$username, $password,$amount, $amount_type);
                    break;
            }
            */
        } elseif ($type == 4) {

        } elseif ($type == 5) {
            /*
            if (in_array($api_name, [
                'AG',
                'BBIN',
                'MG',
                'PT',
                'AB',
                'TTG',
                'IBC',
                'YC',
                'CG',
                'SA',
                'BG',
                'DT',
                'HJ',
                'WJS',
                'PNG',
                'SS',
                'BS',
                'MW',
                'SUNBET',
                'EG',
                'OG',
                'VR',
                'NAG'
            ]))
            {
                $mod = new SelfController();
                $res = $mod->withdrawal($api_name,$username, $password, $amount, $amount_type);
                return $res;
            }
            */
        }


        return $res;
    }

    //查询商户余额
    public function credit(Request $request)
    {
        // var_dump($request->get('api_name'));exit;
        $api_name = strtoupper($request->get('api_name'));
        $api_mod = Api::where('api_name', $api_name)->where('on_line', 0)->first();
        $type = $api_mod->type;
        // var_dump($type);
        $res = '';

        if ($type == 1) {

            if (in_array($api_name, [
                'AG',
                'BBIN',
                'ALLBET',
                'PT',
                'MG',
                'TTG',
                'IBC',
                'LEBO',
                'GD',
                'SA',
                'BG',
                'DG',
                'OG',
                'SG',
                'ISB',
                'GPI',
                'PP',
                'QT',
                'SUNBET',
                'SS',
                'KY'
            ]))
            {
                $mod = new NgController();
                // $api_name = $api_name == 'SUNBET'? 'SunBet' : $api_name;

                $res =  $mod->credit($api_name);
                return $res;
            }
        } elseif ($type == 2) {
/*
            switch ($api_name){
                case 'AG':
                    $mod = new AgController();
                    $res =  $mod->credit();
                    break;
                case 'MG':
                    $mod = new MgController();
                    $res =  $mod->credit();
                    break;
                case 'BBIN':
                    $mod = new BbinController();
                    $res =  $mod->credit();
                    break;
                case 'PT':
                    $mod = new PtController();
                    $res =  $mod->credit();
                    break;
                case 'EBET':
                    $mod = new EbetController();
                    $res =  $mod->credit();
                    break;
                case 'OG':
                    $mod = new OgController();
                    $res =  $mod->credit();
                    break;
                case 'GD':
                    $mod = new GdController();
                    $res =  $mod->credit();
                    break;
            }
            */
        } elseif ($type == 3) {

        } elseif ($type == 4) {

        } elseif ($type == 5) {
            /*
            if (in_array($api_name, [
                'AG',
                'BBIN',
                'MG',
                'PT',
                'AB',
                'TTG',
                'IBC',
                'YC',
                'CG',
                'SA',
                'BG',
                'DT',
                'HJ',
                'WJS',
                'PNG',
                'SS',
                'BS',
                'MW',
                'SUNBET',
                'EG',
                'OG',
                'VR',
                'NAG'
            ]))
            {
                $mod = new SelfController();
                $res =  $mod->credit($api_name);
                return $res;
            }
            */
        }

        return $res;
    }

    //后台查询用户余额
    public function balance($id, $api_name)
    {
        // echo 121;exit;
        $member = Member::findOrFail($id);
        $api_mod = Api::where('api_name', $api_name)->where('on_line', 0)->first();
        $type = $api_mod->type;
        $res = '';

        if ($type == 1) {
/*
            if (in_array($api_name, [
                'AG',
                'BBIN',
                'AB',
                'PT',
                'MG',
                'TTG',
                'IBC',
                'YC',
                'CG',
                'SA',
                'BG',
                'DT',
                'HJ',
                'WJS',
                'PNG',
                'SS',
                'BS',
                'MW'
            ]))
            {
                $mod = new BiController();
                $api_name = $api_name == 'SUNBET'? 'SunBet' : $api_name;
                $res =  $mod->balance($api_name,$member->name);
                return $res;
            }
            */
        } elseif ($type == 2) {
            /*
            switch ($api_name){
                case 'AG':
                    $mod = new AgController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'MG':
                    $mod = new MgController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'BBIN':
                    $mod = new BbinController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'PT':
                    $mod = new PtController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'EBET':
                    $mod = new EbetController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'OG':
                    $mod = new OgController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'EG':
                    $mod = new EgController();
                    $res =  $mod->balance($member->name, $member->original_password);
                    break;
                case 'GD':
                    $mod = new GdController();
                    $res =  $mod->balance($member->name);
                    break;
            }*/
        } elseif ($type == 3) {
/*
            switch ($api_name){
                case 'AG':
                    $mod = new TgameController();
                    $res =  $mod->balance($member->name,$member->original_password,$api_name);
                    break;
                case 'NAG':
                    $mod = new TgameController();
                    $res =  $mod->balance($member->name,$member->original_password,$api_name);
                    break;
            }
            */
        } elseif ($type == 4) {

        } elseif ($type == 5) {
            /*
            if (in_array($api_name, [
                'AG',
                'BBIN',
                'MG',
                'PT',
                'AB',
                'TTG',
                'IBC',
                'YC',
                'CG',
                'SA',
                'BG',
                'DT',
                'HJ',
                'WJS',
                'PNG',
                'SS',
                'BS',
                'MW',
                'SUNBET',
                'EG',
                'OG',
                'VR',
                'NAG'
            ]))
            {
                $mod = new SelfController();
                $res =  $mod->balance($api_name,$member->name, $member->original_password);
                return $res;
            }*/
        }

        return $res;
    }
}
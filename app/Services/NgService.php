<?php
namespace App\Services;

use App\Models\Api;
use App\Services\CurlService;
class NgService{

    protected $url;
   
    protected $signKey;
    
    protected $apiAccount;
    

    public function __construct()
    {
        $mod = Api::where('api_name', 'NG')->first();
        $this->url = $mod->api_domain;
        $this->signKey = $mod->api_key;
        $this->apiAccount= $mod->api_username;

    }

    public function register($platformCode, $username){
        $url=$this->url."/v1/user/register";
        $code=md5($this->signKey.$this->apiAccount.$platformCode.$username);
        $data=array(
            'username'=>$username,
            'sign_key'=>$this->signKey,
            'plat_type'=>$platformCode,
            'code'=>$code
        );
        $res = $this->sendRequests($url, $data);
        return $res;
    }

    private function sendRequests($url,$post_data=array(),$timeout=8){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $contents = curl_exec($ch);
        curl_close($ch);
        return json_decode ($contents, TRUE);
    }
    public function login($username,$platformCode,$game_type_game){
        if($this->isMobile()){
            $isMobileUrl=1;
        }else{
            $isMobileUrl=0;
        }
        $url=$this->url."/v1/user/login";
        $code = md5($this->signKey.$this->apiAccount.$username.$platformCode.$isMobileUrl);
        $data = array(
            "username"=>$username,
            "plat_type"=>$platformCode,
            "game_type"=>$game_type_game,
            "sign_key"=>$this->signKey,
            "is_mobile_url"=>$isMobileUrl,
            "code"=>$code
        );
        $res = $this->sendRequests($url, $data);
        return $res;
    }
    public function trans($username,$money,$client_transfer_id,$platformCode){
        $url=$this->url."/v1/user/trans";
        $code = md5($this->signKey.$this->apiAccount.$username.$platformCode.$money.$client_transfer_id);
        $data = array(
            "username"=>$username,
            "plat_type"=>$platformCode,
            "money"=>$money,
            "client_transfer_id"=>$client_transfer_id,
            "sign_key"=>$this->signKey,
            "code"=>$code
        );
// var_dump($data);exit;
        $res = $this->sendRequests($url, $data);
        return $res;
    }
    public function balance($username,$platformCode){
        $url=$this->url."/v1/user/balance";
        $code = md5($this->signKey.$this->apiAccount.$username.$platformCode);
        $data = array(
            "username"=>$username,
            "plat_type"=>$platformCode,
            "sign_key"=>$this->signKey,
            "code"=>$code
        );
        $res = $this->sendRequests($url, $data);
        return $res;
    }
    public function credit($platformCode){
        $platformCode=strtolower($platformCode);
        $url=$this->url."/v1/user/credit";
        $code = md5($this->signKey.$this->apiAccount.$platformCode);
        $data = array(
            "plat_type"=>$platformCode,
            "sign_key"=>$this->signKey,
            "code"=>$code
        );
        $res = $this->sendRequests($url, $data);
        return $res;
    }
    public function record($startTime,$endTime,$page=1,$limit=15,$username = '',$platformCode,$game_type_game){
        $url=$this->url."/v1/user/record";
        $code = md5($this->signKey.$this->apiAccount.$platformCode.$startTime.$endTime);
        $data = array(
            "plat_type"=>$platformCode,
            "page"=>$page,
            "limit"=>$limit,
            "startTime"=>$startTime,
            "endTime"=>$endTime,
            "username"=>$username,
            "game_type"=>$game_type_game,
            "sign_key"=>$this->signKey,
            "code"=>$code
        );
        // echo "<pre />";
        // var_dump($data);exit;
        $res = $this->sendRequests($url, $data);
        return $res;
    }
    public function bbinPassword($username,$password){
        $url=$this->url."/v1/bbin/password";
        $code = md5($this->signKey.$this->apiAccount.$username.$password);
        $data = array(
            "username"=>$username,
            "password"=>$password,
            "sign_key"=>$this->signKey,
            "code"=>$code
        );
        $res = $this->sendRequests($url, $data);
        return $res;
    }
    


    public function https_request($url,$data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

        if (!empty($data))
        {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

       $output = curl_exec($curl);

        curl_close($curl);
        //$output=json_decode($output,true);
        return $output;
    }

    //判断是否手机
    function isMobile()
    {
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        {
            return true;
        }
        if (isset ($_SERVER['HTTP_VIA']))
        {
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        if (isset ($_SERVER['HTTP_USER_AGENT']))
        {
            $clientkeywords = array ('nokia',
                'sony',
                'ericsson',
                'mot',
                'samsung',
                'htc',
                'sgh',
                'lg',
                'sharp',
                'sie-',
                'philips',
                'panasonic',
                'alcatel',
                'lenovo',
                'iphone',
                'ipod',
                'blackberry',
                'meizu',
                'android',
                'netfront',
                'symbian',
                'ucweb',
                'windowsce',
                'palm',
                'operamini',
                'operamobi',
                'openwave',
                'nexusone',
                'cldc',
                'midp',
                'wap',
                'mobile'
            );
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
            {
                return true;
            }
        }
        if (isset ($_SERVER['HTTP_ACCEPT']))
        {
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
            {
                return true;
            }
        }
        return false;
    }

    protected function send_post($url,$post_data) {
        $result = (new CurlService())->post($url, $post_data);

        return $result;
    }

}
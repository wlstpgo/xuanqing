<?php
namespace App\Services;

/**
 *
 * 接口商联系 394857168
 *
 *
 *
 *
 */
use App\Models\Api;
use App\Services\CurlService;
class SelfService{
    public $pre;   // 玩家前缀
    public  $domain;
    public  $comId;
    public $comKey;
    public $gamePlatform;
    public $debug;
    public $salt ;
    public $betLimitCode;
    public $currencyCode;
    public $isspeed;
    public $isdemo;
    public $api_code;

    public function __construct()
    {
        $mod = Api::where('api_name', 'SELF')->first();
        $this->pre = $mod->prefix;// 玩家前缀
        $this->domain = $mod->api_domain;
        $this->api_id = $mod->api_id;
        $this->api_key = $mod->api_key;
        $this->gamePlatform = $mod->api_name;
        $this->debug = 0;
        $this->salt = $this->salt(5);
        $this->betLimitCode = 'A';
        $this->currencyCode = 'CNY';
        $this->isspeed = 0;
        $this->isdemo = 0;
    }

    public function register($api_code, $username,$password,$is_test = 0){
        $post_data = array('api_id'=>$this->api_id,'api_key'=>$this->api_key,'api_code' => $api_code,'username' => $username,'password'=>$password,'betLimitCode'=>$this->betLimitCode,'currencyCode'=>$this->currencyCode,'isSpeed'=>$this->isspeed,'is_test'=>$is_test,'method'=>'register');

        $receive = $this->send_post('http://'.$this->domain,$post_data);
        return $receive;
    }

    /*
     * 登录视讯 http://<domain>/api/ag/login.ashx
     */
    public function login($api_code,$username,$password,$gameType,$gameName = '',$is_Mobile = 0){
        $post_data = array('api_id'=>$this->api_id,'api_key'=>$this->api_key,'api_code' => $api_code,'username' => $username,'password'=>$password,'betLimitCode'=>$this->betLimitCode,'currencyCode'=>$this->currencyCode,'isSpeed'=>$this->isspeed,'isDemo'=>$this->isdemo,'method'=>'login','gameType' => $gameType,'gameName' => $gameName, 'isMobile' => $is_Mobile);

        $receive = $this->send_post('http://'.$this->domain,$post_data);
        return $receive;
    }


    /*
     * 存款 http://<domain>/api/ag/deposit.ashx
     */
    public function transfer($api_code,$username,$password,$amount,$type = 1){
        $transSN = date("YmdHms").mt_rand(100,999);//交易编号
        $post_data = array('api_id'=>$this->api_id,'api_key'=>$this->api_key,'api_code' => $api_code,'username' => $username,'password'=>$password,'amount' => $amount, 'type' => $type,'billno' => $transSN,'method'=>'transfer');

        $receive = $this->send_post('http://'.$this->domain,$post_data);
        return $receive;
    }

    /*
     * 查询余额 http://<domain>/api/ag/balance.ashx
     */
    public function balance($api_code,$username,$password){

        $post_data = array('api_id'=>$this->api_id,'api_key'=>$this->api_key,'api_code' => $api_code,'username' => $username,'password'=>$password,'betLimitCode'=>$this->betLimitCode,'currencyCode'=>$this->currencyCode,'isSpeed'=>$this->isspeed,'isDemo'=>$this->isdemo,'method'=>'balance');

        $receive = $this->send_post('http://'.$this->domain,$post_data);
        return $receive;
    }


    /*
    * 游戏记录 http://<domain>/api/ag/betrecord.ashx
    */
    public function betrecord($api_code,$username,$startDate,$endDate,$page,$pagesize){

        $post_data = array('api_id'=>$this->api_id,'api_key'=>$this->api_key,'api_code' => $api_code,'username' => $username,'start_at'=>$startDate,'end_at'=>$endDate,'page'=>$page,'pagesize'=>$pagesize,'method'=>'gamerecord');

        $receive = $this->send_post('http://'.$this->domain,$post_data);
        return $receive;
    }

    /*
    * 商户余额查询
    */
    public function credit($api_code){
        $post_data = array('api_id'=>$this->api_id,'api_key'=>$this->api_key,'api_code' => $api_code,'method'=>'credit');

        $receive = $this->send_post('http://'.$this->domain,$post_data);
        return $receive;
    }

    protected function send_post($url,$post_data) {
        $result = (new CurlService())->post($url, $post_data);

        return $result;
    }

    protected function salt($length)
    {
        $key="";
        $pattern='1234567890abcdefghijklmnopqrstuvwxyz';
        for($i=0;$i<$length;$i++)
        {
            $key .= $pattern{mt_rand(0,35)};
        }
        return $key;
    }
}
<?php
// header('Content-Type:text/html; charset=utf-8');
function SaveTime($jsonDate){
    preg_match('/\d{10}/',$jsonDate,$matches);
    return (date('Y-m-d H:i:s',$matches[0]));
}

$time=time();
$S_time=$time-24*60*60;
$E_time=$time;

// $S_time=1524931200;
// $E_time='1525017599';
$limit=15;
$PageIndex=1;
$platformCode=$game_code;
if($type =='0'){
    $game_type_game='game';
    $gameType=3;
}else if($type =='1'){
    $game_type_game='live';
     $gameType=1;
}else if($type =='2'){
    $game_type_game='lott';
     $gameType=4;
}else if($type =='3'){
    $game_type_game='ball';
    $gameType=5;
}else if($type =='4'){
    $game_type_game='chess_and_cards';
    $gameType=6;
}
if($platformCode =='ss'){
    // $S_time=1525252732;
// $E_time='1525267132';
}
$api_mod = \App\Models\Api::where('api_name', strtoupper($platformCode))->where('type', 1)->first();
$api=new \App\Http\Controllers\Api\NgController();
$infos=$api->getGameRecord($platformCode, date('Y-m-d H:i:s',$S_time), date('Y-m-d H:i:s',$E_time), $PageIndex, $limit, $time,$game_type_game);
// var_dump($infos);
// exit;
$gs=var_export($infos,true);
file_put_contents($_SERVER['DOCUMENT_ROOT']."/".$platformCode."--".$type.".txt",$gs.date('Y-m-d H:i:s').PHP_EOL,FILE_APPEND);
$count=0;
if(!empty($infos['data']['record'])){
    $count=$infos['data']['countNum'];
    $data =$infos['data']['record'];
    $currentPage=$infos['data']['currentPage'];
    $totalPage=$infos['data']['totalPage'];
    $data =array_reverse($data);
    foreach($data as $k=>$v){
        $l = $api_mod->prefix;
        if($platformCode=='ag'){
            $betorderid=$v['betId'];
            $netAmount=$v['betAmount']+$v['payOut'];
            $ctime=$v['betTimeBj'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['betAmount'];
            $validBetAmount=$v['validBetAmount'];
            $gamecode=$v['gameType'];
        }else if($platformCode=='bbin'){ 
            if(!$v['Payoff']){
                $v['Payoff']='0';
            }

                 $netAmount=$v['Payoff']+$v['BetAmount'];
                $ctime=$v['beijing_bet_time'];
                $PlayerName = $v["loginId"];
                $betAmount=$v['BetAmount'];
                 $betorderid=$v['WagersID'];
                $gamecode=$v['GameType'];
            if($type == '1'){
               $validBetAmount=$v['Commissionable'];
            }else if($type == '2'){
                // $netAmount=$v['Payoff'];
                $validBetAmount=$v['BetAmount'];
            }else if($type == '3'){
                $validBetAmount=$v['BetAmount'];
            }else if($type == '0'){
                $validBetAmount=$v['Commissionable'];
            }
           
        }else if($platformCode=='bg'){
            $betorderid=$v['orderId'];
            if(!$v['aAmount']){
                $v['aAmount']=0;
            }
            $netAmount=$v['aAmount'];
            $ctime=$v['beijing_bet_time'];
            $PlayerName = $v["loginId"];
            $betAmount=str_replace("-", "", $v['bAmount']);
            $validBetAmount=$v['validBet'];
            $gamecode=$v['gameName'];
        }else if($platformCode=='allbet'){
            $betorderid=$v['betNum'];
            $netAmount=$v['betAmount']+$v['winOrLoss'];
            $ctime=$v['bjbetTime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['betAmount'];
            $validBetAmount=$v['validAmount'];
            $gamecode=$v['gameType'];
        }else if($platformCode=='og'){
            $betorderid=$v['betId'];
            $netAmount=$v['betAmount']+$v['payOut'];
            $ctime=$v['beijing_bet_time'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['betAmount'];
            $validBetAmount=$v['validAmount'];
            $gamecode=$v['roundId'];
        }else if($platformCode=='mg'){
            $betorderid=$v['rowId'];
            $netAmount=$v['totalPayout'];
            $ctime=$v['bjgameEndTime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['totalWager'];
            $validBetAmount=$v['validBetAmount'];
            $gamecode=$v['displayName'];
        }else if($platformCode=='pt'){
            $betorderid=$v['rNum'];
            $netAmount=$v['win']+$v['bet'];
            $ctime=$v['bjgameDate'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['bet'];
            $validBetAmount=$v['bet'];
            $gamecode=$v['gameName'];
        }else if($platformCode=='lebo'){
            $betorderid=$v['betId'];
            $netAmount=$v['betAmount']+$v['payOut'];
            $ctime=$v['beijing_bet_time'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['betAmount'];
            $validBetAmount=$v['validBetAmount'];
            $gamecode=$v['gameId'];
        }else if($platformCode=='gd'){
            $betorderid=$v['betId'];
            $netAmount=$v['betAmount']+$v['winLoss'];
            $ctime=$v['beijing_bet_time'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['betAmount'];
            $validBetAmount=$v['validBetAmount'];
            $gamecode=$v['productId'];
        }else if($platformCode=='dg'){
            $betorderid=$v['betId'];
            $netAmount=$v['winOrLoss']+$v['betPoints'];
            $ctime=$v['bjBettime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['betPoints'];
            $validBetAmount=$v['availableBet'];
            $gamecode=$v['gameId'];
        }else if($platformCode=='gpi'){
            $betorderid=$v['operationCode'];
            $netAmount=$v['ret'];
            $ctime=$v['bjChangeTime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['ret']-$v['changes'];
            $validBetAmount=$v['ret']-$v['changes'];
            $gamecode=$v['gameName'];
        }else if($platformCode=='sg'){
            $betorderid=$v['betId'];
            $netAmount=$v['win'];
            $ctime=$v['gameDate'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['bet'];
            $validBetAmount=$v['bet'];
            $gamecode=$v['gameNameCn'];
        }else if($platformCode=='pp'){
            $betorderid=$v['betId'];
            $netAmount=$v['win'];
            $ctime=$v['gameDate'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['bet'];
            $validBetAmount=$v['bet'];
            $gamecode=$v['gameNameCn'];
        }else if($platformCode=='ttg'){
            $betorderid=$v['betId'];
            $netAmount=$v['win'];
            $ctime=$v['gameDate'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['bet'];
            $validBetAmount=$v['bet'];
            $gamecode=$v['gameNameCn'];
        }else if($platformCode=='qt'){
            $betorderid=$v['betId'];
            $netAmount=$v['totalPayout'];
            $ctime=$v['initiated'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['totalBet'];
            $validBetAmount=$v['totalBet'];
            $gamecode=$v['gameNameCN'];
        }else if($platformCode=='sunbet'){
            $betorderid=$v['betId'];
            $netAmount=$v['winAmount'];
            $ctime=$v['beijing_bet_time'];
            $PlayerName = $v["loginId"];
            $betAmount=str_replace("-", "", $v['riskAmount']);
            $validBetAmount=$betAmount;
            $gamecode=$v['gameId'];
        }else if($platformCode=='ibc'){
            $betorderid=$v['TransId'];
            $netAmount=$v['bet']+$v['win'];
            $ctime=$v['TransactionTime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['bet'];
            $validBetAmount=$v['bet'];
            $gamecode=$v['sport_type'];
        }else if($platformCode=='sa'){
            $betorderid=$v['BetID'];
            $netAmount=$v['ResultAmount'];
            $ctime=$v['BetTime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['BetAmount'];
            $validBetAmount=$v['BetAmount'];
            $gamecode=$v['GameType'];
        }else if($platformCode=='ss'){
            $betorderid=$v['transaction_id'];
            if(!$v['win_amt']){
                $v['win_amt']=0;
            }
            $netAmount=$v['win_amt']+$v['wager_stake'];
            $ctime=$v['beijing_bet_time'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['wager_stake'];
            $validBetAmount=$v['final_stake'];
            $gamecode=$v['play_type'];
        }else if($platformCode=='ky'){
            $betorderid=$v['GameID'];
            $netAmount=$v['Profit']+$v['CellScore'];
            $ctime=$v['GameStartTime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['CellScore'];
            $validBetAmount=$v['CellScore'];
            $gamecode=$v['KindID'];
        }
        if(empty($v['playType'])){
            $v['playType']='';
        }
        $r_mod = \App\Models\GameRecord::where('billNo', $betorderid)->where('api_type', $api_mod->id)->first();

        if($r_mod){
            if($r_mod->netAmount != $netAmount){

                $r_mod->update([
                    'netAmount' => $netAmount
                ]);
            }
        }else{

            // $ctime = SaveTime($v['betTime']);
           
            $name = substr($PlayerName, strlen($l));
            $m = \App\Models\Member::where('name', $name)->first();

            

            \App\Models\GameRecord::create([
                'billNo' => $betorderid,
                'playerName' => $PlayerName,
                'betAmount' => $betAmount,
                'validBetAmount' => $validBetAmount,
                'netAmount' => $netAmount,
                'reAmount' => $netAmount,
                'betTime' => $ctime,
                'gameCode' => $gamecode,
                'playType' => $v['playType'],
                'gameType' => $gameType,

                'api_type' => $api_mod->id,
                'name' => $name,
                'member_id' => $m?$m->id:0,
                'result' => json_encode($v)
            ]);

        }

    }

    if ($count > $limit)
    {
        //currentPage
// totalPage
        for ($i=1;$i <= $totalPage;$i++)
        {
           $p=$i;
            // $time = time();
           $time=$E_time;
           // $time="1524931199";
            $infoss=$api->getGameRecord($platformCode, date('Y-m-d H:i:s',$S_time), date('Y-m-d H:i:s',$time), $p, $limit, $time,$game_type_game);
            // $data=$api->getGameRecord($platformCode,$S_time,$E_time,$p,$limit,$time);
            if (!empty($infoss['data']['record']))
            {
                $data =$infoss['data']['record'];
                foreach($data as $k=>$v){
                     $l =$api_mod->prefix;
               if($platformCode=='ag'){
            $betorderid=$v['betId'];
            $netAmount=$v['betAmount']+$v['payOut'];
            $ctime=$v['betTimeBj'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['betAmount'];
            $validBetAmount=$v['validBetAmount'];
            $gamecode=$v['gameType'];
        }else if($platformCode=='bbin'){ 
            if(!$v['Payoff']){
                $v['Payoff']='0';
            }
                 $netAmount=$v['Payoff']+$v['BetAmount'];
                $ctime=$v['beijing_bet_time'];
                $PlayerName = $v["loginId"];
                $betAmount=$v['BetAmount'];
                 $betorderid=$v['WagersID'];
                $gamecode=$v['GameType'];
            if($type == '1'){
               $validBetAmount=$v['Commissionable'];
            }else if($type == '2'){
                // $netAmount=$v['Payoff'];
                $validBetAmount=$v['BetAmount'];
            }else if($type == '3'){
                $validBetAmount=$v['BetAmount'];
            }else if($type == '0'){
                $validBetAmount=$v['Commissionable'];
            }
           
        }else if($platformCode=='bg'){
            $betorderid=$v['orderId'];
            if(!$v['aAmount']){
                $v['aAmount']=0;
            }
            $netAmount=$v['aAmount'];
            $ctime=$v['beijing_bet_time'];
            $PlayerName = $v["loginId"];
            $betAmount=str_replace("-", "", $v['bAmount']);
            $validBetAmount=$v['validBet'];
            $gamecode=$v['gameName'];
        }else if($platformCode=='allbet'){
            $betorderid=$v['betNum'];
            $netAmount=$v['betAmount']+$v['winOrLoss'];
            $ctime=$v['bjbetTime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['betAmount'];
            $validBetAmount=$v['validAmount'];
            $gamecode=$v['gameType'];
        }else if($platformCode=='og'){
            $betorderid=$v['betId'];
            $netAmount=$v['betAmount']+$v['payOut'];
            $ctime=$v['beijing_bet_time'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['betAmount'];
            $validBetAmount=$v['validAmount'];
            $gamecode=$v['roundId'];
        }else if($platformCode=='mg'){
            $betorderid=$v['rowId'];
            $netAmount=$v['totalPayout'];
            $ctime=$v['bjgameEndTime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['totalWager'];
            $validBetAmount=$v['validBetAmount'];
            $gamecode=$v['displayName'];
        }else if($platformCode=='pt'){
            $betorderid=$v['rNum'];
            $netAmount=$v['win']+$v['bet'];
            $ctime=$v['bjgameDate'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['bet'];
            $validBetAmount=$v['bet'];
            $gamecode=$v['gameName'];
        }else if($platformCode=='lebo'){
            $betorderid=$v['betId'];
            $netAmount=$v['betAmount']+$v['payOut'];
            $ctime=$v['beijing_bet_time'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['betAmount'];
            $validBetAmount=$v['validBetAmount'];
            $gamecode=$v['gameId'];
        }else if($platformCode=='gd'){
            $betorderid=$v['betId'];
            $netAmount=$v['betAmount']+$v['winLoss'];
            $ctime=$v['beijing_bet_time'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['betAmount'];
            $validBetAmount=$v['validBetAmount'];
            $gamecode=$v['productId'];
        }else if($platformCode=='dg'){
            $betorderid=$v['betId'];
            $netAmount=$v['winOrLoss']+$v['betPoints'];
            $ctime=$v['bjBettime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['betPoints'];
            $validBetAmount=$v['availableBet'];
            $gamecode=$v['gameId'];
        }else if($platformCode=='gpi'){
            $betorderid=$v['operationCode'];
            $netAmount=$v['ret'];
            $ctime=$v['bjChangeTime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['ret']-$v['changes'];
            $validBetAmount=$v['ret']-$v['changes'];
            $gamecode=$v['gameName'];
        }else if($platformCode=='sg'){
            $betorderid=$v['betId'];
            $netAmount=$v['win'];
            $ctime=$v['gameDate'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['bet'];
            $validBetAmount=$v['bet'];
            $gamecode=$v['gameNameCn'];
        }else if($platformCode=='pp'){
            $betorderid=$v['betId'];
            $netAmount=$v['win'];
            $ctime=$v['gameDate'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['bet'];
            $validBetAmount=$v['bet'];
            $gamecode=$v['gameNameCn'];
        }else if($platformCode=='ttg'){
            $betorderid=$v['betId'];
            $netAmount=$v['win'];
            $ctime=$v['gameDate'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['bet'];
            $validBetAmount=$v['bet'];
            $gamecode=$v['gameNameCn'];
        }else if($platformCode=='qt'){
            $betorderid=$v['betId'];
            $netAmount=$v['totalPayout'];
            $ctime=$v['initiated'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['totalBet'];
            $validBetAmount=$v['totalBet'];
            $gamecode=$v['gameNameCN'];
        }else if($platformCode=='sunbet'){
            $betorderid=$v['betId'];
            $netAmount=$v['winAmount'];
            $ctime=$v['beijing_bet_time'];
            $PlayerName = $v["loginId"];
            $betAmount=str_replace("-", "", $v['riskAmount']);
            $validBetAmount=$betAmount;
            $gamecode=$v['gameId'];
        }else if($platformCode=='ibc'){
            $betorderid=$v['TransId'];
            $netAmount=$v['bet']+$v['win'];
            $ctime=$v['TransactionTime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['bet'];
            $validBetAmount=$v['bet'];
            $gamecode=$v['sport_type'];
        }else if($platformCode=='sa'){
            $betorderid=$v['BetID'];
            $netAmount=$v['ResultAmount'];
            $ctime=$v['BetTime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['BetAmount'];
            $validBetAmount=$v['BetAmount'];
            $gamecode=$v['GameType'];
        }else if($platformCode=='ss'){
            $betorderid=$v['transaction_id'];
            if(!$v['win_amt']){
                $v['win_amt']=0;
            }
           $netAmount=$v['win_amt']+$v['wager_stake'];
            $ctime=$v['beijing_bet_time'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['wager_stake'];
            $validBetAmount=$v['final_stake'];
            $gamecode=$v['play_type'];
        }else if($platformCode=='ky'){
            $betorderid=$v['GameID'];
            $netAmount=$v['Profit']+$v['CellScore'];
            $ctime=$v['GameStartTime'];
            $PlayerName = $v["loginId"];
            $betAmount=$v['CellScore'];
            $validBetAmount=$v['CellScore'];
            $gamecode=$v['KindID'];
        }
                    if(empty($v['playType'])){
                        $v['playType']='';
                    }
                    $r_mod = \App\Models\GameRecord::where('billNo', $betorderid)->where('api_type', $api_mod->id)->first();

                    if($r_mod){
                        if($r_mod->netAmount != $netAmount){

                            $r_mod->update([
                                'netAmount' => $netAmount
                            ]);
                        }
                    }else{

                       
                        $name = substr($PlayerName, strlen($l));
                        $m = \App\Models\Member::where('name', $name)->first();
/*
                        switch ($v['platformType']) {
                            case 'AGIN':
                                $gameType = 1;
                                break;
                            case 'HUNTER':
                                $gameType = 2;
                                break;
                            case 'AGTEX':
                                $gameType = 6;
                                break;
                            case 'XIN':
                                $gameType = 3;
                                break;
                            default :
                                $gameType = 1;
                        }*/

                        \App\Models\GameRecord::create([
                             'billNo' => $betorderid,
                            'playerName' => $PlayerName,
                            'betAmount' => $betAmount,
                            'validBetAmount' => $validBetAmount,
                            'netAmount' => $netAmount,
                            'reAmount' => $netAmount,
                            'betTime' => $ctime,
                            'gameCode' => $gamecode,
                            'playType' => $v['playType'],
                            'gameType' => $gameType,

                            'api_type' => $api_mod->id,
                            'name' => $name,
                            'member_id' => $m?$m->id:0,
                            'result' => json_encode($v)
                        ]);

                    }

                }
            }
        }
    }
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <style type="text/css">
        body,td,th {
            font-size: 12px;
        }
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
    </style>
</head>
<body>
<script>
    var limit="120"
    if (document.images){
        var parselimit=limit
    }
    function beginrefresh(){
        if (!document.images)
            return
        if (parselimit==1)
            window.location.reload()
        else{
            parselimit-=1
            curmin=Math.floor(parselimit)
            if (curmin!=0)
                curtime=curmin+"秒后自动获取!"
            else
                curtime=cursec+"秒后自动获取!"
            timeinfo.innerText=curtime
            setTimeout("beginrefresh()",1000)
        }
    }

    window. onload=beginrefresh
</script>
<h1>
<?php 
    if($type =='0'){
        $str=strtoupper($platformCode)."电子";
    }else if($type =='1'){
       $str=strtoupper($platformCode)."视讯";
    }else if($type =='2'){
        $str=strtoupper($platformCode)."彩票";
    }else if($type =='3'){
       $str=strtoupper($platformCode)."体育";
    }else if($type =='4'){
       $str=strtoupper($platformCode)."棋牌";
    }
 ?>
</h1>
<table width="100%"border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <input type=button name=button value="刷新" onClick="window.location.reload()">
            <?php echo $str; ?>:成功采集到<?=$count?>条数据
            <span id="timeinfo"></span>

        </td>
        <td>开始时间：<?php echo date("Y-m-d H:i:s",$S_time);?>------ <?php echo date("Y-m-d H:i:s",$E_time);?></td>
    </tr>
</table>
</body>
</html>

<?php
header('Content-Type:text/html; charset=utf-8');
function SaveTime($jsonDate){
    preg_match('/\d{10}/',$jsonDate,$matches);
    return (date('Y-m-d H:i:s',$matches[0]));
}
set_time_limit(0);
$end_date = date('Y-m-d H:i:s');
$start_time = date('Y-m-d H:i:s', strtotime('-2 hour'));
$page = 1;
$pagesize = 5000;
$service = new \App\Services\SelfService();
$api = \App\Models\Api::where('api_name', $api_code)->where('type', 5)->first();
$api_mod = \App\Models\Api::where('api_name', 'SELF')->where('type', 5)->first();
$username = '';
$TotalNumber = 0;
$res = json_decode($service->betrecord($api_code,$username, $start_time, $end_date,$page, $pagesize), TRUE);

if ($res['status']['errorCode'] == 0)
{
    if ($res['data'])
    {
        $data = $res['data']['data'];
        $Page        = $res['data']["page"];
        $PageLimit   = $res['data']["pageSize"];
        $TotalNumber = $res['data']["total_count"];
        $TotalPage   = $res['data']["pageCount"];

        if (count($data) > 0)
        {
            foreach($data as $value)
            {
                $mod = \App\Models\GameRecord::where('billNo', $value["billNo"])->where('api_type', $api->id)->first();
                if ($mod)
                    {
                        $mod->update([
                            'netAmount' => $value["netAmount"] + $value["betAmount"],
                        ]);
                    } else {
                    $l = strlen($api_mod->prefix);
                    $PlayerName = $value["name"];
                    $name = substr($PlayerName, $l);
                    $m = \App\Models\Member::where('name', $name)->first();
                    if ($m)
                        {
                            \App\Models\GameRecord::create([
                                'billNo' => $value["billNo"],
                                'playerName' => $PlayerName,
                                'agentCode' => isset($value["agentCode"])?$value["agentCode"]:'',
                                'gameCode' => isset($value["gameCode"])?$value["gameCode"]:'',
                                'netAmount' => $value["netAmount"] + $value["betAmount"],
                                'betTime' => date('Y-m-d H:i:s', strtotime($value["betTime"])),
                                'gameType' => $value['gameType'],
                                'betAmount' => $value["betAmount"],
                                'validBetAmount' => $value["validBetAmount"],
                                'flag' => isset($value["flag"])?$value["flag"]:'',
                                'playType' => isset($value["playType"])?$value["playType"]:'',
                                'currency' => isset($value["currency"])?$value["currency"]:'',
                                'tableCode' => isset($value["tableCode"])?$value["tableCode"]:'',
                                'loginIP' => isset($value["loginIP"])?$value["loginIP"]:'',
                                'recalcuTime' => isset($value["recalcuTime"])?$value["recalcuTime"]:'',
                                'platformID' => isset($value["platformID"])?$value["platformID"]:'',
                                'platformType' => isset($value["platformType"])?$value["platformType"]:'',
                                'stringEx' => isset($value["stringEx"])?$value["stringEx"]:'',
                                'remark' => isset($value["remark"])?$value["remark"]:'',
                                'round' => isset($value["round"])?$value["round"]:'',
                                'api_type' => $api->id,
                                'name' => $name,
                                'member_id' => $m->id,
                                'result' => json_encode($value)
                            ]);
                        }

                }

            }

        }

        //第二页
        if ($TotalPage > 1)
        {
            for ($i=2;$i<=$TotalPage;$i++)
            {
                $res = json_decode($service->betrecord($api_code,$username, $start_time, $end_date,$i, $pagesize), TRUE);
                if ($res['status']['errorCode'] == 0)
                {
                    if($res['data'])
                    {
                        $data = $res['data']['data'];
                        $Page        = $res['data']["page"];
                        $PageLimit   = $res['data']["pageSize"];
                        $TotalNumber = $res['data']["total_count"];
                        $TotalPage   = $res['data']["pageCount"];

                        if (count($data) > 0)
                        {
                            foreach($data as $value)
                            {
                                $mod = \App\Models\GameRecord::where('billNo', $value["billNo"])->where('api_type', $api->id)->first();
                                if ($mod)
                                {
                                    $mod->update([
                                        'netAmount' => $value["netAmount"] + $value["betAmount"],
                                    ]);
                                } else {
                                    $l = strlen($api_mod->prefix);
                                    $PlayerName = $value["name"];
                                    $name = substr($PlayerName, $l);
                                    $m = \App\Models\Member::where('name', $name)->first();
                                    if ($m)
                                    {
                                        \App\Models\GameRecord::create([
                                            'billNo' => $value["billNo"],
                                            'playerName' => $PlayerName,
                                            'agentCode' => isset($value["agentCode"])?$value["agentCode"]:'',
                                            'gameCode' => isset($value["gameCode"])?$value["gameCode"]:'',
                                            'netAmount' => $value["netAmount"] + $value["betAmount"],
                                            'betTime' => date('Y-m-d H:i:s', strtotime($value["betTime"])),
                                            'gameType' => $value['gameType'],
                                            'betAmount' => $value["betAmount"],
                                            'validBetAmount' => $value["validBetAmount"],
                                            'flag' => isset($value["flag"])?$value["flag"]:'',
                                            'playType' => isset($value["playType"])?$value["playType"]:'',
                                            'currency' => isset($value["currency"])?$value["currency"]:'',
                                            'tableCode' => isset($value["tableCode"])?$value["tableCode"]:'',
                                            'loginIP' => isset($value["loginIP"])?$value["loginIP"]:'',
                                            'recalcuTime' => isset($value["recalcuTime"])?$value["recalcuTime"]:'',
                                            'platformID' => isset($value["platformID"])?$value["platformID"]:'',
                                            'platformType' => isset($value["platformType"])?$value["platformType"]:'',
                                            'stringEx' => isset($value["stringEx"])?$value["stringEx"]:'',
                                            'remark' => isset($value["remark"])?$value["remark"]:'',
                                            'round' => isset($value["round"])?$value["round"]:'',
                                            'api_type' => $api->id,
                                            'name' => $name,
                                            'member_id' => $m->id,
                                            'result' => json_encode($value)
                                        ]);
                                    }
                                }

                            }

                        }
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
    var limit="300"
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
<table width="100%"border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <input type=button name=button value="刷新" onClick="window.location.reload()">
            {{ $api_code }}:成功采集到<?=$TotalNumber?>条数据
            <span id="timeinfo"></span>
        </td>
    </tr>
</table>
</body>
</html>

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Api;
use App\Models\Dividend;
use App\Models\Drawing;
use App\Models\MemberLoginLog;
use App\Models\Recharge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
class AdminController extends Controller
{
    public function index()
    {

        $apis = Api::where('on_line', 0)->get();

        $today_register_count = Member::where('created_at', '>=', date('Y-m-d 00:00:00'))->where('created_at', '<=', date('Y-m-d 23:59:59'))->count();
        $total_register_count = Member::orderBy('created_at', 'asc')->count();

        $today_recharge_count = Recharge::where('status', 2)->where('created_at', '>=', date('Y-m-d 00:00:00'))->where('created_at', '<=', date('Y-m-d 23:59:59'))->count();
        $today_recharge_sum = Recharge::where('status', 2)->where('created_at', '>=', date('Y-m-d 00:00:00'))->where('created_at', '<=', date('Y-m-d 23:59:59'))->sum('money');
        $total_recharge_sum = Recharge::where('status', 2)->sum('money');

        //出款
        $today_drawing_count = Drawing::where('status', 2)->where('created_at', '>=', date('Y-m-d 00:00:00'))->where('created_at', '<=', date('Y-m-d 23:59:59'))->count();
        $today_drawing_sum = Drawing::where('status', 2)->where('created_at', '>=', date('Y-m-d 00:00:00'))->where('created_at', '<=', date('Y-m-d 23:59:59'))->sum('money');
        $total_drawing_sum = Drawing::where('status', 2)->orderBy('created_at', 'asc')->sum('money');

        $today_dividend_count = Dividend::where('created_at', '>=', date('Y-m-d 00:00:00'))->where('created_at', '<=', date('Y-m-d 23:59:59'))->count();
        $today_dividend_sum = Dividend::where('created_at', '>=', date('Y-m-d 00:00:00'))->where('created_at', '<=', date('Y-m-d 23:59:59'))->sum('money');
        $total_dividend_sum = Dividend::orderBy('created_at', 'asc')->sum('money');

        return view('admin.index', compact('apis','success_recharge_count', 'today_register_count', 'today_recharge_count', 'total_register_count', 'total_recharge_sum', 'today_recharge_sum','today_dividend_count','today_dividend_sum', 'total_dividend_sum','today_drawing_count','today_drawing_sum','total_drawing_sum'));
    }

    public function hk_notice()
    {
        $return['status'] = 0;
        if (Recharge::where('status', 1)->where('payment_type', '!=', 4)->count() > 0)
            $return['status'] = 1;

        return $return;
    }

    public function tk_notice()
    {
        $return['status'] = 0;
        if (Drawing::where('status', 1)->count() > 0)
            $return['status'] = 1;

        return $return;
    }

    public function tips_on()
    {
        $return['status'] = 0;
        if (MemberLoginLog::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-1 min ')))->count() > 0)
        {
            foreach (MemberLoginLog::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-1 min ')))->get() as $item)
            {
                if ($item->member->is_tips_on == 0)
                    $return['status'] = 1;
            }

        }

        return $return;
    }
}

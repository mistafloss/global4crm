<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Order;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $now = Carbon::now();
        $data['weekStartDate'] = $now->startOfWeek()->format('d M Y');
        $data['weekEndDate'] = $now->endOfWeek()->format('d M Y');
        $data['agent'] = Order::select(\DB::raw('SUM(orders.total_price) As current_sale'))
                                        ->where('orders.agent_id', Auth::user()->id)
                                        ->whereBetween('orders.created_at',
                                    [$now->startOfWeek()->format('Y-m-d'),
                                    $now->endOfWeek()->format('Y-m-d')])->get();
        //dd($data['agent_current_sale']);
        return view('home')->with('data', $data);
    }
}

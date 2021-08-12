<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\BroadbandPackage;
use App\Customer;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if(!empty($request->get('agent'))){
            $agent_id = $request->get('agent');
            $data['orders'] = Order::where('agent_id',$agent_id)->get();
        }else{
            $data['orders'] = Order::all();
        }
        return view('order.index')->with('data', $data);
    }

    public function create()
    {
        $data['customers'] = Customer::all();
        $data['broadband_packages'] = BroadbandPackage::all();
        return view('order.create')->with('data',$data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'initial_deposit' => 'required',
            'broadbandPackage' => 'required',
            'total_price' => 'required',
            'customer' => 'required',
            'contractDuration' => 'required'
        ]);
        //dd(Order::store($validatedData));
        if(Order::store($validatedData)){
            return redirect()->route('order.index')->with('success', 'Order was created successfully!');
        }else{
            return redirect()->route('order.create')->with('fail', 'An error has occurred while creating this order');
        }
    }

    public function show($id)
    {
        $data['order'] = Order::find($id);
        return view('order.show')->with('data',$data);
    }

}

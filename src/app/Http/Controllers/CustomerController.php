<?php


namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
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

    public function index()
    {
        $data['customers'] = Customer::all();
        return view('customer.index')->with('data',$data);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email_address' => 'required|unique:customers|email',
            'address' => 'required',
            'post_code' => 'required',
            'phone' => 'required'
        ]);
        $customer = Customer::store($validatedData);
        if($customer instanceof Customer)
        {
            return redirect()->route('order.create',['cuid' => $customer->id]);
        }else
        {
            return redirect()->route('customer.create')->with('fail', 'An error has occured because'."---".$customer);
        }
    }
    public function show(int $id)
    {
        //
    }

    public function update(Request $request, int $id)
    {
        //
    }

    public function destroy(int $id)
    {
        //
    }
}

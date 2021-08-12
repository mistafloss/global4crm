<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\CustomerContract;
use Auth;
class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = ['broadband_package_id',
        'customer_id','total_price','agent_id','initial_deposit'];

    public static function store($data)
    {
        try
        {
            $exception = DB::transaction(function() use ($data)
            {
                $order = self::create([
                    'initial_deposit' => $data['initial_deposit'],
                    'broadband_package_id' => $data['broadbandPackage'],
                    'total_price' => $data['total_price'],
                    'customer_id' => $data['customer'],
                    'agent_id' => Auth::user()->id,
                ]);
                $customer_contract = CustomerContract::create([
                    'order_id' => $order->id,
                    'customer_id' => $order->customer_id,
                    'duration' => $data['contractDuration']
                ]);
                $order->customer_contract_id = $customer_contract->id;
                $order->save();
            });
            return is_null($exception) ? true : $exception;
        }catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function broadbandPackage()
    {
        return $this->belongsTo(BroadbandPackage::class,'broadband_package_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function contract()
    {
        return $this->belongsTo(CustomerContract::class,'customer_contract_id');
    }
}

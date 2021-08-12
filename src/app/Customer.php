<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    public $timestamps = true;
    protected $fillable = ['full_name','address','post_code','phone','email_address'];

    public static function store($data)
    {
        try{
            return self::create([
                'full_name' => $data['full_name'],
                'address' => $data['address'],
                'post_code' => $data['post_code'],
                'phone' => $data['phone'],
                'email_address' => $data['email_address']
            ]);
        }catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

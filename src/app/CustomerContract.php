<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerContract extends Model
{
    protected $table = 'customer_contract';
    public $timestamps = true;
    protected $fillable = ['order_id','customer_id','duration'];
}

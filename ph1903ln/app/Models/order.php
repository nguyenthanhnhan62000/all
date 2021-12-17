<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customer;

class order extends Model
{
    use HasFactory;
    
    protected $table = 'orders';

    protected $fillable = ['customer_id','order_note','status','order_date'];

    public function cus()
    {
        return $this->hasOne(customer::class,'id','customer_id');
    }
}

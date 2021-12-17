<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customer;

class OrderDetail extends Model
{
    use HasFactory;
    
    protected $table = 'order_detail';

    protected $fillable = ['order_id','product_id','price','quantity'];

   
}

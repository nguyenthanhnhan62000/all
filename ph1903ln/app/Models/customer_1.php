<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\order;

class customer extends Model
{
    use HasFactory;
    
    protected $table = 'customer';
    protected $fillable = ['name','status','link','ordering','image'];

    public function order_list()
    {
        $this.hasMany(order::class,'customer_id','id');
    }
}

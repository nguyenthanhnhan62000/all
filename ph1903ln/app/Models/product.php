<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    
    protected $table = 'product';
    
    protected $fillable = ['name','status','slug','image','image_list','price','sale_price',
    'category_id','content'];

    public function cat()
    {
    
        return $this->hasOne(Category::class,'id','category_id');
    }
}

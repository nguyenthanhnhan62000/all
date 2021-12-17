<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = ['name','status','slug','parent_id'];

    public function products()
    {
    
        return $this->hasMany(Product::class,'category_id','id')->where('status',1);
    }

    public function childs()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }
}

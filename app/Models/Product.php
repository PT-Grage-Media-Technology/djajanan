<?php

namespace App\Models;

use App\Models\Toko;
use App\Traits\RecordsAdminHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes, RecordsAdminHistory;

    protected $guarded = ['id'];

    // public function category(){
    //     return $this->belongsTo(Category::class, 'category_id');
    // }

    public function creator(){
        return $this->belongsTo(User::class);
    }

    // public function orders()
    // {
    //     return $this->belongsTo(Orders::class, 'product_id', 'id');
    // }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'product_id');
    }

    public function toko()
    {
        return $this->belongsTo(toko::class, 'store_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
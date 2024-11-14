<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'no_order',
        'tanggal_order',
        'quantity',
        'photo',
        'order_date',
        'id_user',
        'location',
        'harga',
        'product_id',
        'category_id',
        'toko_id',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function toko()
    {
        return $this->belongsTo(toko::class, 'id_toko');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function OrderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id'); // Adjust 'order_id' to match your foreign key
    }
}
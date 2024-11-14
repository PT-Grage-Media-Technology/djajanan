<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'product_id',
        'unit_price',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id'); // Adjust 'product_id' to match your foreign key
    }

    
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminHistory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'admin_id',
        'action',
        'affected_model',
        'affected_model_id',
        'changes',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}

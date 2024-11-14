<?php

namespace App\Models;

use App\Traits\RecordsAdminHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User; // Import User model if not already imported

class RoleRequest extends Model
{
    use HasFactory, RecordsAdminHistory;

    protected $table = 'model_has_roles'; // Assuming you have a custom table for role requests

    protected $fillable = [
       'role_id',
        'model_id',
        'model_type'
    ];

    public $timestamps = false;

    // Define relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class, 'model_id');
    }
}

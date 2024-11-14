<?php

namespace App\Models;

use App\Traits\RecordsAdminHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, RecordsAdminHistory;

    protected $fillable = ['name', 'slug', 'icon'];
}

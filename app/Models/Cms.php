<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;
    protected $fillable = ['company_name', 'email', 'phone', 'logo', 'gambar_home_1', 'gambar_home_2', 'gambar_home_3', 'lokasi'];
}

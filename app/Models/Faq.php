<?php

namespace App\Models;

use App\Traits\RecordsAdminHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory, RecordsAdminHistory;

    protected $fillable = ['title', 'content'];
}

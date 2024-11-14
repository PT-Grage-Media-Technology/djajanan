<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorBlok extends Model
{
    use HasFactory;

    protected $fillable = [
        'blok_id',
        'nomor',
    ];

    public function alamatCluster()
    {
        return $this->belongsTo(AlamatCluster::class, 'blok_id');
    }
}

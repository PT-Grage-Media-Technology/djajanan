<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatCluster extends Model
{
    use HasFactory;

    protected $fillable = [
        'cluster_id',
        'alamat',
    ];

    public function cluster()
    {
        return $this->belongsTo(Cluster::class, 'cluster_id');
    }

    public function nomorBloks()
    {
        return $this->hasMany(NomorBlok::class, 'blok_id', 'id');
    }
}
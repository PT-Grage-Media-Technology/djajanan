<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_cluster',
    ];

    public function alamatClusters()
    {
        return $this->hasMany(AlamatCluster::class, 'cluster_id');
    }
}

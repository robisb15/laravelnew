<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Layanan extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'layanan';
    use HasFactory;
    protected $primaryKey ='id_layanan';
    protected $fillable = [
        'id_layanan',
        'nama_layanan',
        'keterangan',
        'status',
        'urut',
    
    ];
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
}

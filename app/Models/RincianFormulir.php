<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RincianFormulir extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'rincian_formulir';
    use HasFactory;

    protected $fillable = [
        'id_rincian_formulir',
        'id_layanan',
        'nama',
        'jenis',
        'isi',
        'urut',
        'tag',
        'status',
    
    ];
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    protected $primaryKey = 'id_rincian_formulir';
}

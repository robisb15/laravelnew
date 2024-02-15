<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SyaratBerkas extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'syarat_berkas';
    use HasFactory;

    protected $fillable = [
        'id_syarat_berkas',
        'id_layanan',
        'id_jenis_file',
        'jenis',
        'wajib',
        'status',
        'urut',
    
    ];
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    protected $primaryKey = 'id_syarat_berkas';
}

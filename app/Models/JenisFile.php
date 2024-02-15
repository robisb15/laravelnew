<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisFile extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'jenis_file';
    use HasFactory;

    protected $fillable = [
        'id_jenis_file',
        'nama',
        'keterangan',
        'status',
        'id_berkas',
    
    ];
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    protected $primaryKey = 'id_jenis_file';
}

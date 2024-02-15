<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berkas extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'berkas';
    use HasFactory;

    protected $fillable = [
        'id_berkas',
        'status',
        'alasan',
        'nama_file',
        'url',
        'jenis_file'
    
    ];
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    protected $primaryKey = 'id_berkas';
}

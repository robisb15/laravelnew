<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BerkasUpload extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
     protected $table = 'berkas_upload';
    use HasFactory;

    protected $fillable = [
        'id_berkas_upload',
        'id_pendaftaran',
        'id_syarat_berkas',
        'id_jenis_file',
        'id_berkas',
        'status',
        'keterangan',
    
    ];
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    protected $primaryKey = 'id_berkas_upload';
}

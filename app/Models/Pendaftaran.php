<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pendaftaran extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
   protected $table = 'pendaftarans';
    use HasFactory;

    protected $fillable = [
        'id_pendaftaran',
        'id_layanan',
        'id_berkas',
        'kode_pendaftaran',
        'status',
        'keterangan',
        'user_id',
        'urut',
        'admin_id',
    
    ];
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    protected $primaryKey = 'id_pendaftaran';
}

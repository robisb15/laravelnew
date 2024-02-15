<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class IsiFormulir extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'isi_formulir';
    use HasFactory;

    protected $fillable = [
        'id_isi_formulir',
        'id_rincian_formulir',
        'id_pendaftaran',
        'id_layanan',
        'isi',
        'id_user',
        
    
    ];
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    protected $primaryKey = 'id_isi_formulir';
}

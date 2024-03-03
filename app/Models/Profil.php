<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Profil extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'profil';
    use HasFactory;

    protected $fillable = [
        'id_profil',
        'id_user',
        'nama',
        'alamat',
        'telepon',
        'urut',
        'tag',
        'status',

    ];
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    protected $primaryKey = 'id_profil';
}

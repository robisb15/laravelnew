<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temp extends Model
{
    protected $table = 'temporary_files';
    use HasFactory;

    protected $fillable = [
        'id_tmp',
        'folder',
        'file',
    ];
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    protected $primaryKey = 'id_tmp';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $primaryKey = 'id_message';
    protected $fillable = ['id_message','message', 'user_id', 'is_seen', 'id_berkas','receiver'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}

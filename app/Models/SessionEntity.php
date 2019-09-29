<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class SessionEntity extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'last_join_time',
        'session_id',
        'character_id',
        'user_id',
        'name',
        'name_hidden',
        'hidden',
        'type',
        'initiative',
        'current_hp',
        'temp_hp',
        'max_hp'
    ];
    public function session()
    {
        return $this->hasOne(Session::class);
    }
    public function character()
    {
        return $this->belongsTo(Character::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquippedCharacterItem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'character_id',
        'character_item_id',
        'session_id',
    ];
    public function character()
    {
        return $this->hasOne(Character::class);
    }
    public function characterItem()
    {
        return $this->hasOne(CharacterItem::class);
    }
    public function session()
    {
        return $this->hasOne(Session::class);
    }
}

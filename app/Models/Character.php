<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'maximum_hp',
        'name',
        'level',
        'classes',
        'race',
        'image_url',
        'theme_color',
        'user_id',
        'ac'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function image()
    {
        return $this->hasOne(Image::class);
    }
    public function sessionEntities()
    {
        return $this->hasMany(SessionEntity::class);
    }
}

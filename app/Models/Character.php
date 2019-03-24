<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\User;

class Character extends Model
{
    protected $fillable = [
        'maximum_hp',
        'name',
        'level',
        'classes',
        'race',
        'image_url',
        'theme_number',
        'user_id'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function image()
    {
        return $this->hasOne(Image::class);
    }
}

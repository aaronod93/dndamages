<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class CharacterFeature extends Model
{
    protected $fillable = [
        'name', 'description', 'quantity', 'is_legendary', 'resets_on'
    ];
    public function image()
    {
        return $this->hasOne(Image::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class CharacterItem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'abbreviation',
        'description',
        'round_duration',
    ];
}

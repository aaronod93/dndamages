<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'campaign_id'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}

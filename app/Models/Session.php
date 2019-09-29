<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hashids\Hashids;
class Session extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'campaign_id',
    ];
    protected $appends = ['link', 'code'];
    public function owner()
    {
        return $this->hasOne(User::class);
    }
    public function sessionEntities()
    {
        return $this->hasMany(SessionEntity::class);
    }
    public function getCodeAttribute()
    {
        return Hashids::encode($this->id);
    }
    public function getLinkAttribute()
    {
        return '/sessions/join/' . Hashids::encode($this->id);
    }
}

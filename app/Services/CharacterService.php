<?php namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Character;
class CharacterService
{
    public static function getUserCharactersQuery()
    {
        $user = ControllerService::getUser();
        if(!$user)
            return null;
        return Character::where([
            ['user_id', '=', $user->id]
        ]);
    }
}
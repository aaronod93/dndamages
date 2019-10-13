<?php namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Character;
class CharacterService
{
    public static function getUserCharactersQuery()
    {
        $user = ControllerService::getUser();
        if(!$user)//impossible
            return Character::where('id', '=', null);
        return Character::where('user_id', '=', $user->id);
    }
    public static function createCharacter($request)
    {
        try
        {
            $character = new Character;
            $character->fill($request->all());
            $character->save();
            return [
                'success' => true,
                'data' => $character
            ];
        }
        catch(\Exception $e)
        {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
    public static function addCharacterFeatures($params)
    {
        try
        {
            $res = CharacterFeature::insert($params);
            return [
                'success' => true,
                'data' => $res
            ];
        }
        catch(\Exception $e)
        {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}
<?php namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Session;
use App\Models\SessionEntity;
class UserService
{
    public static function GetUserStatistics()
    {
        $user = Auth::user();
        return 
        [
            'ownedSessions' => $user == null ? 0 : Session::where('owner_id', $user->id)->count(),
            'joinedSessions' => $user == null ? 0 : SessionEntity::where(
                [
                    ['user_id', $user->id],
                    ['type', 'Player']
                ])->pluck('session_id')->unique()->count()
        ];
    }
}
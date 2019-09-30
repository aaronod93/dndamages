<?php namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Session;
use Illuminate\Support\Facades\DB;
class SessionService
{
    public static function getUserSessionsQuery()
    {
        $user = Auth::user();
        $where = $user ? [['sessions.owner_id', '=', $user->id]] : [['id', '=', null]];
        return DB::table('sessions')
        ->leftJoin('campaigns', 'sessions.campaign_id', '=', 'campaigns.id')->select(['sessions.*', 'campaigns.name as campaign_name'])->where($where);
    }
    public static function createSession($name)
    {
        $user = Auth::user();
        if($user == null)
            abort(400);
        $session = new Session;
        $session->name = $name;
        $session->owner_id = $user->id;
        $session->save();
        return $session;
    }
    public static function getUserSessionEntityQuery()
    {
        $user = Auth::user();
        return SessionEntity::where(
            [
                ['user_id', $user->id],
                ['type', 'Player']
            ]);
    }
}
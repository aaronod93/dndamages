<?php namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Session;
class SessionService
{
    public static function getUserSessionsQuery()
    {
        $user = ControllerService::getUser();
        if(!$user)
            return null;
        return Session::where([
            ['gm_id', '=', $user->id]
        ]);
    }
}
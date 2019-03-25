<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\ControllerService;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.profile', ['user' => Auth::user()]);
    }
    public function setTheme(Request $request, $user_id)
    {
        $themeColor = $request->query('theme_color');
        if($themeColor)
        {
            $user = ControllerService::getUser();
            if($user)
            {
                $user->theme_color = $themeColor;
                $user->save();
                return response()->json(ControllerService::formatResult($request, true, 200));
            }
        }
        return response()->json(ontrollerService::formatResult($request, false, 200));
    }
}

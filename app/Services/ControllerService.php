<?php namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerService
{
    public static function getUser()
    {
        return Auth::check() ? Auth::user() : null;
    }
    public static function formatResult($request, $content, $httpStatus = 200)
    {
        return array(
                'content' => $content,
                'status' => $httpStatus ? $httpStatus : 200,
        );
    }
}
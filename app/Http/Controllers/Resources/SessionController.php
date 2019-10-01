<?php

namespace App\Http\Controllers\Resources;
use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\Services\SessionService;

class SessionController extends Controller
{
    public function index()
    {
       return view('sessions.index');
    }
    public function show(Request $request, $id)
    {
      
    }
    public function userDatatable()
    {
        return DataTables::of(SessionService::getUserSessionsQuery())
        ->make(true);
    }
    public function userSessions(Request $request)
    {
       $take = $request->query('take');
       if($take != null)
          return response()->json(SessionService::getUserSessionsQuery()->take($take)->get());
       return response()->json(SessionService::getUserSessionsQuery()->get());
    } 
    public function store(Request $request)
    {
      $session = SessionService::createSession($request->name);
      return redirect()->route('index')->with('success', trans('general.createSessionSuccess'));
    }
    public function create(Request $request)
    {
        return view('sessions.create');
    }
    public function join(Request $request)
    {
        return view('sessions.join');
    }
}

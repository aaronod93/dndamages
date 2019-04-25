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
      abort(404);
    }
    public function show(Request $request, $id)
    {
      $session = Session::findOrFail($id);
      return response()->json($session);
    }
    public function userDatatable()
    {
        return DataTables::of(SessionService::getUserSessionsQuery())
        ->make(true);
    }
    public function userSessions()
    {
       return response()->json(SessionService::getUserSessionsQuery()->get());
    }
    public function create(Request $request)
    {
        
    }
    public function store()
    {

    }
    public function edit(Request $request, $id)
    {
      $session = Session::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
      $session = Session::findOrFail($id);
    }
    public function destroy(Request $request, $id)
    {
      $session = Session::findOrFail($id);
    }
}

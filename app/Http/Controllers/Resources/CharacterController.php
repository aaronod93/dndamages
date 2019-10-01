<?php

namespace App\Http\Controllers\Resources;
use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\Services\CharacterService;

class CharacterController extends Controller
{
    public function index()
    {
      $user = Auth::user();
      if(!$user)
        abort(401);
      return view('characters.index');
    }
    public function show(Request $request, $id)
    {
      $character = Character::findOrFail($id);
      return response()->json($character);
    }
    public function userDatatable()
    {
        return DataTables::of(CharacterService::getUserCharactersQuery())
        ->make(true);
    }
    public function userCharacters(Request $request)
    {
      $take = $request->query('take');
       if($take != null)
          return response()->json(CharacterService::getUserCharactersQuery()->take($take)->get());
       return response()->json(CharacterService::getUserCharactersQuery()->get());
    }
    public function create(Request $request)
    {
        
    }
    public function store()
    {

    }
    public function edit(Request $request, $id)
    {
      $character = Character::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
      $character = Character::findOrFail($id);
    }
    public function destroy(Request $request, $id)
    {
      $character = Character::findOrFail($id);
    }
}

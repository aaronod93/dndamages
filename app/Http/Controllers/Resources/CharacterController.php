<?php

namespace App\Http\Controllers\Resources;
use App\Http\Controllers\Controller;
use App\Http\Requests\CharacterRequest;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\Services\CharacterService;
use Hashids\Hashids;
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
       $user = Auth::user();
        return DataTables::of(CharacterService::getUserCharactersQuery())
        ->addColumn('actions', function($character) use($user)
        {
          return view('characters.actions', ['character' => $character, 'user' => $user]);
        })
        ->rawColumns(['actions'])
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
        $user = Auth::user();
        return view('characters.create', compact('user'));
    }
    public function store(CharacterRequest $request)
    {
        $res = CharacterService::createCharacter($request);
        if($res['success'] == true)
          return redirect()->route('characters.index')->with('success', 'Successfully created your character "' . $res['data']->name . '"!');
        else
          return redirect()->back()->with('error', 'Could not create a character. Please check your fields and try again.');
    }
    public function edit(Request $request, $id)
    {
      $character = Character::findOrFail(hash_decode($id));
      $user = Auth::user();
      if($character->user_id != $user->id)
        abort(400);
      return view('characters.edit', ['character' => $character]);
    }
    public function update(Request $request)
    {
      $id = hash_decode($request->input('character_id'));
      dd($id);
      $character = Character::findOrFail();
      $user = Auth::user();
      if($character->user_id != $user->id)
        abort(400);
      $character->fill($request->all());
      $character->save();

      return redirect()->route('characters.index')->with('success', 'Successfully updated your character "' . $character->name . '"!');
    }
    public function destroy(Request $request, $id)
    {
      $character = Character::findOrFail($id);
    }
}

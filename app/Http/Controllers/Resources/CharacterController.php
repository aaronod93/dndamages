<?php

namespace App\Http\Controllers\Resources;
use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    public function index()
    {
      $user = Auth::user();
      if(!$user)
        abort(401);
      //$characters = Character::all();
      //return response()->json($characters);
      return view('characters.index', compact('user'));
    }
    public function show(Request $request, $id)
    {
      $character = Character::findOrFail($id);
      return response()->json($character);
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

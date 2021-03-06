@extends('layouts.app')
@section('title')
Create Character
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-6">
            <div class="card">
                <div class="card-header txt-theme">Edit Character: {{$character->name}}</div>
                <div class="card-body">
                <form method="POST" id="update_character" action="/characters/update">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="user_id" id="user_id" value="{{$character->user_id}}" />
                    <input type="hidden" name="character_id" id="character_id" value="{{$character->id}}" />
                        <div class="form-group row txt-theme">
                            <div class="col-12">
                                <div class="row">
                                    <label for="name" class="col-2 col-form-label text-md-right"><i class="fa fa-book fa-2x"></i></label>
                                    <div class="col-6 offset-2">
                                        <input id="name" placeholder="Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ? old('name') : $character->name }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="level" class="col-2 col-form-label text-md-right"><i class="fa fa-level-up-alt fa-2x"></i></label>
                                    <div class="col-6 offset-2">
                                        <input id="level" type="number" placeholder="Level" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ old('level') ? old('level') : $character->level }}" required>
                                        @if ($errors->has('level'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('level') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="race" class="col-2 col-form-label text-md-right"><i class="fa fa-atlas fa-2x txt-theme"></i></label>
                                    <div class="col-6 offset-2">
                                        <input id="race" placeholder="Race" class="form-control{{ $errors->has('race') ? ' is-invalid' : '' }}" name="race" value="{{ old('race') ? old('race') : $character->race }}">
                                        @if ($errors->has('race'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('race') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="classes" class="col-2 col-form-label text-md-right"><img class="bg-theme icon-img" src="/icons/organigram.svg"></label>
                                    <div class="col-6 offset-2">
                                        <input id="classes" placeholder="Class(es)" class="form-control{{ $errors->has('classes') ? ' is-invalid' : '' }}" name="classes" value="{{ old('classes') ? old('classes') : $character->classes }}">
                                        @if ($errors->has('classes'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('classes') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="maximum_hp" class="col-2 col-form-label text-md-right"><img class="bg-theme icon-img" src="/icons/medical-pack.svg"></label>
                                    <div class="col-6 offset-2">
                                        <input id="maximum_hp" type="number" placeholder="Maximum HP" class="form-control{{ $errors->has('maximum_hp') ? ' is-invalid' : '' }}" name="maximum_hp" value="{{ old('maximum_hp') ? old('maximum_hp') : $character->maximum_hp }}" required>
                                        @if ($errors->has('maximum_hp'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('maximum_hp') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="AC" class="col-2 col-form-label text-md-right"><img class="bg-theme icon-img" src="/icons/shield-bounces.svg"></label>
                                    <div class="col-6 offset-2">
                                        <input id="ac" type="number" placeholder="Armour Class" class="form-control{{ $errors->has('AC') ? ' is-invalid' : '' }}" name="AC" value="{{ old('AC') ? old('AC') : $character->AC }}">
                                        @if ($errors->has('AC'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('AC') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-6 offset-4 text-right">
                                            <button type="submit" id="load_submit" class="btn bg-theme"><span style="display:none;" class="spinner-border spinner-border-sm"></span><span class="bg-theme">Edit Character</span><img src="/icons/person.svg" alt="" style="width:25px;" class="bg-dark bg-theme ml-2 pb-1"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-scripts')
<script>
    $(document).ready(function(ev)
    {
        $('#update_character').submit(function(e)
        {
            $('#load_submit').attr('style', 'display:block;');
            $('#update_character').attr('disabled', true);
        });
    });
    </script>
@endsection
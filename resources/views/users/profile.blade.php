@extends('layouts.app')
@section('title')
@lang('general.homeTitle')
@endsection
@section('content')
<div class="row text-center h-100">
    <div class="col-3 h-100">
        <div class="d-flex flex-column h-100">
            <div class="row text-center justify-content-center flex-grow-1">
                <div id="user-profile" class="card-component h-100">
                    <div class="jumbotron card-jumbotron hoverable h-100">
                        <img class="card-img bg-dark bg-theme" src="https://dnd.app/icons/person.svg" alt="">
                        <h4 class="txt-theme">Your Profile</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
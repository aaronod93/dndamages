@extends('layouts.app')
@section('title')
@lang('general.homeTitle')
@endsection
@section('content')
<div class="container-fluid mainContent">
    <div class="row text-center h-100">
        <div class="col-12 col-md-3 h-100">
            <div class="d-flex flex-column h-100">
                <div class="row text-center justify-content-center flex-grow-1">
                    <div id="user-profile" class="card-component col-12">
                        <div class="jumbotron card-jumbotron hoverable h-100">
                            <img class="card-img bg-dark bg-theme" src="https://dnd.app/icons/person.svg" alt="">
                            <h5 class="txt-theme">Your Profile</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="fa fa-user"></i>&nbsp;{{$user->name}}
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Session Owner
                                    <span class="badge badge-primary badge-pill">14</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Active Sessions
                                    <span class="badge badge-primary badge-pill">2</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Inactive Sessions
                                    <span class="badge badge-primary badge-pill">1</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9 h-100">
            <div class="d-flex flex-column h-100">
                <div class="row text-center justify-content-center flex-grow-1">
                    <div id="other-profile" class="col-12">
                        <div class="row text-center justify-content-center flex-grow-1">
                            <div class="col-12">
                                <div class="jumbotron card-jumbotron split hoverable mb-0">
                                    <img class="card-img bg-dark bg-theme" src="https://dnd.app/icons/person.svg" alt="">
                                    <h5 class="txt-theme">Your Profile</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center justify-content-center flex-grow-1">
                            <div class="col-12">
                                <div class="jumbotron card-jumbotron split hoverable mb-0">
                                    <img class="card-img bg-dark bg-theme" src="https://dnd.app/icons/person.svg" alt="">
                                    <h5 class="txt-theme">Your Profile</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
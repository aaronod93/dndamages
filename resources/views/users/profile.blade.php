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
                    <div id="user-profile" class="card-component mh-100 col-12">
                        <div class="jumbotron card-jumbotron hoverable mh-100 txt-theme">
                            <img class="card-img bg-dark bg-theme" src="https://dnd.app/icons/person.svg" alt="">
                            <ul class="list-group list-group-flush pt-2 nb-t nb-b">
                                <li class="list-group-item d-flex justify-content-center">
                                    <span class="stat-info">
                                        <i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;
                                        {{$user->name}}
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-center align-items-center">
                                    <span class="stat-info">
                                        <i class="fa fa-trophy"></i>&nbsp;&nbsp;&nbsp;
                                        {{$user->created_at->format('d/m/Y')}}
                                    </span>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush mt-5 nb-t nb-b">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Owned Sessions
                                    <span class="badge bg-theme badge-pill">14</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Active Sessions
                                    <span class="badge bg-theme badge-pill">2</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Inactive Sessions
                                    <span class="badge bg-theme badge-pill">1</span>
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
                    <div id="other-profile" class="col-12 h-100">
                        <div class="row text-center justify-content-center split">
                            <div class="col-12 h-100">
                                <div class="jumbotron card-jumbotron hoverable split-jumbotron">
                                    <h5 class="txt-theme">Sessions</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center justify-content-center split">
                            <div class="col-12 h-100">
                                <div class="jumbotron card-jumbotron hoverable split-jumbotron">
                                    <h5 class="txt-theme">Characters</h5>
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
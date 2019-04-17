@extends('layouts.app')
@section('title')
@lang('general.homeTitle')
@endsection
@section('content')
<style>
.fa-h-fix
{
    margin-top: 0.2em;
    background-color: rgba(0,0,0,0);
}
</style>
<div class="container-fluid mainContent">
    <div class="row text-center h-100">
        <div class="col-12 col-md-3 h-100">
            <div class="d-flex flex-column h-100">
                <div class="row text-center justify-content-center flex-grow-1">
                    <div id="user-profile" class="card-component mh-100 col-12">
                        <div class="h-100 jumbotron card-jumbotron hoverable mh-100 txt-theme">
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
                            <ul class="list-group list-group-flush mt-2 nb-t nb-b">
                                <li class="list-group-item d-flex justify-content-between align-items-center .h-pix-10">
                                    <span class="w-100" style="height:1px; border-bottom:1px solid lightgrey;"></span>
                                </li>
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
                                <li class="list-group-item d-flex justify-content-between align-items-center .h-pix-10">
                                    <span class="w-100" style="height:1px; border-bottom:1px solid lightgrey;"></span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <a href="/characters" type="button" class="btn bg-theme w-100 py-1 d-flex justify-content-between">
                                    <img class="img-icon x1p5 d-inline-flex" src="/icons/cement-shoes.svg"><span class="d-inline-flex">Characters</span>
                                <i class="fa fa-arrow-right d-inline-flex fa-h-fix"></i></a>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <a href="/sessions" type="button" class="btn bg-theme w-100 py-1 d-flex justify-content-between">
                                    <img class="img-icon x1p5 d-inline-flex" src="/icons/system/bookmarklet.svg">
                                    <span class="d-inline-flex">Sessions</span>
                                <i class="fa fa-arrow-right d-inline-flex fa-h-fix"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9 h-100 mt-5 mb-3 top-jumbo">
            <div class="d-flex flex-column h-100">
                <div class="row text-center justify-content-center flex-grow-1">
                    <div id="other-profile" class="col-12 h-100">
                        <div class="row text-center justify-content-center split">
                            <div class="col-12">
                                <div class="jumbotron card-jumbotron hoverable split-jumbotron mt-0">
                                <div class="row h-20">
                                        <div class="col-12">
                                        <h5 class="txt-theme">Sessions</h5>
                                        </div>
                                    </div>
                                    <div class="row h-80">
                                        <div class="col-12 flex-grow-1">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center justify-content-center split jumbo-bottom">
                            <div class="col-12">
                                <div class="jumbotron card-jumbotron hoverable split-jumbotron">
                                    <div class="row h-20">
                                        <div class="col-12">
                                        <h5 class="txt-theme">Characters</h5>
                                        </div>
                                    </div>
                                    <div class="row h-80">
                                        <div class="col-12 flex-grow-1 char-app">
                                            <character-tile-component userid="{{Auth::user()->id}}"></character-tile-component>
                                        </div>
                                    </div>
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
@section('js-scripts')
<script src="{{ asset('js/character-tile.js') }}"></script>
@endsection
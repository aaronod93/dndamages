@extends('layouts.app')
@section('title')
@lang('general.homeTitle')
@endsection
@section('content')
<div class="container mainContent">
<!-- Jumbotron Header -->
@if (\Session::has('success'))
<div class="alert alert-success my-4 pb-0 text-center">
    <ul class="no-dec">
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif
<header class="jumbotron header txt-theme mt-5">
  <h1 class="display-5">@lang('general.homeTitle')</h1>
  <p class="lead">@lang('general.homePageDescription')</p>
</header>
    <!-- Page Features -->
    <div class="row text-center">
      <div id="create-session" class="col-sm-6 card-component pointer">
        <a href="{{Auth::check() ? '/sessions/create' : '/login?returnUrl=/sessions/create'}}" class="nav-link navbar-link">
          <div class="jumbotron card-jumbotron hoverable">
            <img class="card-img bg-dark bg-theme" src="{{asset('icons/system/bookmarklet.svg')}}" alt="">
            <h4 class="txt-theme">@lang('general.createSession')</h4>
          </div>
        </a>
      </div>
      <div id="join-session" class="col-sm-6 card-component pointer">
        <a href="{{Auth::check() ? '/sessions/join' : '/login?returnUrl=/sessions/join'}}" class="nav-link navbar-link">
          <div class="jumbotron card-jumbotron hoverable">
            <img class="card-img bg-dark bg-theme" src="{{asset('icons/round-table.svg')}}" alt="">
            <h4 class="txt-theme">@lang('general.joinSession')</h4>
          </div>
        </a>
      </div>
      </div>
    </div>
  </div>
  <style>
  .pointer
  {
    cursor:pointer;
  }
  </style>
  @endsection
  @section('js-scripts')
  @endsection
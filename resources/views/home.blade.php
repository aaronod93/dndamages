@extends('layouts.app')
@section('title')
@lang('general.homeTitle')
@endsection
@section('content')
<div class="container mainContent">
<!-- Jumbotron Header -->
<header class="jumbotron header txt-theme">
  <h1 class="display-5">@lang('general.homeTitle')</h1>
  <p class="lead">@lang('general.homePageDescription')</p>
</header>
    <!-- Page Features -->
    <div class="row text-center">
      <div id="create-session" class="col-sm-6 card-component">
        <div class="jumbotron card-jumbotron hoverable">
          <img class="card-img bg-dark bg-theme" src="{{asset('icons/system/bookmarklet.svg')}}" alt="">
          <h4 class="txt-theme">@lang('general.createSession')</h4>
        </div>
      </div>
      <div id="join-session" class="col-sm-6 card-component">
        <div class="jumbotron card-jumbotron hoverable">
          <img class="card-img bg-dark bg-theme" src="{{asset('icons/round-table.svg')}}" alt="">
          <h4 class="txt-theme">@lang('general.joinSession')</h4>
        </div>
      </div>
      </div>
    </div>
  </div>
  @endsection
  @section('js-scripts')
  <script>

    </script>
  @endsection
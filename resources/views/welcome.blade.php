@extends('layout.app')
@section('title')
Dungeons and Damages - Combat Assistant - 1.1a
@endsection
@section('content')
<!-- Jumbotron Header -->
<header class="jumbotron header">
  <h1 class="display-5">Dungeons and Damages - Combat Assistant - 1.1a</h1>
  <p class="lead">Hello everyone! And welcome to this week's tabletop combat tool. I'm your host, the internet, bringing you a pain free Dungeon and Damages tool for all the fantastic DM's/GM's out there!
  This tool aims to provide a way for adventurers to show their critical character information for a given encounter; such as character initiative, action holding, afflictions and other DM information such as elapsed time, 
  round counter, and XP tracker when adding enemies.</p>
</header>
    <!-- Page Features -->
    <div class="row text-center">
      <div id="create-session" class="col-sm-6 card-component">
        <div class="jumbotron card-jumbotron hoverable">
          <img class="card-img bg-dark" src="{{asset('icons/system/bookmarklet.svg')}}" alt="">
          <h4>Create a Session</h4>
        </div>
      </div>
      <div id="join-session" class="col-sm-6 card-component">
        <div class="jumbotron card-jumbotron hoverable">
          <img class="card-img bg-dark" src="{{asset('icons/round-table.svg')}}" alt="">
          <h4>Join a Session</h4>
        </div>
      </div>
      </div>
    </div>
  @endsection
  @section('js-scripts')
  <script>
      $(document).ready(function()
      {
        $('#create-session').click(function()
        {
          incrementColor();
        });
      });
    </script>
  @endsection
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
@php
    $user = Auth::check() ? Auth::user() : null;
@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
    var CSRF_TOKEN = "{{csrf_token()}}";
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script>
    @yield('userThemeChange')
    @yield('head-content')
  </script>
</head>
<body class="h-100">
  <div class="preloader">
    <div class="loader"></div>
  </div>
<div id="vue-navbar" class="bg-theme">
    <nav class="navbar navbar-dark navbar-expand-sm">
        <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="#navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
        <span class="navbar-toggler-icon"><!----></span>
        </button> 
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ripple-parent">
                <a href="{{route('home')}}" class="nav-link navbar-link">@lang('general.home')</a>
            </li> 
        </ul>
        <ul class="navbar-nav ml-auto mb-0">
          <li class="nav-item ripple-parent bg-theme d-flex align-items-center pr-3">
            <img class="color-picker" width="30" height="30" src="{{asset('icons/paint-bucket.svg')}}"></img>
          </li>
          <li class="nav-item ripple-parent">
                <a href="{{route('user.profile')}}" class="nav-link navbar-link">@lang('general.profile')</a>
          </li> 
          <li class="nav-item ripple-parent">
                @if(Auth::check())
                <a href="/logout" class="nav-link navbar-link">@lang('general.signout')&nbsp;<i class="fa fa-sign-out-alt"></i></a>
                @else
                <a href="/login" class="nav-link navbar-link">@lang('general.signin')&nbsp;<i class="fa fa-sign-in-alt"></i></a>
                @endif
          </li>
        </ul>
        </div>
    </nav>
</div>
  <!-- Page Content -->
  <div class="container mainContent">
  @yield('content')

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-2 bg-dark fixed-bottom bg-theme">
    <div class="container">
      <p class="m-0 text-center text-white">@lang('general.accreditation')</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('js/manifest.js')}}"></script>
  <script src="{{asset('js/vendor.js')}}"></script>
  <script>
  $(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
      }
    });
  });
  </script>
  <script src="{{asset('js/site-themer.js')}}"></script>
  <script>
  const themePickr = Pickr.create({
    el: '.color-picker',
    useAsButton:true,
    components: {
        // Main components
        preview: true,
        opacity: false,
        hue: true,
        // Input / output Options
        interaction: {
            hex: false,
            rgba: false,
            hsla: false,
            hsva: false,
            cmyk: false,
            input: true,
            clear: true,
            save: true
        }
    }
});
    window.siteThemer = new siteThemer({
      @if($user != null)
        themeUrl: '{{route('users.settheme', $user->id)}}',
      @endif
      @if($user != null && $user->theme_color)
        currentColor: '#{{$user->theme_color}}',
      @endif
    });
    themePickr.on('init', (pickrInstance) => {
      var color = siteThemer.getCurrentColor();
      console.log('color is: ' + color);
      pickrInstance.setColor(color);
    }).on('save', (colorObj, pickrInstance) => {
        if(colorObj)
        {
          siteThemer.setColor(colorObj.toHEX().toString());
        }
    });
    $(document).ready(function()
    {
      siteThemer.updateColor();
      $('.preloader').hide();
    });
  </script>
  @yield('js-scripts')
</body>
</html>

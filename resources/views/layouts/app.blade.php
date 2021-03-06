<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    $user = Auth::check() ? Auth::user() : null;
@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user_id" content="{{Auth::user() ? Hashids::encode(Auth::user()->id) : ''}}">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Scripts -->
    <script>
    window.CSRF_TOKEN = "{{csrf_token()}}";
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style id="color-picker-tag">
  </style>
  <script>
    @yield('userThemeChange')
  </script>
      @yield('head-content')
</head>
<body>
  <div class="preloader app">
    <div class="loader"></div>
  </div>
<div id="vue-navbar" class="bg-theme">
    <nav class="navbar navbar-dark navbar-expand-sm bg-theme">
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
          @if($user)
          <li class="nav-item ripple-parent">
                <a href="{{route('user.profile')}}" class="nav-link navbar-link">@lang('general.profile')</a>
          </li>
          <li class="nav-item ripple-parent">
          <a href="{{Auth::check() ? '/sessions/create' : '/login?returnUrl=/sessions/create'}}" class="nav-link navbar-link">Create Session</a>
          </li>
          <li class="nav-item ripple-parent">
            <a href="{{Auth::check() ? '/sessions/join' : '/login?returnUrl=/sessions/join'}}" class="nav-link navbar-link">Join Session</a>
          </li>
          @endif
          <li class="nav-item ripple-parent">
                @if($user)
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
  @yield('content')
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
      useStyleTag: true,
    });
    themePickr.on('init', (pickrInstance) => {
      var color = siteThemer.getCurrentColor();
      console.log('color is: ' + color);
      pickrInstance.setColor(color);
    }).on('save', (colorObj, pickrInstance) => {
        if(colorObj)
        {
          siteThemer.setColor(colorObj.toHEXA().toString(), true);
        }
    });
    $(document).ready(function()
    {
      siteThemer.updateColor();
      $('.preloader.app').hide();
    });
  </script>
  @yield('js-scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

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
<body>
  <div class="preloader">
    <div class="loader"></div>
  </div>
<div id="vue-navbar" class="bg-theme">
    <nav class="navbar navbar-dark navbar-expand-lg">
        <button type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
        <span class="navbar-toggler-icon"><!----></span>
        </button> 
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ripple-parent">
                <a href="/home" class="nav-link navbar-link">@lang('general.home')</a>
            </li> 
        </ul>
        <ul class="navbar-nav ml-auto navbar-expand-lg mb-0">
          <li class="nav-item ripple-parent bg-theme d-flex align-items-center pr-3">
            <img class="color-picker" width="30" height="30" src="{{asset('icons/paint-bucket.svg')}}"></img>
          </li>
          <li class="nav-item ripple-parent">
                @if(Auth::check())
                <a href="/logout" class="nav-link navbar-link">@lang('general.signout')&nbsp;<i class="fa fa-sign-out-alt"></i></a>
                @else
                <a href="/login" class="nav-link navbar-link">@lang('general.signin')&nbsp;<i class="fa fa-sign-in-alt"></i></a>
                @endif
          </li>
        </ul>
    </nav>
</div>
  <!-- Page Content -->
  <div class="container mt-1">
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
    window.defaultColor = '#184060';
    window.currentColor = window.defaultColor;
    window.oppositeColor = '#ffffff';
  </script>
  @yield('colorScriptSection')
  <script>
    const pickr = Pickr.create({
      el: '.color-picker',
      useAsButton: true,
      components: {
          // Main components
          preview: true,
          opacity: true,
          hue: true,

          // Input / output Options
          interaction: {
              hex: true,
              input: true,
              clear: true,
              save: true
          }
      }
    });
    pickr.on('init', (pickrInstance) => {
        pickrInstance.setColor(window.defaultColor);
    }).on('save', (colorObj, pickrInstance) => {
        if(colorObj)
        {
           console.log(colorObj.toHEX().toString());
           window.setColor(colorObj.toHEX().toString());
        }
    });
    window.setColor = function(color)
    {
        window.currentColor = color;
        window.updateColor();
    }
    window.updateColor = function()
    {
      $('.bg-theme').attr('style', 
      'background-color:' + window.currentColor + '!important;' + 
      'color:' + window.oppositeColor + '!important;');
      $('.txt-theme').attr('style', 
      'color:' + window.currentColor + '!important;' + 
      'background-color:' + window.oppositeColor + '!important;');
      $('.bg-border-theme').attr('style', 
      'border-color:' + window.currentColor + '!important;');
      $('.txt-border-theme').attr('style', 
      'border:1px solid ' + window.oppositeColor + '!important;');
    }
    $(document).ready(function()
    {
      window.updateColor();
      $('.preloader').hide();
    });
  </script>
  @yield('js-scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script>
      window.userThemes = [
      '#184060', //navy blue - 0
      '#b71c1c', //red - 1
      '#880e4f', //pink - 2
      '#311b92', // deep purple - 3
      '#4a148c', //purple - 4
      '#1a237e', //indigo - 5
      '#0d47a1', //blue - 6
      '#03a9f4', //lightblue - 7
      '#006064', //cyan - 8
      '#004d40', //teal - 9
      '#1b5e20', //green - 10
      '#33691e', // lightgreen - 11
      '#cddc39', //lime - 12
      '#fbc02d', //yellow - 13
      '#ffb300', //amber - 14
      '#ef6c00', //orange - 15
      '#d84315', //deepOrange - 16
      '#5d4037', //brown - 17
      '#424242', //grey - 18
      '#607d8b', //blueGrey - 19
    ];
    window.friendlyThemeNames = [
      'Navy Blue',
      'Red',
      'Pink',
      'Deep Purple',
      'Purple',
      'Indigo',
      'Blue',
      'Light Blue',
      'Cyan',
      'Teal',
      'Green',
      'Light Green',
      'Lime', 
      'Yellow',
      'Amber',
      'Orange',
      'Deep Orange',
      'Brown', 
      'Grey',
      'Blue Grey'
    ];
    var userThemeIndex = 0;
    window.incrementColor = function()
    {
      var themes = window.userThemes;
      if(userThemeIndex == window.userThemes.length - 1)
        userThemeIndex = 0;
      else
        userThemeIndex++;
        setColor();
    }
  window.setColor = function(colorIndex)
  {
     colorIndex = colorIndex || userThemeIndex;
     $('.bg-dark, .navbar-dark').attr('style', 'background-color:' + window.userThemes[userThemeIndex] + '!important;color:white!important;');
     $('.jumbotron.header').attr('color:' + window.userThemes[userThemeIndex] + '!important;background-color:white;');
  }
  </script>
  @yield('userThemeChange')
  @yield('head-content')
</head>
<body>
  <div class="preloader">
    <div class="loader"></div>
  </div>
<div id="vue-navbar">
  <navbar-dnd-component></navbar-dnd-component>
</div>
  <!-- Page Content -->
  <div class="container mt-1">
  @yield('content')

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-2 bg-dark fixed-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Developed by Odies Network 2019</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('js/manifest.js')}}"></script>
  <script src="{{asset('js/vendor.js')}}"></script>
  <script>
  window.populateColorDropdown = function()
  {
     
  }
  $(document).ready(function()
  {
    populateColorDropdown();
    setColor();
    setTimeout(function(){$('.preloader').hide()},1000);
  });
  </script>
  @yield('js-scripts')
</body>

</html>
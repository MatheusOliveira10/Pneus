<html lang="{{ app()->getLocale() }}">
    <head>
        @include('partials._head')
    </head>
  <body>

    <div class="container">
      @yield('content')
    </div> <!-- end of .container --> 
        @include('partials._footer')


        @include('partials._javascript')

        @yield('scripts')

  </body>
</html>

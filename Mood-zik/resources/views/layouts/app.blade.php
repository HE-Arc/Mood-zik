<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <h1>Mood'Zik</h1>
    @yield('content')
  </body>
</html>

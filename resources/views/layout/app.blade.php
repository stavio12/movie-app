<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  @livewireStyles
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Movie App</title>
</head>
<body class="font-sans bg-gray-900 text-white">
<header>
        @include("layout.header")
    </header> 
  @yield('content')
   @livewireScripts
</body>
</html>
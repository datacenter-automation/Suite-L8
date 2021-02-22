<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">


  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@livewireStyles

<!-- Scripts -->
  <script defer src="{{ asset('/js/manifest.js') }}"></script>
  <script defer src="{{ asset('/js/vendor.js') }}"></script>
  <script defer src="{{ asset('/js/app.js') }}"></script>
  <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
  <script src="{{ asset('js/login.js') }}" ></script>
</head>
<body>
<div class="font-sans text-gray-900 antialiased">
  {{ $slot }}
</div>

@livewireScripts
</body>
</html>

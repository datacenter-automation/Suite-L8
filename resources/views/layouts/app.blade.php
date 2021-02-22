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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
  <x-laravel-blade-sortable::scripts/>

  <script defer src="{{ asset('/js/manifest.js') }}"></script>
  <script defer src="{{ asset('/js/vendor.js') }}"></script>
  <script defer src="{{ asset('/js/app.js') }}"></script>

  <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
@include('layouts.navigation')

<!-- Page Heading -->
  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      {{ $header }}
    </div>
  </header>

  <!-- Page Content -->
  <main>
    {{ $slot }}

    <section id="user-component">
    </section>
  </main>
</div>

@stack('scripts')

@livewireScripts
@livewire('livewire-ui-spotlight')
</body>
</html>

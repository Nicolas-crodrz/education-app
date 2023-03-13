<!DOCTYPE html>
<html lang=""{{ str_replace('_', '-', app()->getLocale()) }}"">
<head>
    <!-- Head -->
  @include('layouts.partials.head')
</head>
<body>
    <!-- Header -->
  @include('layouts.partials.header')

    <!-- Content -->
  @yield('content')

    <!-- Footer -->
  @include('layouts.partials.footer')

    <!-- Scripts -->
  @include('layouts.partials.scripts')

</body>
</html>
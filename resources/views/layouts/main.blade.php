
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="_token" content="{{csrf_token()}}" />
  <title>
    @yield('title')
  </title>

 @include('includes.style')
 @livewireStyles
 @stack('prepend-style')
 @stack('addon-style')
</head>

<body class="g-sidenav-show  bg-gray-100">
 @include('includes.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
   @include('includes.navbar')
   @include('sweetalert::alert')

    @yield('content')
    @include('includes.footer')
  </main>

  @include('includes.ui')
  @include('includes.script')
  @stack('prepend-script')
  @stack('addon-script')
  @livewireScripts
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <title>
    @yield('title')
  </title>
 @include('includes.style')
</head>

<body class="g-sidenav-show  bg-gray-100">
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    @yield('content')
  </main>
  @include('includes.script')
</body>

</html>
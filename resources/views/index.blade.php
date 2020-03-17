@php
$config = [
    'appName' => config('app.name'),
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
    'githubAuth' => config('services.github.client_id'),
];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="/dist/css/fontawesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="{{ mix('/dist/css/app.css') }}">
  <link rel="stylesheet" href="/dist/css/sb-admin-2.min.css">
  <link rel="stylesheet" href="/dist/css/functions.css">
</head>
<body id="page-top">
  <div id="pre-loader">
    <div class="se-pre-con"></div>
    <div class="tt-pre-con"><i class="fa fa-gear fa-spin"></i>Preparing ... </div>
  </div>
  <div id="app"></div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);
  </script>
  {{-- Load the application scripts --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
  <script src="{{ mix('/dist/js/app.js') }}"></script>
  
  {{-- <script src="/dist/js/jquery.min.js"></script>
  <script src="/dist/js/bootstrap.bundle.min.js"></script>  --}}
  <script src="/dist/js/jquery.easing.min.js"></script>
  <script src="/dist/js/sb-admin-2.min.js"></script>
  <script src="/dist/js/functions.js"></script>

</body>
</html>

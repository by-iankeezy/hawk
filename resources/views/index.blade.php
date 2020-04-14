@php
$config = [
    'appName' => config('app.name'),
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
    'githubAuth' => config('services.github.client_id'),
];
@endphp
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no, maximum-scale=1">
	<title>{{ config('app.name') }}</title>

	<style>
		#loader {
			transition: all .3s ease-in-out;
			opacity: 1;
			visibility: visible;
			position: fixed;
			height: 100vh;
			width: 100%;
			background: #fff;
			z-index: 90000
		}
		
		#loader.fadeOut {
			opacity: 0;
			visibility: hidden
		}
		
		.spinner {
			width: 40px;
			height: 40px;
			position: absolute;
			top: calc(50% - 20px);
			left: calc(50% - 20px);
			background-color: #333;
			border-radius: 100%;
			-webkit-animation: sk-scaleout 1s infinite ease-in-out;
			animation: sk-scaleout 1s infinite ease-in-out
		}
		
		@-webkit-keyframes sk-scaleout {
			0% {
				-webkit-transform: scale(0)
			}
			100% {
				-webkit-transform: scale(1);
				opacity: 0
			}
		}
		
		@keyframes sk-scaleout {
			0% {
				-webkit-transform: scale(0);
				transform: scale(0)
			}
			100% {
				-webkit-transform: scale(1);
				transform: scale(1);
				opacity: 0
			}
		}
	</style>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
	<link rel="stylesheet" href="/dist/css/style.css">
	<link rel="stylesheet" href="/dist/css/components.css">
	<link rel="stylesheet" href="{{ mix('/dist/css/app.css') }}">
</head>
<body  class="app">

	<div id="loader">
        <div class="spinner"></div>
    </div>
    <script>
        window.addEventListener('load', function load() {
            const loader = document.getElementById('loader');
            setTimeout(function() {
                loader.classList.add('fadeOut');
            }, 300);
        });
	</script>
	
	<div id="app"></div>

  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);
  </script>
  {{-- Load the application scripts --}}
  	
	<script src="{{ mix('/dist/js/app.js') }}"></script>
	
	<script src="/dist/js/jquery-3.3.1.min.js"></script>
	<script src="/dist/js/popper.min.js"></script>
	{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
	<script src="/dist/js/jquery.nicescroll.min.js"></script>
	<script src="/dist/js/moment.min.js"></script>
	<script src="/dist/js/stisla.js"></script>

	{{-- <script src="/dist/js/scripts.js"></script> --}}
	{{-- <script src="/dist/js/custom.js"></script> --}}

	
</body>
</html>

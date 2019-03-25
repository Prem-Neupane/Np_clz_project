<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prf.css') }}" rel="stylesheet">


</head>
<body>
    <script>
            CKEDITOR.replace( 'article-ckeditor1' );
        </script>
    
        <script src="{{asset ('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor2' );
        </script>

    {{-- scripts used below are only for the onchange function to of image upload: --}}
	<script type="text/javascript">
		function readURL(input) {
			if (input.files && input.files[0]) { 
                var reader = new FileReader();	
					reader.onload = function (e) {
							$('#profile-img-tag').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
			}
		
		    $("#image").change(function(){
				readURL(this);
		});
    </script>

    
    <div id="app">

        @include('inc.navbar')    
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- <script>
            CKEDITOR.replace( 'article-ckeditor1' );
        </script>
    
        <script src="{{asset ('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor2' );
        </script> --}}

    {{-- scripts used below are only for the onchange function to of image upload: --}}
	{{-- <script type="text/javascript">
		function readURL(input) {
			if (input.files && input.files[0]) { 
                var reader = new FileReader();	
					reader.onload = function (e) {
							$('#profile-img-tag').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
			}
		
		    $("#image").change(function(){
				readURL(this);
		});
    </script> --}}
    
</body>
</html> 
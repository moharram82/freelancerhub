<!doctype html>
<html class="no-js" lang="ar" dir="rtl">
    <head>
		<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>

        @yield('tags')

        <link rel="manifest" href="{{ BASEURL }}/site.webmanifest">
        <link rel="apple-touch-icon" href="{{ BASEURL }}/favicon.png">
        <link rel="shortcut icon" href="{{ BASEURL }}/favicon.png" type="image/png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="{{ BASEURL }}/css/normalize.css">
        <link rel="stylesheet" href="{{ BASEURL }}/css/main_ar.css">

        @yield('styles')

	</head>
	<body>

        @yield('contents')

		<script src="{{ BASEURL }}/js/vendor/modernizr.js"></script>
		<script src="{{ BASEURL }}/js/vendor/jquery.js"></script>
		<script src="{{ BASEURL }}/js/plugins.js"></script>
        <script src="{{ BASEURL }}/js/main.js"></script>
        
        @yield('scripts')

	</body>
</html>

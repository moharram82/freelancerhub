<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
		<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ $doc_title }}</title>
        <meta name="description" content="{{ $doc_description }} ">
        <meta name="keywords" content="{{ $doc_keywords }}">
        <meta name="robots" content="{{ $doc_robots }}">
        <meta name="revisit-after" content="{{ $doc_revisit_after }}">
        <meta name="generator" content="PHPStorm 2018.2.2">
        <meta name="author" content="Mohammed A. Moharram">

        <!-- Google+ tags -->
        <meta itemscope itemtype="{{ $gp_type }}">
        <meta itemprop="headline" content="{{ $doc_title }}">
        <meta itemprop="description" content="{{ $doc_description }}">
        <meta itemprop="image" content="{{ $gp_image }}">

        <!-- Twitter tags -->
        <meta name="twitter:card" content="{{ $tw_card_type }}">
        <meta name="twitter:site" content="{{ $tw_site }}">
        <meta name="twitter:title" content="{{ $doc_title }}">
        <meta name="twitter:description" content="{{ $doc_description }}">
        <meta name="twitter:image" content="{{ $tw_image }}">

        <!-- Facebook tags -->
        <meta property="og:title" content="{{ $doc_title }}">
        <meta property="og:site_name" content="">
        <meta property="og:url" content="{{ SELF }}">
        <meta property="og:description" content="{{ $doc_description }}">
        <meta property="fb:app_id" content="">
        <meta property="fb:admins" content="">
        <meta property="og:type" content="{{ $og_type }}">
        <meta property="og:locale" content="{{ $og_locale }}">
        <meta property="og:image" content="{{ $og_image }}">
        <meta property="og:image:type" content="{{ $og_image_type }}">
        <meta property="og:image:width" content="{{ $og_image_width }}">
        <meta property="og:image:height" content="{{ $og_image_height }}">

        @yield('tags')

        <link rel="manifest" href="{{ BASEURL }}/site.webmanifest">
        <link rel="apple-touch-icon" href="{{ BASEURL }}/favicon.png">
        <link rel="shortcut icon" href="{{ BASEURL }}/favicon.png" type="image/png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="{{ BASEURL }}/css/normalize.css">
        <link rel="stylesheet" href="{{ BASEURL }}/css/main.css">

        @yield('head')

	</head>
	<body>

        @yield('contents')

		<script src="{{ BASEURL }}/js/vendor/modernizr.js"></script>
		<script src="{{ BASEURL }}/js/vendor/jquery.js"></script>
		<script src="{{ BASEURL }}/js/plugins.js"></script>
        <script src="{{ BASEURL }}/js/main.js"></script>
        
        @yield('scripts')

		<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
		<script>
		window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
		ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
		</script>
		<script src="https://www.google-analytics.com/analytics.js" async defer></script>
	</body>
</html>

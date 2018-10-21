<!doctype html>
<html class="no-js" lang="ar" dir="rtl">
    <head>
		<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $__env->yieldContent('title'); ?></title>

        <?php echo $__env->yieldContent('tags'); ?>

        <link rel="manifest" href="<?php echo e(BASEURL); ?>/site.webmanifest">
        <link rel="apple-touch-icon" href="<?php echo e(BASEURL); ?>/favicon.png">
        <link rel="shortcut icon" href="<?php echo e(BASEURL); ?>/favicon.png" type="image/png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="<?php echo e(BASEURL); ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo e(BASEURL); ?>/css/main.css">

        <?php echo $__env->yieldContent('styles'); ?>

	</head>
	<body>

        <?php echo $__env->yieldContent('contents'); ?>

		<script src="<?php echo e(BASEURL); ?>/js/vendor/modernizr.js"></script>
		<script src="<?php echo e(BASEURL); ?>/js/vendor/jquery.js"></script>
		<script src="<?php echo e(BASEURL); ?>/js/plugins.js"></script>
        <script src="<?php echo e(BASEURL); ?>/js/main.js"></script>
        
        <?php echo $__env->yieldContent('scripts'); ?>

		<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
		<script>
		window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
		ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
		</script>
		<script src="https://www.google-analytics.com/analytics.js" async defer></script>
	</body>
</html>

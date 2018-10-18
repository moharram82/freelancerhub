<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
		<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo e($doc_title); ?></title>
        <meta name="description" content="<?php echo e($doc_description); ?> ">
        <meta name="keywords" content="<?php echo e($doc_keywords); ?>">
        <meta name="robots" content="<?php echo e($doc_robots); ?>">
        <meta name="revisit-after" content="<?php echo e($doc_revisit_after); ?>">
        <meta name="generator" content="PHPStorm 2018.2.2">
        <meta name="author" content="Mohammed A. Moharram">

        <!-- Google+ tags -->
        <meta itemscope itemtype="<?php echo e($gp_type); ?>">
        <meta itemprop="headline" content="<?php echo e($doc_title); ?>">
        <meta itemprop="description" content="<?php echo e($doc_description); ?>">
        <meta itemprop="image" content="<?php echo e($gp_image); ?>">

        <!-- Twitter tags -->
        <meta name="twitter:card" content="<?php echo e($tw_card_type); ?>">
        <meta name="twitter:site" content="<?php echo e($tw_site); ?>">
        <meta name="twitter:title" content="<?php echo e($doc_title); ?>">
        <meta name="twitter:description" content="<?php echo e($doc_description); ?>">
        <meta name="twitter:image" content="<?php echo e($tw_image); ?>">

        <!-- Facebook tags -->
        <meta property="og:title" content="<?php echo e($doc_title); ?>">
        <meta property="og:site_name" content="">
        <meta property="og:url" content="<?php echo e(SELF); ?>">
        <meta property="og:description" content="<?php echo e($doc_description); ?>">
        <meta property="fb:app_id" content="">
        <meta property="fb:admins" content="">
        <meta property="og:type" content="<?php echo e($og_type); ?>">
        <meta property="og:locale" content="<?php echo e($og_locale); ?>">
        <meta property="og:image" content="<?php echo e($og_image); ?>">
        <meta property="og:image:type" content="<?php echo e($og_image_type); ?>">
        <meta property="og:image:width" content="<?php echo e($og_image_width); ?>">
        <meta property="og:image:height" content="<?php echo e($og_image_height); ?>">

        <?php echo $__env->yieldContent('tags'); ?>

        <link rel="manifest" href="<?php echo e(BASEURL); ?>/site.webmanifest">
        <link rel="apple-touch-icon" href="<?php echo e(BASEURL); ?>/favicon.png">
        <link rel="shortcut icon" href="<?php echo e(BASEURL); ?>/favicon.png" type="image/png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="<?php echo e(BASEURL); ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo e(BASEURL); ?>/css/main.css">

        <?php echo $__env->yieldContent('head'); ?>

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

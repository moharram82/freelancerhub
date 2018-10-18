<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
		<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $doc_title; ?></title>
        <meta name="description" content="<?php echo $doc_description; ?>">
        <meta name="keywords" content="<?php echo $doc_keywords; ?>">
        <meta name="robots" content="<?php echo $doc_robots; ?>">
        <meta name="revisit-after" content="<?php echo $doc_revisit_after; ?>">
        <meta name="generator" content="PHPStorm 2016.2">
        <meta name="author" content="Mohammed A. Moharram">

        <!-- Google+ tags -->
        <meta itemscope itemtype="<?php echo $gp_type; ?>">
        <meta itemprop="headline" content="<?php echo $doc_title; ?>">
        <meta itemprop="description" content="<?php echo $doc_description; ?>">
        <meta itemprop="image" content="<?php echo $gp_image; ?>">

        <!-- Twitter tags -->
        <meta name="twitter:card" content="<?php echo $tw_card_type; ?>">
        <meta name="twitter:site" content="<?php echo $tw_site; ?>">
        <meta name="twitter:title" content="<?php echo $doc_title; ?>">
        <meta name="twitter:description" content="<?php echo $doc_description; ?>">
        <meta name="twitter:image" content="<?php echo $tw_image; ?>">

        <!-- Facebook tags -->
        <meta property="og:title" content="<?php echo $doc_title; ?>">
        <meta property="og:site_name" content="">
        <meta property="og:url" content='<?php echo $page_link; ?>'>
        <meta property="og:description" content="<?php echo $doc_description; ?>">
        <meta property="fb:app_id" content="">
        <meta property="fb:admins" content="">
        <meta property="og:type" content="<?php echo $og_type; ?>">
        <meta property="og:locale" content="<?php echo $og_locale; ?>">
        <meta property="og:image" content="<?php echo $og_image; ?>">
        <meta property="og:image:type" content="<?php echo $og_image_type; ?>">
        <meta property="og:image:width" content="<?php echo $og_image_width; ?>">
        <meta property="og:image:height" content="<?php echo $og_image_height; ?>">

		<?php
		// Additional meta tags...
		if(isset($tags) && !empty($tags)) {
			if(is_array($tags)) {
				foreach($tags as $tag) {
					echo $tag . "\n";
				}
			} else {
				echo $tags;
			}
		}
		?>

        <link rel="manifest" href="<?php echo BASEURL; ?>/site.webmanifest">
        <link rel="apple-touch-icon" href="<?php echo BASEURL; ?>/favicon.png">
        <link rel="shortcut icon" href="<?php echo BASEURL; ?>/favicon.png" type="image/png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/main.css">

		<?php
		// Additional stylesheets...
		if(isset($stylesheets) && !empty($stylesheets)) {
			foreach($stylesheets as $stylesheet) {
				echo $stylesheet . "\n";
			}
		}

		// Styles tag...
		if(isset($styles) && !empty($styles)) {
			echo "<style type=\"text/css\">\n";
			echo $styles;
			echo "\n</style>";
		}
		?>

	</head>
	<body>
		
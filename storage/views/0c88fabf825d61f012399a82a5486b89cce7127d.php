<!doctype html>
<html class="no-js" lang="en" dir="ltr">
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

        <link rel="stylesheet" href="<?php echo e(BASEURL); ?>/fonts/fertigo/fertigo.css">
        <link rel="stylesheet" href="<?php echo e(BASEURL); ?>/fonts/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="<?php echo e(BASEURL); ?>/fonts/open-sans/open-sans.css">
        <link rel="stylesheet" href="<?php echo e(BASEURL); ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo e(BASEURL); ?>/css/styles.css">

        <?php echo $__env->yieldContent('styles'); ?>

	</head>
	<body>

        <div class="w-100 bg-white border-bottom">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light px-0">
                    <a class="navbar-brand" href="index.php">
                        <img src="<?php echo e(BASEURL); ?>/img/header-logo.png">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto main-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(BASEURL); ?>/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(BASEURL); ?>/projects.php" title="Find a project to sign!">Projects</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(BASEURL); ?>/hub.php" title="Find a freelancer to hire!">Hub</a>
                            </li>
                        </ul>
                        <ul class="auth navbar-nav">

                            <?php if(auth()->check()): ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="<?php echo e(config('auth.profile_path')); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php if(! file_exists(PUBLICPATH . '/img/users/' . auth()->id() .'.jpg')): ?>
                                        <img class="profile-pic" src="<?php echo e(BASEURL); ?>/img/users/default.jpg">
                                    <?php else: ?>
                                        <img class="profile-pic" src="<?php echo e(BASEURL); ?>/img/users/<?php echo e(auth()->id()); ?>.jpg">
                                    <?php endif; ?>

                                    &nbsp; <?php echo e(explode('@', auth()->username())[0]); ?>

                                </a>
                                <div class="dropdown-menu user-menu" aria-labelledby="navbarDropdown">

                                    <?php if(! auth()->isGranted('ROLE_ADMIN')): ?>
                                        <a class="dropdown-item" href="<?php echo e(BASEURL); ?>/messages.php"><i class="fas fa-inbox"></i> &nbsp; Inbox</a>
                                    <?php endif; ?>

                                    <a class="dropdown-item" href="<?php echo e(config('auth.profile_path')); ?>"><i class="fas fa-address-card"></i> &nbsp; My Profile</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo e(config('auth.logout_path')); ?>"><i class="fas fa-sign-out-alt"></i> &nbsp; Logout</a>
                                </div>
                            </li>

                            <?php else: ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(config('auth.login_path')); ?>">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-success btn-sm" href="<?php echo e(config('auth.register_path')); ?>">Register</a>
                            </li>

                            <?php endif; ?>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="container mt-5">

            <?php echo $__env->yieldContent('contents'); ?>

        </div>

        <div class="footer text-white" style="background-color: #324259;">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <a href="<?php echo e(BASEURL); ?>/">
                            <img src="<?php echo e(BASEURL); ?>/img/footer-logo.png" class="mb-2 mr-3 footer-logo">
                        </a>
                        <small class="d-block mb-3 copyright">&copy; 2018. All rights reserved.</small>
                    </div>
                    <div class="col-12 col-md-3">
                        <h5>About Us</h5>
                        <ul class="list-unstyled text-small">
                            <li><a href="<?php echo e(BASEURL); ?>/contact.php">Contact Us</a></li>
                            <li><a href="<?php echo e(BASEURL); ?>/privacy.php">Privacy Policy</a></li>
                            <li><a href="<?php echo e(BASEURL); ?>/terms.php">Terms of Use</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-3">
                        <h5>Categories</h5>
                        <ul class="list-unstyled text-small">
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">Web Development</a></li>
                            <li><a href="#">Mobile Development</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-3">
                        <h5>Social</h5>
                        <a class="social-item" href="http://www.facebook.com"><i class="fab fa-facebook-square"></i></a>
                        <a class="social-item" href="http://www.twitter.com"><i class="fab fa-twitter-square"></i></a>
                        <a class="social-item" href="http://www.linkedin.com"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

		<script src="<?php echo e(BASEURL); ?>/js/vendor/jquery.js"></script>
		<script src="<?php echo e(BASEURL); ?>/js/vendor/popper.min.js"></script>
		<script src="<?php echo e(BASEURL); ?>/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo e(BASEURL); ?>/js/plugins.js"></script>
        <script src="<?php echo e(BASEURL); ?>/js/main.js"></script>
        
        <?php echo $__env->yieldContent('scripts'); ?>

	</body>
</html>

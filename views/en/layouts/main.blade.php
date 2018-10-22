<!doctype html>
<html class="no-js" lang="en" dir="ltr">
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

        <link rel="stylesheet" href="{{ BASEURL }}/fonts/fertigo/fertigo.css">
        <link rel="stylesheet" href="{{ BASEURL }}/fonts/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="{{ BASEURL }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ BASEURL }}/css/styles.css">

        @yield('styles')

	</head>
	<body>

    <div class="w-100 bg-white border-bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light px-0">
                <a class="navbar-brand" href="index.php">
                    <img src="{{ BASEURL }}/img/header-logo.png">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto main-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="Find a project to sign!">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="Find a freelancer to hire!">Hub</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/search.php">Search</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav auth">
                        <?php
                        if(auth()->check()) {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo config('auth.profile_path'); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo auth()->username(); ?> &nbsp; <i class="fas fa-user-circle" style="font-size: 30px; vertical-align: middle;"></i>
                            </a>
                            <div class="dropdown-menu user-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo config('auth.profile_path'); ?>"><i class="fas fa-user"></i> &nbsp; My Profile</a>
                                <a class="dropdown-item" href="settings.php"><i class="fas fa-cog"></i> &nbsp; Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo config('auth.logout_path'); ?>"><i class="fas fa-sign-out-alt"></i> &nbsp; Logout</a>
                            </div>
                        </li>
                        <?php
                        } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo config('auth.login_path'); ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo config('auth.register_path'); ?>">Register</a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

        <div class="container mt-5">

            @yield('contents')

        </div>

        <div class="footer text-white" style="background-color: #324259;">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 col-md">
                        <a href="{{ BASEURL }}">
                            <img src="{{ BASEURL }}/img/footer-logo.png" class="mb-2 mr-3">
                        </a>
                        <small class="d-block mb-3 copyright">&copy; 2018. All rights reserved.</small>
                    </div>
                    <div class="col-6 col-md">
                        <h5>About Us</h5>
                        <ul class="list-unstyled text-small">
                            <li><a href="#">Who are We</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Categories</h5>
                        <ul class="list-unstyled text-small">
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">Web Development</a></li>
                            <li><a href="#">Mobile Development</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Social</h5>
                        <a class="social-item" href="http://www.facebook.com"><i class="fab fa-facebook-square"></i></a>
                        <a class="social-item" href="http://www.twitter.com"><i class="fab fa-twitter-square"></i></a>
                        <a class="social-item" href="http://www.linkedin.com"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

		<script src="{{ BASEURL }}/js/vendor/jquery.js"></script>
		<script src="{{ BASEURL }}/js/vendor/popper.min.js"></script>
		<script src="{{ BASEURL }}/js/vendor/bootstrap.min.js"></script>
		<script src="{{ BASEURL }}/js/plugins.js"></script>
        <script src="{{ BASEURL }}/js/main.js"></script>
        
        @yield('scripts')

	</body>
</html>

<?php session_start(); ?>

<head>
    <title>Acupuncture &mdash; Free Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/Hopital/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/Hopital/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Hopital/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/Hopital/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/Hopital/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/Hopital/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/Hopital/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="/Hopital/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/Hopital/css/style.css">

</head>

<body>


<div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>



    <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center position-relative">

                <div class="col-3">
                    <div class="site-logo">
                        <a href="/Hopital/index.php">Acupuncture<span class="text-primary">.</span> </a>
                    </div>
                </div>

                <div class="col-9 text-right">

                    <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-white"></span></a></span>

                    <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav ml-auto ">
                          <?php
                          if(empty($_SESSION)) {?>
                            <li class="active"><a href="/Hopital/index.php" class="nav-link">Home</a></li>
                            <li><a href="/Hopital/web/services.php" class="nav-link">Services</a></li>
                            <li><a href="/Hopital/web/testimonials.php" class="nav-link">Testimonials</a></li>
                            <li><a href="/Hopital/web/blog.php" class="nav-link">Blog</a></li>
                            <li><a href="/Hopital/web/about.php" class="nav-link">About</a></li>
                            <li><a href="/Hopital/web/contact.php" class="nav-link">Contact</a></li>
                            <li><a href="/Hopital/forms/sign_in.php" class="nav-link">Sign in</a></li>
                          <?php }
                          if(isset($_SESSION['email'])) {?>
                            <li class="active"><a href="/Hopital/index.php" class="nav-link">Home</a></li>
                            <li><a href="/Hopital/web/services.php" class="nav-link">Services</a></li>
                            <li><a href="Hopital/web/testimonials.php" class="nav-link">Testimonials</a></li>
                            <li><a href="/Hopital/web/blog.php" class="nav-link">Blog</a></li>
                            <li><a href="/Hopital/web/about.php" class="nav-link">About</a></li>
                            <li><a href="/Hopital/web/contact.php" class="nav-link">Contact</a></li>
                            <li><a href="/Hopital/web/account.php" class="nav-link">My account</a></li>
                            <li><a href="/Hopital/back/deconnexion_backend.php" class="nav-link">Sign out</a></li>
                          <?php } ?>
                        </ul>
                    </nav>
                </div>


            </div>
        </div>

    </header>

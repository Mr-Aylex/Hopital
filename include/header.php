<?php session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
?>

<head>
    <title>Robert Schuman Hopital</title>
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



    <header class="site-navbar site-navbar-target bg-dark" role="banner">

        <div class="container">
            <div class="row align-items-center position-relative">

                <div class="col-3">
                    <div class="site-logo">
                        <a href="/Hopital/index.php">Notre hopital<span class="text-primary">.</span> </a>
                    </div>
                </div>

                <div class="col-9 text-right">

                    <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-white"></span></a></span>

                    <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav ml-auto ">
                          <?php
                          if(empty($_SESSION['user'])) {?>
                            <li class="text-secondary font-weight-bold"><a href="/Hopital/index.php" class="nav-link">Maison</a></li>
                            <li><a href="/Hopital/web/Medecin.php" class="nav-link font-weight-bold">Docteurs</a></li>
                            <li><a href="/Hopital/web/about.php" class="nav-link font-weight-bold">Nous</a></li>
                            <li><a href="/Hopital/forms/sign_in.php" class="nav-link font-weight-bold">Connexion</a></li>
                            <li><a href="/Hopital/forms/sign_up.php" class="nav-link font-weight-bold">Inscription</a></li>
                          <?php }
                          if(isset($_SESSION['user'])) {?>
                            <li class="active"><a href="/Hopital/index.php" class="nav-link font-weight-bold">Maison</a></li>
                            <li><a href="/Hopital/web/Medecin.php" class="nav-link font-weight-bold">Docteurs</a></li>
                            <li><a href="/Hopital/web/about.php" class="nav-link font-weight-bold">Nous</a></li>
                              <?php if(unserialize($_SESSION['user'])->getRole_user()=="admin") { ?>
                            <li><a href="/Hopital/web/admin.php" class="nav-link font-weight-bold">Admin</a></li>
                                  <?php }
                                  elseif (unserialize($_SESSION['user'])->getRole_user()=="mdc") { ?>
                                      <li><a href="/Hopital/web/mes_rdv.php" class="nav-link font-weight-bold">Rendez-vous</a></li>
                                          <?php } ?>
                            <li><a href="/Hopital/web/account.php" class="nav-link font-weight-bold">Compte</a></li>
                            <li><a href="/Hopital/forms/rdv.php" class="nav-link font-weight-bold">Prise de RDV</a></li>
                            <li><a href="/Hopital/back/deconnexion_backend.php" class="nav-link font-weight-bold">Deconnexion</a></li>
                          <?php } ?>
                        </ul>
                    </nav>
                </div>


            </div>
        </div>

    </header>

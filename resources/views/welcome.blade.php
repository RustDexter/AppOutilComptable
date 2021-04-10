<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description"
          content="Create a stylish landing page for your business startup and get leads for the offered services with this HTML landing page template.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content=""/> <!-- website name -->
    <meta property="og:site" content=""/> <!-- website link -->
    <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content=""/> <!-- description shown in the actual shared post -->
    <meta property="og:image" content=""/> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content=""/> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article"/>

    <!-- Website Title -->
    <title>DIGI-Compta</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext"
          rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/swiper.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}">
</head>
<body data-spy="scroll" data-target=".fixed-top">

<!-- Preloader -->
<div class="spinner-wrapper">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- end of preloader -->


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <!-- Text Logo - Use this if you don't have a graphic logo -->
    <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

    <!-- Image Logo -->
    <h3><span class="turquoise">DIGI</span><span>-COMPTA</span></h3>
    <!-- Mobile Menu Toggle Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-awesome fas fa-bars"></span>
        <span class="navbar-toggler-awesome fas fa-times"></span>
    </button>
    <!-- end of mobile menu toggle button -->

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#services">Solutions <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#exp">Expert Comptables</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="/login">Connexion</a>
            </li>
        </ul>
    </div>
</nav> <!-- end of navbar -->
<!-- end of navigation -->


<!-- Header -->
<header id="header" class="header">
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2><span class="turquoise">DIGI-Compta</span><br/> Platforme de comptabilité qui correspond le
                            mieux à votre activité</h2>
                        <p class="p-large">Gagnez du temps en optimisant vos processus.</p>
                        <a class="btn-solid-lg page-scroll" href="{{route('login')}}">Connexion</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{asset('assets/images/header-teamwork.svg')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of header-content -->
</header> <!-- end of header -->
<!-- end of header -->

<!-- Services -->
<div id="services" class="cards-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Solutions</h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">

                <!-- Card -->
                <div class="card">
                    <img class="card-image" src="{{asset('assets/images/security.svg')}}" alt="alternative">

                    <div class="card-body">
                        <h4 class="card-title">Sécurite</h4>
                        <p>Backup System<br/>
                            securite des donnes personnelle
                        </p>
                    </div>
                </div>
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <img class="card-image" src="{{asset('assets/images/chart.svg')}}" alt="alternative">
                    <div class="card-body">
                        <h4 class="card-title">Statistique</h4>
                        <p>des charts ...</p>
                    </div>
                </div>
                <!-- end of card -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of cards-1 -->
<!-- end of services -->


<!-- Details 1 -->
<div class="basic-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-container">
                    <h2>Digitalisation du metier comptable</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-check"></i>
                            <div class="media-body">Automation de redaction des enregistrements des documents comptable
                                (Bilan,CPC,Journal...)
                            </div>
                        </li>
                    </ul>


                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <div class="image-container">
                    <img class="img-fluid" src="{{asset('assets/images/details-1-office-worker.svg')}}"
                         alt="alternative">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-1 -->
<!-- end of details 1 -->


<!-- Details 2 -->
<div class="basic-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="image-container">
                    <img class="img-fluid" src="{{asset('assets/images/details-2-office-team-work.svg')}}"
                         alt="alternative">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <div class="text-container">
                    <h2>Gestion des documents</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-check"></i>
                            <div class="media-body">Tri Des Différents Documents.</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i>
                            <div class="media-body">Filtrage Des Documents.</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i>
                            <div class="media-body">Integration et manipulation des Documents.</div>
                        </li>
                    </ul>

                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-2 -->
<!-- end of details 2 -->


<!-- Details 3 -->
<div class="basic-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-container">
                    <h2>Communication interne</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-check"></i>
                            <div class="media-body">Notre Platforme assure la communication entre les dffférents membres
                                d'organisme.
                            </div>
                        </li>
                    </ul>


                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <div class="image-container">
                    <img class="img-fluid" src="{{asset('assets/images/details-1-comm.svg')}}" alt="alternative">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-3 -->
<!-- end of details 3 -->

<!-- ? -->
<div id="exp" class="cards-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Expert-Comptables</h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="basic-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h2>A qui s'adresse nous?</h2>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <div class="media-body">Digi compta s'adresse de facon directe au business qui ont
                                        besoins d'automatiser leur flux de travail, vous devriez avoir au moins des
                                        connaissances de comptabilité afin ? d'utiliser le maximum de notre plateforme.
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="{{asset('assets/images/why.svg')}}" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div>
        <div class="basic-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h2>Application et automatisation</h2>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <div class="media-body">des avantages fondamentaux de nombreuses solutions Web et
                                        applications FinTech, c'est leur capacité à automatiser les tâches financieres
                                        et administratives de base pour votre cabinet tout comme pour vos clients. La
                                        saisie des dépenses, le rapprochemen bancaire..
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="{{asset('assets/images/pc.svg')}}" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div>
    </div> <!-- end of basic-3 -->
    <!-- end of details 3 -->


    <!-- Contact -->
    <div id="contact" class="form-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact Information</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="address">Vous Trouvez Nous sur:</li>
                        <li><i class="fas fa-map-marker-alt"></i>Martil , maroc, CA 94043, Maroc</li>
                        <li><i class="fas fa-phone"></i><a class="turquoise" href="tel:003024630820">+212 55699999</a>
                        </li>
                        <li><i class="fas fa-envelope"></i><a class="turquoise" href="mailto:office@evolo.com">email@email.com</a>
                        </li>
                    </ul>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-6">

                    <img class="img-fluid" src="{{asset('assets/images/contact.svg')}}" alt="alternative">

                </div> <!-- end of col -->
                <div class="col-lg-6">

                    <!-- Contact Form -->
                    <form method="post"
                          action="{{route('contact.store')}}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="name" name="name" required>
                            <label class="label-control" for="name">Name</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" id="email" name="email" required>
                            <label class="label-control" for="email">Email</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" id="message" name="message" required></textarea>
                            <label class="label-control" for="message">Your message</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">SUBMIT MESSAGE</button>
                        </div>
                        <div class="form-message">
                            <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>
                    <!-- end of contact form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-2 -->
    <!-- end of contact -->


    <!-- Scripts -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
    <script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
    <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{asset('assets/js/swiper.min.js')}}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{asset('assets/js/jquery.magnific-popup.js')}}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{asset('assets/js/validator.min.js')}}"></script>
    <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{asset('assets/js/scripts.js')}}"></script> <!-- Custom scripts -->
</body>
</html>

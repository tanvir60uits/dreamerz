<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content='pavilan'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Tag  -->
    <title>Assignment</title>

    <!-- Favicon -->
    <link rel="icon" type="image/favicon.png" href="{!! asset('public/assets') !!}/img/favicon.png">

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bizwheel Plugins CSS -->
    <link rel="stylesheet" href="{!! asset('public/assets') !!}/css/animate.min.css">
    <link rel="stylesheet" href="{!! asset('public/assets') !!}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('public/assets') !!}/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="{!! asset('public/assets') !!}/css/font-awesome.css">
    <link rel="stylesheet" href="{!! asset('public/assets') !!}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{!! asset('public/assets') !!}/css/magnific-popup.min.css">
    <link rel="stylesheet" href="{!! asset('public/assets') !!}/css/owl-carousel.min.css">
    <link rel="stylesheet" href="{!! asset('public/assets') !!}/css/slicknav.min.css">

    <!-- Bizwheel Stylesheet -->
    <link rel="stylesheet" href="{!! asset('public/assets') !!}/css/reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{!! asset('public/assets') !!}/css/responsive.css">
    
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .help-block{
            color: red;
        }
    </style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>

</head>
<body id="bg">

<!-- Boxed Layout -->
<div id="page" class="site boxed-layout">

    <!-- Preloader -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>
    <!--/ End Preloader -->

    <!-- Header -->
    <header class="header">

        <div class="middle-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="middle-inner">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-12">
                                    <!-- Logo -->
                                    <div class="logo">
                                        <!-- Image Logo -->
                                        <div class="img-logo">
                                            <a href="index.html">
                                                <img src="{!! asset('public/assets') !!}/img/logo.png" alt="#">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mobile-nav"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!--/ End Header -->


    <!-- Contact Us -->
     @yield('content')
    <!--/ End Contact Us -->

    <!-- Footer -->
    <footer class="footer" style="background-image:url('{!! asset('public/assets') !!}/img/map.png')">
      
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright-content">
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Copyright -->
    </footer>

    <!-- Jquery JS -->
    <script src="{!! asset('public/assets') !!}/js/jquery.min.js"></script>
    <script src="{!! asset('public/assets') !!}/js/jquery-migrate-3.0.0.js"></script>
    <!-- Popper JS -->
    <script src="{!! asset('public/assets') !!}/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{!! asset('public/assets') !!}/js/bootstrap.min.js"></script>
    <!-- Modernizr JS -->
    <script src="{!! asset('public/assets') !!}/js/modernizr.min.js"></script>
    <!-- ScrollUp JS -->
    <script src="{!! asset('public/assets') !!}/js/scrollup.js"></script>
    <!-- FacnyBox JS -->
    <script src="{!! asset('public/assets') !!}/js/jquery-fancybox.min.js"></script>
    <!-- Cube Portfolio JS -->
    <script src="{!! asset('public/assets') !!}/js/cubeportfolio.min.js"></script>
    <!-- Slick Nav JS -->
    <script src="{!! asset('public/assets') !!}/js/slicknav.min.js"></script>
    <!-- Slick Nav JS -->
    <script src="{!! asset('public/assets') !!}/js/slicknav.min.js"></script>
    <!-- Slick Slider JS -->
    <script src="{!! asset('public/assets') !!}/js/owl-carousel.min.js"></script>
    <!-- Easing JS -->
    <script src="{!! asset('public/assets') !!}/js/easing.js"></script>
    <!-- Magnipic Popup JS -->
    <script src="{!! asset('public/assets') !!}/js/magnific-popup.min.js"></script>
    <!-- Active JS -->
    <script src="{!! asset('public/assets') !!}/js/active.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
    @yield('js')
</body>
</html>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Work+Sans:wght@400;700&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/tiny-slider.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/flatpickr.min.css">
    <link rel="stylesheet" href="css/glightbox.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>School &mdash; Welcome to our school</title>
</head>

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <div class="row g-0 align-items-center justify-content-between">
                        <div class="col-2">
                            <a href="index.html" class="logo m-0 float-start text-white">School MS</a>
                        </div>

                        <div class="col-2">
                            <a href="{{ route('login') }}" class="btn btn-primary me-3"> <span
                                    class="icon-attach_money me-2"></span><span>Sign In</span></a>
                            <a href="{{ route('register') }}" class="text-white"><span
                                    class="icon-play"></span><span>Register</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="hero overlay" style="background-image: url('images/hero_3.jpg')">
        <div class="container">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-6 text-right">
                    <span class="subheading-white text-white mb-3" data-aos="fade-up">School</span>
                    <h1 class="heading text-white mb-2" data-aos="fade-up">Enroll with us today
                    </h1>
                    <p data-aos="fade-up" class=" mb-5 text-white lead text-white-50">Lorem ipsum dolor sit, amet
                        consectetur adipisicing elit. Illum minima dignissimos hic mollitia eius et quam ducimus maiores
                        eos magni.</p>
                    <p data-aos="fade-up" data-aos-delay="100">
                        <a href="{{ route('login') }}" class="btn btn-primary me-4 d-inline-flex align-items-center">
                            <span class="icon-attach_money me-2"></span><span>Sign in</span></a>
                        <a href="{{ route('register') }}" class="text-white d-inline-flex align-items-center"><span
                                class="icon-play me-2"></span><span>Register</span></a>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>

    <script src="js/flatpickr.min.js"></script>
    <script src="js/glightbox.min.js"></script>


    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>

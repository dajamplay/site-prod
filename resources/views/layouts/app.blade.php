<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="/css/aos.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
{{--    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">--}}
{{--    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">--}}
{{--    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">--}}

    <link href="/assets/css/style.css" rel="stylesheet">
    <title>Maksim Framework</title>
</head>
<body>

<header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
{{--        <span class="logo me-auto me-lg-0"><a href="#" class="logo"><img src="/img/logo.png" alt="" class="img-fluid"></a></span>--}}
        <a href="#" class="logo hue"><img src="/img/logo.png" alt="Елеанта"></a>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="active" href="/">Главная</a></li>
                <li><a href="/category/2">О компании</a></li>
                <li><a href="#">Продукция</a></li>
                <li><a href="#">Доставка и оплата</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <div class="header-social-links">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
</header>

<section id="" class="home-section home-section-1 d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in">
        <h1 style="color: #34b7a7; text-shadow: 1px 1px 1px #fff;">Профессиональная косметика</h1>
        <a href="#" class="btn-about">Подробнее</a>
    </div>
</section>

<section id="" class="home-section home-section-2 d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in">
        @yield('content')
    </div>
</section>

<section id="" class="home-section home-section-3 d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in">
        @yield('content')
    </div>
</section>

<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span> ООО "Елеанта" </span></strong>2022
        </div>
        <div class="credits">
            Дизайн <a href="https://bootstrapmade.com/">Аксенов Максим</a>
        </div>
    </div>
</footer>

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

{{--<script src="/assets/vendor/purecounter/purecounter.js"></script>--}}
<script src="/assets/vendor/aos/aos.js"></script>
{{--<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
{{--<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>--}}
{{--<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>--}}
{{--<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>--}}
{{--<script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>--}}
{{--<script src="/assets/vendor/php-email-form/validate.js"></script>--}}

<script src="/assets/js/main.js"></script>
</body>
</html>
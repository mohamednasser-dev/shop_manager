<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Parallo - App Landing Page</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/images/favicon.png') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600"/>
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('front/css/templatemo-style.css')}}"/>

</head>
<body>

<div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('front/img/bg-01.jpg')}}">
    <div class="container-fluid">
        <div class="row tm-brand-row">
            <div class="col-lg-4 col-11">
                <div class="tm-brand-container tm-bg-white-transparent">
                    <i class="fas fa-2x fa-pen tm-brand-icon"></i>
                    <div class="tm-brand-texts">
                        <h1 class="text-uppercase tm-brand-name">Sobhy Group</h1>
                        <p class="small">عنوان </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-1">
                <div class="tm-nav">
                    <nav class="navbar navbar-expand-lg navbar-light tm-bg-white-transparent tm-navbar">
                        <button class="navbar-toggler" type="button"
                                data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <div class="tm-nav-link-highlight"></div>
                                    <a class="nav-link" href="{{url('/')}}">الرئيسيه <span class="sr-only">(current)</span></a>
                                </li>
                                <!--                    <li class="nav-item">-->
                                <!--                      <div class="tm-nav-link-highlight"></div>-->
                                <!--                      <a class="nav-link" href="about.html">About</a>-->
                                <!--                    </li>-->
                                <!--                                <li class="nav-item">-->
                                <!--                                    <div class="tm-nav-link-highlight"></div>-->
                                <!--                                    <a class="nav-link" href="services.html">منتجاتنا</a>-->
                                <!--                                </li>-->
                                <li class="nav-item">
                                    <div class="tm-nav-link-highlight"></div>
                                    <a class="nav-link" href="{{url('our-products')}}">منتجاتنا</a>
                                </li>
                                <li class="nav-item">
                                    <div class="tm-nav-link-highlight"></div>
                                    <a class="nav-link" href="{{url('contact-us')}}">اتصل بنا</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>


        <section class="row" id="tmHome">
    <div class="col-12 tm-home-container">
        <div class="text-white tm-home-left" style="text-align: right">
            <p class="text-uppercase tm-slogan">ماذا نصنع؟</p>
            <hr class="tm-home-hr"/>
            <h2 class="tm-home-title">جلد كراسي السيارات </h2>
            <p class="tm-home-text">
                نمتلك خبره ف صناعه كسوة كراسي السيارات
                نمتلك خبره ف صناعه كسوة كراسي السيارات
            </p>
            <a href="#tmFeatures" class="btn btn-primary">المزيد</a>
        </div>
        <div class="tm-home-right">
            {{--                        <img src="{{ asset('front/img/mobile-screen.png')}}" alt="App on Mobile mockup"/>--}}
        </div>
    </div>
</section>

<!-- Features -->
<div class="row" id="tmFeatures">
    <div class="col-lg-4">
        <div class="tm-bg-white-transparent tm-feature-box">
            <h3 class="tm-feature-name">High Performance</h3>

            <div class="tm-feature-icon-container">
                <i class="fas fa-3x fa-server"></i>
            </div>

            <p class="text-center">Download and use this layout for your sites. Total 5 HTML pages included.</p>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="tm-bg-white-transparent tm-feature-box">
            <h3 class="tm-feature-name">Fast Support</h3>

            <div class="tm-feature-icon-container">
                <i class="fas fa-3x fa-headphones"></i>
            </div>
            <p class="text-center">You are allowed to use this for commercial purpose or personal site.
            </p>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="tm-bg-white-transparent tm-feature-box">
            <h3 class="tm-feature-name">App Marketing</h3>

            <div class="tm-feature-icon-container">
                <i class="fas fa-3x fa-satellite-dish"></i>
            </div>
            <p class="text-center">You are NOT allowed to redistribute this template on any download site.
            </p>
        </div>
    </div>
</div>
<!-- Call to Action -->
<section class="row" id="tmCallToAction">
    <div class="col-12 tm-call-to-action-col">
        <img src="{{ asset('front/img/call-to-action.jpg')}}" alt="Image" class="img-fluid tm-call-to-action-image"/>
        <div class="tm-bg-white tm-call-to-action-text" style="text-align: right">
            <h2 class="tm-call-to-action-title">Images by Unsplash</h2>
            <p class="tm-call-to-action-description">
                You may browse website for the
                collection of CSS templates for your projects. Aliquam erat volutpat. Nulla eros est,
                imperdiet vel feugiat non, ullamcorper mattis nulla.
            </p>
            <a href="contact.html" class="btn btn-outline-primary">تواصل معنا</a>

        </div>
    </div>
</section>

<!-- Page footer -->
<footer class="row">
    <p class="col-12 text-white text-center tm-copyright-text">
        Copyright &copy; 2021 TE-solutions.
        <!--                Designed by <a href="#" class="tm-copyright-link">TemplateMo</a>-->
    </p>
</footer>
</div>
<!-- .container-fluid -->
</div>


<script src="{{ asset('front/js/jquery.min.js')}}"></script>
<script src="{{ asset('front/js/parallax.min.js')}}"></script>
<script src="{{ asset('front/js/bootstrap.min.js')}}"></script>
@stack('js')
</body>
</html>


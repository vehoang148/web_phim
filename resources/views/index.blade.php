<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>D-PHIM</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/plyr.css" type=') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="{{ route('homepage') }}">
                            <img src="{{ asset('img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class=""><a href="{{ route('homepage') }}">Trang chủ</a></li>
                                {{-- <li><a href="{{ route('phimle', ['slug' => $phimle->slug]) }}">Phim lẻ</a></li> --}}
                                <li><a href="">Phim lẻ</a></li>

                                <li><a href="#">Phim bộ</a></li>

                                <li><a href="#">Thể loại <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        @foreach ($genre as $gen)
                                            <li>
                                                <a href="{{ route('genre', $gen->slug) }}">
                                                    <i class="fa fa-chevron-right" style="margin-right: 2px;"></i>
                                                    <span>{{ $gen->title }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="#">Quốc Gia <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        @foreach ($country as $coun)
                                            <li>
                                                <a href="{{ route('country', $coun->slug) }}">
                                                    <i class="fa fa-chevron-right" style="margin-right: 2px;"></i>
                                                    <span>{{ $coun->title }}</span>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li><a href="#">Năm <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">

                                        <li>
                                            <a href="">
                                                <i class="fa fa-chevron-right" style="margin-right: 2px;"></i>
                                                <span></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="#" class="search-switch" id="searchSwitch"><span class="icon_search"></span></a>
                        <a href="./login.html"><span class="icon_profile"></span></a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer__nav">
                        <ul>
                            <li class="active"><a href="./index.html">Homepage</a></li>
                            <li><a href="./categories.html">Categories</a></li>
                            <li><a href="./blog.html">Our Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i
                            class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model" id="searchModel">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/player.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchSwitch = document.getElementById('searchSwitch');
            var searchModel = document.getElementById('searchModel');

            searchSwitch.addEventListener('click', function() {
                searchModel.classList.toggle('active');
            });

            // Close the search model when the close button is clicked
            var searchCloseSwitch = document.querySelector('.search-close-switch');
            searchCloseSwitch.addEventListener('click', function() {
                searchModel.classList.remove('active');
            });
        });
    </script>


</body>

</html>

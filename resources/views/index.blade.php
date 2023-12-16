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
    <style>
        .header__search {
            display: flex;
            align-items: center;
        }

        .header__search form {
            display: flex;
            align-items: center;
        }

        .header__search input[type="text"] {
            border: 1px solid #fff;
            /* Add a white border */
            background: transparent;
            color: #fff;
            padding: 0 10px;
        }

        .header__search button.btn {
            background: transparent;
            border: none;
            color: #fff;
            padding: 0 10px;
        }

        /* Adjustments for smaller screens */
        @media only screen and (max-width: 768px) {
            .header__logo {
                margin-bottom: 10px;
            }

            .header__search {
                margin-left: auto;
                margin-right: 10px;
                /* Adjust the margin to create space between the search input and icon */
            }

            .header__nav {
                display: none;
                /* Hide the navigation menu on small screens */
            }

            .header__right {
                display: flex;
                align-items: center;
            }
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
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

                                <li><a href="{{ route('phimle') }}">Phim lẻ</a></li>

                                <li><a href="{{ route('phimbo') }}">Phim bộ</a></li>

                                <li><a href="#">Thể loại <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        @foreach ($genre as $gen)
                                            <li>
                                                <a href="{{ route('genre', $gen->slug) }}">
                                                    {{-- <i class="fa fa-chevron-right" style="margin-right: 2px;"></i> --}}
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
                                                    {{-- <i class="fa fa-chevron-right" style="margin-right: 2px;"></i> --}}
                                                    <span>{{ $coun->title }}</span>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li><a href="#">Năm <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">

                                        <li>
                                            @for ($year = 2010; $year <= 2024; $year++)
                                                <a href="{{ route('year', $year) }}">
                                                    {{-- <i class="fa fa-chevron-right" style="margin-right: 2px;"></i> --}}
                                                    <span>
                                                        <option value="{{ $year }}">{{ $year }}
                                                        </option>

                                                    </span>
                                                </a>
                                            @endfor
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right d-flex align-items-center justify-content-end">
                        <div class="header__search mr-3">
                            <form class="d-flex">
                                <input type="text" class="form-control" placeholder="Tìm kiếm.....">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </form>
                        </div>
                        <a href="#" class="search-switch" id="searchSwitch"><span class="icon_search"></span></a>
                        {{-- <a href="./login.html"><span class="icon_profile"></span></a> --}}
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
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
                            <li class="active"><a href="{{ route('homepage') }}">Homepage</a></li>
                            <li><a href="">Categories</a></li>
                            <li><a href="./blog.html">Our Blog</a></li>
                            <li><a href="">Contacts</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i
                            class="fa fa-heart" aria-hidden="true"></i> by <a href="" target="_blank">HOANG
                            DINH DUNG</a>
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/player.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0"
        nonce="R7ijLAAF"></script>
</body>

</html>

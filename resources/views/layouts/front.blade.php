<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/line-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/line-awesome-font-awesome.min.css') }}">
    <link href="{{ asset('front/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/lib/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/lib/slick/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/responsive.css') }}">
</head>

<body>
    <div class="wrapper">

        <header>
            <div class="container">
                <div class="header-data">
                    <div class="logo">
                        <a href="index.html" title=""><img src="{{ asset('front/images/logo.png') }}" alt=""></a>
                    </div>
                    <div class="search-bar">
                        <form>
                            <input type="text" name="search" placeholder="Search...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>

                    </div>
                    <nav>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}" title="">
                                    <span><img src="{{ asset('front/images/icon1.png') }}" alt=""></span>
                                    {{ trans('home') }}
                                </a>
                            </li>
                            <li>
                                <a href="" title="">
                                    <span><img src="{{ asset('front/images/icon2.png') }}" alt=""></span>
                                    {{ trans('Companies') }}

                                </a>

                            </li>
                            <li>
                                <a href="" title="">
                                    <span><img src="{{ asset('front/images/icon3.png') }}" alt=""></span>
                                    {{ trans('project') }}

                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.index') }}" title="">
                                    <span><img src="{{ asset('front/images/icon4.png') }}" alt=""></span>
                                    {{ trans('profile') }}

                                </a>

                            </li>
                            <li>
                                <a href="" title="">
                                    <span><img src="{{ asset('front/images/icon5.png') }}" alt=""></span>
                                    {{ trans('Jobs') }}
                                </a>
                            </li>

                            <li>
                                <x-notifications />
                            </li>
                        </ul>
                    </nav>
                    <div class="menu-btn">
                        <a href="#" title=""><i class="fas fa-bars"></i></a>
                    </div>
                    <div class="user-account">
                        <div class="user-info">
                            <img src=" {{ Auth::user()->profile->avatar_url }} " alt="123" height="35" width="40">

                            <i class="fas fa-sort-down"></i>
                        </div>
                        <div class="user-account-settingss" id="users">
                            <h3>Online Status</h3>
                            <ul class="on-off-status">
                                <li>
                                    <div class="fgt-sec">
                                        <input type="radio" name="cc" id="c5">
                                        <label for="c5">
                                            <span></span>
                                        </label>
                                        <small>Online</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="fgt-sec">
                                        <input type="radio" name="cc" id="c6">
                                        <label for="c6">
                                            <span></span>
                                        </label>
                                        <small>Offline</small>
                                    </div>
                                </li>
                            </ul>
                            <h3>Custom Status</h3>
                            <div class="search_form">
                                <form>
                                    <input type="text" name="search">
                                    <button type="submit">Ok</button>
                                </form>
                            </div>
                            <h3>Setting</h3>
                            <ul class="us-links">
                                <li><a href="{{ route('profile.edit') }}" title="">Account Setting</a></li>
                                <li><a href="#" title="">Privacy</a></li>
                                <li><a href="#" title="">Faqs</a></li>
                                <li><a href="#" title="">Terms & Conditions</a></li>
                            </ul>

                            <h3 class="tc">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary">Logout</button>
                                </form>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">


                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>
        <script type="text/javascript" src="{{ asset('front/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/popper.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/jquery.range-min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/lib/slick/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/script.js') }}"></script>

        <script>
            const csrfToken = "{!! csrf_token() !!}"
        </script>
        <script type="text/javascript" src="{{ asset('front/js/follow.js') }}"></script>

        <script>
            const userId = "{{ Auth::id() }}";
        </script>

        <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>

        <script>
            $(document).ready(function() {
                $(".content").hide();
                $(".show_hide").on("click", function() {
                    var txt = $(".content").is(':visible') ? 'Read More' : 'Read Less';
                    $(".show_hide").text(txt);
                    $(this).next('.content').slideToggle(200);
                });
            });
        </script>





    </div>

</body>

<footer>
    <div class="footy-sec mn no-margin">
        <div class="container">
            <ul>
                <li><a href="help-center.html" title="">Help Center</a></li>
                <li><a href="about.html" title="">About</a></li>
                <li><a href="#" title="">Privacy Policy</a></li>
                <li><a href="#" title="">Community Guidelines</a></li>
                <li><a href="#" title="">Cookies Policy</a></li>
                <li><a href="#" title="">Career</a></li>
                <li><a href="forum.html" title="">Forum</a></li>
                <li><a href="#" title="">Language</a></li>
                <li><a href="#" title="">Copyright Policy</a></li>
            </ul>
            <p><img src="{{ asset('front/images/copy-icon2.png') }}" alt="">Copyright 2020</p>
            <img class="fl-rgt" src="{{ asset('front/images/logo2.png') }}" alt="">
        </div>
    </div>
</footer>

</html>

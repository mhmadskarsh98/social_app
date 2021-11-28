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
    <link rel="stylesheet" type="text/css" href="{{ asset('front/lib/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/lib/slick/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/responsive.css') }}">
</head>

<body class="sign-in">
    <div class="wrapper">
        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo">
                                    <img src="{{ asset('front/images/cm-logo.png') }}" alt="">
                                    <p>Workwise, is a global freelancing platform and social networking where businesses
                                        and independent professionals connect and collaborate remotely</p>
                                </div>
                                <img src="{{ asset('front/images/cm-main-img.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="login-sec">
                                <ul class="sign-control">
                                    <li data-tab="tab-1" class="current"><a href="#" title="">Sign in</a></li>
                                    <li data-tab="tab-2"><a href="#" title="">Sign up</a></li>
                                </ul>
                                <div class="sign_in_sec current" id="tab-1">
                                    <h3>Sign in</h3>
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input id="email" class="block mt-1 w-full" type="email"
                                                        name="email" :value="old('email')" required autofocus>
                                                    <i class="far fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input id="password" class="block mt-1 w-full" type="password"
                                                        name="password" required autocomplete="current-password">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="checky-sec">
                                                    <div class="fgt-sec">

                                                        <label for="c1">
                                                            <span
                                                                class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                            <input type="checkbox" id="remember_me" name="remember">
                                                        </label>

                                                    </div>
                                                    <a href="#" title="">Forgot Password?</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="login-resources">
                                        <h4>Login Via Social Account</h4>
                                        <ul>
                                            <li><a href="#" title="" class="fb"><i class="fab fa-facebook"></i>Login Via
                                                    Facebook</a></li>
                                            <li><a href="#" title="" class="tw"><i class="fab fa-twitter"></i>Login Via
                                                    Twitter</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sign_in_sec" id="tab-2">

                                    <div class="dff-tab current" id="tab-3">
                                        <form method="POST" action="{{route('register')}}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="name" class="block mt-1 w-full" type="text"
                                                            name="name" :value="old('name')" required autofocus
                                                            autocomplete="name" placeholder="name">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="email" class="block mt-1 w-full" type="email"
                                                            name="email" :value="old('email')"
                                                            placeholder="xxxx@example.com" required>
                                                        <i class="fas fa-at"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="password" class="block mt-1 w-full" type="password"
                                                            name="password" required autocomplete="new-password"
                                                            placeholder="password">
                                                        <i class="fas fa-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="password_confirmation" class="block mt-1 w-full"
                                                            type="password" name="password_confirmation"
                                                            placeholder="password" required autocomplete="new-password">
                                                        <i class="fas fa-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="checky-sec st2">
                                                        <div class="fgt-sec">
                                                            <input type="checkbox" name="cc" id="c2">
                                                            <label for="c2">
                                                                <span></span>
                                                            </label>
                                                            <small>Yes, I understand and agree to the workwise Terms &
                                                                Conditions.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Get Started</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footy-sec">
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
                    <p><img src="{{ asset('front/images/copy-icon.png') }}" alt="">Copyright 2019</p>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript" src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/lib/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/script.js') }}"></script>
</body>

</html>

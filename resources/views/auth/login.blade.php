<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/login_style.css') }}" rel="stylesheet">

</head>

<body class=" ">
    <div class="row">
        <div class="card-parent">
            <div class="main-card col-md-12">
                <div class="main-card-inner row">
                    {{-- <div class="left col-md-6">
                        <div class="login-screen-left">

                            <div class="login-screen-inner">
                                <p class="section-heading">Welcome<br> to Teach for Change-SEF</p>
                                <div class="left-side-section">
                                    <h5><i class="fa fa-user-o icon-circle" aria-hidden="true"></i> Step 1:</h5>
                                    <p>Do Teach for Change-SEF login for online registration.</p>
                                </div>
                                <div class="left-side-section">
                                    <h5> <i class="fa fa-plus-square-o icon-circle" aria-hidden="true"></i> Step 2:</h5>
                                    <p>Sign Up for an account. Please remember the username and password as your roll no
                                        slip
                                        and result will be delivered to this email provided to Teach for Change-SEF</p>
                                </div>
                                <div class="left-side-section">
                                    <h5><i class="fa fa-hand-o-up icon-circle" aria-hidden="true"></i>Step 3:</h5>
                                    <p>After signing up, you will receive a confirmation email to the email provided at
                                        Teach for Change-SEF
                                        portal. Click on verify your account link. </p>
                                </div>

                                <div class="left-side-section lower row">
                                    <p class="support d-flex"><i class="fa fa-envelope email-icon" aria-hidden="true">
                                        </i>sefteachforchange@gmail.com</p>
                                    <p class="support d-flex"><i class="fa fa-phone" aria-hidden="true"></i>
                                        +92-333-3000-331</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="login-screen-right col-md-12">

                        <div class="login-screen-inner right-contnet">
                            <div class="first-section">
                                <div class="logo">
                                    <img src="{{ asset('assets/img/pdlc_logo.png') }}" alt="logo">
                                </div>
                                <div class="right-contnet">
                                    <h1>
                                        Login
                                    </h1>
                                    <p>
                                        Login by entering username and password in the given fields.
                                    </p>
                                </div>
                            </div>
                            {{-- <div class="second-section col-md-12 row">
                                <div class="col-md-6 login tab active">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    <p>Login</p>
                                </div>
                                <div class="col-md-6 login tab">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    <a href="{{ route('register') }}">
                                        <p>Signup</p>
                                    </a>
                                </div>


                            </div> --}}
                            <div class="third-section">

                                <form method="POST" action="{{ route('login') }}" class="login-form"
                                    autocomplete="off">
                                    @csrf
                                    <div class="form-group">
                                        <input placeholder="Email Address" name="email" id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-0">
                                        <input placeholder="Password" name="password" id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="btn_forget_password d-flex justify-content-between">
                                        <button type="submit"
                                            class="btn btn-primary block full-width m-b mt-3 login-btn">Login</button>

                                        @if (Route::has('password.request'))
                                            <a class="mt-2 text-right" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                    <a class="btn btn-outline btn-primary dim btn-block"
                                        href="{{ route('register') }}"><strong>Create
                                            an account</strong></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Blankon is a theme fullpack admin template powered by Twitter bootstrap 3 front-end framework. Included are multiple example pages, elements styles, and javascript widgets to get your project started.">
    <meta name="keywords" content="admin, admin template, bootstrap3, clean, fontawesome4, good documentation, lightweight admin, responsive dashboard, webapp">
    <meta name="author" content="Djava UI">

    <title>Kios Sehati</title>

    <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-144x144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
    <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
    <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
    <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon.png" rel="shortcut icon">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">

    <link href="{{asset('css/kios-sehati.css')}}" rel="stylesheet">
    <link href="{{asset('css/pages/sign.css')}}" rel="stylesheet">

</head>
<body class="">

<!--[if lt IE 9]>
<p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="sign-wrapper">
    {{--<div class="brand">
        <img src="http://img.djavaui.com/?create=220x100,4888E1?f=ffffff" alt="brand logo"/>
    </div>--}}

    <form class="sign-in form-horizontal shadow rounded no-overflow" action="{{url('login')}}" method="post">
        {{csrf_field()}}

        <div class="sign-header">
            <div class="form-group">
                <div class="sign-text">
                    <span>Member Area</span>
                </div>
            </div>
        </div>
        <div class="sign-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="text" class="form-control input-sm" placeholder="Username or email " name="email" value="{{old('email')}}">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="password" class="form-control input-sm" placeholder="Password" name="password">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                </div>
            </div>
        </div>
        <div class="sign-footer">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="ckbox ckbox-theme">
                            <input id="remember" type="checkbox" name="remember">
                            <label for="remember" class="rounded">Remember me</label>
                        </div>
                    </div>
                   {{-- <div class="col-xs-6 text-right">
                        <a href="page-lost-password.html" title="lost password">Lost password?</a>
                    </div>--}}
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn">Sign In</button>
            </div>
        </div>
    </form>

    {{--<p class="text-muted text-center sign-link">Need an account? <a href="page-signup.html"> Sign up free</a></p>--}}

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

{{--<script src="../../../assets/global/plugins/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>--}}
{{--<script src="../../../assets/admin/js/pages/blankon.sign.js"></script>--}}

</body>

</html>

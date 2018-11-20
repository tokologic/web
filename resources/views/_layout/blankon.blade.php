<!DOCTYPE html>

<html lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="pos, kios, store, warehouse, sehati, point fo sales">
    <meta name="author" content="toKologic">

    <link href="../../../assets/global/img/ico/apple-touch-icon-144x144-precomposed.png"
          rel="apple-touch-icon-precomposed" sizes="144x144">
    <link href="../../../assets/global/img/ico/apple-touch-icon-114x114-precomposed.png"
          rel="apple-touch-icon-precomposed" sizes="114x114">
    <link href="../../../assets/global/img/ico/apple-touch-icon-72x72-precomposed.png"
          rel="apple-touch-icon-precomposed" sizes="72x72">
    <link href="../../../assets/global/img/ico/apple-touch-icon-57x57-precomposed.png"
          rel="apple-touch-icon-precomposed">
    <link href="../../../assets/global/img/ico/apple-touch-icon.png" rel="shortcut icon">
    <link href="../../../assets/global/img/ico/favicon.ico" rel="shortcut icon">

    <title>Kios Sehati</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">

    @stack('styles')

    <link href="{{asset(mix('css/kios-sehati.css'))}}" rel="stylesheet">

    @stack('style')

</head>

<body class="page-header-fixed">

<section id="wrapper">

    <header id="header">
        @include('_layout.header')
    </header>

    <aside id="sidebar-left" class="sidebar-circle">
        @include('_layout.sidebar')
    </aside>

    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-file-o"></i>{{$page->title}} <span>{{$page->subTitle}}</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>

                {{ Breadcrumbs::render() }}

            </div>
        </div>

        <div class="body-content animated fadeIn">
            @yield('content')
        </div>
    </section>


</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.12/handlebars.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-sound/3.0.7/js/ion.sound.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

@stack('scripts')

<script src="{{asset(mix('js/kios-sehati.js'))}}"></script>

@stack('script')

</body>
</html>

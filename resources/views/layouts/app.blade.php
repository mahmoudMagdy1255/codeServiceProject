<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>خدمات</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    {!! HTML::style('css/custom.css') !!}

</head>
<body>
    <div id="app" style="direction: ltr;text-align: right">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">

                <div class="row">

                 <div class="navbar-header col-lg-1 pull-right">
                    <a class="navbar-brand" href="{{ url('/') }}">

                    خدمات
                    </a>
                </div>


                <button class="navbar-toggler collapse" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="pull-right col-lg-6 col-md-6 col-sm-5 col-xs-12 search">

                                            <div class="form-inline">

                                                <input type="text" name="search" class="form-control" placeholder="البحث">

                                                <button class="btn btn-info">
                                                    <i class="fa fa-search"></i>
                                                    ابحث
                                                </button>
                                            </div>
                </div>

                <div class="collapse navbar-collapse col-lg-5 col-md-5 col-sm-5 col-xs-12" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li>
                                <a href="{{ route('login') }}">تسجيل الدخول</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">تسجيل عضوية جديد</a>
                                </li>
                            @endif
                        @else
                            <li class="dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    الطلبات <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <li>
                                        <a href="{{ route('logout') }}">
                                            <i class="fa fa-truck"></i>
                                    الطلبات الواردة
                                        </a>
                                    </li>

                                    <li>

                                        <a href="{{ route('logout') }}">

                                    <i class="fas fa-shopping-cart"></i>
                                    طلبات المشتريات
                                        </a>
                                     </li>

                                </ul>
                            </li>


                            <li class="dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    الخدمات
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                     <li>

                                        <a href="{{ route('logout') }}">

                                    <i class="fas fa-plus"></i>
اضافة خدمة
                                        </a>
                                     </li>

                                     <li>

                                        <a href="{{ route('logout') }}">

                                    <i class="fas fa-users"></i>
خدماتى
                                        </a>
                                     </li>

                                </ul>
                            </li>


                            <li class="dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    {{ auth()->user()->name }}
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">


                                     <li>

                                        <a href="{{ route('logout') }}">

                                            <i class="fas fa-edit"></i>
                                            تعديل بياناتى
                                        </a>
                                     </li>


                                     <li>

                                        <a href="{{ route('logout') }}">

                                            <i class="fas fa-credit-card"></i> رصيدى
                                        </a>
                                     </li>



                                     <li>

                                        <a href="{{ route('logout') }}">

                                            <i class="fas fa-sign-out-alt"></i>تسجيل الخروج
                                        </a>
                                     </li>

                                </ul>
                            </li>


                                     <li>

                                        <a href="{{ route('logout') }}">

                                            الرئيسية
                                        </a>
                                     </li>

                        @endguest
                    </ul>
                </div>



            </div>



                </div>

        </nav>

        <main class="py-4">
            @yield('content')

        </main>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    {!! HTML::script('js/app.js') !!}
</body>
</html>

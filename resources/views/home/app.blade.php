<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
        <title>Панель управления</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/admin.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Перейти на сайт
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Админ</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Магазин <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! link_to_route('shopallitems','Все товары') !!}</li>
                                <li>{!! link_to_route('allcategories','Все категории') !!}</li>
                                <li>{!! link_to_route('allscategories','Все под-категории') !!}</li>
                                <li>{!! link_to_route('allsscategories','Все под-под-категории') !!}</li>
                                <li>{!! link_to_route('shopadditem','Добавить товар') !!}</li>
                            </ul>
                        </li>
                        <li class="dropdown" style="display: none">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Заказы <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! link_to_route('ordersall','Все заказы') !!}</li>
                                <li>{!! link_to_route('ordersphone','Заявки позвонить') !!}</li>
                            </ul>
                        </li>
                        <li class="dropdown" style="display: none">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Информация <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! link_to_route('infocontacts.showall','Контакты') !!}</li>
                                <li>{!! link_to_route('infoabout','О нас') !!}</li>
                            </ul>
                        </li>
                        <li class="dropdown" style="display: none">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Комментарии <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! link_to_route('comments.news','Новости') !!}</li>
                                <li>{!! link_to_route('comments.items','Товары') !!}</li>
                            </ul>
                        </li>
                        <li class="dropdown" style="display: none">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Настройки <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! link_to_route('settings.home','Настройки панели') !!}</li>
                                <li>{!! link_to_route('settings.site','Настройки сайта') !!}</li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Выйти</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    <footer></footer>

    <script src="{{asset('js/jquery-2.2.0.min.js')}}"></script>
    <script src="{{asset('js/jquery.cookie.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/angular/angular.min.js')}}"></script>
    <script src="{{asset('js/angular/angular-route.min.js')}}"></script>
    <script src="{{asset('js/angular/controllers.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>

</body>
<!-- МОДАЛЬНОЕ ОКНО -->
<div class="modal fade" id="editmodal" data-easein="flipXIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<!-- МОДАЛЬНОЕ ОКНО -->
</html>
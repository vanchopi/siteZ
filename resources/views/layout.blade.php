<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet/less" type="text/css" href="{{asset('less/normalize.less')}}">
        <link rel="stylesheet/less" type="text/css" href="{{asset('less/styles.less')}}">
        <script src="{{asset('js/less.min.js')}}" type="text/javascript"></script>
        <link rel='stylesheet' id='fancybox_css-css'  href="{{asset('fancybox/source/jquery.fancybox.css')}}" type='text/css' media='all' />
        <!--<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>-->
        <!--<link rel="stylesheet" type="text/css" href="/css/style.css" />
        jquery-2.2.0.min.js
        <link rel="stylesheet" type="text/css" href="/css/normalize.css" />-->
        <script type="text/javascript" src="{{asset('js/jquery-2.2.0.min.js')}}"></script>
        <script src="{{asset('js/jquery.cookie.js')}}"></script>
        <script type='text/javascript' src="{{asset('fancybox/source/jquery.fancybox.pack.js')}}"></script>
        <script src="{{asset('js/myscript.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/toastr.min.js')}}"></script>
        <title>gfootball | футбольная форма и атрибутика</title>
    </head>
    <body>
        <div class="block header">
            <div class="h_wrap">
                <a class="ib" href="/">
                    <div class="h_logo">
                        <img src="{{asset('/img/logo.png')}}">
                    </div>
                </a>
                <div class="ib rt">
                    <div class="h_phone wd">
                        <span>+7 800 555 35 35</span>
                    </div>
                    <div class="h_mail ib wd">
                        <span>zorchenko2012@mail.ru</span>
                    </div>
                    <div class="ib h_regim wd">
                        <span>Режим работы: 24/7</span>
                       <a href="{{route('basket')}}"><span class="ib">Корзина: <span class="count_order"></span> </span>
                            <div class="h_basket ib">
                                <div>
                                    <img src="{{asset('/img/basket.png')}}">
                                </div>
                            </div>

                       </a> 
                    </div>
                    <div class="h_buy">
                        <div class="h_how_to ib">
                            <span>Как купить:</span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="head_menu">
            <div class="m_wrp">
                <ul>
                    <li>
                        <a class="wd_m" href="{{asset('/')}}">
                            <span>Главная</span>
                        </a>
                    </li>
                    @foreach($allcategories as $category)
                        <li>
                            <a class="wd_m" href="{{route('site.items.category',$category->category_title)}}">
                                <span>{{$category->category_title}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="block content">
            @yield("content")
        </div>

        <div class="block footer">
            <div class="f_wrap">

                <div class="f_menu ib">
                    <div class="menu_wrp">
                        <ul>
                            <li>
                                <a class="wd_m" href="">
                                    <span>Главная</span>
                                </a>
                            </li>

                            @foreach($allcategories as $category)
                                <li>
                                    <a class="wd_m" href="{{route('site.items.category',$category->category_id)}}">
                                        <span>{{$category->category_title}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="f_conacts ib">
                    <div class="cont">
                        <span>Контакты</span>
                    </div>
                    <div class="cont">
                        <span>Телефон</span>
                    </div>
                    <div class="cont">
                        <span>E-mail</span>
                    </div>
                </div>
                <div class="f_desc ib">
                    <span>Описание магаза и способы оплаты</span>
                </div>

            </div>
        </div>
        {!! Toastr::render() !!}
    </body>

</html>
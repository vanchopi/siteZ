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
            <div class="convert_wrp">
                <div class="convert ib">
                    <div class="form_wrp">
                        <form class="form_ask" method="POST" action="/">
                            <div class="txt">
                                <span>Форма обратной связи</span><br>
                                Оставьте своё сообщение и мы ответим на него в ближайшее время
                            </div>
                            <div class="name field1">
                                <input placeholder="Ваше Имя">
                            </div>    
                            <div class="mail field1">
                                <input placeholder="E-mail">
                            </div>
                            <div class="phone field1">
                                <input placeholder="Телефон">
                            </div>
                            <div class="massage">
                                <textarea placeholder="Сообщение">
                                </textarea>
                            </div>
                            <div class="bt_subm">
                                <input class="nbt" value="Отправить" type="submit">
                            </div>
                        </form>
                    </div>    
                </div>
                <div class="conv_bt ib">
                    Скрыть
                </div>
            </div>

            <div class="cn_bt">Задать вопрос</div>
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
                        <div>
                            <a href="#">о нас</a>
                        </div>
                        <div>   
                            <a href="#">как заказать?</a>
                        </div>    
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
                    
                </div>
            </div>
        </div>
        <div class="head_menu">
            <div class="head_within">
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
                
                <div class="categories_wrp">
                    <div class="cat_clubs clubs">
                        <div class="cont_eng top_ib">
                            <a href="">Англия</a>
                            <ul>
                                <li>
                                    <a href="">Арсенал</a>
                                </li>
                                <li>
                                    <a href="">Челси</a>
                                </li>
                            </ul>
                        </div>
                        <div class="cont_spain top_ib">
                            <a href="">Испания</a>
                            <ul>
                                <li>
                                    <a href="">Реал-Мадрид</a>
                                </li>
                                <li>
                                    <a href="">Барселона</a>
                                </li>
                            </ul>
                        </div> 
                        <div class="cont_germany top_ib">
                            <a href="">Германия</a>
                            <ul>
                                <li>
                                    <a href="">Бавария</a>
                                </li>
                                <li>
                                    <a href="">Боруссия Д</a>
                                </li>
                            </ul>
                        </div>
                        <div class="cont_itally top_ib">
                            <a href="">Италия</a>
                            <ul>
                                <li>
                                    <a href="">Ювентус</a>
                                </li>
                                <li>
                                    <a href="">Милан</a>
                                </li>
                            </ul>
                        </div> 
                        <div class="cont_itally top_ib">
                            <a href="">Франция</a>
                            <ul>
                                <li>
                                    <a href="">ПСЖ</a>
                                </li>
                                <li>
                                    <a href="">Марсель</a>
                                </li>
                            </ul>
                        </div> 
                        <div class="cont_itally top_ib">
                            <a href="">Другие</a>
                            <ul>
                                <li>
                                    <a href="">Ростов</a>
                                </li>
                                <li>
                                    <a href="">Зенит</a>
                                </li>
                            </ul>
                        </div>      
                    </div>
                    <div class="cat_n_teams teams">
                        <div class="cont">
                            <ul>
                                <li>
                                    <a href="">Англия</a>
                                </li>
                                <li>
                                    <a href="">Германия</a>
                                </li>
                                <li>
                                    <a href="">Испания</a>
                                </li>
                                <li>
                                    <a href="">Россия</a>
                                </li>
                                <li>
                                    <a href="">Бразилия</a>
                                </li>
                                <li>
                                    <a href="">Италия</a>
                                </li>
                                <li>
                                    <a href="">Ботсвана</a>
                                </li>
                                <li>
                                    <a href="">Габон</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="cat_shoes boots">
                            <div class="cont">
                                <ul>
                                    <li>
                                        <a class="boots" href="">Бутсы</a>
                                    </li>
                                    <li>
                                        <a class="foot" href="">Футзалки</a>
                                    </li>
                                    <li>
                                        <a class="spike" href="">Шиповки</a>
                                    </li>
                                </ul>    
                            </div>                                          
                        </div>
                        <div class="boots_cont">
                                <ul>
                                    <li>
                                        <a class="boots" href="">Nike</a>
                                    </li>
                                    <li>
                                        <a class="boots" href="">Adidas</a>
                                    </li>
                                    <li>
                                        <a class="boots" href="">Puma</a>
                                    </li>
                                    <li>
                                        <a class="boots" href="">Mizuno</a>
                                    </li>
                                </ul>    
                            </div>

                            <div class="foo_cont">
                                <ul>
                                     <li>
                                        <a class="boots" href="">Nike</a>
                                    </li>
                                    <li>
                                        <a class="boots" href="">Adidas</a>
                                    </li>
                                    <li>
                                        <a class="boots" href="">Puma</a>
                                    </li>
                                    <li>
                                        <a class="boots" href="">Mizuno</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="spike_cont">
                                <ul>
                                     <li>
                                        <a class="boots" href="">Nike</a>
                                    </li>
                                    <li>
                                        <a class="boots" href="">Adidas</a>
                                    </li>
                                    <li>
                                        <a class="boots" href="">Puma</a>
                                    </li>
                                    <li>
                                        <a class="boots" href="">Mizuno</a>
                                    </li>
                                </ul>
                            </div>  
                    </div>        
                </div>
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
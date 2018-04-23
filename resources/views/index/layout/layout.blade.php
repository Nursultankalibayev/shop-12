<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>12-ai.kz</title>
    <link href="/web/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/web/libs/owl/owl.theme.default.min.css">
    <link rel="stylesheet" href="/web/libs/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="/web/libs/magnific-popup.css">
    <link href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link href="/web/css/main.css" rel="stylesheet">
    @stack('styles')
</head>
<body>
<header>
    <div class="top_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-4 col-xs-4">
                    <p onclick="$('#modalLocation').modal();">Ваш город: <span>Алматы</span></p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8 col-xs-8 top_header_button">
                    @if(\Auth::check())
                        <button><i class="	fa fa-user-o"></i>{{\Auth::user()->last_name.' '.\Auth::user()->first_name}}</button>
                        <button onclick="window.location.href='/auth/logout';"><i class="icon_login"></i>Выход</button>
                    @else
                        <button onclick="FuncObject.showLogin();"><i class="icon_login"></i>Войти</button>
                        <button onclick="FuncObject.showRegistration();"> <i class="icon_registration" ></i>Регистрация</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <div class="bottom_header_logo">
                                <a href="/"><img src="/web/images/Logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <div class="bottom_header_search">
                                <form action="/search" method="get">
                                    <div class="input-group">
                                        <input type="text" name="query" >
                                        <span class="input-group-btn">
                                            <button type="submit"><img src="/web/images/search.png" alt=""></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-4 col-xs-6">
                            <ul>
                                <li><span>ПН-ПТ</span> 09:00 - 21:00</li>
                                <li><span>СБ-ВС&nbsp;</span> 09:00 - 17:00</li>
                            </ul>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-4 col-xs-6">
                            <ul>
                                <li><span>+7(777)</span> 777-77-77</li>
                                <li onclick="FuncObject.showModalCallback();" ><span>Перезвонить</span> Вам?</li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 cols_burger">
                            <div class="bottom_header_basket">
                                <a href="/basket"><img src="/web/images/Bascket.png" alt=""><span>{{count(session()->get('products'))}}</span></a>
                            </div>
                            <a href="#" class="burger-icon toggle-navbar burger-left" data-toggle="0">
                                <span></span><span></span><span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu_header">
        <div class="container">
            <ul>
                <li class="{{isset($rows['active_menu']) && $rows['active_menu'] == 'o-nas' ? 'active' : ''}}"><a href="/page/o-nas">О компании</a></li>
                <li class="{{isset($rows['active_menu']) && $rows['active_menu'] == 'oboi' ? 'active' : ''}}"><a href="/category/oboi">Товары</a></li>
                <li class="{{isset($rows['active_menu']) && $rows['active_menu'] == 'sales' ? 'active' : ''}}"><a  href="/sales">Акции</a></li>
                <li class="{{isset($rows['active_menu']) && $rows['active_menu'] == 'gallery' ? 'active' : ''}}"><a href="/gallery">Галерея</a></li>
                <li class="{{isset($rows['active_menu']) && $rows['active_menu'] == 'dostavka' ? 'active' : ''}}"><a href="/page/dostavka">Доставка</a></li>
                <li class="{{isset($rows['active_menu']) && $rows['active_menu'] == 'kontakty' ? 'active' : ''}}"><a href="/page/kontakty">Контакты</a></li>
            </ul>
        </div>
    </div>
</header>
@yield('content')
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="footer_items">
                    <p class="footer_contacts">Контакты:</p>
                    <p><img src="/web/images/Phone.png" alt="">+7(777)<span> 777-77-77</span></p>
                    <p><img src="/web/images/Mail.png" alt="">mail111<span>@mail.ru</span></p>
                </div>
                <div class="footer_items">
                    <p>Работаем:</p>
                    <p>ПН-ПТ<span> 09:00 - 21:00</span></p>
                    <p>СБ-ВС <span> &nbsp09:00 - 17:00</span></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="footer_items">
                    <p class="footer_contacts">Меню:</p>
                      <div class="row">
                          <div class="col-lg-6">
                              <ul>
                                  <li><a href="/page/o-nas">О компании</a></li>
                                  <li><a href="/category/oboi">Товары</a></li>
                                  <li><a href="/sales">Акции</a></li>
                              </ul>
                          </div>
                          <div class="col-lg-6">
                              <ul>
                                  <li><a href="/gallery">Галерея</a></li>
                                  <li><a href="/page/dostavka">Доставка</a></li>
                                  <li><a href="/page/kontakty">Контакты</a></li>
                              </ul>
                          </div>
                      </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="footer_items">
                    <p class="footer_contacts">Адрес:</p>
                    <p class="footer_address">Город Шымкент, <br> ул.Рыскулова 4</p>
                </div>
                <div class="footer_items">
                    <p>Мы в социальных сетях:</p>
                    <p>
                        <a href="#"><img src="/web/images/Facebook.png" alt=""></a>
                        <a href="#"><img src="/web/images/Insta.png" alt=""></a>
                        <a href="#"><img src="/web/images/Group151.png" alt=""></a>
                        <a href="#"><img src="/web/images/whatsapp.png" alt=""></a>
                        <a href="#"><img src="/web/images/Group150.png" alt=""></a>
                        <a href="#"><img src="/web/images/Youtube.png" alt=""></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
@include('index.includes.registration')
@include('index.includes.login')
@include('index.includes.order')
@include('index.includes.callback')
@include('index.includes.location')
<script src="/web/js/jquery-3.2.1.min.js"></script>
<script src="/web/js/bootstrap.min.js"></script>
<script src="/web/libs/owl/owl.carousel.min.js"></script>
<script src="/web/libs/jquery.magnific-popup.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="/web/js/main.js"></script>
<script src="/web/js/object.js"></script>
<script src="/web/js/product.js"></script>
@stack('scripts')
</body>
</html>
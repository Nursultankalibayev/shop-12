@extends('index.layout.layout')
@section('content')
@include('index.includes.carousel',['carousels'=>$rows['carousels']])
<div class="content_menu">
    <div class="container">
        <div class="row">
            @if(count($rows['content_menu']))
                @foreach($rows['content_menu'] as $item)
                    <a href="/category{{$item->link}}">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <div class="content_item">
                                    <div class="content_menu_item">
                                        <img src="/uploads/{{$item->image_1}}" alt="">
                                        <img src="/uploads/{{$item->image_2}}" alt="">
                                    </div>
                                    {{$item->title}}
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</div>
@if(count($rows['new_products']))
    <div class="new_items">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Новинки</h1>
            </div>
        </div>
        <div class="row">
            @foreach($rows['new_products'] as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="new_item">
                        <a href="/product/{{$item->link}}">
                            <div class="new_item_photo">
                                <img src="/uploads/{{$item->image->image}}" alt="">
                            </div>
                            <p class="new_item_title">{{$item->title}}</p>
                            <p class="new_item_sh_desc">{{$item->sh_desc}}</p>
                            <p class="new_item_price">{{$item->price}} тг.</p>
                        </a>
                        <button class="read_more" onclick="return window.location.href='/product/{{$item->link}}';">Подробнее</button>
                        <button class="basket_icon {{$item->checkSession($item->id) ? ' active-product' : ''}}" data-id="{{$item->id}}" onclick="Product.addBasket($(this));"><i class="icon_basket"></i></button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<div class="main_content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Категории</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                       @include('index.includes.sidebar_category')
                    </div>
                    <div class="col-lg-12">
                        <div class="input_mail">
                            <p>Будьте в курсе!</p>
                            <p>Новости, скидки и акции</p>
                            <input type="text" placeholder="Email">
                            <button>Подписаться</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm 12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Каталог товара</h1>
                    </div>
                </div>
                <div class="row">
                    @if(count($rows['main_catalogs'] ))
                        @foreach($rows['main_catalogs']  as $item)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="new_item">
                                    <a href="/product/{{$item->link}}">
                                        <div class="new_item_photo">
                                            <img src="/uploads/{{$item->image->image}}" alt="">
                                        </div>
                                        <p class="new_item_title">{{$item->title}}</p>
                                        <p class="new_item_sh_desc">{{$item->sh_desc}}</p>
                                        <p class="new_item_price">{{$item->price}} тг.</p>
                                    </a>
                                    <button class="read_more" onclick="return window.location.href='/product/{{$item->link}}';">Подробнее</button>
                                    <button class="basket_icon {{$item->checkSession($item->id) ? ' active-product' : ''}}" data-id="{{$item->id}}" onclick="Product.addBasket($(this));"><i class="icon_basket"></i></button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
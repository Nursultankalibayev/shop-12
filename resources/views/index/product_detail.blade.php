@extends('index.layout.layout')
@section('content')
    @if(count($rows['product']))
        <div class="product">
        <div class="container">
            <div class="product_container">
                <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="product_item_img">
                                <a href="/uploads/{{$rows['product']->image->image}}"  class="image-link">
                                    <img id="base_scr" src="/uploads/{{$rows['product']->image->image}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_item_min">
                                    @if(count($rows['product']->images))
                                        @foreach($rows['product']->images as $image)
                                            <div class="min_product_item_img"><a href="/uploads/{{$image->image}}" class="image-link"><img src="/uploads/{{$image->image}}" alt=""></a></div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product_information">
                        <h1>{{$rows['product']->title}}</h1>
                        <div class="information_text">
                            <p>{{$rows['product']->desc}}</p>
                        </div>
                        <p class="product_price">{{$rows['product']->price}} тг.</p>
                        <div class="assessment">
                            <img src="/web/images/Group79.png" alt="">
                        </div>
                        <p class="top_bottom">В розницу</p>
                        <button class="minus">-</button><p class="counter">1</p><button class="plus">+</button>
                        <button class="add_basket  {{$rows['product']->checkSession($rows['product']->id) ? ' active-product' : ''}}" data-id="{{$rows['product']->id}}" onclick="Product.addDetailBasket($(this));"> {{$rows['product']->checkSession($rows['product']->id) ? 'Добавлено' : 'В КОРЗИНУ'}}</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
</div>
    @endif
    <div class="new_items">
        <div class="container">
            @if(count($rows['recommends']))
                <div class="row">
                    <div class="col-lg-12">
                        <h1>РЕКОМЕНДУЕМ ТАКЖЕ</h1>
                    </div>
                </div>
                <div class="row">
                    @foreach($rows['recommends'] as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="new_item">
                                <a href="/product/{{$item->link}}">
                                    <div class="new_item_photo">
                                        <img src="/uploads/{{$item->image->image}}" alt="">
                                    </div>
                                    <p class="new_item_title">{{$item->title}}</p>
                                    <p class="new_item_sh_desc">{{$item->desc}}</p>
                                    <p class="new_item_price">{{$item->price}} тг.</p>
                                </a>
                                <button class="read_more" onclick="return window.location.href='/product/{{$item->link}}';">Подробнее</button>
                                <button class="basket_icon  {{$item->checkSession($item->id) ? ' active-product' : ''}}"><i class="icon_basket"></i></button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
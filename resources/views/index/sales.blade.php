@extends('index.layout.layout')
@section('content')
<div class="container">
    @include('index.includes.carousel',['carousels'=>$rows['carousels']])
</div>
<div class="new_items">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="sales_color">ХИТЫ ПРОДАЖ</h1>
            </div>
        </div>
        <div class="row">
            @if(count($rows['sales_products']))
                @foreach($rows['sales_products'] as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="new_item">
                            <a href="/product/{{$item->link}}">
                                <div class="sales_icons">
                                    <p>Акция</p>
                                </div>
                                <div class="new_item_photo">
                                    <img src="/uploads/{{$item->image->image}}" alt="">
                                </div>
                                <p class="new_item_title">{{$item->title}}</p>
                                <p class="new_item_sh_desc">{{$item->sh_desc}}</p>
                                <p class="new_item_price">{{$item->price}} тг.</p>
                            </a>
                            <button class="read_more" onclick="return window.location.href='/product/{{$item->link}}';">Подробнее</button>
                            <button class="basket_icon" data-id="{{$item->id}}" onclick="Product.addBasket($(this));"><i class="icon_basket"></i></button>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</div>
@endsection
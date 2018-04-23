@extends('index.layout.layout')
@section('content')
@php $prices= 0; @endphp
  <div class="basket">
    <div class="container">
        <h1>МОЯ КОРЗИНА</h1>
        <div class="basket_head">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4"> <p class="basket_title basket_title_first">Фото</p></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><p class="basket_title">Название</p></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-4"><p class="basket_title">Цена</p></div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4"><p class="basket_title">Кол-во</p></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-4"><p class="basket_title">Сумма</p></div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4"><p class="basket_title">Действие</p></div>
            </div>
        </div>
        <div id="baskets">
            @if(count($rows['products']))
                @foreach($rows['products'] as $item)
                <div class="basket_table" data-id="{{$item->id}}">
                    @php $prices+=(int)str_replace(' ','',$item->price) * $item->count @endphp
                    <div class="row" >
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 basket_cols">
                            <div class="basket_img">
                                <img src="/uploads/{{$item->image->image}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 basket_cols">
                            <p>{{$item->title}}</p>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-4 basket_cols">
                            <p class="price"><span class="parse_price">{{(int)str_replace(' ','',$item->price)}}</span> тг.</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 basket_cols">
                            <button class="minus">-</button><p class="counter">{{$item->count}}</p><button class="plus">+</button>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 basket_cols">
                            <p class="all_price"><span class="parse_all_price" id="item-{{$item->id}}" >{{(int)str_replace(' ','',$item->price) * $item->count}}</span> тг.</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 basket_cols">
                            <a href="#" data-id="{{$item->id}}" onclick="Product.deleteProductBasket($(this));" class="delete_basket_product">
                                <button class="basket_delete">x</button>
                            Удалить</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p id="basket_price"><span class="top_basket_text">Итог:</span> <span id="parse_basket_price">{{$prices}}</span> тг</p>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="right">
                <button class="send_order" onclick="Product.deleteProductBasket();">Оформить заказ</button>
            </div>
        </div>
    </div>
</div>
@endsection
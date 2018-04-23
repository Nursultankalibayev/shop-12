@extends('index.layout.layout')
@section('content')
<div class="main_content search_results">
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
                        <h1>Найдено по запросу - {{isset($rows['query']) ? $rows['query'] : '---'}}</h1>
                    </div>
                </div>
                <div class="row">
                    @if(count($rows['products']))
                        @foreach($rows['products'] as $item)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="new_item">
                                    <a href="/product/{{$item->link}}">
                                        <div class="new_item_photo">
                                            <img src="/uploads/{{$item->image->image}}" alt="">
                                        </div>
                                        <p class="new_item_title">{{$item->title}}</p>
                                        <p class="new_item_sh_desc">{{$item->sh_desc}}</p>
                                        <p class="new_item_price">{{$item->price}}тг.</p>
                                    </a>
                                    <button class="read_more" onclick="return window.location.href='/product/{{$item->link}}';">Подробнее</button>
                                    <button class="basket_icon"><i class="icon_basket"></i></button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        @if(count($rows['products']))
                            @include('index.includes.pagination',['pagination'=>$rows['products']])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
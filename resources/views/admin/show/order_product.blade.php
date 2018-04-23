@extends('admin.layout.layout')
@section('title')
Заказ
@endsection
@section('content')
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a" style="margin-bottom: 10px;">Заказ от пользователья</h3>
        @if(count($rows['orderProduct'] ))
        <div id="page_content_inner">
            <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 hierarchical_show" data-uk-grid="{gutter: 20, controls: '#products_sort'}">
                @foreach($rows['orderProduct']  as $item)
                <div data-product-name="">
                    <div class="md-card md-card-hover-img">
                        <div class="md-card-head uk-text-center uk-position-relative">
                            <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">{{$item->price}}</div>
                            <img class="md-card-head-img" src="/uploads/{{$item->image}}" alt=""/>
                        </div>
                        <div class="md-card-content">
                            <h4 class="heading_c uk-margin-bottom">
                                {{$item->title}}
                                <span class="sub-heading">Количество: {{$item->count}}</span>
                            </h4>
                            <p>{{$item->sh_desc}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection


@extends('admin.layout.layout')
@section('title')
Товары
@endsection
@section('content')
    <div id="page_heading">
        <div class="uk-grid">
            <div class="uk-width-medium-9-10">
                <h1>Список товаров</h1>
            </div>
            <div class="uk-width-medium-1-10">
               <a href="/admin/product/create" class="md-btn md-btn-primary uk-margin-small-top">Создать</a>
            </div>
        </div>
    </div>
    <div class="md-card">
        <div class="md-card-content">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-1-1">
                    <div class="uk-overflow-container">
                        <table class="uk-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Картинка</th>
                                    <th>Название</th>
                                    <th>Категория</th>
                                    <th>Ccылка</th>
                                    <th>Цена</th>
                                    <th>Скидка</th>
                                    <th class="uk-text-nowrap">Новый товар</th>
                                    <th class="uk-text-nowrap">На главный стр.</th>
                                    <th>Статус</th>
                                    <th>Сортировка</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($rows['products']))
                                @foreach($rows['products'] as $item)
                                <tr class="item-{{$item->id}}">
                                    <td>{{$item->id}}</td>
                                    <td class="uk-text-large uk-text-nowrap">
                                        <img class="img_thumb" src="/uploads/{{$item->image->image}}" alt="">
                                    </td>
                                    <td class="uk-text">{{$item->title}}</td>
                                    <td class="uk-text-nowrap">{{isset($item->category->category->title) ? $item->category->category->title : ''}} / {{isset($item->category->title) ? $item->category->title : ''}}</td>
                                    <td class="uk-text">{{$item->link}}</td>
                                    <td class="uk-text-nowrap">{{$item->price}}</td>
                                    <td class="uk-text-nowrap">
                                        @if($item->is_sale == 0)
                                            <span class="uk-badge uk-badge-danger">
                                                Нет
                                            </span>
                                        @else
                                            <span class="uk-badge uk-badge-primary">
                                                Да
                                            </span>
                                        @endif
                                    </td>
                                    <td class="uk-text-nowrap">
                                        @if($item->is_new == 0)
                                            <span class="uk-badge uk-badge-danger">
                                                Нет
                                            </span>
                                        @else
                                            <span class="uk-badge uk-badge-primary">
                                                Да
                                            </span>
                                        @endif
                                    </td>
                                    <td class="uk-text-nowrap">
                                        @if($item->is_main_catalog == 0)
                                            <span class="uk-badge uk-badge-danger">
                                                Нет
                                            </span>
                                        @else
                                            <span class="uk-badge uk-badge-primary">
                                                Да
                                            </span>
                                        @endif
                                    </td>
                                    <td class="uk-text-nowrap">
                                        @if($item->status == 0)
                                            <span class="uk-badge uk-badge-danger">
                                                Не опубликован
                                            </span>
                                        @else
                                            <span class="uk-badge uk-badge-primary">
                                                Опубликован
                                            </span>
                                        @endif
                                    </td>
                                    <td class="uk-text-nowrap">{{$item->sorting}}</td>
                                    <td class="uk-text-nowrap">
                                        <a href="/admin/product/{{$item->id}}/edit"><i class="material-icons md-24">&#xe150;</i></a>
                                        <a href="#"><i class="material-icons md-24 product-delete" data-id="{{$item->id}}">&#xE872;</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    @if(count($rows['products']))
                        @include('admin.includes.pagination',['pagination'=>$rows['products']])
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
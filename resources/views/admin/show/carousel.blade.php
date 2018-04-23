@extends('admin.layout.layout')
@section('title')
Слайдер
@endsection
@section('content')
    <div id="page_heading">
        <div class="uk-grid">
            <div class="uk-width-medium-9-10">
                <h1>Список картинки</h1>
            </div>
            <div class="uk-width-medium-1-10">
               <a href="/admin/carousel/create" class="md-btn md-btn-primary uk-margin-small-top">Создать</a>
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
                                    <th>Ccылка</th>
                                    <th>Статус</th>
                                    <th>Сортировка</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($rows['carousels']))
                                @foreach($rows['carousels'] as $item)
                                <tr class="item-{{$item->id}}">
                                    <td>{{$item->id}}</td>
                                    <td class="uk-text-large uk-text-nowrap">
                                        <img class="img_thumb" src="/uploads/{{$item->image}}" alt="">
                                    </td>
                                    <td class="uk-text-nowrap">{{$item->title}}</td>
                                    <td class="uk-text-nowrap">{{$item->link}}</td>
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
                                        <a href="/admin/carousel/{{$item->id}}/edit"><i class="material-icons md-24">&#xe150;</i></a>
                                        <a href="#"><i class="material-icons md-24 carousel-delete" data-id="{{$item->id}}">&#xE872;</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    @if(count($rows['carousels']))
                        @include('admin.includes.pagination',['pagination'=>$rows['carousels']])
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.layout.layout')
@section('title')
Обратный звонок
@endsection
@section('content')
    <div id="page_heading">
        <div class="uk-grid">
            <div class="uk-width-medium-9-10">
                <h1>Список обратный звоноков</h1>
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
                                    <th>Имя</th>
                                    <th>Телефон</th>
                                    <th>Статус</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($rows['callbacks']))
                                @foreach($rows['callbacks'] as $item)
                                <tr class="item-{{$item->id}}">
                                    <td>{{$item->id}}</td>
                                    <td class="uk-text-nowrap">{{$item->name}}</td>
                                    <td class="uk-text-nowrap">{{$item->phone}}</td>
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
                                    <td class="uk-text-nowrap">
                                        <a href="#"><i class="material-icons md-24 callback-delete" data-id="{{$item->id}}">&#xE872;</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    @if(count($rows['callbacks']))
                        @include('admin.includes.pagination',['pagination'=>$rows['callbacks']])
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
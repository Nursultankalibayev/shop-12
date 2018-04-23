@extends('admin.layout.layout')
@section('title')
Заказы
@endsection
@section('content')
    <div id="page_heading">
        <div class="uk-grid">
            <div class="uk-width-medium-9-10">
                <h1>Список заказов</h1>
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
                                    <th>Пользователь</th>
                                    <th>Статус</th>
                                    <th style="width: 200px;">Действие</th>
                                </tr>
                            </thead>
                            <tbody>

                            @if(count($rows['orders']))
                                @foreach($rows['orders'] as $item)
                                <tr class="item-{{$item->id}}">
                                    <td>{{$item->id}}</td>
                                    <td class="uk-text-nowrap">{{$item->getFullNameUser($item->user_id)->fullName}}</td>
                                    <td class="uk-text-nowrap">
                                        @if($item->status == 0)
                                            <span class="uk-badge uk-badge-danger">
                                                Не закрыта
                                            </span>
                                        @else
                                            <span class="uk-badge uk-badge-primary">
                                                закрыта
                                            </span>
                                        @endif
                                    </td>
                                    <td class="uk-text-nowrap">
                                        <a class="md-btn md-btn-primary" href="/admin/order/{{$item->id}}">Просмотр</a>
                                        <a data-id="{{$item->id}}" class="md-btn md-btn-danger order-delete" >Удалить заказ</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    @if(count($rows['orders']))
                        @include('admin.includes.pagination',['pagination'=>$rows['orders']])
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
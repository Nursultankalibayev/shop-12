@extends('admin.layout.layout')
@section('title')
Слайдер
@endsection
@section('content')
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a" style="margin-bottom: 10px;">Слайдер / Изменение</h3>
        @if(count($rows['carousel']))
            <form action="{{route('carousel.update',$rows['carousel']->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-10-10">
                    <div class="uk-form-row">
                        <div class="md-input-wrapper md-input-filled">
                            <label for="title">Название</label>
                            <input type="text" id="title" name="title" class="md-input" value="{{$rows['carousel']->title}}"><span class="md-input-bar"></span>
                        </div>
                    </div>
                    @if($errors->first('title'))
                        <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('title')}}</span></div>
                    @endif
                    <div class="uk-form-row">
                        <div class="md-input-wrapper md-input-filled">
                            <label for="link">Ссылка</label>
                            <input type="text" id="link" name="link" class="md-input" value="{{$rows['carousel']->link}}"><span class="md-input-bar"></span>
                        </div>
                    </div>
                    @if($errors->first('link'))
                        <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('link')}}</span></div>
                    @endif

                    <div class="uk-form-row">
                        <div class="md-input-wrapper md-input-filled">
                            <label for="sorting">Сортировка</label>
                            <input type="number" id="sorting" name="sorting" class="md-input" value="{{$rows['carousel']->sorting}}"><span class="md-input-bar"></span>
                        </div>
                    </div>
                    @if($errors->first('sorting'))
                        <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('sorting')}}</span></div>
                    @endif

                    <div class="uk-form-row">
                        <div class="uk-form-file md-btn md-btn-primary" style="padding: 3px 10px;">
                            <i class="uk-icon-file-picture-o" style="color: #fff;"></i> Выберите картинку
                            <input id="form-file" name="image" type="file">
                        </div>
                        @if($errors->first('image'))
                            <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('image')}}</span></div>
                        @endif
                        @if(count($rows['carousel']->image))
                            <div class="uk-margin-bottom uk-text-left" style="padding: 20px 0">
                                <img src="/uploads/{{$rows['carousel']->image}}" alt="" class="img_medium">
                            </div>
                        @endif
                    </div>

                    <div class="uk-width-medium-10-10" style="margin: 20px 0;">
                        <input type="checkbox" name="status" data-switchery {{$rows['carousel']->status == 1 ? 'checked' : ''}}    id="status" />
                        <label for="status" class="inline-label">Опубликовать</label>
                    </div>
                </div>
                <div class="uk-form-row">
                    <button type="submit" class="md-btn md-btn-primary">Сохранить</button>
                    <a href="/admin/carousel" class="md-btn md-btn-default">Отмена</a>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>
@endsection
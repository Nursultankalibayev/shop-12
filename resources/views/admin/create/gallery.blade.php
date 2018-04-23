@extends('admin.layout.layout')
@section('title')
Галерея
@endsection
@section('content')
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a" style="margin-bottom: 10px;">Галерея</h3>
        <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-10-10">
                    <div class="uk-form-row">
                        <div class="md-input-wrapper md-input-filled ">
                            <label for="title">Название</label>
                            <input type="text" id="title" name="title" class="md-input"><span class="md-input-bar"></span>
                        </div>
                        @if($errors->first('title'))
                            <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('title')}}</span></div>
                        @endif
                    </div>
                    <div class="uk-form-row">
                        <div class="md-input-wrapper  md-input-filled ">
                            <label for="sorting">Сортировка</label>
                            <input type="number" id="sorting" name="sorting" value="1" class="md-input masked_input" ><span class="md-input-bar"></span>
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
                    </div>
                    @if($errors->first('image'))
                        <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('image')}}</span></div>
                    @endif
                    <div class="uk-width-medium-10-10" style="margin: 20px 0;">
                        <input type="checkbox" name="status" data-switchery checked id="status" />
                        <label for="status" class="inline-label">Опубликовать</label>
                    </div>
                </div>
                <div class="uk-form-row">
                    <button type="submit" class="md-btn md-btn-primary">Сохранить</button>
                    <a href="/admin/gallery" class="md-btn md-btn-default">Отмена</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('admin.layout.layout')
@section('title')
Категория
@endsection
@section('content')
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a" style="margin-bottom: 10px;">Категория</h3>
        @if(count($rows['category']))
            <form action="{{route('category.update',$rows['category']->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="uk-grid" data-uk-grid-margin="">
                    <div class="uk-width-medium-10-10">
                        <div class="uk-form-row">
                            <div class="md-input-wrapper md-input-filled ">
                                <label for="title">Название</label>
                                <input type="text" id="title" name="title" class="md-input" value="{{$rows['category']->title}}"><span class="md-input-bar"></span>
                            </div>
                            @if($errors->first('title'))
                                <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('title')}}</span></div>
                            @endif
                        </div>
                        <div class="uk-form-row">
                            <label for="parent_id" class="uk-form-label">Парент категория</label>
                            <select id="parent_id" name="parent_id" data-md-selectize>
                                <option value="">выберите..</option>
                                @if(count($rows['categories']))
                                    @foreach($rows['categories'] as $key=>$item)
                                        <option {{$item->id == $rows['category']->parent_id ? 'selected' : ''}}  value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if($errors->first('parent_id'))
                                <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('parent_id')}}</span></div>
                            @endif
                        </div>

                        <div class="uk-form-row">
                            <div class="md-input-wrapper  md-input-filled ">
                                <label for="link">Ссылка</label>
                                <input type="text" id="link" name="link" value="{{$rows['category']->link}}" class="md-input masked_input" ><span class="md-input-bar"></span>
                            </div>
                        </div>
                        @if($errors->first('link'))
                            <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('link')}}</span></div>
                        @endif
                        <div class="uk-form-row">
                            <div class="md-input-wrapper  md-input-filled ">
                                <label for="sorting">Сортировка</label>
                                <input type="number" id="sorting" name="sorting" value="{{$rows['category']->sorting}}" class="md-input masked_input" ><span class="md-input-bar"></span>
                            </div>
                        </div>
                        @if($errors->first('sorting'))
                            <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('sorting')}}</span></div>
                        @endif
                        <div class="uk-form-row">
                            <div class="uk-form-file md-btn md-btn-primary" style="padding: 3px 10px;">
                                <i class="uk-icon-file-picture-o" style="color: #fff;"></i> Выберите картинку (1)
                                <input id="image_1" name="image_1" type="file">
                            </div>
                            @if($errors->first('image_1'))
                                <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('image_1')}}</span></div>
                            @endif
                            @if(count($rows['category']->image_1))
                                <div class="uk-margin-bottom uk-text-left uk-position-relative" style="padding: 20px 0" >
                                    <button data-category="{{$rows['category']->id}}" data-type="1" type="button" class="uk-modal-close uk-close uk-close-alt uk-position-absolute category-image-delete"></button>
                                    <img src="/uploads/{{$rows['category']->image_1}}" alt="" class="img_medium">
                                </div>
                            @endif
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-form-file md-btn md-btn-primary" style="padding: 3px 10px;">
                                <i class="uk-icon-file-picture-o" style="color: #fff;"></i> Выберите картинку (2)
                                <input id="image_2" name="image_2" type="file">
                            </div>
                            @if($errors->first('image_2'))
                                <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('image_2')}}</span></div>
                            @endif
                            @if(count($rows['category']->image_2))
                                <div class="uk-margin-bottom uk-text-left uk-position-relative" style="padding: 20px 0" >
                                    <button data-category="{{$rows['category']->id}}" data-type="2" type="button" class="uk-modal-close uk-close uk-close-alt uk-position-absolute category-image-delete"></button>
                                    <img src="/uploads/{{$rows['category']->image_2}}" alt="" class="img_medium">
                                </div>
                            @endif
                        </div>
                        <div class="uk-width-medium-10-10" style="margin: 20px 0;">
                            <input type="checkbox" {{$rows['category']->is_main == 1 ? 'checked' : ''}}  name="is_main" data-switchery id="is_main" />
                            <label for="is_main" class="inline-label">На главную страницу</label>
                        </div>
                        <div class="uk-width-medium-10-10" style="margin: 20px 0;">
                            <input type="checkbox" name="status" {{$rows['category']->status == 1 ? 'checked' : ''}}  data-switchery  id="status" />
                            <label for="status" class="inline-label">Опубликовать</label>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <button type="submit" class="md-btn md-btn-primary">Сохранить</button>
                        <a href="/admin/category" class="md-btn md-btn-default">Отмена</a>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
@endsection
@extends('admin.layout.layout')
@section('title')
Товары
@endsection
@section('content')
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a" style="margin-bottom: 10px;">Товары</h3>
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-10-10">
                    <div class="uk-form-row">
                        <div class="md-input-wrapper md-input-filled ">
                            <label for="title">Название</label>
                            <input type="text" id="title" name="title" class="md-input" value="{{old('title')}}"><span class="md-input-bar"></span>
                        </div>
                        @if($errors->first('title'))
                            <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('title')}}</span></div>
                        @endif
                    </div>
                    <div class="uk-form-row">
                        <label for="category_id" class="uk-form-label">Категория</label>
                        <select id="category_id" name="category_id" data-md-selectize>
                            <option value="">выберите...</option>
                            @if(count($rows['categories']))
                                @foreach($rows['categories']  as $item)
                                    <optgroup label="{{$item->title}}">
                                        @foreach($item->children as $children)
                                            <option {{old('category_id') == $children->id ? 'selected' : ''}} value="{{$children->id}}">{{$children->title}}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    @if($errors->first('category_id'))
                        <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('category_id')}}</span></div>
                    @endif
                    <div class="uk-form-row">
                        <div class="md-input-wrapper md-input-filled ">
                           <div class="uk-form-row">
                                <label for="sh_desc">Кратки описание (max 100 символов)</label>
                                <textarea cols="30" rows="4" id="sh_desc"  name="sh_desc" class="md-input">{{old('sh_desc')}}</textarea>
                            </div>
                        </div>
                        @if($errors->first('sh_desc'))
                            <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('sh_desc')}}</span></div>
                        @endif
                    </div>

                    <div class="uk-form-row">
                        <div class="md-input-wrapper md-input-filled ">
                           <div class="uk-form-row">
                                <label for="desc">Полный описание</label>
                                <textarea cols="30" rows="4"  id="desc"  name="desc" class="md-input"> {{old('desc')}}</textarea>
                            </div>
                        </div>
                        @if($errors->first('desc'))
                            <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('desc')}}</span></div>
                        @endif
                    </div>
                    <div class="uk-form-row">
                        <div class="md-input-wrapper md-input-filled ">
                            <label for="price">Цена</label>
                            <input type="text" id="price" name="price" value="{{old('price')}}" class="md-input"><span class="md-input-bar"></span>
                        </div>
                        @if($errors->first('title'))
                            <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('title')}}</span></div>
                        @endif
                    </div>
                    <div class="uk-form-row">
                        <div class="md-input-wrapper  md-input-filled ">
                            <label for="sorting">Сортировка</label>
                            <input type="number" id="sorting" name="sorting"  value="{{old('sorting')}}" class="md-input masked_input" ><span class="md-input-bar"></span>
                        </div>
                    </div>
                    @if($errors->first('sorting'))
                        <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('sorting')}}</span></div>
                    @endif
                    <div class="uk-form-row">
                        <div class="uk-form-file md-btn md-btn-primary" style="padding: 3px 10px;">
                            <i class="uk-icon-file-picture-o" style="color: #fff;"></i> Выберите картинку (одну)
                            <input id="image" name="image" type="file">
                        </div>
                    @if($errors->first('image'))
                        <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('image')}}</span></div>
                    @endif
                    </div>
                    <div class="uk-form-row">
                        <div class="uk-form-file md-btn md-btn-primary" style="padding: 3px 10px;">
                            <i class="uk-icon-file-picture-o" style="color: #fff;"></i> Выберите картинки (несколько)
                            <input id="images" name="images[]" multiple type="file">
                        </div>
                    @if($errors->first('images'))
                        <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('images')}}</span></div>
                    @endif
                    </div>
                    <div class="uk-width-medium-10-10" style="margin: 20px 0;">
                        <input type="checkbox" {{old('is_new') == 'on' ? 'checked' : ''}} name="is_new" data-switchery id="is_new" />
                        <label for="is_new" class="inline-label">Новый товар</label>
                    </div>
                    <div class="uk-width-medium-10-10" style="margin: 20px 0;">
                        <input type="checkbox" name="is_sale" {{old('is_sale') == 'on' ? 'checked' : ''}} data-switchery id="is_sale" />
                        <label for="is_sale" class="inline-label">Скидка</label>
                    </div>
                    <div class="uk-width-medium-10-10" style="margin: 20px 0;">
                        <input type="checkbox" name="is_main_catalog" {{old('is_main_catalog') == 'on' ? 'checked' : ''}} data-switchery id="is_main_catalog" />
                        <label for="is_main_catalog" class="inline-label">На главную страницу</label>
                    </div>
                    <div class="uk-width-medium-10-10" style="margin: 20px 0;">
                        <input type="checkbox" name="status" {{old('status') == 'on' ? 'checked' : ''}} data-switchery checked id="status" />
                        <label for="status" class="inline-label">Опубликовать</label>
                    </div>
                </div>
                <div class="uk-form-row">
                    <button type="submit" class="md-btn md-btn-primary">Сохранить</button>
                    <a href="/admin/product" class="md-btn md-btn-default">Отмена</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
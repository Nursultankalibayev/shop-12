@extends('admin.layout.layout')
@section('title')
Страницы
@endsection
@section('content')
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a" style="margin-bottom: 10px;">Страницы</h3>
        <form action="{{route('page.store')}}" method="post" enctype="multipart/form-data">
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
                        <div class="md-input-wrapper md-input-filled ">
                           <div class="uk-form-row">
                                <label for="desc">Полный описание</label>
                                <textarea cols="30" rows="20" id="desc"  name="desc" class="md-input my-editor"></textarea>
                            </div>
                        </div>
                        @if($errors->first('desc'))
                            <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('desc')}}</span></div>
                        @endif
                    </div>
                    <div class="uk-form-row">
                        <div class="md-input-wrapper  md-input-filled ">
                            <label for="sorting">Сортировка</label>
                            <input type="number" value="1" id="sorting" name="sorting" class="md-input masked_input" ><span class="md-input-bar"></span>
                        </div>
                    </div>
                    @if($errors->first('sorting'))
                        <div class="parsley-errors-list filled" id="parsley-id-4"><span class="parsley-required">{{$errors->first('sorting')}}</span></div>
                    @endif
                    <div class="uk-width-medium-10-10" style="margin: 20px 0;">
                        <input type="checkbox" name="status" data-switchery checked id="status" />
                        <label for="status" class="inline-label">Опубликовать</label>
                    </div>
                </div>
                <div class="uk-form-row">
                    <button type="submit" class="md-btn md-btn-primary">Сохранить</button>
                    <a href="/admin/page" class="md-btn md-btn-default">Отмена</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endpush
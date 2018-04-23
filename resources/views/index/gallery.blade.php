@extends('index.layout.layout')
@section('content')
    <div class="galleries">
        <div class="container">
            <div class="row">
                @if(count($rows['galleries']))
                    @foreach($rows['galleries'] as $item)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="gallery_item">
                                <img src="/uploads/{{$item->image}}" alt="">
                                <a href="/uploads/{{$item->image}}" class="image-link">
                                    <div class="gallery_item_comment">
                                        <p>{{$item->title}}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
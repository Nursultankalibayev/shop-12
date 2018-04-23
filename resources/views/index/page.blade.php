@extends('index.layout.layout')
@section('content')
    @if(count($rows['page']))
    {!! $rows['page']->desc!!}
    @endif
@endsection
@extends('home')

@section('content')
@foreach($getListJson as $item)
    <p>{{ $item['id'] }}</p>
    <p>{{ $item['nombre'] }}</p>
@endforeach
@stop
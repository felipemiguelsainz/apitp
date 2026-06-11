@extends('home')

@section('content')
@forelse ($getListJson as $item)
    <p>{{ $item['id'] }}</p>
    <p>{{ $item['nombre'] }}</p>
@empty
    <p>No hay datos para mostrar.</p>
@endforelse
@stop

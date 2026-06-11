@extends('home')

@section('content')
@forelse ($getEmailsJson as $item)
    <p>{{ $item['id'] }}</p>
    <p>{{ $item['nombre'] }}</p>
    <p>{{ $item['modo'] }}</p>
    <p>{{ $item['clienteId'] }}</p>
    <p>{{ $item['hasBasesAssociated'] }}</p>
@empty
    <p>No hay datos para mostrar.</p>
@endforelse
@stop

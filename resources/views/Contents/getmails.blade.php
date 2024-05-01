@extends('home')

@section('content')

@php
    $index = 1;
    //problemas pq el key del array es un numero que no se consume
@endphp

@foreach ($getEmailsJson as $item )
    <p>{{ $item[$index]['id'] }}</p>
    <p>{{ $item[$index]['nombre'] }}</p>
    <p>{{ $item[$index]['modo'] }}</p>
    <p>{{ $item[$index]['clienteId'] }}</p>
    <p>{{ $item[$index]['hasBasesAssociated'] }}</p>
    @php
        $index++;
    @endphp
@endforeach
@stop
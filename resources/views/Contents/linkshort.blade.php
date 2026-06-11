@extends('home')

@section('content')
@forelse ($linkShortJson as $item)
    <p>{{ $item['idTemp'] }}</p>
    <p>{{ $item['longUrl'] }}</p>
    <p>{{ $item['lastDatetimeClick'] }}</p>
    <p>{{ $item['shortUrl'] }}</p>
    <p>{{ $item['qtyClicks'] }}</p>
@empty
    <p>No hay datos para mostrar.</p>
@endforelse
@stop

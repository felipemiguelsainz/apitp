@extends('home')

@section('content')
@foreach ($getEmailsJson as $item ){
    <p>{{ $item['idTemp'] }}</p>
    <p>{{ $item['longUrl'] }}</p>
    <p>{{ $item['lastDatetimeClick'] }}</p>
    <p>{{ $item['shortUrl'] }}</p>
    <p>{{ $item['qtyClicks'] }}</p>
}
@endforeach
@stop
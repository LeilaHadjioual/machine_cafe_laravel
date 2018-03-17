@extends('template.back_office.default_template')

@section('titre')
    Welcome {{ Auth::user()->name }}
@stop
{{--vue intermédiaire entre la commande de la boisson et le back office--}}
@section('content')
    <img src="https://www.tenstickers.be/stickers/img/preview/sticker-tasse-de-cafe-9203.png" alt="Photo tasse café" />

@endsection

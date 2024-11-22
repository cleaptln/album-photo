@extends('layout')

@section('contenu')
<h1></h1>
    @foreach($photo as $p)
        <p>{{$p->titre}}</p>
        <img src="{{$p->url}}"/>
    @endforeach

@endsection
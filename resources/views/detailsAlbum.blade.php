@extends("layout")

@section("contenu")

page details album
<h1> {{$album->titre}} </h1>
    @foreach($photo as $p)
       <h2> {{$p->titre}}</h2>
       <img src="{{$p->url}}">
       
    @endforeach

@endsection
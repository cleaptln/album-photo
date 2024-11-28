@extends('layout')

@section('contenu')

<h1 class="titre_album">#{{$tag->nom}}</h1>
<div class="collection_card">
    @foreach($photo as $p)
    <div class="card">
        <h2> {{$p->titre}}</h2>
        <img src="{{$p->url}}">
        </div>
    @endforeach
    
</div>
@endsection
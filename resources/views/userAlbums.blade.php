@extends('layout')
@section('contenu')

<h1 class="titre_album">Vos albums<h1>

<div class="boiteAlbum">
@foreach($albums as $album)
    <div class="albumGrid">
        @foreach($album->photos as $p)
        <div class="photoGrid">
            <img src="{{ $p->image }}" alt="{{ $p->titre }}" />
        </div>
        @endforeach
    </div>
    <a href="{{route('detailsAlbum',['id'=>$album->id])}}">{{$album->titre}}</a>
        @if ($album->photos->isEmpty())
            <img src="https://th.bing.com/th/id/OIP.H1gHhKVbteqm1U5SrwpPgwAAAA?rs=1&pid=ImgDetMain"/>
        @endif

@endforeach
</div>
@endsection



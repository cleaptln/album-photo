@extends('layout')
@section('contenu')

<h1 class="titre_album">Vos albums<h1>

@foreach($albums as $album)
    @foreach($album->photos as $p)
        <img src="{{ $p->image }}" alt="{{ $p->titre }}" />
    @endforeach
    <a href="{{route('detailsAlbum',['id'=>$album->id])}}">{{$album->titre}}</a>
        @if ($album->photos->isEmpty())
            <img src="https://th.bing.com/th/id/OIP.H1gHhKVbteqm1U5SrwpPgwAAAA?rs=1&pid=ImgDetMain"/>
        @endif

@endforeach
@endsection



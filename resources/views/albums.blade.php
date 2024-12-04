@extends("layout")

@section("contenu")

<h1 class="titre_album">Albums de la semaine<h1>


<div class="wrap"> 
    @foreach($albums as $album)
       <a class="card_album" href="{{route('detailsAlbum',['id'=>$album->id])}}" >{{$album->titre}}</a>
    @endforeach
</div>
@endsection
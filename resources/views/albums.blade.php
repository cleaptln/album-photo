@extends("layout")

@section("contenu")

super albums

    @foreach($albums as $album)
       <a href="{{route('detailsAlbum',['id'=>$album->id])}}" >{{$album->titre}}</a>
    @endforeach

@endsection
@extends("layout")

@section("contenu")

super albums

    @foreach($albums as $album)
       <a >{{$album->titre}}</a>
    @endforeach

@endsection
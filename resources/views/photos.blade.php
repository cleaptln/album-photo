@extends("layout")

@section("contenu")

page photos pas obligatoire

    @foreach($photos as $photo)
       <img src="{{$photo->url}}">
    @endforeach

@endsection
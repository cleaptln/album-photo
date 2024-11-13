@extends("layout")

@section("contenu")

page photos

    @foreach($photos as $photo)
       <img src="{{$photo->url}}">
    @endforeach

@endsection
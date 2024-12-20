@extends("layout")

@section("contenu")

super page accueil

<a href="{{route('photos')}}" class="headerbottom"> Photos </a>
<a href="{{route('albums')}}" class="headerbottom"> Albums </a>

@endsection
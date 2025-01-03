@extends("layout")

@section("contenu")

<div class="titreindex">
<p class=titrelogo>pictura</p>
</div>

<p class="presentation">Un album photo numérique qui vous permet de créer vos albums et de les partager avec d'autres utilisateurs</p>

<div class="grid1">
    <div class="grid1-one">
        <h3 class="headerbottom"> Top 3 des photos les mieux notées </h3>
        <div class="images">
        @foreach ($photos as $photo)
            <img src="{{$photo->image}}"/>
        @endforeach
        </div>
    </div>
    <a href="{{route('search')}}">Rechercher des photos</a>
    <div class="grid1-two">
        <h3 class="headerbottom"> Les derniers albums </h3>
        @foreach ($albums as $album)
            <p>{{$album->titre}}</p>
        @endforeach
    </div>
    <a href="{{route('albums')}}">Voir tous les albums</a>
</div>


@endsection
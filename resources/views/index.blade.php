@extends("layout")

@section("contenu")

<div class="titreindex">
<p class=titrelogo>pictura</p>
</div>

<p class="presentation">Un album photo numérique qui vous permet de créer vos albums et de les partager avec d'autres utilisateurs</p>

<div class="grid1">
    <div class="grid1-one"><a href="{{route('photos')}}" class="headerbottom"> Les dernières photos </a></div>
    <div class="grid1-two"><a href="{{route('albums')}}" class="headerbottom"> Les derniers albums </a></div>
</div>
@endsection
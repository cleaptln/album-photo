@extends("layout")

@section("contenu")

<input type="text" id="search" placeholder="Rechercher par titre">
<div id="photosSearch">
    
<h1 class="titre_album"> Les dernières photos </h1>

<div class="collection_card"> 
@foreach ($photos as $photo)
    <div class="card">
        <div class="photo-item">
            <h2>{{ $photo->titre }}</h3>
            <img src="{{ $photo->image }}" alt="{{ $photo->titre }}">
            <a class="voiralbum" href="{{ route('detailsAlbum', ['id' => $photo->album_id]) }}">Voir l'album</a>
        </div>
        </div>
    @endforeach
</div>
</div>

@endsection

@section('script')
<script src="{{env('APP_URL')}}/js/search.js" defer></script>
@endsection
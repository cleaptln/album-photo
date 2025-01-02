@extends("layout")

@section("contenu")

<input type="text" id="search" placeholder="Rechercher par titre">
<div id="photosSearch">
    @foreach ($photos as $photo)
        <div class="photo-item">
            <h3>{{ $photo->titre }}</h3>
            <img src="{{ $photo->image }}" alt="{{ $photo->titre }}">
            <a href="{{ route('detailsAlbum', ['id' => $photo->album_id]) }}">Voir l'album</a>
        </div>
    @endforeach
</div>

@endsection

@section('script')
<script src="{{env('APP_URL')}}/js/search.js" defer></script>
@endsection
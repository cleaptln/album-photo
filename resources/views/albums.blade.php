@extends("layout")

@section("contenu")

    <!-- Début Bouton tri -->
    <div class="tri">
<div class="circle-button" id="circleButton">
<span class="plus-sign">Tri <i class='bx bx-filter-alt'></i></span>
        
<form>
    <div class="radio-list" id="radioList">
            <label class="radio-item">
                <input type="radio" name="trie" value="titre"> Titre
            </label>
            <label class="radio-item">
                <input type="radio" name="trie" value="creation"> Date
            </label>
            <input type='submit' id="soumettre"/>
        </div>
    </div>
</div>
</form>


<h1 class="titre_album">Liste des albums<h1>

<div class="wrap"> 

    @foreach($albumsShow as $album)
   <div class="boiteAlbum">
    <a class="card-album" href="{{route('detailsAlbum',['id'=>$album->id])}}">{{$album->titre}}</a>

    <div class="albumGrid">
        @foreach($album->photos as $p)
        <div class="photoGrid">
            <img src="{{ $p->image }}" alt="{{ $p->titre }}" />
        </div>
        @endforeach
    </div>
        @if ($album->photos->isEmpty())
            <img src="https://th.bing.com/th/id/OIP.H1gHhKVbteqm1U5SrwpPgwAAAA?rs=1&pid=ImgDetMain"/>
        @endif
</div>
@endforeach
</div>
@endsection


@section('script')
<script src="{{env('APP_URL')}}/js/albums.js"></script>
@endsection
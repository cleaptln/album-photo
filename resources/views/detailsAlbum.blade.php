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
                <input type="radio" name="trie" value="note"> Note
            </label>
            <input type='submit' id="soumettre"/>
        </div>
    </div>
</div>
</form>


<div class="titreAlbum">
    <h1 class="titre_album"> {{$album->titre}} </h1>
    <form action="{{ route('deleteAlbum', $album->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet album et toutes ses photos ?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer l'album</button>
    </form>
</div>


<div class="collection_card"> 


    @foreach($photo as $p)
        <div class="card">
            <h2> {{$p->titre}}</h2>
            <img src="{{$p->image}}">
        
            @foreach($tag[$p->id] as $t)
            <a class="tag" href="{{route('tag',['tag'=>$t->nom])}}">#{{$t->nom}}</a>
            @endforeach
            @auth
                @if (auth()->id() === $album->user_id)
                    <form action="{{ route('deletePhoto', $p->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette photo ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                @endif
            @endauth
        </div>

    @endforeach

</div>
@endsection


@section('script')
<script src="{{env('APP_URL')}}/js/detailsAlbum.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection


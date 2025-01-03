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

    <!-- Fin Bouton tri -->


<div class="titreAlbum">
    <h1 class="titre_album"> {{$album->titre}} </h1>
    
    @auth
        @if (auth()->id() === $album->user_id)
            <form action="{{ route('deleteAlbum', $album->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet album et toutes ses photos ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer l'album</button>
            </form>
        @endif
    @endauth

</div>


<div class="collection_card"> 


    @foreach($photo as $p)
        <div class="card">
            <h2> {{$p->titre}}</h2>
            <img src="{{$p->image}}">
            <div>
            <p>Note : 
                @for ($i = 1; $i <= $p->note; $i++)
                        <i class='bx bxs-star' ></i>
                @endfor
                @for ($i = $p->note + 1; $i <= 5; $i++)
                <i class='bx bx-star'></i>
                @endfor
            </p>
            </div>
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
    @auth
        @if (auth()->id() === $album->user_id)
            <form class="rajouterPhoto" action="{{ route('updateAlbum', ['id' => $album->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div id="photos-container"></div>

                <!-- Bouton pour ajouter des champs -->
                <button type="button" id="add-photo">Ajouter une photo</button> 
                <br />

                <!-- Conteneur pour le bouton de soumission -->
                <div id="submit-container"></div>
            </form>
        @endif
    @endauth

</div>
@endsection


@section('script')
<script src="{{env('APP_URL')}}/js/detailsAlbum.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection


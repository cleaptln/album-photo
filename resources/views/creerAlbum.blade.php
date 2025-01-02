@extends("layout")

@section("contenu")
@include("errors")

<h1 class="titre_album">Créer un album<h1>


<div class="CreerForm">
    <form method="post" action="{{route('saveAlbum')}}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="titre" value="{{old('titre')}}" id="CreerTitre" placeholder="Titre de l'album" required>
        <br />
        <input type="date" name="creation" value="{{ old('creation') }}" id="CreerDate" placeholder="Date de Création"  required>
        <br />
        
        <!-- On ajoute une photo -->
        <!-- Conteneur pour les photos ajoutées dynamiquement -->
        <div id="photos-container"></div>

        <!-- Bouton pour ajouter des champs -->
        <button type="button" id="add-photo">Ajouter une photo</button> 
        <br />


        <input type="submit" value="Valider">
    </form>
</div>
    @endsection

    @section('script')
<script src="{{env('APP_URL')}}/js/creerAlbum.js"></script>
    @endsection
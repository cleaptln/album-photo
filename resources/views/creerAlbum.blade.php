@extends("layout")

@section("contenu")
@include("errors")


    <form method="post" action="{{route('saveAlbum')}}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="titre" value="{{old('titre')}}" placeholder="Titre de l'album" required>
        <br />
        <input type="number" name="creation" value="{{date('Y')}}" placeholder="Date de Création"  required>
        <br />
        
        <div id="photos-container">
            <div class="insertPhoto">
                <input type="text" name="titrePhoto" placeholder="Titre de la photo" value="{{old('titrePhoto')}}" required>
                <input type="url" name="url" placeholder="Image" required>
                <input type="number" name="note" placeholder="Note (1-5)" min="1" max="5" required>
            </div>
        </div>

        <button type="button" id="add-photo">+</button> <!-- Bouton pour ajouter des champs -->
        <br />


        <input type="submit" value="Valider">
        
    @endsection
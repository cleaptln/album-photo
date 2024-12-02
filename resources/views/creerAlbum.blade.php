@extends("layout")

@section("contenu")
@include("errors")


    <form method="post" action="{{route('enregistrerAlbum')}}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="titre" value="{{old('titre')}}" placeholder="Titre" required>
        <br />
        <input type="number" name="creation" value="{{date('Y')}}" placeholder="Date de Création"  required>
        <br />
        <input type="text" name="tags" min="0" required>
        <br />

        <input type="submit" value="Valider">
        
    @endsection
@extends('layout')

@section('contenu')

<h1 id="titre_register"> Créer un compte </h1>

<div class="register">
<form action="{{route('register')}}" method="post">
    @csrf
    <input type="text" name="name" required placeholder="Nom" /><br />
    <input type="email" name="email" required placeholder="Adresse email" /><br />
    <input type="password" name="password" required placeholder="Mot de passe" /><br />
    <input type="password" name="password_confirmation" required placeholder="Confirmer le mot de passe" /><br />
    <input type="submit" /><br />
</form>
<a href="{{route('login')}}">J'ai déjà un compte</a>
</div>

@endsection
@extends('layout')

@section('contenu')

<h1 id="titre_login"> Connectez-vous </h1>

<div class="login">
  <form action="{{route('login')}}" method="post">
  @csrf
    <input type="email" name="email" required placeholder="Email" /><br />
    <input type="password" name="password" required placeholder="password" /><br />
    <div class="remember"><p>Remember me</p><input type="checkbox" name="remember"   /></div><br />
    <input type="submit" value="Valider"/>
  </form>
</div>

@endsection
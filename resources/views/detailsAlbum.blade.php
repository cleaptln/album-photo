@extends("layout")

@section("contenu")

page details album

<label for="trie"></label>
<select name="trie" id="trie">
    <option value="notes">Notes</option>
</select>


<h1> {{$album->titre}} </h1>
    @foreach($photo as $p)
       <h2> {{$p->titre}}</h2>
       <img src="{{$p->url}}">
       
       @foreach($tag[$p->id] as $t)
       <a href="{{route('tag',['tag'=>$t->nom])}}">#{{$t->nom}}</a>
       @endforeach
       
    @endforeach

@endsection
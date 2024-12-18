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

    <script>
        const circleButton = document.getElementById("circleButton");
        const radioList = document.getElementById("radioList");

        // Activé l'expension au clique du bouton
        circleButton.addEventListener("click", (event) => {
            event.stopPropagation(); // Prevent event bubbling to body
            circleButton.classList.toggle("expanded");
        });

        // Ferme la fenêtre si on clique en dehors
        document.body.addEventListener("click", () => {
            circleButton.classList.remove("expanded");
        });
    </script>

    <!-- Fin Bouton tri -->


<h1 class="titre_album"> {{$album->titre}} </h1>
<div class="collection_card"> 
    @foreach($photo as $p)
        <div class="card">
        <h2> {{$p->titre}}</h2>
        <img src="{{$p->url}}">
       
        @foreach($tag[$p->id] as $t)
        <a class="tag" href="{{route('tag',['tag'=>$t->nom])}}">#{{$t->nom}}</a>
        @endforeach
        </div>
    @endforeach
</div>
@endsection


<h1>{{$movie->titre}} <a href="/movies/{{$movie->id}}/edit">Modifier</a> </h1>

<a id="delete" href="/movies/{{$movie->id}}/delete">Supprimer</a>

<div class="row contenu">
    <div class="col-4">
        <img src="\images\{{$movie->image}}" alt="Film {{$movie->titre}}">
    </div>
    <div class="col-8">
        <h4>Description :</h4>
        <p>{{$movie->description}}</p>
    </div>
</div>
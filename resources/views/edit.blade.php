@extends("layouts.page")

@section("content")

<form action="/movies/{{$movie->id}}/delete" method="POST">
    @csrf
    @method('delete')
    <div class="form-row">
        <button id="delete" type="submit" class="btn btn-outline-danger">Supprimer le film</button> 
    </div> 
</form>

<h1> Modifier un film </h1>

<form method="POST" action="/movies/{{$movie->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="col-md-8 mb-3">
            <label for="titre">Titre</label>
            <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre du film" value="{{$movie->titre}}" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="categorie">Catégories</label>
            <select id="categorie" name="categorie" class="form-control">
            <option selected>{{$movie->categorie}}</option>
                @foreach($categories as $categorie)
                    <option value="{{$categorie->categorie}}">{{ $categorie->categorie }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="col mb-3">
            <img width="50" alt="image" src="/myapp/public/images/{{ $movie->image }}" >
            <div class="custom-file">
                <input accept="image/png, image/jpeg" type="file" name="image" class="custom-file-input" id="image" >
                <label class="custom-file-label" value="{{ $movie->image }}" for="image" >Choisir une image</label>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col mb-3">
            <label for="description">Description du film</label>
            <textarea name="description" class="form-control" id="description" rows="5" required>{{$movie->description}}</textarea>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Modifier</button>
    <a href="{{ env('APP_ANGULAR_URL') }}">Retour à la liste des films</a>
    <p><br /></p>
</form>

@endsection
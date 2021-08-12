<form method="POST" action="/movies/{{$movie->id}}">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <div class="col-md-8 mb-3">
            <label for="titre">Titre</label>
            <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre du film" value="{{$movie->titre}}" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="categorie">Catégories</label>
            <select id="categorie" name="categorie" class="form-control">
            <option selected>{{$movie->categorie}}</option>
                @foreach($movies as $movie)
                    <option value="{{$movie->movie}}">{{$movie->movie}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="col mb-3">
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="image" required>
                <label class="custom-file-label" for="image" >Choose file</label>
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
</form>
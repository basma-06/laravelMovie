@extends("layouts.page")

@section("content")
<h1> Créer un film </h1>
<div class="row" class="col-md-12 col-sm-12">
    <form method="POST" action="/movies" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="titre">Titre</label>
                <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre du film" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="categorie">Categorie</label>
                <select id="categorie" name="categorie" class="form-control">
                    <option selected>Selectionner catégorie</option>
                    @foreach($categories as $categorie)
                        <option>{{$categorie->categorie}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col mb-3">
                <div class="custom-file">
                    <input type="file" name="image" value="" class="custom-file-input" id="image" required>
                    <label class="custom-file-label" for="image" >Choose file</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col mb-3">
                <label for="description">Résumé du film</label>
                <textarea name="description" class="form-control" id="description" rows="5" required></textarea>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Créer</button>
    </form> 
</div>
@endsection


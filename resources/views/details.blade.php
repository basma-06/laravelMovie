@extends("layouts.page")

@section("content")
    <div class="row">
        <form action="/movies/{{$movie->id}}/delete" method="POST">
            @csrf
            @method('delete')
            <button id="delete" type="submit" class="btn btn-outline-danger">Supprimer le film</button>
        </form>
    </div>

    <h1>{{$movie->titre}} <a href="/movies/edit/{{$movie->id}}">Modifier le Film</a> </h1>

    <div class="row">
        <div class="col-sm-12 col-md-4">
            <img width="350" src="/myapp/public/images/{{$movie->image}}" alt="Film {{$movie->titre}}">
        </div>
        <div class="col-sm-12 col-md-8">
            <h4>Description :</h4>
            <p>{{$movie->description}}</p>
        </div>
        <a href="{{ env('APP_ANGULAR_URL') }}">Retour à la liste des films</a>
        <p><br /></p>
    </div>

    <!-- @todo créer un template footer, à deplacer dans le template footer -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#delete").click(function(e){
                var titre = '{{ $movie->titre }}';
                resultat = confirm("Etes vous sûr de vouloir supprimer " + titre + " ?");
                if (resultat == false) {
                    e.preventDefault();
                } else {
                    alert("Le film " + titre + " à bien été supprimé !" );
                }
            });
        });
    </script>

@endsection
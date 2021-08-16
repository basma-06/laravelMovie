@extends("layouts.page")
@section("title")
    Liste des films
@endsection
@section("content")
    <h2>Ma liste de films</h2>
    <div class="row">
        <div class="col">
        @foreach($movies as $movie)
            <p>{{$movie->id}} : {{$movie->titre}}<br/></p>
            <p>{{$movie->description}} </p>
        @endforeach
        </div>
    </div>
@ensection
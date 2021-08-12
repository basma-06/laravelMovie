@foreach($movies as $movie)
    <p>{{$movie->id}} : {{$movie->titre}}<br/></p>
    <p>{{$movie->description}} </p>
@endforeach


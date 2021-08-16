<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagesRequest;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;

class MovieController extends Controller
{
    use UploadTrait;

    /**
     * Action index qui retourne tous les films
     * @return 
     */
    public function index() {
        $movies = \App\Models\Movie::all();
        return $movies->toArray(); 
    }

    /**
     * Methode qui va afficher toutes les informations conçernant un film
     * @param $movie de type Model 
     * @param $request de type Request 
     * 
     */
    public function show(\App\Models\Movie $movie, Request $request) {        
        return view('details', compact("movie"));
    } 

    /**
     * Methode qui va permetttre de créer un nouveau film
     * Nous avons besoin de recupérer les différentes catégories de films pour les afficher
     * @param $request de type REQUEST
     */
    public function create(Request $request) {
        //On recupére la liste des différentes catégories dans la BDD
        $categories = \App\Models\Movie::distinct()->get(["categorie"]);
        return view('create', compact('categories'));
    }

    /**
     * Methode qui sauvegarde un film dans la Base de données
     * Dans le cas d'une nouvelle creation de Film
     * @param $request de type REQUEST
     */
    public function store(Request $request) {
        $movie = new \App\Models\Movie(); //instance de l'objet Film
        $movie->image = $this->uploadOne($request); // Upload image
        $movie->titre = $request->input('titre');
        $movie->categorie = $request->input('categorie');
        $movie->description = $request->input('description');
        $movie->save();
        return redirect(env('APP_ANGULAR_URL'));
    }   
    
    /**
     * Méthode qui va afficher un film pour modification
     * @param $movie de type Model 
     * @param $request de type Request
     */
    public function edit($id) {
        $movie = \App\Models\Movie::findOrFail($id);
        $categories = \App\Models\Movie::distinct()->get(["categorie"]);
        return view('edit', compact('movie', 'categories'));
    }

    /**
     * Méthode qui fait la modification d'un Film en Base de données
     * @param $movie de type Model 
     * @param $request de type Request
     */
    public function update(\App\Models\Movie $movie, Request $request) {  
        $image = $this->uploadOne($request); // Upload image    
        $movie->image = ($image != null) && is_string($image)  ? $image : $movie->image;
        $movie->titre = $request->input('titre');
        $movie->categorie = $request->input('categorie');
        $movie->description = $request->input('description');
        $movie->save();
        return redirect('/movies/'.$movie->id);
    }

    /**
     * Méthode qui fait la suppression d'un Film en Base de données
     * @param $movie de type Model 
     * @param $request de type Request
     */
    public function destroy(\App\Models\Movie $movie, Request $request)
    {
        $movie->delete();
        return redirect(env('APP_ANGULAR_URL'));
    }

    /**
     * Sorte de corbeille de Laravel pour recupérer une suppression
     * @param $movie de type Model
     * @param $request de type Request
     */
    /*public function softdelete(\App\Models\Movie $movie, Request $request) {
        $movie->delete();
        return redirect('/movies/');   
    }*/
    public function angular() {
        return redirect()->away(env('APP_ANGULAR_URL'));
    }
}

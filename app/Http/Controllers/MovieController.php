<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Action index qui retourne tous les films
     * @return 
     */
    public function index(){
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
        return view('movie.create', compact('categories'));
    }

    /**
     * Methode qui sauvegarde un film dans la Base de données
     * @param $request de type REQUEST
     */
    public function store(Request $request) {
        $movie = new \App\Models\Film(); //instance de l'objet Film
        $movie->image = $request->input('image');
        $movie->titre = $request->input('titre');
        $movie->categorie = $request->input('categorie');
        $movie->description = $request->input('description');
        $movie->save();
        return redirect('/movies/'); //retourne vers la vue qui affiche tous les films
    }   
    
    /**
     * Méthode qui va afficher un film pour modification
     * @param $movie de type Model 
     * @param $request de type Request
     */
    public function edit(\App\Models\Movie $movie, Request $request) {
        $categories = \App\Models\Movie::distinct()->get(["categorie"]);
        return view('movie.edit', compact('movie', 'categories'));
    }

    /**
     * Méthode qui faire la modification en Base de données
     * @param $movie de type Model 
     * @param $request de type Request
     */
    public function update(\App\Models\Movie $movie, Request $request) {
        $movie->image = $request->input('image');  
        $movie->titre = $request->input('titre');
        $movie->categorie = $request->input('categorie');
        $movie->description = $request->input('description');
        $movie->save();
        return redirect('/movies/'.$movie->id);
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
}

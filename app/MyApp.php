<?php
namespace App;

use Illuminate\Support\Facades\App;

class MyApp {
   
   
    /**
     * Retourne l'URL vers le projet Angular en fonction de l'environnement
     * @return string
     */
   public static function getAngularUrl()
   {
        $angular = 'http://laravel.cabinet-web-nice06.ovh/angular'; //url angular en prod        
        if (App::environment('local')) {
            $angular = 'http://localhost:4200/'; //url angular en localhost
        }
        return $angular;
   }
}

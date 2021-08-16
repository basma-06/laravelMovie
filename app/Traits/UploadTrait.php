<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

trait UploadTrait
{
    /**
     * Recupére l'image uplodé par l'utilisateur et l'enregistre dans le repertoire public/images
     * @param $request 
     * @return mixed $originalName
     */
    public function uploadOne($request, $disk = 'public')
    {
        if ($request->file('image') != null) {
            $image = $request->file('image'); 
            $originalName = $request->file('image')->getClientOriginalName();    
            $destinationPath = public_path('images');
            $image->move($destinationPath, $originalName); 
            return $originalName;
        }
        return null;
    }
}
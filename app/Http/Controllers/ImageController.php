<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ImageController extends Controller
{
    public function store(Request $request){
        
        $imagen = $request->file('file');
        $nombreImage = Str::uuid() . "." . $imagen->extension();
        
        $imagenServer = Image::make($imagen);
        $imagenServer->fit(1000,1000);

        $imgPath = public_path('uploads') . "/" . $nombreImage;
        $imagenServer->save($imgPath);

        return response()->json(['imagen' => $nombreImage]);
    }
}

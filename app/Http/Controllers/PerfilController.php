<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Routing\Controllers\Middleware;

class PerfilController extends Controller
{
    public static function middleware()
    {
        return [
            new Middleware(middleware: 'auth')
        ];
    }

    public function index(){
        return view('perfil.index');
    }

    public function store(Request $request){
        $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate(rules: [
            'username' => 'required|min:3|max:30|not_in:twitter|unique:users,username,'.auth()->user()->id,
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen');
            $nombreImage = Str::uuid() . "." . $imagen->extension();
            
            $imagenServer = Image::make($imagen);
            $imagenServer->fit(1000,1000);

            $imgPath = public_path('perfiles') . "/" . $nombreImage;
            $imagenServer->save($imgPath);
        }

        $user = User::find(auth()->user()->id);

        $user->update([
            'username' => $request->username,
            'imagen' => $nombreImage ?? auth()->user()->imagen
        ]);

        return redirect()->route('posts.index', $request->username);
    }
}

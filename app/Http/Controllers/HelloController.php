<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request){

        $noms = "Ahmed";
        $langs=['HTML','PHP','JS','SQL'];
        return view('hello',[
            'nom' => $noms,
            'langs'=>$langs
        ]

    );
    } 
}

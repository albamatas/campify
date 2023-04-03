<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeCamper;

class SignIn extends Controller
{
    public function publicar(){
        return view('publicarhomecamper');
    }

    public function publicarResultado(HomeCamper $homecamp){

        $homecamper = HomeCamper::find($homecamp->id);
        return view('publicar-resultado', ['homecamper'=>$homecamper]);
    }
}

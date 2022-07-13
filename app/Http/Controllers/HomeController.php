<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeCamper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('landinguser');
    }

    public function view(HomeCamper $homecamp)
    {
        $homecamper = HomeCamper::find($homecamp->id);
        $contador = 0;

        return view('homecamper_details', ['homecamper' => $homecamper, 'contador' => $contador]);
    }

    public function list()
    {
        
        return view('homecamper_list');
    }
}

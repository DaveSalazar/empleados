<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zona;
use App\Sector;
use App\Persona;

class HomeController extends Controller
{
    public function index() {

        $sectores = Sector::all();
        $zonas = Zona::all();

        return view('welcome', compact('zonas', 'sectores'));
    }
}

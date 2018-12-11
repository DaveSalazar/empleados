<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zona;
use App\Sector;
use App\Persona;
use DB;
class HomeController extends Controller
{
    public function index() {

        $sectores = Sector::all();
        $zonas = Zona::all();
        $personas = Persona::all();

        $calc = DB::table('tbl_persona')
            ->whereYear('fec_nacimiento', '<', date('Y')-65)
            ->select('zona_id', DB::raw('SUM(sueldo) as total'))
            ->groupBy('zona_id')
            ->get();
       
        return view('welcome', compact('zonas', 'sectores', 'personas', 'calc'));
    }
}

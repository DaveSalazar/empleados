<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;
use App\Zona;
use App\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();

        return $personas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = null;
        if($request->persona_id == null){
            $persona = new Persona();            
        }else{
            $persona = Persona::find($request->persona_id);
        }

        
        $persona->nom_persona = $request->nom_persona;
        $persona->fec_nacimiento = $request->fec_nacimiento;
        $persona->sueldo = $request->sueldo;
        $persona->estado = $request->estado;
        $persona->sector_id = $request->sector_id;
        $persona->zona_id = $request->zona_id;

        $persona->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::find($id);

        return $persona;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);

        $persona->nom_persona = $request->nom_persona;
        $persona->fec_nacimiento = $request->fec_nacimiento;
        $persona->sector_id = $request->sector_id;
        $persona->zona_id = $request->zona_id;

        $persona->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);

        $persona->delete();
        return redirect('/');
    }
}

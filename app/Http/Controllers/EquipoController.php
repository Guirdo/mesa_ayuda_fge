<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Equipo;
use App\cat_tipo_equipo;
use App\Computadora;
use App\Http\Requests\EquipoStoreRequest;
use App\Http\Requests\EquipoUpdateRequest;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
       $equipos = Equipo::all();
       $tipoEquipo=cat_tipo_equipo::all();

        return view('equipos.index', compact('equipos','tipoEquipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {//TODO
        $tipoEquipo = cat_tipo_equipo::all();

        return view('equipos.create',compact('tipoEquipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipoStoreRequest $request)
    {
        $equipo = new Equipo;

        $equipo->marca = request('marca');
        $equipo->modelo = request('modelo');
        $equipo->numeroSerie = request('numeroSerie');
        $equipo->claveInventarial = request('claveInventarial');
        $equipo->idTipoEquipo = request('tipoEquipo');
        $valida = request('tipoEquipo');
        

        if($valida==73){
            $computadora = new Computadora;
            $computadora->equipo_numeroSerie= request('numeroSerie');
            $computadora->nombre_computadora= request('nombre');
            $computadora->grupo_de_trabajo = request('grupodetrabajo');
            $computadora->discoDuro = request('discoduro');
            $computadora->sistemaOperativo = request('sistemaoperativo');
            $computadora->ram = request('memoria') ;
            $computadora->procesador = request('procesador');
            $computadora->save();
        }

        $equipo->save();
        
        return redirect()->route('equipos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipos = Equipo::find($id);
        $tipoEquipo=cat_tipo_equipo::find($equipos->idTipoEquipo);

        return view('equipos.show', compact('equipos','tipoEquipo'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipos = Equipo::find($id);
        $tipoEquipo=cat_tipo_equipo::all();

        return view('equipos.edit', compact('equipos','tipoEquipo'));

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
        $equipo = Equipo::find($id);

        $equipo->marca = request('marca');
        $equipo->modelo = request('modelo');
        $equipo->numeroSerie = request('numeroSerie');
        $equipo->claveInventarial = request('claveInventarial');
        $equipo->idTipoEquipo = request('tipoEquipo');
        $equipo->save();

        return redirect()->route('equipos.show', $id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id);
        

        $equipo->delete();

        return redirect()->route('equipos.index');
    }

    public function buscarEquipo(Request $request){
        $equipo = Equipo::where('numeroSerie',request('noSerie'))->first();
        $tipoEquipo = cat_tipo_equipo::find($equipo->idTipoEquipo);

        return response()->json(['equipo'=>$equipo,'tipoEquipo'=>$tipoEquipo]);
    }
}

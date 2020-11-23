<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Empleado;
use App\Region;
use App\Adscripcion;
use App\Area;

class EmpleadoController extends Controller
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

    public function index()
    {
        $empleados = Empleado::all();

        return view('empleados.index', compact('empleados'));
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);

        return view('empleados.show', compact('empleado'));
    }

    public function edit($id)
    {
        $empleado = Empleado::find($id);

        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request,$id)
    {
        $empleado = Empleado::find($id);

        $empleado->nombre = request('nombre');
        $empleado->apellidoPat = request('apellidoPat');
        $empleado->apellidoMat = request('apellidoMat');
        $empleado->telefonoPersonal = request('telefonoPersonal');
        $empleado->extencionTelOf = request('extencionTelOf');
        $empleado->CUIP = request('CUIP');

        $empleado->save();

        return redirect()->route('empleados.show',$id);
    }

    public function create(){
        $regiones = Region::all();
        $adscripciones = Adscripcion::all();
        $areas = Area::all();

        return view('empleados.create',compact('regiones','adscripciones','areas'));
    }

    public function store(Request $request)
    {
        $empleado = new Empleado;

        $empleado->nombre = request('nombre');
        $empleado->apellidoPat = request('apellidoPat');
        $empleado->apellidoMat = request('apellidoMat');
        $empleado->email = request('email');
        $empleado->telefonoPersonal = request('telefonoPersonal');
        $empleado->extencionTelOf = request('extencionTelOf');
        $empleado->CUIP = request('CUIP');
        $empleado->idArea = request('area');

        $empleado->save();

        return redirect()->route('empleados.index');
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);

        $empleado->delete();

        return redirect()->route('empleados.index');
    }

    public function adscripciones(Request $request){
        $adscripciones = Adscripcion::all()->where('idRegion',$request->idRegion);

        $array = [];
        foreach($adscripciones as $ads){
            array_push($array,['id'=>$ads->id,'nombre'=>$ads->adscripcion]);
        }

        return response()->json(['adscripciones'=>$array]);
    }

    public function areas(Request $request){
        $areas = Area::all()->where('idAdscripcion',$request->idAds);

        $array = [];
        foreach($areas as $ads){
            array_push($array,['id'=>$ads->id,'nombre'=>$ads->area]);
        }

        return response()->json(['areas'=>$array]);
    }

    public function darEmpleado(Request $request){
        $empleado = Empleado::where('CUIP',$request->cuip)->first();
        $area = Area::find($empleado->idArea);

        return response()->json(['empleado'=>$empleado,'area'=>$area]);
    }

}

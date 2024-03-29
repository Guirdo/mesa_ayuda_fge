<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Empleado;
use App\Region;
use App\Adscripcion;
use App\Area;
use App\CatEstatus;
use App\Http\Requests\EmpleadoStoreRequest;
use App\Http\Requests\EmpleadoUpdateRequest;
use DB;

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
        $areas = [];

        foreach($empleados as $emp){
            $area = Area::find($emp->idArea);
            array_push($areas,$area->area);
        }

        return view('empleados.index', compact('empleados','areas'));
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);
        $area = Area::find($empleado->idArea);
        $estatus = CatEstatus::find($empleado->idEstatus);

        return view('empleados.show', compact('empleado','area','estatus'));
    }

    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $areas = Area::all();
        $estatus = CatEstatus::all();

        $idAdscripcion = Area::find($empleado->idArea)->idAdscripcion;
        $idRegion = Adscripcion::find($idAdscripcion)->idRegion;

        $areas=Area::where('idAdscripcion',$idAdscripcion)->orderBy('area','asc')->get();
        $adscripciones = Adscripcion::where('idRegion',$idRegion)->orderBy('adscripcion','asc')->get();
        $regiones = Region::all();

        return view('empleados.edit', compact('empleado','areas','estatus',
                                        'adscripciones','regiones','idAdscripcion','idRegion'));
    }

    public function update(EmpleadoUpdateRequest $request,$id)
    {
        $empleado = Empleado::find($id);

        $empleado->nombre = request('nombre');
        $empleado->apellidoPat = request('apellidoPat');
        $empleado->apellidoMat = request('apellidoMat');
        $empleado->telefonoPersonal = request('telefonoPersonal');
        $empleado->extencionTelOf = request('extencionTelOf');
        $empleado->CUIP = request('CUIP');
        $empleado->email = request('email');
        $empleado->idArea = request('area');
        $empleado->idEstatus = request('estatus');

        $empleado->save();

        return redirect()->route('empleados.show',$id);
    }

    public function create(){
        $regiones = Region::all();
        $adscripciones = Adscripcion::where('idRegion',1)->orderBy('adscripcion','asc')->get();
        $areas = Area::where('idAdscripcion',$adscripciones[0]->id)->orderBy('area','asc')->get();
        $agregarEmpleado = 0;

        return view('empleados.create',compact('regiones','adscripciones','areas','agregarEmpleado'));
    }

    public function agregarEmpleado(){
        $regiones = Region::all();
        $adscripciones = Adscripcion::where('idRegion',1)->orderBy('adscripcion','asc')->get();
        $areas = Area::where('idAdscripcion',$adscripciones[0]->id)->orderBy('area','asc')->get();
        $agregarEmpleado = 1;

        return view('empleados.create',compact('regiones','adscripciones','areas','agregarEmpleado'));
    }

    public function store(EmpleadoStoreRequest $request)
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

        if($request->agregarEmpleado == 1){
            return redirect()->route('solicitudes.agregar',$empleado->id);
        }else{
            return redirect()->route('empleados.index');
        }
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);

        $empleado->delete();

        return redirect()->route('empleados.index');
    }

    public function adscripciones(Request $request){
        $adscripciones = Adscripcion::where('idRegion',$request->idRegion)->orderBy('adscripcion','asc')->get();

        $array = [];
        foreach($adscripciones as $ads){
            array_push($array,['id'=>$ads->id,'nombre'=>$ads->adscripcion]);
        }

        return response()->json(['adscripciones'=>$array]);
    }

    public function areas(Request $request){
        $areas = Area::where('idAdscripcion',$request->idAds)->orderBy('area','asc')->get();

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

    public function buscarEmpleados(Request $request){
        $apellidoPat = request('apePat');
        $empleados = Empleado::where('apellidoPat','like',$apellidoPat.'%')->get();

        $areasEmp = [];
        foreach($empleados as $emp){
            $area = Area::find($emp->idArea);
            array_push($areasEmp,['area'=>$area->area]);
        }

        return response()->json(['empleados'=>$empleados,'areas'=>$areasEmp]);
    }

}
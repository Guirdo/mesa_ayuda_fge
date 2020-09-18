<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Empleado;

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
        //TODO: Crear area, adscripcion y region

        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $empleado = new Empleado;

        $empleado->nombre = request('nombre');
        $empleado->apellidoPat = request('apellidoPat');
        $empleado->apellidoMat = request('apellidoMat');
        $empleado->telefonoPersonal = request('telefonoPersonal');
        $empleado->extencionTelOf = request('extencionTelOf');
        $empleado->CUIP = request('CUIP');

        $empleado->save();

        return redirect()->route('empleados.index');
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);

        $empleado->delete();

        return redirect()->route('empleados.index');
    }

}

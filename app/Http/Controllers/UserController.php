<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Cat_TipoUsuario;
use App\Empleado;
use App\Area;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = DB::table('users') ->join('empleados','empleados.id','=','users.idEmpleado')
        ->select('*')->get();
        $usuarios =  json_decode( json_encode($usuarios), true);
        return view('users.index', compact('usuarios'));
        
    }

    public function show($id)
    {
        $usuario = User::find($id);
        $tipoUsuario = Cat_TipoUsuario::find($usuario->idTipoUsuario);

        return view('users.show', compact('usuario','tipoUsuario'));
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        $tipoUsuario = Cat_TipoUsuario::all();
        $empleado = Empleado::find($usuario->idEmpleado);
        $area = Area::find($empleado->idArea);

        return view('users.edit', compact('usuario','tipoUsuario','empleado','area'));
    }

    public function update(UserUpdateRequest $request,$id)
    {
        $usuario = User::find($id);

        $usuario->name = request('name');
        $usuario->email = request('email');
        if(!empty($request->password)){
            $usuario->password = Hash::make(request('password'));
        }

        $usuario->save();

        return redirect()->route('users.show',$id);
    }

    public function create(){
        $tipoUsuario = Cat_TipoUsuario::all();
        
        return view('users.create',compact('tipoUsuario'));
    }

    public function store(UserStoreRequest $request)
    {   
        $usuario = new User;
        $usuario->name = request('name');
        $usuario->email = request('email');
        $usuario->password = Hash::make(request('password'));
        $usuario->idTipoUsuario = request('idTipoUsuario');
        $usuario->idEmpleado = request('idEmpleado');

        $usuario->save();

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $usuario = User::find($id);

        $usuario->delete();

        return redirect()->route('users.index');
    }
    public function updateEstado(Request $request){
        $usuario = User::where('id',$request->id)->first();
        //$idEmpleado = $usuario-> request('idEmpleado');
        $empleado = Empleado::find($usuario->idEmpleado);
        $empleado->idEstatus = 1;
        $empleado->save();
        return redirect()->route('users.index');
    }
    public function updateEstadoInactivo(Request $request ){
        $usuario = User::where('id',$request->id)->first();
        //$idEmpleado = $usuario-> request('idEmpleado');
        $empleado = Empleado::find($usuario->idEmpleado);
        $empleado->idEstatus = 4;
        $empleado->save();
        return redirect()->route('users.index');
    }

}

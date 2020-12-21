<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Cat_TipoUsuario;
use App\Empleado;
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
        $usuarios = User::all();
        $tipoUsuario = Cat_TipoUsuario::all();

        return view('users.index', compact('usuarios','tipoUsuario'));
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

        return view('users.edit', compact('usuario','tipoUsuario'));
    }

    public function update(Request $request,$id)
    {
        $usuario = User::find($id);

        $usuario->name = request('name');
        $usuario->email = request('email');

        //$contrasena = request('contrasena');
        //dd($contrasena);

        $usuario->save();

        return redirect()->route('users.show',$id);
    }

    public function create(){
        $tipoUsuario = Cat_TipoUsuario::all();
        $empleados = Empleado::all();
        $usuarios = User::all();
        $soporte = [];
            foreach($empleados as $empleado){
                $emp = User::find($empleado['id']);
                if($emp==null){
                    array_push($soporte,$empleado);

                }
                    
            }
        
        

        return view('users.create',compact('tipoUsuario','soporte'));
    }

    public function store(Request $request)
    {
        $usuario = new User;
        
        $usuario->name = request('name');
        $usuario->email = request('email');
        $usuario->password = Hash::make(request('password'));
        $usuario->idTipoUsuario = request('tipoUsuario');
        $usuario->idEmpleado = request('sop');

        $usuario->save();

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $usuario = User::find($id);

        $usuario->delete();

        return redirect()->route('users.index');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Cat_TipoUsuario;
use App\Empleado;
use DB;
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

        return view('users.edit', compact('usuario','tipoUsuario'));
    }

    public function update(Request $request,$id)
    {
        $usuario = User::find($id);

        $usuario->name = request('name');
        $usuario->email = request('email');
        if(request('password')!=''){
            $usuario->contrasena = bcrypt(request('password'));
            
        }else{
            dd(request('password'));
        }

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
        /*
        DB::table('users')->insert([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'idTipoUsuario' => request('tipoUsuario'),
            'idEmpleado' => request('sop'),
        ]);

        /*
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'idTipoUsuario'=> request('tipoUsuario'),
            'idEmpleado'=>request('sop'),
        ]);*/
        
        $usuario = new User;
        $usuario->name = request('name');
        $usuario->email = request('email');
        $usuario->password = bcrypt(request('password'));
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

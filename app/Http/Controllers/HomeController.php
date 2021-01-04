<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use App\SolicitudSoporte;
use Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->idTipoUsuario == 1){
            $recibidas = Solicitud::whereDate('fechaRegistro',date('Y-m-d'))->count();
            $terminadas = Solicitud::whereDate('fechaTermino',date('Y-m-d'))->count();
            $atendidas = Solicitud::where('idEstado',2)->count();
            $canceladas = Solicitud::whereDate('fechaCancelacion',date('Y-m-d'))->count();

            return view('home', compact('recibidas','terminadas','atendidas','canceladas'));
        }else{
            return redirect()->route('solicitudes.create');
        }
    }

    public function estadistica(Request $request){
        $fechas = $request->fechas;
        $datos = [];

        for($i=0;$i<7;$i++){
            $recibido = Solicitud::whereDate('fechaRegistro',$fechas[$i])->count();
            $terminado = Solicitud::whereDate('fechaTermino',$fechas[$i])->count();
            $cancelado = Solicitud::whereDate('fechaCancelacion',$fechas[$i])->count();
            
            array_push($datos,['dia'=>$fechas[$i],'recibido'=>$recibido,'terminado'=>$terminado,
                                'cancelado'=>$cancelado]);
        }

        return response()->json(['datos'=>$datos]);
    }

    public function estadisticaAvanzada(){
        return view('estadistica.index');
    }

    public function generarGrafica(Request $request){
        $fechas = $request->fechas;
        $idEmpleado = $request->idEmpleado;
        $datos = [];

        $i=0;
        foreach($fechas as $fecha){
            if($idEmpleado == -1){
                $recibido = Solicitud::whereDate('fechaRegistro',$fecha)->count();
                $terminado = Solicitud::whereDate('fechaTermino',$fecha)->count();
                $cancelado = Solicitud::whereDate('fechaCancelacion',$fecha)->count();
            }else{
                $recibido = self::porEmpleado('fechaRegistro',$fecha,$idEmpleado);
                $terminado = self::porEmpleado('fechaTermino',$fecha,$idEmpleado);
                $cancelado = self::porEmpleado('fechaCancelacion',$fecha,$idEmpleado);
            }
            
            array_push($datos,['dia'=>$fecha,'recibido'=>$recibido,'terminado'=>$terminado,
                                'cancelado'=>$cancelado]);
        }

        return response()->json(['datos'=>$datos]);
    }

    private function porEmpleado($campo,$fecha,$idEmpleado){
        $conteo = 0;
        
        foreach(Solicitud::whereDate($campo,$fecha)->get() as $sol){
            $sol_sop = SolicitudSoporte::where('idSolicitud',$sol->id)->first();
            if($sol_sop != null){
                if($sol_sop->idSoporte == $idEmpleado){
                    $conteo = $conteo + 1;
                }
            }
        }

        return $conteo;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;

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
        $recibidas = Solicitud::whereRaw('DATE(fechaRegistro) = ?',date('Y-m-d'))->count();
        $terminadas = Solicitud::whereRaw('DATE(fechaTermino) = ?',date('Y-m-d'))->count();
        $atendidas = Solicitud::where('idEstado',2)->count();
        $canceladas = Solicitud::whereRaw('DATE(fechaCancelacion) = ?',date('Y-m-d'))->count();

        return view('home', compact('recibidas','terminadas','atendidas','canceladas'));
    }

    public function estadistica(Request $request){
        $fechas = $request->fechas;
        $datos = [];

        for($i=0;$i<7;$i++){
            $recibido = Solicitud::whereRaw('DATE(fechaRegistro) = ?',$fechas[$i])->count();
            $terminado = Solicitud::whereRaw('DATE(fechaTermino) = ?',$fechas[$i])->count();
            $cancelado = Solicitud::whereRaw('DATE(fechaCancelacion) = ?',$fechas[$i])->count();
            
            array_push($datos,['dia'=>$fechas[$i],'recibido'=>$recibido,'terminado'=>$terminado,
                                'cancelado'=>$cancelado]);
        }

        return response()->json(['datos'=>$datos]);
    }
}

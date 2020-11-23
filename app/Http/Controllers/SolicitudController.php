<?php

namespace App\Http\Controllers;

use App\Solicitud;
use App\User;
use App\SolicitudSoporte;
use App\Empleado;
use App\Cat_Tipo_Solicitud;
use App\Cat_TipoServicio;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Solicitud::where('idEstado',1)->get();
        $solicitudesA = Solicitud::where('idEstado',2)->get();

        return view('solicitudes.index',compact('solicitudes','solicitudesA'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoSolicitudes = Cat_Tipo_Solicitud::all();
        $tipoServicios = Cat_TipoServicio::all();

        return view('solicitudes.create',compact('tipoSolicitudes','tipoServicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO: Contar el numero de solicitudes en un año
        $numero = Solicitud::where('FUA','>',date('Y').'-01-01 00:00:00')
                            ->where('FUA','<',date('Y').'-12-31 23:59:59')->count();
        $numero = $numero+1;

        $solicitud = new Solicitud;

        $empleado = Empleado::where('CUIP',request('CUIP'))->first();

        $solicitud->folio = self::crearFolio($numero);
        $solicitud->tipoSolicitud = request('tipoSolicitud');
        $solicitud->oficioRelacionado = request('oficioRel');
        $solicitud->idEmpleado = $empleado->id;
        $solicitud->tipoServicio = request('tipoServicio');
        $solicitud->descripcionFalla = request('descripcion');

        $solicitud->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitud = Solicitud::find($id);
        $empleado = Empleado::find($solicitud->idEmpleado);

        $tipoSolicitud = Cat_Tipo_Solicitud::find($solicitud->tipoSolicitud);
        $tipoServicio = Cat_TipoServicio::find($solicitud->tipoServicio);

        $solSop = SolicitudSoporte::where('idSolicitud',$id)->first();
        $usuarios = User::all();

        $soporte = [];
        if($solSop == null){
            foreach($usuarios as $user){
                if($user['idTipoUsuario'] == 2){
                    $emp = Empleado::find($user['idEmpleado']);
                    array_push($soporte,$emp);
                }
            }
        }else{
            $soporte = Empleado::find($solSop->idSoporte);
        }

        return view('solicitudes.show',compact('empleado','solicitud','tipoSolicitud','tipoServicio','solSop','soporte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }

    public function asignarSoporte(Request $request){
        $sol_sop = new SolicitudSoporte;

        $sol_sop->idSoporte = request('sop');
        $sol_sop->idSolicitud = request('sol');
        $sol_sop->save();

        $solicitud = Solicitud::find($sol_sop->idSolicitud);
        $solicitud->idEstado = 2;
        $solicitud->save();

        $solicitudes = Solicitud::where('idEstado',1)->get();
        $solicitudesA = Solicitud::where('idEstado',2)->get();
        return view('solicitudes.index',compact('solicitudes','solicitudesA'));
    }

    private function crearFolio($numero){
        if($numero/1000 >= 1){
            return 'FGE-'.$numero.'-'.date('Y');
        }else if($numero/100 >= 1){
            return 'FGE-0'.$numero.'-'.date('Y');
        }else if($numero/10 >= 1){
            return 'FGE-00'.$numero.'-'.date('Y');
        }else{
            return 'FGE-000'.$numero.'-'.date('Y');
        }
    }
}

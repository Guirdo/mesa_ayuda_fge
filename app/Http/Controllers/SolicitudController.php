<?php

namespace App\Http\Controllers;

use App\Solicitud;
use App\User;
use App\Equipo;
use App\Computadora;
use App\SolicitudSoporte;
use App\EquipoSolicitud;
use App\cat_tipo_equipo;
use App\Empleado;
use App\Area;
use App\Adscripcion;
use App\Region;
use App\Cat_Tipo_Solicitud;
use App\Cat_TipoServicio;
use App\CatTipoReparacion;
use App\Http\Requests\SolicitudStoreRequest;
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
        $solicitudes = null;
        return view('solicitudes.index',compact('solicitudes'));
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
    public function store(SolicitudStoreRequest $request)
    {
        $idEmpleado = request('idEmpleado');
        $empleado = Empleado::find($idEmpleado);
        $solicitud = new Solicitud;

        $solicitud->folio = self::crearFolio($empleado->idArea);
        $solicitud->tipoSolicitud = request('tipoSolicitud');
        $solicitud->oficioRelacionado = request('oficioRelacionado');
        $solicitud->idEmpleado = $empleado->id;
        $solicitud->tipoServicio = request('tipoServicio');
        $solicitud->descripcionFalla = request('descripcion');

        $solicitud->save();

        return redirect()->route('solicitudes.index');
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
        $tipoReparacion = CatTipoReparacion::all();

        $solSop = SolicitudSoporte::where('idSolicitud',$id)->first();
        $usuarios = User::all();

        $soporte = [];
        if($solSop == null){
            foreach($usuarios as $user){
                if($user['idTipoUsuario'] == 2){
                    $emp = Empleado::find($user['idEmpleado']);
                    if($emp->idEstatus == 1){
                        array_push($soporte,$emp);
                    }
                }
            }
        }else{
            $soporte = Empleado::find($solSop->idSoporte);
        }

        $equipo = null;
        $tipoEquipo = null;
        $computadora = null;
        $equSol = EquipoSolicitud::where('idSolicitud',$id)->first();
        if($equSol != null){
            $equipo = Equipo::find($equSol->idEquipo);
            $tipoEquipo = cat_tipo_equipo::find($equipo->idTipoEquipo);
            if($tipoEquipo->tipoEquipo == 'COMPUTADORA'){
                $computadora = Computadora::where('equipo_numeroSerie',$equipo->numeroSerie)->first();
            }
        }

        return view('solicitudes.show',compact('empleado','solicitud','tipoSolicitud','tipoReparacion'
                                                ,'tipoServicio','solSop','soporte','equipo'
                                                ,'tipoEquipo','computadora'));
    }

    public function mostrarTerminados(){
        $solicitudesT = Solicitud::where('idEstado',3)->get();
        $solicitudesC = Solicitud::where('idEstado',4)->get();

        return view('solicitudes.terminados',compact('solicitudesT','solicitudesC'));
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

        return redirect()->route('solicitudes.show',$solicitud->id);
    }

    public function guardarEquipo(Request $request){
        $noSerie = request('noSerie');
        $idSolicitud = request('idSol');
        $equipo = Equipo::where('numeroSerie',$noSerie)->first();

        $equSol = new EquipoSolicitud;
        $equSol->idSolicitud = $idSolicitud;
        $equSol->idEquipo = $equipo->id;
        $equSol->save();

        return redirect()->route('solicitudes.show',$idSolicitud);
    }

    public function guardarObservacion(Request $request){
        $solicitud = Solicitud::find(request('idSol'));

        $solicitud->observaciones = request('observacion');
        $solicitud->tipoReparacion = request('tipoReparacion');

        $solicitud->save();

        return redirect()->route('solicitudes.show',$solicitud->id);
    }

    public function guardarDiagnostico(){
        $solicitud = Solicitud::find(request('idSol'));

        $solicitud->diagnostico = request('diagnostico');
        $solicitud->respaldo = request('carpeta');

        $solicitud->save();

        return redirect()->route('solicitudes.show',$solicitud->id);
    }

    private function crearFolio($idArea){
        $numero = Solicitud::where('FUA','>',date('Y').'-01-01 00:00:00')
                            ->where('FUA','<',date('Y').'-12-31 23:59:59')->count();
        $numero = $numero+1;

        $ads = Adscripcion::find($idArea);
        $region = Region::find($ads->idRegion);
        $siglas = $region->siglas;

        if($numero/10000 >= 1){
            return 'FGE-'.$siglas.'-'.$numero.'-'.date('Y');
        }else if($numero/1000 >= 1){
            return 'FGE-'.$siglas.'-0'.$numero.'-'.date('Y');
        }else if($numero/100 >= 1){
            return 'FGE-'.$siglas.'-00'.$numero.'-'.date('Y');
        }else if($numero/10 >= 1){
            return 'FGE-'.$siglas.'-000'.$numero.'-'.date('Y');
        }else{
            return 'FGE-'.$siglas.'-0000'.$numero.'-'.date('Y');
        }
    }

    public function terminarSolicitud(Request $request){
        $solicitud = Solicitud::find(request('idSol'));

        $solicitud->idEstado = 3;
        $solicitud->fechaTermino = date('Y-m-d');
        $solicitud->save();

        return redirect()->route('solicitudes.recibo',$solicitud->folio);
    }

    public function posponerSolicitud(Request $request){
        $solicitud = Solicitud::find(request('idSol'));

        $solicitud->idEstado = 4;
        $solicitud->fechaCancelacion = date('Y-m-d');
        $solicitud->save();

        return redirect()->route('solicitudes.index');
    }

    public function generarPDF(Request $request){
        $idSol = request('idSol');
        $solicitud = Solicitud::find($idSol);
        $empleado = Empleado::find($solicitud->idEmpleado);
        $area = Area::find($empleado->idArea);

        $solSop = SolicitudSoporte::where('idSolicitud',$idSol)->first();
        $soporte = Empleado::find($solSop->idSoporte);

        $tipoSolicitud = Cat_Tipo_Solicitud::find($solicitud->tipoSolicitud);
        $tipoServicio = Cat_TipoServicio::find($solicitud->tipoServicio);
        $tipoReparacion = CatTipoReparacion::find($solicitud->tipoReparacion);

        $computadora = null;
        $equSol = EquipoSolicitud::where('idSolicitud',$solicitud->id)->first();
        $equipo = Equipo::find($equSol->idEquipo);
        $tipoEquipo = cat_tipo_equipo::find($equipo->idTipoEquipo);
        if($tipoEquipo->tipoEquipo == 'COMPUTADORA'){
            $computadora = Computadora::where('equipo_numeroSerie',$equipo->numeroSerie)->first();
        }

        return response()->json(['empleado'=>$empleado,'solicitud'=>$solicitud,'tipoSolicitud'=>$tipoSolicitud,
                                'area'=>$area,'tipoSer'=>$tipoServicio,'equipo'=>$equipo,'computadora'=>$computadora,
                                'tipoRep'=>$tipoReparacion,'soporte'=>$soporte]);
    }

    public function generarRecibo($folio){
        $solicitud = Solicitud::where('folio',$folio)->first();
        $empleado = Empleado::find($solicitud->idEmpleado);
        $area = Area::find($empleado->idArea);

        $tipoServicio = Cat_TipoServicio::find($solicitud->tipoServicio);
        $tipoReparacion = CatTipoReparacion::find($solicitud->tipoReparacion);
        $tipoSolicitud = Cat_Tipo_Solicitud::find($solicitud->tipoSolicitud);

        $computadora = null;
        $equSol = EquipoSolicitud::where('idSolicitud',$solicitud->id)->first();
        $equipo = Equipo::find($equSol->idEquipo);
        $tipoEquipo = cat_tipo_equipo::find($equipo->idTipoEquipo);
        if($tipoEquipo->tipoEquipo == 'COMPUTADORA'){
            $computadora = Computadora::where('equipo_numeroSerie',$equipo->numeroSerie)->first();
        }

        $solSop = SolicitudSoporte::where('idSolicitud',$solicitud->id)->first();
        $soporte = Empleado::find($solSop->idSoporte);

        return view('solicitudes.recibo',compact('solicitud','tipoSolicitud','empleado','area',
                    'tipoServicio','equipo','computadora','tipoReparacion','soporte'));
    }

    public function gestionSolicitudes(Request $request){
        $fechaInicio = $request->fechaInicio;
        $fechaFinal = $request->fechaFinal;
        $estadoSolicitud = $request->estadoSolicitud;
        $solicitudes = null;

        switch($estadoSolicitud){
            case 1:
                $solicitudes = Solicitud::whereDate('fechaRegistro','>=',$fechaInicio)
                                        ->whereDate('fechaRegistro','<=',$fechaFinal)
                                        ->where('idEstado',1)->get();
                break;
            case 2:
                $solicitudes = Solicitud::whereDate('fechaTermino','>=',$fechaInicio)
                                        ->whereDate('fechaTermino','<=',$fechaFinal)->get();
                break;
            case 3:
                $solicitudes = Solicitud::whereDate('fechaRegistro','>=',$fechaInicio)
                                        ->whereDate('fechaRegistro','<=',$fechaFinal)
                                        ->where('idEstado',2)->get();
                break;
            case 4:
                $solicitudes = Solicitud::whereDate('fechaCancelacion','>=',$fechaInicio)
                                        ->whereDate('fechaCancelacion','<=',$fechaFinal)->get();
                break;
        }

        return view('solicitudes.index',compact('solicitudes'));
    }
}

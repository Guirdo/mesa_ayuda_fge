$(document).ready(function () {
    var now = new Date();

    $('#fechaFinal').val(formatearFecha(now));

    now.setDate(now.getDate()-30);
    $('#fechaInicio').val(formatearFecha(now));

    generarGrafica();
});

$(document).on('change','#porEmpleado',function(event){
    $('#apellidoPat').prop('disabled',!$('#porEmpleado').prop('checked'));

    if(!$('#porEmpleado').prop('checked')){
        $('#tbEmpleados tr').remove();
    }
});

$(document).on('click','#btnGenerar',function(event){
    event.preventDefault();

    var checks = false;
    $("input:checkbox:checked").each(function() {
        checks = true;
    });

    if(checks){
        if($('#porEmpleado').prop('checked')){
            if($('input:radio[name=idEmpleado]:checked').val() != null){
                generarGrafica();
            }else{
                alert('Seleccione a empleado');
            }
        }else{
            generarGrafica();
        }
    }else{
        alert('Seleccione el estado de la solicitud');
    }
});

function graficar(datos){
    axi_y = [];
    etiquetas = [];
    colores = [];

    if($('#checkRecibidas').prop('checked')){
        axi_y.push('recibido');
        etiquetas.push('Recibidas');
        colores.push('blue');
    }

    if($('#checkTerminadas').prop('checked')){
        axi_y.push('terminado');
        etiquetas.push('Terminadas');
        colores.push('green');
    }

    if($('#checkCanceladas').prop('checked')){
        axi_y.push('cancelado');
        etiquetas.push('Canceladas');
        colores.push('red');
    }

    $('#grafica').empty();

    new Morris.Line({
        element: 'grafica',
        hideHover: true,
        data: datos,
        xkey: 'dia',
        ykeys: axi_y,
        labels: etiquetas,
        lineColors: colores,
      });
}

function generarGrafica(){

    var fechaInicio = new Date($('#fechaInicio').val());
    var fechaFinal = new Date($('#fechaFinal').val());

    fechaInicio.setDate(fechaInicio.getDate()+1);
    fechaFinal.setDate(fechaFinal.getDate()+1);

    ponerTitulo(fechaInicio,fechaFinal);

    var fechas = generarFechas(fechaInicio,fechaFinal);

    var idEmpleado = -1;
    if($('#porEmpleado').prop('checked')){
        idEmpleado = $('input:radio[name=idEmpleado]:checked').val();
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax ({
        method: "POST",
        url: '/generarGrafica',
        data: {fechas,idEmpleado},
        success: function(response) {
            var datos = response.datos;
            graficar(datos);
        },
        error: function(response){
            console.log(response);
        }
        
    });
}

function generarFechas(fechaInicio,fechaFinal){
    fechas = [];
    fechaActual = "";
    fechaUltima = formatearFecha(fechaFinal);

    while(fechaActual != fechaUltima){
        fechaActual = formatearFecha(fechaInicio);

        fechas.push(fechaActual);

        fechaInicio.setDate(fechaInicio.getDate()+1);
    }

    return fechas;
}

function formatearFecha(now){
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);

    return now.getFullYear() + "-" + (month) + "-" + (day);
}

function ponerTitulo(fechaInicio,fechaFinal){
    meses = ['ENE','FEB','MAR','ABR','MAY','JUN','JUL','AGO','SEP','OCT','NOV','DIC'];

    var mes1 = meses[fechaInicio.getMonth()];
    var dia1 = fechaInicio.getDate();
    var anio1 = fechaInicio.getFullYear();

    var dia2 = fechaFinal.getDate();
    var mes2 = meses[fechaFinal.getMonth()];
    var anio2 = fechaFinal.getFullYear();

    $('#tituloPeriodo').text('Periodo del '+dia1+'-'+mes1+'-'+anio1+' al '+dia2+'-'+mes2+'-'+anio2);
}
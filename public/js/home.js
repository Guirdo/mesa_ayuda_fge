$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var fechas = darFechas();
    ponerTitulo();

    $.ajax ({
        method: "POST",
        url: '/home/estadistica',
        data: {fechas},
        success: function(response) {
            var datos = response.datos;
            reporteSemanal(datos);
        },
        error: function(response){
            console.log(response);
        }
        
    });
    
});

function reporteSemanal(datos){
    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'myChart',
        hideHover: true,
        data: datos,
        xkey: 'dia',
        ykeys: ['recibido','terminado','cancelado'],
        labels: ['Recibidas','Terminadas','Canceladas'],
        lineColors: ['blue','green','red'],
        /*
        hoverCallback: function (index, options, content, row) {
            //console.log(content);
            var hover = "<div class='morris-hover-row-label'>Recibidas: "+row.recibido+"<br>"+
            "Atendidas: "+row.atendido+"</div>";
            return hover;
          },*/
      });
}

function darFechas(){
    var fechas = [];
    var date = new Date();

    if(date.getDay()>1){
        date.setDate(date.getDate()-date.getDay()+1);
    }else if(date.getDay()==0){
        date.setDate(date.getDate()-7);
    }
    
    for(i=0;i<7;i++){
        var mes = (date.getMonth()+1)<10 ? '0'+(date.getMonth()+1) : (date.getMonth()+1);
        var dia = date.getDate()<10 ? '0'+date.getDate() : date.getDate();

        fechas.push(date.getFullYear()+'-'+mes+'-'+dia);
        date.setDate(date.getDate()+1);
    }

    return fechas;
}

function ponerTitulo(){
    var date = new Date();

    if(date.getDay()>1){
        date.setDate(date.getDate()-date.getDay()+1);
    }else if(date.getDay()==0){
        date.setDate(date.getDate()-7);
    }

    meses = ['ENE','FEB','MAR','ABR','MAY','JUN','JUL','AGO','SEP','OCT','NOV','DIC'];
    var mes1 = meses[date.getMonth()];
    var dia1 = date.getDate();
    var anio1 = date.getFullYear();

    date.setDate(date.getDate()+6);
    var dia2 = date.getDate();
    var mes2 = meses[date.getMonth()];
    var anio2 = date.getFullYear();

    $('#tituloSemana').text('Semana '+dia1+'-'+mes1+'-'+anio1+' al '+dia2+'-'+mes2+'-'+anio2);
}
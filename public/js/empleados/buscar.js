$(document).on('click','#btnBuscar',function(event){
    event.preventDefault();
    
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var apePat = $('#apellidoPat').val();
        //console.log("Hola mundo");
        $.ajax({
             url: '/empleados/buscarEmpleados',
             type: 'POST',
             data: {apePat},
             dataType: 'json',
             success: function(response){
                var empleados = response.empleados;
                
                console.log(empleados);

                $.each(empleados, function(i,v){
                    $('#tbCuerpo').append('<tr><td><input type="radio" name="emp" value="'+v.id+'">'+
                    '</td><td>'+v.nombre+' '+v.apellidoPat+' '+v.apellidoMat+'</td></tr>');
                });
                
             },
             error: function(response){
                 console.log(response);
             }
         });
    });
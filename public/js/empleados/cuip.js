$(document).on('click','#btnBuscar',function(event){
    event.preventDefault();

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var cuip = $('#CUIP').val();
        //console.log("Hola mundo");
        $.ajax({
             url: '/empleados/darEmpleado',
             type: 'POST',
             data: {cuip},
             dataType: 'json',
             success: function(response){
                var empleado = response.empleado;
                var area = response.area;

                $('#nombre').val(empleado.nombre+' '+empleado.apellidoPat+' '+empleado.apellidoMat);
                $('#telefono').val(empleado.telefonoPersonal);
                $('#email').val(empleado.email);
                $('#area').val(area.area);
             },
             error: function(response){
                 console.log(response);
             }
         });
    });
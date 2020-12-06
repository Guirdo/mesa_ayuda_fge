$(document).on('click','#btnBuscar',function(event){
    event.preventDefault();

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var noSerie = $('#noSerie').val();
        $.ajax({
             url: '/equipos/buscarEquipo',
             type: 'POST',
             data: {noSerie},
             dataType: 'json',
             success: function(response){
                var equipo = response.equipo;
                var tipoEquipo = response.tipoEquipo;

                $('#marca').val(equipo.marca);
                $('#modelo').val(equipo.modelo);
                $('#claveInv').val(equipo.claveInventarial);
                $('#tipoEquipo').val(tipoEquipo.tipoEquipo);
             },
             error: function(response){
                 alert('Equipo no encontrado');
             }
         });
    });
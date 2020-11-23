$(document).on('change','#region',function(event){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var idRegion = $('#region option:selected').val();
     $.ajax({
         url: '/empleados/adscripciones',
         type: 'POST',
         data: {idRegion},
         dataType: 'json',
         success: function(response){
             $('#adscripcion').find('option').remove();

             var datos = response.adscripciones;

             $(datos).each(function(i,v){
                $('#adscripcion').append('<option value="'+v.id+'">'+v.nombre+'</option>');
             });

             actualizarAreas(1);
         },
         error: function(response){
            console.log(response);
         }
     });

     
});

$(document).on('change','#adscripcion',function(event){
    var idAds = $('#adscripcion option:selected').val();
    actualizarAreas(idAds);
});

function actualizarAreas(idAds){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/empleados/areas',
        type: 'POST',
        data: {idAds},
        dataType: 'json',
        success: function(response){
            $('#area').find('option').remove();

            var datos = response.areas;
            $(datos).each(function(i,v){
               $('#area').append('<option value="'+v.id+'">'+v.nombre+'</option>');
            });
        },
        error: function(response){
           console.log(response);
        }
    });
}
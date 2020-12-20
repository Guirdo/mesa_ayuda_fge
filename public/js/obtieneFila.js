/*$(document).ready(function(){ 
    
});
*/

$(document).on('click','#tomar',function(event){
    var valores=[];
    // Obtenemos todos los valores contenidos en los <td> de la fila
    // seleccionada
    
    var idSolicitud = $('#idSol').val();

    //AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax ({
        method: "POST",
        url: '/solicitudesSoporte/asignar',
        data: {idSolicitud},
        success: function(response) {
            location.reload();
        },
        error: function(response){
            console.log(response);
        }
        
    });
    

    



});
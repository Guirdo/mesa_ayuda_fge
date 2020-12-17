$(document).ready(function(){ 
    $(document).on('click','#tomar',function(event){
        var valores=[];
        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find("td").each(function(){
            valores.push($(this).html());
        });
        var idSolicitud = valores[5];

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
            
        });
        

        



    });
});
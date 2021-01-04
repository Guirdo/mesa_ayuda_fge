$(document).on("change",'#btnEstados',function(event){
    if($(this).prop('checked')){
        var valores=[];

 

        // Obtenemos todos los valores contenidos en los <td> de la fila

        // seleccionada

        $(this).parents("tr").find("td").each(function(){

            valores.push($(this).html());

        });
        var id =valores[0];


         //AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax ({
        method: "POST",
        url: '/usuarioEstatus/Estado',
        data: {id},
        success: function(response) {
            location.reload();
        },
        error: function(response){
            console.log(response);
        }
        
    });



       

    } else{
        var valores=[];

 

        // Obtenemos todos los valores contenidos en los <td> de la fila

        // seleccionada

        $(this).parents("tr").find("td").each(function(){

            valores.push($(this).html());

        });
        var id =valores[0];


         //AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax ({
        method: "POST",
        url: '/usuarioEstatus/Estadoinactivo',
        data: {id},
        success: function(response) {
            location.reload();
        },
        error: function(response){
            console.log(response);
        }
        
    });
       
        
    }
});



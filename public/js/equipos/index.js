$(document).on('change','#tipoEquipo',function(event){
    var idtipo = $('#tipoEquipo option:selected').text();
    if(idtipo=='COMPUTADORA'){
        var response = '<div class="form-group"> <label for="">Nombre</label>  <input class="form-control" type="text" name="nombre"> </div> ' +
        '<div class="form-group"> <label for="">Grupo de Trabajo</label>  <input class="form-control" type="text" name="grupodetrabajo"> </div> '+
        '<div class="form-group"> <label for="">Disco Duro</label> <input class="form-control" type="text" name="discoduro"> </div>' +
        '<div class="form-group">  <label for="">Memoria RAM</label> <input class="form-control" type="text" name="memoria"> </div>' +
        '<div class="form-group"> <label for="">Sistema Operativo</label> <input class="form-control" type="text" name="sistemaoperativo"> </div>' +
        '<div class="form-group"> <label for="">Procesador</label>  <input class="form-control" type="text" name="procesador"> </div>';




        document.getElementById('editData').innerHTML=response;  
    }else{
        document.getElementById('editData').innerHTML="";
    }
});
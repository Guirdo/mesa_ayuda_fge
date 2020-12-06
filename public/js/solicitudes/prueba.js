$(document).on('click','#btnTerminar',function(event){
    //event.preventDefault();

    /*
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });*/

    var doc = new jsPDF();
    doc.text(20, 20, 'Hola mundo!');
    doc.text(20, 30, 'Esto es un generador de PDF en Java Script.');
    doc.addPage();
    doc.text(20, 20, '¿Cómo estas?');
    doc.save('recibo.pdf');
});
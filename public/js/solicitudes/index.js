$(document).ready(function () {
    var now = new Date();

    $('#fechaFinal').val(formatearFecha(now));

    now.setDate(now.getDate()-14);
    $('#fechaInicio').val(formatearFecha(now));
});

function formatearFecha(now){
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);

    return now.getFullYear() + "-" + (month) + "-" + (day);
}
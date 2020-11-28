$(document).ready(function(){
    obtener_adopciones();
    console.log("HOLA");
    
    //accion de registro adopcion
    $("#btn_consulta_adopciones").click(function() {
        obtener_adopciones();
	});
});

function obtener_adopciones() {
    // COMPLETAR - CONFIGURAR LA SOLICITUD AJAX
    $.ajax({
        url: '../BackEnd/adoptante.php',//donde esta mi web service
        type: "GET", // MÉTODO DE ACCESO
        dataType: "JSON", // FORMATO DE LOS DATOS
        success: function (data) {
            // COMPLETAR - VERIFICAR QUE EXISTAN LAS ADOPCIONES
            if (data.adopciones) {
                // COMPLETAR - LOS DATOS EN LA TABLA
                 console.log("Estoy aqui");
                consulta_adopcion(data.adopciones);
            }
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}

function consulta_adopcion(adopciones) {
    let html = '';
    for (let index in adopciones) {
        html += "<tr class='text-center'>" +
                "<td>"+adopciones[index].idadopciones+"</td>" +
                "<td>"+adopciones[index].nombre+"</td>" +
                "<td>"+adopciones[index].apellidos+"</td>" +
                "<td>"+adopciones[index].direccion+"</td>" +
                "<td>"+adopciones[index].codigo_postal+"</td>" +
                "<td>"+adopciones[index].telefono+"</td>" +
                "<td>"+adopciones[index].genero+"</td>" +
                "<td>"+adopciones[index].email+"</td>" +
                "<td>"+adopciones[index].ocupacion_adoptante+"</td>" +
                "<td>"+adopciones[index].ingresos_adoptante+"</td>" +
                "<td>"+adopciones[index].nombre_mascota+"</td>" +
                "<td>"+adopciones[index].nombre+"</td>" +
            "</tr>";
    }
    $("#tabla_consulta_adoptados").html(html);
}

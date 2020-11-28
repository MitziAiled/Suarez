$(document).ready(function(){
    
    //accion de registro adopcion
    $("#btn_consulta_adopciones").click(function() {
        //obtener_adopciones();
        console.log("Exito");
	});
});

function obtener_adopciones() {
    // COMPLETAR - CONFIGURAR LA SOLICITUD AJAX
    $.ajax({
        url: '../BackEnd/adoptante.php',//donde esta mi web service
        type: "GET", // MÉTODO DE ACCESO
        dataType: "JSON", // FORMATO DE LOS DATOS
        success: function (data) {
            // COMPLETAR - VERIFICAR QUE EXISTAN LOS PRODUCTOS
            if (data.adopciones) {
                // COMPLETAR - LOS DATOS EN LA TABLA
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
                "<td>"+adopciones[index].adopciones.idadopciones+"</td>" +
                "<td>"+adopciones[index].usuarios.nombre+"</td>" +
                "<td>"+adopciones[index].usuarios.apellidos+"</td>" +
                "<td>"+adopciones[index].usuarios.direccion+"</td>" +
                "<td>"+adopciones[index].usuarios.codigo_postal+"</td>" +
                "<td>"+adopciones[index].usuarios.telefono+"</td>" +
                "<td>"+adopciones[index].usuarios.genero+"</td>" +
                "<td>"+adopciones[index].usuarios.email+"</td>" +
                "<td>"+adopciones[index].adopciones.ocupacion_adoptante+"</td>" +
                "<td>"+adopciones[index].adopciones.ingresos_adoptante+"</td>" +
                "<td>"+adopciones[index].adopciones.nombre_mascota+"</td>" +
                "<td>"+adopciones[index].instituciones.nombre+"</td>" +
            "</tr>";
    }

    $("#tabla_consulta_adoptados").html(html);
}
